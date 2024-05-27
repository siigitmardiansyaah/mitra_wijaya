<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect('auth');
        }

        $this->load->model('dashboard_m');

        if(cekToken() === false) {
            redirect('auth');
        }
    }

    function index()
    {
        $data['title'] = 'Dashboard';
        $jam = date('H:i');
        $username = $this->session->userdata('nama');
        // $data['data'] = $query->data;
        if ($jam >= '00:00' && $jam < '10:59') {
            $data['welcome'] = "Selamat Pagi $username !";
        } else if ($jam >= '11:00' && $jam < '15:00') {
            $data['welcome'] = "Selamat Siang $username !";
        } else if ($jam >= '15:00' && $jam < '18:00') {
            $data['welcome'] = "Selamat Sore $username !";
        } else {
            $data['welcome'] = "Selamat Malam $username !";
        }
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view('layouts/navbar');
        $this->load->view('dashboard', $data);
        $this->load->view('layouts/js');
        $this->load->view('js/dashboard_js',$data);
        $this->load->view('layouts/footer');
    }

    function getRekap() {
        $tgl_1 = $this->input->post('tgl_1');
        if($tgl_1 == '' || $tgl_1 == null) {
            $tgl_1 = date('d-m-Y');
        } else {
            $tgl_1 = date('d-m-Y',strtotime($tgl_1));
        }
        $tgl_2 = $this->input->post('tgl_2');
        if($tgl_2 == '' || $tgl_2 == null) {
            $tgl_2 = date('d-m-Y');
        } else {
            $tgl_2 = date('d-m-Y',strtotime($tgl_2));
        }
        $query = $this->dashboard_m->getRekap($tgl_1,$tgl_2);
        echo json_encode($query);
    }
}
