<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Dana extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect('auth');
        }

        $this->load->model('dana_m');

        if(cekToken() === false) {
            redirect('auth');
        }
    }

    function index()
    {
       
    }

    function tarik_dana() {
        $data['title'] = 'Users Withdraw';
        $id = $this->session->userdata('login_token');
        $query = $this->dana_m->getDanaWithDraw($id);
        if($query->status_code == '200') {
            $data['data'] = $query->data;
        }
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view('layouts/navbar');
        $this->load->view('tarik_dana', $data);
        $this->load->view('layouts/js');
        $this->load->view('js/dana_js');
        $this->load->view('layouts/footer');
    }

    function withdraw_money() {
        $nominal = $this->input->post('dana_tarikan');
        $nominal = str_replace(".", "", $nominal);
        $id = $this->session->userdata('login_token');
        $query = $this->dana_m->getWithDraw($nominal,$id);
        if($query->status_code == '500') {
            $this->session->set_flashdata('error',$query->messages);
            redirect('dana/tarik_dana');
        } else {
            $this->session->set_flashdata('success',$query->messages);
            redirect('dana/tarik_dana');
        }
    }

    function mutasi_dana() {
        $data['title'] = 'Mutasi Withdraw';
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view('layouts/navbar');
        $this->load->view('mutasi_dana', $data);
        $this->load->view('layouts/js');
        $this->load->view('js/dana_js');
        $this->load->view('layouts/footer');
    }

    function getDanaMutasi() {
        $tgl_permohonan1 = $this->input->post('tgl_permohonan1');
        if($tgl_permohonan1 == '' || $tgl_permohonan1 == null) {
            $tgl_permohonan1 = '';
        } else {
            $tgl_permohonan1 = date('Y-m-d',strtotime($tgl_permohonan1));
        }
        $tgl_permohonan2 = $this->input->post('tgl_permohonan2');
        if($tgl_permohonan2 == '' || $tgl_permohonan2 == null) {
            $tgl_permohonan2 = '';
        } else {
            $tgl_permohonan2 = date('Y-m-d',strtotime($tgl_permohonan2));
        }
        $tgl_pembayaran1 = $this->input->post('tgl_pembayaran1');
        if($tgl_pembayaran1 == '' || $tgl_pembayaran1 == null) {
            $tgl_pembayaran1 = '';
        } else {
            $tgl_pembayaran1 = date('Y-m-d',strtotime($tgl_pembayaran1));
        }
        $tgl_pembayaran2 = $this->input->post('tgl_pembayaran2');
        if($tgl_pembayaran2 == '' || $tgl_pembayaran2 == null) {
            $tgl_pembayaran2 = '';
        } else {
            $tgl_pembayaran2 = date('Y-m-d',strtotime($tgl_pembayaran2));
        }
        $dana_tarikan = $this->input->post('dana_tarikan');
        $dana_tarikan = str_replace(".", "", $dana_tarikan);
        $keterangan = $this->input->post('keterangan');
        $query = $this->dana_m->getMutasiDana($tgl_permohonan1,$tgl_permohonan2,$tgl_pembayaran1,$tgl_pembayaran2,$dana_tarikan,$keterangan);
        $data = array();
        foreach($query->data as $da) {
            array_push($data,array(
                'tgl_permohonan' => date('d/m/Y H:i',$da->tanggal_permohonan),
                'tgl_pembayaran' => date('d/m/Y H:i',$da->tanggal_pembayaran),
                'nominal' => $da->nominal,
                'fee' => $da->fee,
                'status' => $da->status,
                'keterangan' => $da->keterangan
            ));
        }
        $tgl_permohonan = array_column($data, 'tgl_permohonan');
        array_multisort($tgl_permohonan, SORT_DESC, $data);
        echo json_encode($data);
    }
    function getDanaMutasiSettlement() {
        $tgl_permohonan1 = $this->input->post('tgl_permohonan11');
        if($tgl_permohonan1 == '' || $tgl_permohonan1 == null) {
            $tgl_permohonan1 = '';
        } else {
            $tgl_permohonan1 = date('Y-m-d',strtotime($tgl_permohonan1));
        }
        $tgl_permohonan2 = $this->input->post('tgl_permohonan22');
        if($tgl_permohonan2 == '' || $tgl_permohonan2 == null) {
            $tgl_permohonan2 = '';
        } else {
            $tgl_permohonan2 = date('Y-m-d',strtotime($tgl_permohonan2));
        }
        $tgl_pembayaran1 = $this->input->post('tgl_pembayaran33');
        if($tgl_pembayaran1 == '' || $tgl_pembayaran1 == null) {
            $tgl_pembayaran1 = '';
        } else {
            $tgl_pembayaran1 = date('Y-m-d',strtotime($tgl_pembayaran1));
        }

        $tgl_pembayaran2 = $this->input->post('tgl_pembayaran44');
        if($tgl_pembayaran2 == '' || $tgl_pembayaran2 == null) {
            $tgl_pembayaran2 = '';
        } else {
            $tgl_pembayaran2 = date('Y-m-d',strtotime($tgl_pembayaran2));
        }

        $dana_tarikan = $this->input->post('dana_tarikan1');
        $dana_tarikan = str_replace(".", "", $dana_tarikan);
        $query = $this->dana_m->getMutasiDanaSettlement($tgl_permohonan1,$tgl_permohonan2,$tgl_pembayaran1,$tgl_pembayaran2,$dana_tarikan);
        $data = array();
        foreach($query->data as $da) {
            array_push($data,array(
                'periode_transaksi' => date('d/m/Y',strtotime($da->periode_transaksi)),
                'proses_settlement' => date('d/m/Y H:i',strtotime($da->proses_settlement)),
                'nominal' => $da->nominal,
            ));
        }
        
        echo json_encode($data);
    }

    function mutasi_settlement() {
        $data['title'] = 'Mutasi Settlement';
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view('layouts/navbar');
        $this->load->view('mutasi_settlement', $data);
        $this->load->view('layouts/js');
        $this->load->view('js/dana_js');
        $this->load->view('layouts/footer');
    }
}
