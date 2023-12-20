<?php

class Rka extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        blok_login();

        $this->load->model('Skpad_model', 'skpad');
        $this->load->model('Rka_model', 'rka');
        $this->load->model('Program_model', 'program');
        $this->load->model('Uraian_model', 'uraian');
        $this->load->model('Kegiatan_model', 'kegiatan');
    }

    public function index()
    {
        $data['title'] = 'Data RKA';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $data['skpd'] = $this->skpad->get();
        $data['rka'] = $this->rka->get();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('rka/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function getkode()
    {
        echo $this->rka->getKode();
    }

    public function add()
    {
        $this->rka->add();
    }

    public function detail($id)
    {
        $id = decrypt_url($id);

        $data['title'] = 'Data RKA';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $data['rka'] = $this->rka->getById($id);
        $data['drka'] = $this->rka->getDRKAByID($id);

        $data['kegiatan'] = $this->kegiatan->get();
        $data['program'] = $this->program->get();
        $data['uraian'] = $this->uraian->get();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('rka/detail', $data);
        $this->load->view('templates/footer', $data);
    }

    public function getjson()
    {
        $data = $this->db->get_where('kegiatan', ['id_kegiatan' => $this->input->post('id')])->row_array();

        echo json_encode($data['kodeprogram']);
    }

    public function getopt()
    {
        $option = '';

        $program = $this->program->get();

        foreach ($program as $key) :
            $option .= '<option value="' . $key['kodeprogram'] . '">' . $key['kodeprogram'] . ' - ' . $key['namaprogram'] . '</option>';
        endforeach;

        echo json_encode(['status' => 'ok', 'html' => $option]);
    }

    public function adddrka($id)
    {
        $id = decrypt_url($id);
        $this->rka->addDRKA($id);
    }

    public function deletedrka($id)
    {
        $id = decrypt_url($id);
        $this->rka->deleteDRKA($id);
    }
}
