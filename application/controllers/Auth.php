<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_m');
        
    }

    function index()
    { 
            
        if ($this->session->userdata('email') != null) {
            $array_items = array('email', 'password');
            $this->session->unset_userdata($array_items);
        }
        if ($this->session->userdata('is_login')) {
            // if(!cekToken()) {
            //     redirect('auth');
            // }
            redirect('dashboard');
        }
        $data['title'] = 'Login';
        $data['recaptcha_widget'] = $this->recaptcha->getWidget();
        $data['recaptcha_script'] = $this->recaptcha->getScriptTag();
        $this->load->view('login', $data);
    }

    function proses_login()
    {
        // VARIABEL
        $email = str_replace("'", "", htmlspecialchars($this->security->xss_clean($this->input->post('email')), ENT_QUOTES));
        $password = str_replace("'", "", htmlspecialchars($this->security->xss_clean($this->input->post('password')), ENT_QUOTES));
        $word_capts = str_replace("'", "", htmlspecialchars($this->security->xss_clean($this->input->post('g-recaptcha-response')), ENT_QUOTES));
        $otp = null;
        $response = $this->recaptcha->verifyResponse($word_capts);
        if(isset($response['success']) || $response['success'] == true) { 
             $getOTP = $this->auth_m->getOTP($email, $password, $otp);
            if ($getOTP->status_code == '500') {
                $data = $getOTP->data;
                if(empty($data)) {
                    $this->session->set_flashdata('error', $getOTP->messages);
                    redirect('auth');
                } else {
                    $this->session->set_flashdata('error', $getOTP->messages);
                    redirect('auth/regis_password');
                }
            } else {
                // SESSION PARAMETER
                $session = array(
                    'email' => $email,
                    'password' => $password,
                );
                $this->session->set_userdata($session);
                // SESSION PARAMETER
                $this->session->set_flashdata('success', $getOTP->messages);
                redirect('auth/otp');
            }
            // get OTP
        } else {
            $this->session->set_flashdata('error', 'CAPTCHA yang anda masukkan salah');
            redirect('auth');
        }

        // VARIABEL

        //get OTP
       
    }

    function otp() {
        $data['title'] = 'OTP Page';
        $this->load->view('otp_page', $data);
    }

    function resend_otp() {
        $email = $this->session->userdata('email');
        $password = $this->session->userdata('password');
        $otp = null;
        $getOTP = $this->auth_m->getOTP($email, $password, $otp);
        if ($getOTP->status_code == '500') {
            echo json_encode($getOTP->messages);
        } else {
            echo json_encode($getOTP->messages);
        }
    }

    function proses_otp() {
        $email = $this->session->userdata('email');
        $password = $this->session->userdata('password');
        $otp = $this->input->post('otp');

        $getOTP = $this->auth_m->getOTP($email,$password,$otp);
        if($getOTP->status_code == '500') {
            if($getOTP->messages == 'OTP salah') {
                $this->session->set_flashdata('error',$getOTP->messages);
                redirect('auth/otp');
            }else{
                $this->session->set_flashdata('error',$getOTP->messages);
                redirect('auth');
            }     
        } else {
            // SESSION PARAMETER
            // HAPUS SESSSION EMAIL DAN PASSWORD
            if($this->session->userdata('email') != null ) {
                $array_items = array('email', 'password');
                $this->session->unset_userdata($array_items);
            }
            // HAPUS SESSSION EMAIL DAN PASSWORD

            // GET DATA USER
            $data = $getOTP->data;
            $session = array(
				'is_login' => TRUE,
                'login_token' => $data->login_token,
                'login_access' => $data->login_access,
                'expire' => $data->expire,
                'expire_date' => $data->expire_date,
                'nama' => $data->name,
                'email' => $data->email,
            );
            $this->session->set_userdata($session);
            // CREATE NEW SESSION    
            
            redirect('dashboard');

        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }

    function forgot_password() {
        $data['title'] = 'Reset Password';
        $this->load->view('forget', $data);
    }

    function send_link() {
        $us_email = $this->input->post('email');
        $link_reset = base_url().'auth/reset_password';
        $kode_reset = generate_random_string();
        $query = $this->auth_m->sendReset($us_email,$link_reset,$kode_reset);
        if($query->status_code == '500') {
            $this->session->set_flashdata('error',$query->messages);
            redirect('auth/forgot_password');
        }else{
            $this->session->set_flashdata('success',$query->messages);
            redirect('auth');
        }
    }

    function reset_password($kode) {
        $data['kode'] = $kode;
        $data['title'] = 'Reset Password';
        $this->load->view('reset', $data);
    }

    function proses_reset() {
        $kode = $this->input->post('kode');
        $email = $this->input->post('email');
        $pass = $this->input->post('password');
        $pass2 = $this->input->post('confirm-password');
        $query = $this->auth_m->resetPassword($kode,$email,$pass,$pass2);
        if($query->status_code == '500') {
            $this->session->set_flashdata('error',$query->messages);
            redirect("auth/reset_password/$kode");
        } else {
            $this->session->set_flashdata('success',$query->messages);
            redirect("auth");
        }
    }

    function regis_password() {
        $data['title'] = 'Regis Password';
        $this->load->view('new_password', $data);
    }

    function send_link_regis() {
        $us_email = $this->input->post('email');
        $query = $this->auth_m->sendRegis($us_email);
        if($query->status_code == '500') {
            $this->session->set_flashdata('error',$query->messages);
            redirect('auth/regis_password');
        }else{
            $this->session->set_flashdata('success',$query->messages);
            redirect('auth/register_password');
        }
    }

    function register_password() {
        $data['title'] = 'Regis Password';
        $this->load->view('register_password', $data);
    }

    function registerPassword() {
        $kode_reset = $this->input->post('kode_reset');
        $email = $this->input->post('email');
        $pass = $this->input->post('password');
        $pass2 = $this->input->post('confirm-password');
        $query = $this->auth_m->registerPassword($kode_reset,$email,$pass,$pass2);
        if($query->status_code == '500') {
            $this->session->set_flashdata('error',$query->messages);
            redirect("auth/register_password");
        } else {
            $this->session->set_flashdata('success',$query->messages);
            redirect("auth");
        }
    }
    
    function create_captcha() {
        $vals = array(
            // 'word'          => '',
            'img_path' => './captcha/',
            'img_url' => base_url().'/captcha/',
            // 'font_path'     => './path/to/fonts/texb.ttf',
            'img_width'     => '250',
            'img_height'    => '100',
            'expiration'    => 7200,
            'word_length'   => 5,
            'font_size'     => 30,
            'img_id'        => 'Imageid',
            'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            'filename' => 'my_captcha',
            // White background and border, black text and red grid
                    'colors'        => array(
                    'background' => array(255, 255, 255),
                    'border' => array(255, 255, 255),
                    'text' => array(0, 0, 0),
                    'grid' => array(255, 40, 40)
            )
    );
    
        $captcha = create_captcha($vals);
        $image = $captcha['image'];
    
        $session = array(
				'filename' => $captcha['filename'],
                'kata_caps' => $captcha['word'],
            );
        $this->session->set_userdata($session);
        return $image;
    }
}
