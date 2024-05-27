<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Deposit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect('auth');
        }

        $this->load->model('setting_m');
        $this->load->model('deposit_m');

        if(cekToken() === false) {
            redirect('auth');
        }
    }

    function index()
    {
       
    }  

    function tambah_deposit() {
        $data['title'] = 'Tambah Deposit';
        $id = $this->session->userdata('login_token');
        $query = $this->deposit_m->getBank($id);
        if($query->status_code == '200') {
            $data['data'] = $query->data;
        }
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view('layouts/navbar');
        $this->load->view('deposit', $data);
        $this->load->view('layouts/js');
        $this->load->view('js/deposit_js');
        $this->load->view('layouts/footer');
    }

    function proses_deposit() {
        $nominal = $this->input->post('nominal');
        $nominal = str_replace(".", "", $nominal);
        $id_bank = $this->input->post('id_bank');
        $id = $this->session->userdata('login_token');
        $query1 = $this->deposit_m->getBank($id);
        $data_bank = $query1->data;
        $bank_access = null;
        $min = 0;
        $max = 0;
        $dat = array(
            'payment_key' => $id_bank,
            'nominal' => $nominal
        );
        foreach($data_bank as $da) {
            if($da->key == $id_bank) {
                $bank_access = $da->key;
                $min = $da->min;
                $max = $da->max;
                break(1);
            }
        }
        if($bank_access == $id_bank) {
            if((float)$nominal < (float)$min) {
                $this->session->set_flashdata('error','Jumlah Deposit dibawah '. rupiah_format($min));
                redirect('deposit/tambah_deposit');
            } else if((float)$nominal >= (float)$min && (float)$nominal <= (float)$max) {
                $query = $this->deposit_m->postDeposit($nominal,$id_bank);
                if($query->status_code == '500') {
                    $this->session->set_flashdata('success',$query->messages);
                    redirect('deposit/tambah_deposit');
                } else {
                    $data = $query->data;
                    $this->session->set_flashdata('success',$query->messages);
                    redirect("deposit/detail_deposit/$data->deposit_id");
                }
            } else {
                $this->session->set_flashdata('error','Jumlah Deposit diatas '. rupiah_format($max));
                redirect('deposit/tambah_deposit');
            }
        }
    }

    function history_deposit() {
        $data['title'] = 'History Deposit';
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view('layouts/navbar');
        $this->load->view('history_deposit', $data);
        $this->load->view('layouts/js');
        $this->load->view('js/deposit_js');
        $this->load->view('layouts/footer');
    }

    function getHistory() {
        $tgl1 = $this->input->post('tgl_1');
        $tgl2 = $this->input->post('tgl_2');
        if($tgl1 == '' || $tgl1 == null) {
            $tgl1 = '';
        } else {
            $tgl1 = date('Y-m-d',strtotime($tgl1));
        }
        if($tgl2 == '' || $tgl2 == null) {
            $tgl2 = '';
        } else {
            $tgl2 = date('Y-m-d',strtotime($tgl2));
        }
        $query = $this->deposit_m->getHistory($tgl1,$tgl2);
        echo json_encode($query->data);
    }

    function detail_deposit($id) {
        $data['title'] = 'Detail Deposit';
        $query = $this->deposit_m->getDeposit($id);
        if($query->status_code == '200') {
            $data['data'] = $query->data;
        }
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view('layouts/navbar');
        $this->load->view('detail_deposit', $data);
        $this->load->view('layouts/js');
        $this->load->view('layouts/footer');
    }

    function cancel_deposit($id) {
        $query = $this->deposit_m->cancelDeposit($id);
        if($query->status_code == '500') {
            $this->session->set_flashdata('error',$query->messages);
            redirect("deposit/detail_deposit/$id");
        } else {
            $this->session->set_flashdata('success1',$query->messages);
            redirect("deposit/detail_deposit/$id");
        }
    }
}
