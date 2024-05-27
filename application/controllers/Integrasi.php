<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Integrasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect('auth');
        }

        $this->load->model('setting_m');
        $this->load->model('auth_m');
        $this->load->model('integrasi_m');

        if (cekToken() === false) {
            redirect('auth');
        }
    }

    function index()
    {
    }

    function integrasi_qris()
    {
        if ($this->session->userdata('kode') != null) {
            $array_items = array('kode', 'ip_address', 'url_callback','password','pin');
            $this->session->unset_userdata($array_items);
        }
        $data['title'] = 'Integrasi QRIS';
        $id = $this->session->userdata('login_token');
        $query = $this->integrasi_m->getCredential($id);
        if ($query->status_code == '200') {
            $data['data'] = $query->data;
        }
        $query = $this->integrasi_m->getCallback($id);
        $data['data1'] = $query->data;
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view('layouts/navbar');
        $this->load->view('integrasi_qris', $data);
        $this->load->view('layouts/js');
        $this->load->view('js/transaksi_ip_js');
        $this->load->view('layouts/footer');
    }

    function proses_credential()
    {
        $query = $this->integrasi_m->sendOTP();
        if ($query->status_code == '500') {
            $this->session->set_flashdata('error', $query->messages);
            redirect('integrasi/integrasi_qris');
        } else {
            $this->session->set_userdata('kode', 1);
            $this->session->set_flashdata('success', 'Request OTP Dikirim !');
            redirect("integrasi/confirmSetting");
        }
    }

    function resendOTP() {
        $query = $this->integrasi_m->sendOTP();
        if ($query->status_code == '500') {
            echo json_encode($query);
        } else {
            echo json_encode($query);
        }
    }

    function proses_credential1()
    {
        $ip_address = $this->input->post('ip_address');
        $url_callback = $this->input->post('url_callback');

        $query = $this->integrasi_m->sendOTP();
        if ($query->status_code == '500') {
            $this->session->set_flashdata('error', $query->messages);
            redirect('integrasi/integrasi_qris');
        } else {
            $session = array(
                'kode' => 2,
                'ip_address' => $ip_address,
                'url_callback' => $url_callback,
            );
            $this->session->set_userdata($session);
            $this->session->set_flashdata('success', 'Request OTP Dikirim !');
            redirect("integrasi/confirmSetting");
        }
    }
    function transaksi_ip()
    {
        if ($this->session->userdata('kode') != null) {
            $array_items = array('kode', 'ip_address', 'url_callback','password','pin');
            $this->session->unset_userdata($array_items);

        }
        $data['title'] = 'Transaksi via IP';
        $id = $this->session->userdata('login_token');
        $query = $this->integrasi_m->getIP($id);
        $data['data'] = $query->data;
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view('layouts/navbar');
        $this->load->view('transaksi_ip', $data);
        $this->load->view('layouts/js');
        $this->load->view('js/transaksi_ip_js');
        $this->load->view('layouts/footer');
    }

    function proses_ipaddress()
    {
        $url = $this->input->post('url_callback');
        $ip_address = $this->input->post('ip_address');
        $password = $this->input->post('password');
        $pin = $this->input->post('pin');

        $query = $this->integrasi_m->sendOTP();
        if ($query->status_code == '500') {
            $this->session->set_flashdata('error', $query->messages);
            redirect('integrasi/transaksi_ip');
        } else {
            $session = array(
                'kode' => 3,
                'url_callback' => $url,
                'ip_address' => $ip_address,
                'password' => $password,
                'pin' => $pin,
            );
            $this->session->set_userdata($session);
            $this->session->set_flashdata('success', 'Request OTP Dikirim !');
            redirect("integrasi/confirmSetting");
        }
    }

    function confirmSetting()
    {
        $data['kode'] = $this->session->userdata('kode');
        $data['title'] = 'OTP PAGE';
        $data['ip_address'] = $this->session->userdata('ip_address');
        $data['url'] = $this->session->userdata('url_callback');
        $data['password'] = $this->session->userdata('password');
        $data['pin'] = $this->session->userdata('pin');
        $this->load->view('otp_setting',$data);
    }

    function prosesOTP()
    {
        $otp = $this->input->post('otp');
        $kode = $this->session->userdata('kode');
        $ip_address = $this->input->post('ip_address');
        $url = $this->input->post('url_callback');
        $password = $this->input->post('password');
        $pin = $this->input->post('pin');
        $query = $this->integrasi_m->VerifOTP($otp);
        if ($query->status_code == '500') {
            $this->session->set_flashdata('error', 'Kode OTP Salah');
            redirect('integrasi/confirmSetting');
        } else {
            if ($kode == '1') {
                $query1 = $this->integrasi_m->sendCredential();
                if ($query1->status_code == '500') {
                    $array_items = array('kode', 'ip_address', 'url_callback','password','pin');
                    $this->session->unset_userdata($array_items);
                    $this->session->set_flashdata('error', $query1->messages);
                    redirect('integrasi/integrasi_qris');
                } else {
                    $array_items = array('kode', 'ip_address', 'url_callback','password','pin');
                    $this->session->unset_userdata($array_items);
                    $this->session->set_flashdata('success', $query1->messages);
                    redirect('integrasi/integrasi_qris');
                }
            } else if ($kode == '2') {
                $query1 = $this->integrasi_m->sendCredential1($ip_address, $url);
                if ($query1->status_code == '500') {
                    $array_items = array('kode', 'ip_address', 'url_callback','password','pin');
                    $this->session->unset_userdata($array_items);
                    $this->session->set_flashdata('error', 'Gagal Save');
                    redirect('integrasi/integrasi_qris');
                } else {
                    $array_items = array('kode', 'ip_address', 'url_callback','password','pin');
                    $this->session->unset_userdata($array_items);
                    $this->session->set_flashdata('success', 'Berhasil Save');
                    redirect('integrasi/integrasi_qris');
                }
            } else if ($kode == '3') {
                $sendArray = array(
                    'h2h_password' => $password,
                    'h2h_allow_ip' => $ip_address,
                    'h2h_report_url' => $url,
                    'h2h_pin' => $pin
                );
                $query1 = $this->integrasi_m->updateIP($sendArray);
                if ($query1->status_code == '500') {
                    $array_items = array('kode', 'ip_address', 'url_callback','password','pin');
                    $this->session->unset_userdata($array_items);
                    $this->session->set_flashdata('error', 'Update Transaksi IP Gagal');
                    redirect('integrasi/transaksi_ip');
                } else {
                    $array_items = array('kode', 'ip_address', 'url_callback','password','pin');
                    $this->session->unset_userdata($array_items);
                    $this->session->set_flashdata('success', 'Update Transaksi IP Berhasil');
                    redirect('integrasi/transaksi_ip');
                }
                // print_r($sendArray);
                // echo $this->session->userdata('login_token');
            }
        }
    }
}
