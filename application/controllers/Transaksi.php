<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect('auth');
        }

        $this->load->model('transaksi_m');

        if(cekToken() === false) {
            redirect('auth');
        }
    }

    function index()
    {
        $data['title'] = 'Transaksi';
        $query = $this->transaksi_m->getProduk();
        $data['produk'] = $query->data;
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view('layouts/navbar');
        $this->load->view('transaksi', $data);
        $this->load->view('layouts/js');
        $this->load->view('js/transaksi_js');
        $this->load->view('layouts/footer');
    }

    function getHistory() {
        $produk = $this->input->post('produk');
        $no_id = urlencode($this->input->post('no_id'));
        $tgl1 = $this->input->post('tgl_1');
        $tgl2 = $this->input->post('tgl_2');
        $status = $this->input->post('status');
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
        $query = $this->transaksi_m->getHistory($tgl1,$tgl2,$produk,$no_id,$status);
        echo json_encode($query->data);
    }

    function detail_transaksi() {
        $id = $this->input->post('tr_id');
        $query = $this->transaksi_m->getDetailTransaksi($id);
        echo json_encode($query->data);
    }

    function print_struk($id) {
        $data['title'] = "Cetak Struk";
        $data['tr_id'] = $id;
        $query = $this->transaksi_m->getDetailTransaksi($id);
        $data['data'] = $query->data;
        $this->load->view('print_page', $data);
    }
}
