<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Transaksi_m extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function getProduk()
    {
        $id = $this->session->userdata('login_token');
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

    function getHistory($tgl1,$tgl2,$produk,$no_id,$status) {
        $url = "https://dashboard.mitrawijaya.com/api/v1/dashboard/transaksi/get_history_trx?dari_tanggal=$tgl1&ke_tanggal=$tgl2&no_hp=$no_id&id_plgn=&op_produk=$produk&status=$status";
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


    function getDetailTransaksi($id) {
        $url = "https://dashboard.mitrawijaya.com/api/v1/dashboard/transaksi/get_history_trx_detail?tr_id=$id";
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
}
