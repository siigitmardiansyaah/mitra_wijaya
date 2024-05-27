<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Mutasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect('auth');
        }

        $this->load->model('mutasi_m');

        if(cekToken() === false) {
            redirect('auth');
        }
    }

    function index()
    {
        $data['title'] = 'Mutasi Saldo';
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view('layouts/navbar');
        $this->load->view('mutasi', $data);
        $this->load->view('layouts/js');
        $this->load->view('js/mutasi_js');
        $this->load->view('layouts/footer');
    }
    
    function getMutasi() {
        $tgl1 = $this->input->post('tgl1');
        if($tgl1 == '' || $tgl1 == null) {
            $tgl1 = '';
        } else {
            $tgl1 = date('d-m-Y',strtotime($tgl1));
        }
        $tgl2 = $this->input->post('tgl2');
        if($tgl2 == '' || $tgl2 == null) {
            $tgl2 = '';
        } else {
            $tgl2 = date('d-m-Y',strtotime($tgl2));
        }
        $query = $this->mutasi_m->getMutasiSaldo($tgl1,$tgl2);
        echo json_encode($query->data);
    }
}
