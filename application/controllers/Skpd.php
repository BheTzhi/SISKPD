<?php

class Skpd extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        blok_login();

        $this->load->model('Skpad_model', 'skpad');
    }

    public function index()
    {
        $data['title'] = 'Data SKPD';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $data['skpd'] = $this->skpad->get();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('skpd/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function getkode()
    {
        echo $this->skpad->getkode();
    }

    public function getjson()
    {
        echo json_encode($this->skpad->getJson($this->input->post('id')));
    }

    public function add()
    {
        $this->skpad->add();
    }

    public function edit()
    {
        $this->skpad->edit();
    }

    public function delete($id)
    {
        $id = decrypt_url($id);
        $this->skpad->delete($id);
    }
}
