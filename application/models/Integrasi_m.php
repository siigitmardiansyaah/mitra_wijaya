<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Integrasi_m extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function getCredential($id)
    {
        $url = 'https://dashboard.mitrawijaya.com/api/v1/dashboard/integrasi/get_integrasi_qris';
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

    function sendCredential() {
        $url = 'https://dashboard.mitrawijaya.com/api/v1/dashboard/integrasi/set_integrasi_qris_cred';
        $id = $this->session->userdata('login_token');
        $headers = array(
            'Login-Token: ' . "$id" . '',
        );
        // $sendArray = array(
        //     'update_credential' => $update_credential
        // );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_2_0);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $sendArray);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');

        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_TCP_KEEPALIVE, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification (not recommended in production)
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Disable SSL hostname verification (not recommended in production)
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);


        $response = curl_exec($ch);
        return json_decode($response);
    }
    function sendCredential1($ip_address,$url_callback) {
        $url = 'https://dashboard.mitrawijaya.com/api/v1/dashboard/integrasi/set_integrasi_qris_allow';
        $id = $this->session->userdata('login_token');
        $headers = array(
            'Login-Token: ' . "$id" . '',
        );
        $sendArray = array(
            'us_url_callback' => $url_callback,
            'h2h_allow_ip' => $ip_address,
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

    function getCallback($id)
    {
        $url = 'https://dashboard.mitrawijaya.com/api/v1/dashboard/setting/get_callback';
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

    function updateCallback($update_credential) {
        $url = 'https://dashboard.mitrawijaya.com/api/v1/dashboard/setting/set_callback';
        $id = $this->session->userdata('login_token');
        $headers = array(
            'Login-Token: ' . "$id" . '',
        );
        $sendArray = array(
            'url_callback' => $update_credential
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

    function getIP($id)
    {
        $url = 'https://dashboard.mitrawijaya.com/api/v1/dashboard/integrasi/get_transaksi_ip';
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

    function updateIP($sendArray) {
        $url = 'https://dashboard.mitrawijaya.com/api/v1/dashboard/integrasi/set_transaksi_ip';
        $id = $this->session->userdata('login_token');
        $headers = array(
            'Login-Token: ' . "$id" . '',
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

    function sendOTP() {
        $url = 'https://dashboard.mitrawijaya.com/api/v1/dashboard/user/send_otp';
        $id = $this->session->userdata('login_token');
        $headers = array(
            'Login-Token: ' . "$id" . '',
        );
        // $sendArray = array(
        //     'update_credential' => $update_credential
        // );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_2_0);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $sendArray);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');

        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_TCP_KEEPALIVE, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification (not recommended in production)
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Disable SSL hostname verification (not recommended in production)
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);


        $response = curl_exec($ch);
        return json_decode($response);
    }

    function VerifOTP($otp){
        $url = 'https://dashboard.mitrawijaya.com/api/v1/dashboard/user/verifikasi_otp';
        $id = $this->session->userdata('login_token');
        $headers = array(
            'Login-Token: ' . "$id" . '',
        );
        $sendArray = array(
            'otp' => $otp
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
