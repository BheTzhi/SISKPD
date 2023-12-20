<?php

class Uraian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        blok_login();

        $this->load->model('Uraian_model', 'uraian');
    }

    public function index()
    {
        $data['title'] = 'Data Uraian';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $data['uraian'] = $this->uraian->get();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('uraian/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function getkode()
    {
        echo $this->uraian->getkode();
    }

    public function getjson()
    {
        echo $this->uraian->getJson();
    }

    public function add()
    {
        $this->uraian->add();
    }

    public function edit()
    {
        $this->uraian->edit();
    }

    public function delete($id)
    {
        $id = decrypt_url($id);
        $this->uraian->delete($id);
    }
}
