<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Harga_m extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function getProduk($id)
    {
        $url = 'https://dashboard.mitrawijaya.com/api/v1/dashboard/pricelist/get_product';
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

    function getHargaProduk($produk,$keterangan,$kode)
    {
        $id = $this->session->userdata('login_token');
        $url = "https://dashboard.mitrawijaya.com/api/v1/dashboard/pricelist/get_json?keterangan=$keterangan&op_produk=$produk&kode=$kode";
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

    function sendLink($produk,$link_id)
    {
        $url = "https://dashboard.mitrawijaya.com/api/v1/dashboard/pricelist/get_json?keterangan=&op_produk=$produk&kode=";
        $headers = array(
            'Link-Id: ' . "$link_id" . '',
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

    function getKategori() {
        $url = 'https://dashboard.mitrawijaya.com/api/v1/dashboard/pricelist/list_kategori';
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

    function getProdukbyKategori($id) {
        $id1 = $this->session->userdata('login_token');
        $url = "https://dashboard.mitrawijaya.com/api/v1/dashboard/pricelist/list_produk?op_produk=$id";
        $headers = array(
            'Login-Token: ' . "$id1" . '',
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

    function getHargaJual($id) {
        $id1 = $this->session->userdata('login_token');
        $url = "https://dashboard.mitrawijaya.com/api/v1/dashboard/pricelist/list_voucher?op_id=$id";
        $headers = array(
            'Login-Token: ' . "$id1" . '',
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

    function updateHarga($produk,$harga) {
        $id = $this->session->userdata('login_token');
        $url = 'https://dashboard.mitrawijaya.com/api/v1/dashboard/pricelist/set_harga_jual';
        $headers = array(
            'Login-Token: ' . "$id" . '',
        );
        $sendArray = array(
            'vo_kode' => $produk,
            'harga_jual' => $harga
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

    function saveLink($link1,$link2) {
        $id = $this->session->userdata('login_token');
        $url = 'https://dashboard.mitrawijaya.com/api/v1/dashboard/user/set_generate_link';
        $headers = array(
            'Login-Token: ' . "$id" . '',
        );
        $sendArray = array(
            'link_1' => $link1,
            'link_2' => $link2
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
