<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Dana_customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect('auth');
        }

        $this->load->model('dana_customer_m');
        $this->load->model('integrasi_m');
        $this->load->model('member_m');

        if(cekToken() === false) {
            redirect('auth');
        }
    }

    function index()
    {
        $id = $this->session->userdata('login_token');
        $dataRegis = $this->dana_customer_m->getRegis($id);
        $regis = $dataRegis->data;
        if(!empty($regis) || $regis != null) {
            redirect('dana_customer/after_regis');
        } else {
            $data['title'] = 'Dana Customer';
            $query = $this->integrasi_m->getCredential($id);
            $dat = $query->data;
            $data['token'] = $dat->us_token;
            $data['key'] = $dat->us_key;
            $data['secret'] = $dat->us_secret;
            $query3 = $this->dana_customer_m->getProvinsi($id);
            $data['provinsi'] = $query3->data;
            $this->load->view('layouts/head', $data);
            $this->load->view('layouts/sidebar');
            $this->load->view('layouts/navbar');
            $this->load->view('dana_customer', $data);
            $this->load->view('layouts/js');
            $this->load->view('js/dana_customer_js');
            $this->load->view('layouts/footer');
        }
    }

    function regis_data() {
        $id = $this->session->userdata('login_token');
        $token = $this->input->post('token');
        $key = $this->input->post('key');
        $secret = $this->input->post('secret');
        $nama_depan = $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');
        $nama_merchant = $this->input->post('nama_merchant');
        $jen_usaha = $this->input->post('jen_usaha');
        $deskripsi_merchant = $this->input->post('deskripsi_merchant');
        $logo = $this->input->post('logo');
        $PC_LOGO = $this->input->post('PC_LOGO',false);
        $provinsi = $this->input->post('provinsi');
        $kota = $this->input->post('kota');
        $kecamatan = $this->input->post('kecamatan');
        $alamat1 = $this->input->post('alamat1');
        $alamat2 = $this->input->post('alamat2');
        $kode_pos = $this->input->post('kode_pos');
        $no_telpon = $this->input->post('no_telpon');
        $no_ktp = $this->input->post('no_ktp');
        $foto_ktp = $this->input->post('foto_ktp');
        $docFile = $this->input->post('docFile',false);

        // VALIDASI DOKUMEN
        $this->load->library('upload');
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'png';
        $config['max_size']  = '2048';
        $config['overwrite'] = true;
        $this->upload->initialize($config);
        // VALIDASI DOKUMEN

        if ($this->upload->do_upload('logo')) {
            $file = $this->upload->do_upload('logo');
            $filename = $this->upload->data('file_name');
            $file_path = $this->upload->data('full_path');
            $size = $_FILES['logo']['size'];
            $type = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION); // Ambil ekstensi filenya apa
            $file_contents =  file_get_contents($file_path);
            $blob = 'data:image/png;base64, '.base64_encode($file_contents);
        } else {
            $file = null;
            $filename = null;
            $size = null;
            $type = null; // Ambil ekstensi filenya apa
            $file_path = null;
            $blob = null;
        }

        if ($this->upload->do_upload('foto_ktp')) {
            $file1 = $this->upload->do_upload('foto_ktp');
            $filename1 = $this->upload->data('file_name');
            $file_path1 = $this->upload->data('full_path');
            $size1 = $_FILES['foto_ktp']['size'];
            $type1 = pathinfo($_FILES['foto_ktp']['name'], PATHINFO_EXTENSION); // Ambil ekstensi filenya apa
            $file_contents1 =  file_get_contents($file_path1);
            $blob1 = 'data:image/png;base64, '. base64_encode($file_contents1);
        } else {
            $file1 = null;
            $filename1 = null;
            $size1 = null;
            $type1 = null; // Ambil ekstensi filenya apa
            $file_path1 = null;
            $blob1 = null;
        }

        if($filename != null) {
            if($type != 'png') {
                $this->session->set_flashdata('error','File Logo Tidak Berektension .png');
                unlink("./upload/$filename"); // HAPUS FILE DI FOLDER EXCEL
                unlink("./upload/$filename1"); // HAPUS FILE DI FOLDER EXCEL
                redirect('dana_customer');
            } else if($size > 2097152) {
                $this->session->set_flashdata('error','File Logo Lebih Besar Dari 2 MB');
                unlink("./upload/$filename"); // HAPUS FILE DI FOLDER EXCEL
                unlink("./upload/$filename1"); // HAPUS FILE DI FOLDER EXCEL
                redirect('dana_customer');
            }
        } else if($filename1 != null) {
            if($type != 'png') {
                $this->session->set_flashdata('error','File KTP Tidak Berektension .png');
                unlink("./upload/$filename"); // HAPUS FILE DI FOLDER EXCEL
                unlink("./upload/$filename1"); // HAPUS FILE DI FOLDER EXCEL
                redirect('dana_customer');
            } else if($size > 2097152) {
                $this->session->set_flashdata('error','File KTP Lebih Besar Dari 2 MB');
                unlink("./upload/$filename"); // HAPUS FILE DI FOLDER EXCEL
                unlink("./upload/$filename1"); // HAPUS FILE DI FOLDER EXCEL
                redirect('dana_customer');
            }
        }

        $data = array(
            'divisionName' => $nama_merchant,
            'province' => $provinsi,
            'city' => $kota,
            'area' => $kecamatan,
            'address1' => $alamat1,
            'address2' => $alamat2,
            'postcode' => $kode_pos,
            'divisionDescription' => $deskripsi_merchant,
            'PC_LOGO' => $PC_LOGO,
            'mccCodes' => $jen_usaha,
            'docId' => $no_ktp,
            'docFile' => $docFile,
            'firstName' => $nama_depan,
            'lastName' => $nama_belakang,
            'mobileNo' => $no_telpon
        );
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        $query = $this->dana_customer_m->sendRegis($data,$id);

        if($query->status_code == '500') {
            $this->session->set_flashdata('error',$query->messages);
            unlink("./upload/$filename"); // HAPUS FILE DI FOLDER EXCEL
            unlink("./upload/$filename1"); // HAPUS FILE DI FOLDER EXCEL
            redirect('dana_customer/after_regis');
        } else {
            $this->session->set_flashdata('success','Register Dana Berhasil');
            unlink("./upload/$filename"); // HAPUS FILE DI FOLDER EXCEL
            unlink("./upload/$filename1"); // HAPUS FILE DI FOLDER EXCEL
            redirect('dana_customer/after_regis');
        }
    }

    function after_regis() {
        $data['title'] = 'Dana Customer';
        $id = $this->session->userdata('login_token');
        $dataRegis = $this->dana_customer_m->getRegis($id);
        $regis = $dataRegis->data;
        $queryProvinsi = $this->dana_customer_m->getProvinsi($id);
        $queryKota = $this->dana_customer_m->getKota(urlencode($regis->province),$id);
        $queryKecamatan = $this->dana_customer_m->getKecamatan(urlencode($regis->city),$id);
        $queryKodePOS = $this->dana_customer_m->getKodePOS(urlencode($regis->city),$id);
        $data['data'] = $regis;
        $data['provinsi'] = $queryProvinsi->data;
        $data['kecamatan'] = $queryKecamatan->data;
        $data['kota'] = $queryKota->data;
        $data['kodepos'] = $queryKodePOS->data;
           
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view('layouts/navbar');
        $this->load->view('dana_customer_after', $data);
        $this->load->view('layouts/js');
        $this->load->view('js/dana_customer_js');
        $this->load->view('layouts/footer');
    }

    function getCity() {
        $id = $this->session->userdata('login_token');
        $prov_id = urlencode($this->input->post('prov_id'));
        $query1 = $this->dana_customer_m->getKota($prov_id,$id);
        $queryKota = $query1->data;
        echo json_encode($queryKota);
    }

    function getDist() {
        $id = $this->session->userdata('login_token');
        $prov_id = urlencode($this->input->post('city_id'));
        $query1 = $this->dana_customer_m->getKecamatan($prov_id,$id);
        $queryKota = $query1->data;
        echo json_encode($queryKota);
    }

    function getKodePOS() {
        $id = $this->session->userdata('login_token');
        $prov_id = urlencode($this->input->post('city_id'));
        $query1 = $this->dana_customer_m->getKodePOS($prov_id,$id);
        $queryKota = $query1->data;
        echo json_encode($queryKota);
    }

    function getProduk() {
        $id = $this->session->userdata('login_token');
        $gas = $this->dana_customer_m->getProduk($id);
        $produk = $gas->data;
        echo json_encode($produk);
    }
}
