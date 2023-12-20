<?php

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        blok_login();

        $this->load->helper('file');

        $this->load->model('Menu_model', 'menu');
    }

    public function index()
    {
        $data['title'] = 'Menu';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $data['menus'] = $this->menu->get();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function getbyid($id)
    {
        echo json_encode($this->menu->getById($id));
    }

    public function add()
    {
        $this->menu->add();
    }

    public function edit()
    {
        $this->menu->edit();
    }

    public function delete($id)
    {
        $id = decrypt_url($id);
        $this->menu->delete($id);
    }

    public function coba()
    {
        if (file_exists(FCPATH . "application/models/" . $this->uri->segment(1) . "_model.php")) {
            $data = 'Some file data';
            if (!write_file('../models/Coba_model.php', $data)) {
                echo 'Unable to write the file';
            } else {
                echo 'File written!';
            }
        } else {
            echo 'tidak ada';
        }
    }
}
