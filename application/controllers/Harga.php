<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Harga extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect('auth');
        }

        $this->load->model('harga_m');

        if(cekToken() === false) {
            redirect('auth');
        }
    }

    function index()
    {
       
    }

    function daftar_harga() {
        $data['title'] = 'Daftar Harga';
        $id = $this->session->userdata('login_token');
        $query = $this->harga_m->getProduk($id);
        if($query->status_code == '200') {
            $data['data'] = $query->data;
        }
        $data['data1'] = $query->data;
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view('layouts/navbar');
        $this->load->view('daftar_harga', $data);
        $this->load->view('layouts/js');
        $this->load->view('js/harga_js');
        $this->load->view('layouts/footer');
    }

    function getHargaProduk() {
        $produk = $this->input->post('produk'); 
        $keterangan = urlencode($this->input->post('keterangan'));
        $kode = urlencode($this->input->post('kode'));
        $query = $this->harga_m->getHargaProduk($produk,$keterangan,$kode);
        $data = $query->data;
        echo json_encode($data);
    }

    function generate_link() {
        $data['title'] = 'Generate';
        $id = $this->session->userdata('login_token');
        $query = $this->harga_m->getProduk($id);
        $query1 = $this->auth_m->getUser($id);
        if($query->status_code == '200') {
            $data['data'] = $query->data;
        }
        $data1 = $query1->data;
        $data['link_id'] = $data1->h2h_link_id;
        $data['link_1'] = $data1->generate_link_1;
        $data['link_2'] = $data1->generate_link_2;
        // print_r($data1);
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view('layouts/navbar');
        $this->load->view('generate', $data);
        $this->load->view('layouts/js');
        $this->load->view('js/harga_js',$data);
        $this->load->view('layouts/footer');
    }

    function link_generate() {
        $id = $this->session->userdata('login_token');
        $produk = $this->input->post('produk');
        $produk = implode(',',$produk);
        $query1 = $this->auth_m->getUser($id);
        $data1 = $query1->data;
        $link_id = $data1->h2h_link_id;
        $link1 = base_url().'link/list_harga?id='.$link_id.'&produk='.$produk;
        $link2 = base_url().'link/json_harga?id='.$link_id.'&produk='.$produk;
        $query = $this->harga_m->sendLink($produk,$link_id);
        $query1 = $this->harga_m->saveLink($link1,$link2);
        echo json_encode($query);
    }

    function harga_jual() {
        $data['title'] = 'Harga Jual';
        $query = $this->harga_m->getKategori();
        $data['produk'] = $query->data;
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view('layouts/navbar');
        $this->load->view('harga_jual', $data);
        $this->load->view('layouts/js');
        $this->load->view('js/harga_js');
        $this->load->view('layouts/footer');
    }

    function getProdukbyKategori() {
        $id = $this->input->post('op_produk');
        $query = $this->harga_m->getProdukbyKategori($id);
        echo json_encode($query->data);
    }

    function getHargaJual() {
        $produk = $this->input->post('produk'); 
        $query = $this->harga_m->getHargaJual($produk);
        $data = $query->data;
        echo json_encode($data);
    }

    function updateHarga() {
        $produk = $this->input->post('kode'); 
        $harga = $this->input->post('harga');
        $harga = str_replace(".", "", $harga);
        $query = $this->harga_m->updateHarga($produk,$harga);
        $data = $query;
        echo json_encode($data);
    }
}
