<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

function cekToken()
{
    $CI = get_instance();
    $CI->load->model('auth_m');

    $exp = date('d/m/Y H:i',strtotime($CI->session->userdata('expire_date')));
    $current_time = date('d/m/Y H:i');
    // $exp_time = DateTime::createFromFormat('d/m/Y H:i', $exp);
    // $current_time = DateTime::createFromFormat('d/m/Y H:i', $current_time);
    if($current_time < $exp) {
        $query = $CI->auth_m->getRefresh();
        if ($query->status_code == '500') {
            $CI->session->sess_destroy();
            return false;
        } else {
            $array_items = array('is_login', 'login_token', 'login_access', 'expire','expire_date','nama','email');
            $CI->session->unset_userdata($array_items);
            // CREATE NEW SESSION
            $data = $query->data;
            // GET DATA USER
            $session = array(
                'is_login' => TRUE,
                'login_token' => $data->login_token,
                'login_access' => $data->login_access,
                'expire' => $data->expire,
                'expire_date' => $data->expire_date,
                'nama' => $data->name,
                'email' => $data->email,
            );
            $CI->session->set_userdata($session);
            return true;
        }
    } else {
        $CI->session->sess_destroy();
        $CI->session->set_flashdata('error','Token Sudah Expired, Silahkan Login Kembali');
        return false;
    }
}

function generate_random_string($length = 20) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $random_string = '';

    for ($i = 0; $i < $length; $i++) {
        $random_string .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $random_string;
}

if (!function_exists('rupiah_format')) {
    function rupiah_format($angka)
    {
        $rupiah = number_format($angka, 0, ',', '.');
        return 'Rp ' . $rupiah;
    }
}

if (!function_exists('terbilang')) {
    function terbilang($angka, $rupiah = true) {
        // Array untuk menuliskan angka dalam bahasa Indonesia
        $angka_huruf = array(
            1 => 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima',
            'Enam', 'Tujuh', 'Delapan', 'Sembilan', 'Sepuluh',
            'Sebelas', 'Dua Belas', 'Tiga Belas', 'Empat Belas', 'Lima Belas',
            'Enam Belas', 'Tujuh Belas', 'Delapan Belas', 'Sembilan Belas'
        );

        $hasil = '';

        if ($angka < 20) {
            $hasil = $angka_huruf[$angka];
        } elseif ($angka < 100) {
            $hasil = $angka_huruf[floor($angka / 10)] . ' Puluh ' . ($angka % 10 != 0 ? ' ' . terbilang($angka % 10, false) : '');
        } elseif ($angka < 200) {
            $hasil = ' Seratus ' . terbilang($angka - 100, false);
        } elseif ($angka < 1000) {
            $hasil = $angka_huruf[floor($angka / 100)] . ' Ratus ' . ($angka % 100 != 0 ? ' ' . terbilang($angka % 100, false) : '');
        } elseif ($angka < 2000) {
            $hasil = ' Seribu ' . terbilang($angka - 1000, false);
        } elseif ($angka < 1000000) {
            $hasil = terbilang(floor($angka / 1000), false) . ' Ribu ' . ($angka % 1000 != 0 ? ' ' . terbilang($angka % 1000, false) : '');
        } elseif ($angka < 1000000000) {
            $hasil = terbilang(floor($angka / 1000000), false) . ' Juta ' . ($angka % 1000000 != 0 ? ' ' . terbilang($angka % 1000000, false) : '');
        } elseif ($angka < 1000000000000) {
            $hasil = terbilang(floor($angka / 1000000000), false) . ' Miliar ' . ($angka % 1000000000 != 0 ? ' ' . terbilang($angka % 1000000000, false) : '');
        } elseif ($angka < 1000000000000000) {
            $hasil = terbilang(floor($angka / 1000000000000), false) . ' Triliun ' . ($angka % 1000000000000 != 0 ? ' ' . terbilang($angka % 1000000000000, false) : '');
        }

        if ($rupiah) {
            $hasil =  $hasil .' Rupiah';
        }
        
        return $hasil;
    }
}
