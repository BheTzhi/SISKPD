<?php

class Submenu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        blok_login();

        $this->load->model('Submenu_model', 'submenu');
        $this->load->model('Menu_model', 'menu');
    }

    public function index()
    {
        $data['title'] = 'Sub Menu';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $data['sub'] = $this->submenu->get();
        $data['menus'] = $this->menu->get();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('submenu/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add()
    {
        $this->submenu->add();
    }

    public function getbyid($id)
    {
        echo json_encode($this->submenu->getById($id));
    }

    public function edit()
    {
        $this->submenu->edit();
    }

    public function delete($id)
    {
        $id = decrypt_url($id);
        $this->submenu->delete($id);
    }
}
