<?php

class Access extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        blok_login();

        $this->load->model('Role_model', 'role');
        $this->load->model('Menu_model', 'menu');
    }

    public function index()
    {
        $data['title'] = 'Access';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $data['role'] = $this->role->get();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('access/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function getbyid($id)
    {
        echo json_encode($this->role->getById($id));
    }

    public function add()
    {
        $this->role->add();
    }

    public function edit()
    {
        $this->role->edit();
    }

    public function delete($id)
    {
        $id = decrypt_url($id);
        $this->role->delete($id);
    }

    public function roleaccess($id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $data['role'] = $this->role->getById($id);

        $this->db->where('id !=1');
        $data['menu'] = $this->menu->get();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('access/roleaccess', $data);
        $this->load->view('templates/footer', $data);
    }

    public function changeaccess()
    {
        $this->role->changeAccess();
    }
}
