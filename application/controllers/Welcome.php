<?php

class Welcome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'SIPSMS - P2S3 MQ';
        if ($this->session->userdata('username') == true) :
            $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        else :
            $data['user'] = false;
        endif;

        $this->load->view('welcome', $data);
    }
}
