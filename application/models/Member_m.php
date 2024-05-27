<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Member_m extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    function getNamaToko($nama_toko)
    {
        $url = "https://dashboard.mitrawijaya.com/api/v1/dashboard/member_qris/list_member_qris?nama_toko=$nama_toko";
        $id = $this->session->userdata('login_token');
        $headers = array(
            'Login-Token: ' . "$id" . '',
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_2_0);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');

        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_TCP_KEEPALIVE, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification (not recommended in production)
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Disable SSL hostname verification (not recommended in production)
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);


        $response = curl_exec($ch);
        return json_decode($response);
    }

    function getDetailToko($nama_toko)
    {
        $url = "https://dashboard.mitrawijaya.com/api/v1/dashboard/member_qris/detail_member_qris?nama_toko=$nama_toko";
        $id = $this->session->userdata('login_token');
        $headers = array(
            'Login-Token: ' . "$id" . '',
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_2_0);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');

        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_TCP_KEEPALIVE, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification (not recommended in production)
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Disable SSL hostname verification (not recommended in production)
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);


        $response = curl_exec($ch);
        return json_decode($response);
    }

    function getMutasi($nama_toko,$tgl1,$tgl2,$jumlah,$keterangan,$kredit,$debit,$nmid)
    {
        $url = "https://dashboard.mitrawijaya.com/api/v1/dashboard/member_qris/history_qris?nama_toko=$nama_toko&dari_tanggal=$tgl1&ke_tanggal=$tgl2&jumlah=$jumlah&keterangan=$keterangan&kredit=$kredit&debet=$debit&nmid=$nmid";
        $id = $this->session->userdata('login_token');
        $headers = array(
            'Login-Token: ' . "$id" . '',
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_2_0);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');

        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_TCP_KEEPALIVE, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification (not recommended in production)
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Disable SSL hostname verification (not recommended in production)
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);


        $response = curl_exec($ch);
        return json_decode($response);
    }

    function sendCall($idmutasi) {
        $url = 'https://dashboard.mitrawijaya.com/api/v1/dashboard/member_qris/resend_callback';
        $id = $this->session->userdata('login_token');
        $headers = array(
            'Login-Token: ' . "$id" . '',
        );
        $sendArray = array(
            'id_mutasi' => $idmutasi
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_2_0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $sendArray);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');

        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_TCP_KEEPALIVE, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification (not recommended in production)
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Disable SSL hostname verification (not recommended in production)
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);


        $response = curl_exec($ch);
        return json_decode($response);
    }

    function getKategori($key,$token,$secret) {
        $url = "https://dashboard.mitrawijaya.com/api/v1/qris/Dashboard_qris/getkategoriusaha";
        $id = $this->session->userdata('login_token');
        $headers = array(
            'key: ' . "$key" . '',
            'token: ' . "$token" . '',
            'secret: ' . "$secret" . '',
            'isweb: ' . 1 . '',
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_2_0);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');

        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_TCP_KEEPALIVE, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification (not recommended in production)
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Disable SSL hostname verification (not recommended in production)
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);


        $response = curl_exec($ch);
        return json_decode($response);
    }

    function getProvinsi($key,$token,$secret) {
        $url = "https://dashboard.mitrawijaya.com/api/v1/qris/Dashboard_qris/getprov";
        $id = $this->session->userdata('login_token');
        $headers = array(
            'key: ' . "$key" . '',
            'token: ' . "$token" . '',
            'secret: ' . "$secret" . '',
            'isweb: ' . 1 . '',
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_2_0);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');

        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_TCP_KEEPALIVE, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification (not recommended in production)
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Disable SSL hostname verification (not recommended in production)
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);


        $response = curl_exec($ch);
        return json_decode($response);
    }
    function getUsaha($key,$token,$secret) {
        $url = "https://dashboard.mitrawijaya.com/api/v1/qris/Dashboard_qris/getjenisusaha";
        $id = $this->session->userdata('login_token');
        $headers = array(
            'key: ' . "$key" . '',
            'token: ' . "$token" . '',
            'secret: ' . "$secret" . '',
            'isweb: ' . 1 . '',

        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_2_0);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');

        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_TCP_KEEPALIVE, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification (not recommended in production)
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Disable SSL hostname verification (not recommended in production)
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);


        $response = curl_exec($ch);
        return json_decode($response);
    }
    function getKecamatan($key,$token,$secret,$prov_id) {
        $url = "https://dashboard.mitrawijaya.com/api/v1/qris/Dashboard_qris/getdistricts?city_id=$prov_id";
        $id = $this->session->userdata('login_token');
        $headers = array(
            'key: ' . "$key" . '',
            'token: ' . "$token" . '',
            'secret: ' . "$secret" . '',
            'isweb: ' . 1 . '',

        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_2_0);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');

        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_TCP_KEEPALIVE, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification (not recommended in production)
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Disable SSL hostname verification (not recommended in production)
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);


        $response = curl_exec($ch);
        return json_decode($response);
    }
    function getKota($key,$token,$secret,$prov_id) {
        $url = "https://dashboard.mitrawijaya.com/api/v1/qris/Dashboard_qris/getcities?prov_id=$prov_id";
        $id = $this->session->userdata('login_token');
        $headers = array(
            'key: ' . "$key" . '',
            'token: ' . "$token" . '',
            'secret: ' . "$secret" . '',
            'isweb: ' . 1 . '',

        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_2_0);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');

        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_TCP_KEEPALIVE, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification (not recommended in production)
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Disable SSL hostname verification (not recommended in production)
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);


        $response = curl_exec($ch);
        return json_decode($response);
    }

    function sendMember($lengkap,$us_token,$us_key,$us_secret,$nm_toko,$email,$no_ktp,$no_npwp,$jenis_kelamin,$toko_fisik,$kat_usaha,$jen_usaha,$provinsi,$kota,$kecamatan,$kode_pos,$alamat,$ktp_dir,$ktp_tipe,$ktp_nama_file,$selfie_dir,$selfie_tipe,$selfie_nama_file,$no_wa) {
        $url = 'https://dashboard.mitrawijaya.com/api/v1/qris/Dashboard_qris/pendaftaran_qris';
        $sendArray = array(
            'nama_lengkap' => $lengkap,
            'nama_toko' => $nm_toko,
            'nomor_wa' => $no_wa,
            'email' => $email,
            'nomor_ktp' => $no_ktp,
            'nomor_npwp' => $no_ktp,
            'jenis_kelamin' => $jenis_kelamin,
            'toko_fisik' => $toko_fisik,
            'kategori_usaha' => $kat_usaha,
            'jenis_usaha' => $jen_usaha,
            'prov_id' => $provinsi,
            'city_id' => $kota,
            'dis_id' => $kecamatan,
            'kode_pos' => $kode_pos,
            'alamat' => $alamat,
            'file_selfie' => new CURLFile($selfie_dir,$selfie_tipe,$selfie_nama_file),
            'file_ktp' => new CURLFile($ktp_dir,$ktp_tipe,$ktp_nama_file),
        );
        $id = $this->session->userdata('login_token');
        $headers = array(
            'key: ' . "$us_key" . '',
            'token: ' . "$us_token" . '',
            'secret: ' . "$us_secret" . '',
            'isweb: ' . 1 . '',

        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_2_0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $sendArray);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');

        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_TCP_KEEPALIVE, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification (not recommended in production)
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Disable SSL hostname verification (not recommended in production)
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);


        $response = curl_exec($ch);
        return json_decode($response);
    }
}
