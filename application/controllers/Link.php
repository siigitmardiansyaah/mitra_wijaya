<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Link extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('harga_m');
    }
    
     function list_harga() {
        $data['title'] = 'List Harga';
        $data['id'] = $this->input->get('id');
        $data['produk'] = $this->input->get('produk');
        $this->load->view('list_harga', $data);
     }

     function link_generate() {
        $id = $this->input->post('id');
        $produk = $this->input->post('produk');
        $produk = implode(',',$produk);
        $query = $this->harga_m->sendLink($produk,$id);
        echo json_encode($query->data);
    }

    function json_harga() {
        header('Content-Type: application/json');
        $data['title'] = 'Json Harga';
        $id = $this->input->get('id');
        $produk = $this->input->get('produk');
        $query = $this->harga_m->sendLink($produk,$id);
        echo json_encode($query->data);
     }
}
