<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model', 'auth');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        if ($data['user'] != false) :
            redirect('dashboard');
        else :
            redirect('auth/login');
        endif;
    }

    public function login()
    {
        $d['title'] = 'Login';

        $this->load->view('templates/auth_header', $d);
        $this->load->view('auth/index', $d);
        $this->load->view('templates/auth_footer', $d);
    }

    public function blok()
    {
        $data['title'] = '404 Error Page';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('auth/blok', $data);
        $this->load->view('templates/footer', $data);
    }

    public function proseslogin()
    {
        $this->auth->login();
    }

    public function logout()
    {
        $this->auth->logout();
    }
}
