<?php

class Program extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        blok_login();

        $this->load->model('Program_model', 'program');
    }

    public function index()
    {
        $data['title'] = 'Data Program';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $data['program'] = $this->program->get();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('program/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function getkode()
    {
        echo $this->program->getKode();
    }

    public function getjson()
    {
        echo $this->program->getJson();
    }

    public function add()
    {
        $this->program->add();
    }

    public function edit()
    {
        $this->program->edit();
    }

    public function delete($id)
    {
        $id = decrypt_url($id);
        $this->program->delete($id);
    }
}
