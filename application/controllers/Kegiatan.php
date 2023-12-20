<?php

class Kegiatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        blok_login();

        $this->load->model('Program_model', 'program');
        $this->load->model('Kegiatan_model', 'kegiatan');
    }

    public function index()
    {
        $data['title'] = 'Data Kegiatan';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $data['program'] = $this->program->get();
        $data['kegiatan'] = $this->kegiatan->get();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kegiatan/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function getkode()
    {
        echo $this->kegiatan->getKode();
    }

    public function getjson()
    {
        echo $this->kegiatan->getJson();
    }

    public function add()
    {
        $this->kegiatan->add();
    }

    public function edit()
    {
        $this->kegiatan->edit();
    }

    public function delete($id)
    {
        $id = decrypt_url($id);
        $this->kegiatan->delete($id);
    }
}
