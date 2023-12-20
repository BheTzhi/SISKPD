<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        blok_login();

        $this->load->model('User_model', 'users');
        $this->load->model('Role_model', 'role');
        $this->load->model('Skpad_model', 'skpad');
    }

    public function index()
    {
        $data['title'] = 'User';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        if ($data['user']['role_id'] == 1) :
            $cmd1 = '';
        else :
            $cmd1 = $this->db->where('role_id <> 1');

        endif;
        $cmd1;
        $this->db->order_by('role_id', 'asc');
        $data['users'] = $this->users->get();
        $this->db->where('id <> 1');
        $data['role'] = $this->role->get();
        $data['skpd'] = $this->skpad->get();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function getbyid($id)
    {
        echo json_encode($this->users->getById($id));
    }

    public function add()
    {
        $this->users->add();
    }

    public function edit()
    {
        $this->users->edit();
        // echo json_encode($_POST);
    }

    public function delete($id)
    {
        $id = decrypt_url($id);
        $this->users->delete($id);
    }
}
