<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Setting extends CI_Controller
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

    function setting_password()
    {
        if($this->session->userdata('kode') != null) {
            $array_items = array('iduser', 'username', 'email1','old_password','new_password','confirm_newpassword','no_rek','nm_rek','id_bank');
            $this->session->unset_userdata($array_items);
        }
        $data['title'] = 'Setting Password';
        $id = $this->session->userdata('login_token');
        $query = $this->auth_m->getUser($id);
        if ($query->status_code == '200') {
            $data['data'] = $query->data;
        }

        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view('layouts/navbar');
        $this->load->view('setting_password', $data);
        $this->load->view('layouts/js');
        $this->load->view('layouts/footer');
    }

    function proses_ganti()
    {
        $iduser = $this->input->post('iduser');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $old_password = $this->input->post('old_password');
        $new_password = $this->input->post('new_password');
        $confirm_newpassword = $this->input->post('confirm_newpassword');
        $query = $this->integrasi_m->sendOTP();
        if ($query->status_code == '500') {
            $this->session->set_flashdata('error', $query->messages);
            redirect('setting/setting_password');
        } else {
            $session = array(
                'kode' => 1,
                'iduser' => $iduser,
                'username' => $username,
                'email1' => $email,
                'old_password' => $old_password,
                'new_password' => $new_password,
                'confirm_newpassword' => $confirm_newpassword,
                'no_rek' => 1,
                'nm_rek' => 1,
                'id_bank' => 1,
            );
            $this->session->set_userdata($session);
            $this->session->set_flashdata('success', 'Request OTP Berhasil');
            redirect("setting/confirmSetting");
        }
    }

    function setting_rekening()
    {
        if($this->session->userdata('kode') != null) {
            $array_items = array('iduser', 'username', 'email1','old_password','new_password','confirm_newpassword','no_rek','nm_rek','id_bank');
            $this->session->unset_userdata($array_items);
        }
        $data['title'] = 'Setting Rekening';
        $id = $this->session->userdata('login_token');
        $query = $this->setting_m->getRekening($id);
        $query1 = $this->setting_m->getBank($id);
        if ($query->status_code == '200') {
            $data['data'] = $query->data;
        }
       
        $data['data1'] = $query1->data;

        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view('layouts/navbar');
        $this->load->view('setting_rekening', $data);
        $this->load->view('layouts/js');
        $this->load->view('layouts/footer');
    }

    function proses_rekening()
    {
        $no_rek = $this->input->post('no_rek');
        $nm_rek = $this->input->post('nm_rek');
        $id_bank = $this->input->post('id_bank');
        $query = $this->integrasi_m->sendOTP();
        if ($query->status_code == '500') {
            $this->session->set_flashdata('error', $query->messages);
            redirect('setting/setting_rekening');
        } else {
            $session = array(
                'kode' => 2,
                'iduser' => 1,
                'username' => 1,
                'email1' => 1,
                'old_password' => 1,
                'new_password' => 1,
                'confirm_newpassword' => 1,
                'no_rek' => $no_rek,
                'nm_rek' => $nm_rek,
                'id_bank' => $id_bank,
            );
            $this->session->set_userdata($session);
            $this->session->set_flashdata('success', 'Request OTP Berhasil');
            redirect("setting/confirmSetting");
        }
    }

    function confirmSetting()
    {
        $data['title'] = 'OTP PAGE';
        $data['kode'] = $this->session->userdata('kode');
        $this->load->view('otp_setting1', $data);
    }

    function prosesOTP()
    {
        $otp = $this->input->post('otp');
        $kode = $this->session->userdata('kode');
        $query = $this->integrasi_m->VerifOTP($otp);
        if ($query->status_code == '500') {
            $this->session->set_flashdata('error', 'Kode OTP Salah');
            redirect('setting/confirmSetting');
        } else {
            if ($kode == '1') {
                $iduser = $this->session->userdata('iduser');
                $username = $this->session->userdata('username');
                $email = $this->session->userdata('email1');
                $old_password = $this->session->userdata('old_password');
                $new_password = $this->session->userdata('new_password');
                $confirm_newpassword = $this->session->userdata('confirm_newpassword');
                $query1 = $this->auth_m->changePassword($iduser,$username,$email,$old_password,$new_password,$confirm_newpassword);
                if($query1->status_code == '200') {
                    $array_items = array('iduser', 'username', 'email1','old_password','new_password','confirm_newpassword','no_rek','nm_rek','id_bank');
                    $this->session->unset_userdata($array_items);
                    $this->session->set_flashdata('error',$query1->messages);
                    redirect('setting/setting_password');
                } else {
                    $array_items = array('iduser', 'username', 'email1','old_password','new_password','confirm_newpassword','no_rek','nm_rek','id_bank');
                    $this->session->unset_userdata($array_items);
                    $this->session->set_flashdata('success',$query1->messages);
                    redirect('setting/setting_password');
                }
            } else if ($kode == '2') {
                $no_rek = $this->session->userdata('no_rek');
                $nm_rek = $this->session->userdata('nm_rek');
                $id_bank = $this->session->userdata('id_bank');
                $query1 = $this->setting_m->postRekening($no_rek, $nm_rek, $id_bank);
                if ($query1->status_code == '500') {
                    $array_items = array('iduser', 'username', 'email1','old_password','new_password','confirm_newpassword','no_rek','nm_rek','id_bank');
                    $this->session->unset_userdata($array_items);
                    $this->session->set_flashdata('error', $query1->messages);
                    redirect('setting/setting_rekening');
                } else {
                    $array_items = array('iduser', 'username', 'email1','old_password','new_password','confirm_newpassword','no_rek','nm_rek','id_bank');
                    $this->session->unset_userdata($array_items);
                    $this->session->set_flashdata('success', $query1->messages);
                    redirect('setting/setting_rekening');
                }
            } 
        }
    }
}
