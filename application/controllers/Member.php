<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect('auth');
        }

        $this->load->model('member_m');
        $this->load->model('integrasi_m');

        if(cekToken() === false) {
            redirect('auth');
        }
    }

    function index()
    {
        
    }

    function list_member() {
        $data['title'] = 'List Member';
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view('layouts/navbar');
        $this->load->view('list_member', $data);
        $this->load->view('layouts/js');
        $this->load->view('js/member_js');
        $this->load->view('layouts/footer');
        // echo $this->session->userdata('login_token');
    }

    function getMember() {
        $nama_toko = urlencode($this->input->post('nama_toko'));
        $query = $this->member_m->getNamaToko($nama_toko);
        echo json_encode($query->data);
    }

    function detail_member($nama_toko) {
        $data['title'] = "Detail Member Toko $nama_toko";
        $data['nama_toko'] = $nama_toko;
        $query = $this->member_m->getDetailToko($nama_toko);
        $data['data'] = $query->data;
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view('layouts/navbar');
        $this->load->view('detail_member', $data);
        $this->load->view('layouts/js');
        $this->load->view('layouts/footer');
    }

    function mutasi_member() {
        $data['title'] = 'Mutasi Member';
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view('layouts/navbar');
        $this->load->view('mutasi_member', $data);
        $this->load->view('layouts/js');
        $this->load->view('js/member_js');
        $this->load->view('layouts/footer');
    }

    function getMutasiMember() {
        $nama_toko = urlencode($this->input->post('nama_toko'));
        $tgl1 = $this->input->post('tgl1');
        if($tgl1 == '' || $tgl1 == null) {
            $tgl1 = '';
        } else {
            $tgl1 = date('Y-m-d',strtotime($tgl1));
        }
        $tgl2 = $this->input->post('tgl2');
        if($tgl2 == '' || $tgl2 == null) {
            $tgl2 = '';
        } else {
            $tgl2 = date('Y-m-d',strtotime($tgl2));
        }
        $jumlah = $this->input->post('jumlah');
        $jumlah = str_replace(".", "", $jumlah);
        $keterangan = urlencode($this->input->post('keterangan'));
        $kredit = $this->input->post('kredit');
        $kredit = str_replace(".", "", $kredit);
        $debit = $this->input->post('debit');
        $debit = str_replace(".", "", $debit);
        $nmid = urlencode($this->input->post('nmid'));
        $query = $this->member_m->getMutasi($nama_toko,$tgl1,$tgl2,$jumlah,$keterangan,$kredit,$debit,$nmid);
        echo json_encode($query->data);
    }

    function resendCallback() {
        $idmutasi = $this->input->post('idmutasi');
        $query = $this->member_m->sendCall($idmutasi);
        echo json_encode($query->status_code);
    }

    function getCity() {
        $id = $this->session->userdata('login_token');
        $query = $this->integrasi_m->getCredential($id);
        $dat = $query->data;
        $prov_id = $this->input->post('prov_id');
        $query1 = $this->member_m->getKota($dat->us_key,$dat->us_token,$dat->us_secret,$prov_id);
        echo json_encode($query1);
    }

    function getDist() {
        $id = $this->session->userdata('login_token');
        $query = $this->integrasi_m->getCredential($id);
        $dat = $query->data;
        $prov_id = $this->input->post('city_id');
        $query1 = $this->member_m->getKecamatan($dat->us_key,$dat->us_token,$dat->us_secret,$prov_id);
        echo json_encode($query1);
    }

    function tambah_qris() {
        $data['title'] = 'Tambah Member';
        $id = $this->session->userdata('login_token');
        $query = $this->integrasi_m->getCredential($id);
        $dat = $query->data;
        $data['token'] = $dat->us_token;
        $data['key'] = $dat->us_key;
        $data['secret'] = $dat->us_secret;
        $query1 = $this->member_m->getKategori($dat->us_key,$dat->us_token,$dat->us_secret);
        $query2 = $this->member_m->getUsaha($dat->us_key,$dat->us_token,$dat->us_secret);
        $query3 = $this->member_m->getProvinsi($dat->us_key,$dat->us_token,$dat->us_secret);
        // $query4 = $this->member_m->getKota($dat->us_key,$dat->us_token,$dat->us_secret);
        // $query5 = $this->member_m->getKecamatan($dat->us_key,$dat->us_token,$dat->us_secret);
        $data['kategori'] = $query1;
        $data['usaha'] = $query2;
        $data['provinsi'] = $query3;
        // $data['kota'] = $query4;
        // $data['kecamatan'] = $query5;
        $this->load->view('layouts/head', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view('layouts/navbar');
        $this->load->view('daftar_member', $data);
        $this->load->view('layouts/js');
        $this->load->view('js/member_js');
        $this->load->view('layouts/footer');
    }

    function regis_member() {
        $id = $this->session->userdata('login_token');
        $query = $this->integrasi_m->getCredential($id);
        $dat = $query->data;
        $lengkap = $this->input->post('nm_lengkap');
        $us_token = $dat->us_token;
        $us_key =  $dat->us_key;
        $us_secret = $dat->us_secret;
        $nm_toko = $this->input->post('nm_toko');
        $email = $this->input->post('email');
        $no_ktp = $this->input->post('no_ktp');
        $no_wa = $this->input->post('no_wa');
        $no_npwp = $this->input->post('no_npwp');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $toko_fisik = $this->input->post('toko_fisik');
        $kat_usaha = $this->input->post('kat_usaha');
        $jen_usaha = $this->input->post('jen_usaha');
        $provinsi = $this->input->post('provinsi');
        $kota = $this->input->post('kota');
        $kecamatan = $this->input->post('kecamatan');
        $alamat = $this->input->post('alamat');
        $kode_pos = $this->input->post('kode_pos');
        $foto_ktp = $this->input->post('foto_ktp');
        $foto_selfie = $this->input->post('foto_selfie');

        $ktp_dir = '';
        $ktp_tipe = '';
        $ktp_nama_file = '';

        $selfie_dir = '';
        $selfie_tipe = '';
        $selfie_nama_file = '';

        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto_ktp'))
        {
            
                $this->session->set_flashdata('error',$this->upload->display_errors());
                redirect('member/tambah_qris');
        }
        else
        {
            $ktp_dir = $this->upload->data('full_path');
            $ktp_tipe = $this->upload->data('file_type');
            $ktp_nama_file = $this->upload->data('file_name');
        }

        if (!$this->upload->do_upload('foto_selfie'))
        {
            
                $this->session->set_flashdata('error',$this->upload->display_errors());
                redirect('member/tambah_qris');
        }
        else
        {
            $selfie_dir = $this->upload->data('full_path');
            $selfie_tipe = $this->upload->data('file_type');
            $selfie_nama_file = $this->upload->data('file_name');
        }
        

        $query1 = $this->member_m->sendMember($lengkap,$us_token,$us_key,$us_secret,$nm_toko,$email,$no_ktp,$no_npwp,$jenis_kelamin,$toko_fisik,$kat_usaha,$jen_usaha,$provinsi,$kota,$kecamatan,$kode_pos,$alamat,$ktp_dir,$ktp_tipe,$ktp_nama_file,$selfie_dir,$selfie_tipe,$selfie_nama_file,$no_wa);
        if($query1->status_code == '200') {
            $this->session->set_flashdata('success',$query1->messages);
            redirect('member/tambah_qris');
            unlink("upload/$selfie_nama_file");
            unlink("upload/$ktp_nama_file");
        }  else {
            $this->session->set_flashdata('error',$query1->messages);
            redirect('member/tambah_qris');
            unlink("upload/$selfie_nama_file");
            unlink("upload/$ktp_nama_file");
        }

    }
}
