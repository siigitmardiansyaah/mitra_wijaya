<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Mutasi_m extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function getMutasiSaldo($tgl_1,$tgl_2)
    {
        $id = $this->session->userdata('login_token');
        $url = "https://dashboard.mitrawijaya.com/api/v1/dashboard/user/history_balance?dari_tanggal=$tgl_1&ke_tanggal=$tgl_2";
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
