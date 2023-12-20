<?php

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        blok_login();

        $this->load->model('Skpad_model', 'skpad');
        $this->load->model('Rka_model', 'rka');
    }

    public function index()
    {
        $data['title'] = 'Laporan RKA';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $data['skpd'] = $this->skpad->get();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function print()
    {
        $data['skpd'] = $this->rka->getByIdSKPD($this->input->post('skpd'));
        $data['drka'] = $this->rka->getBySkpd($this->input->post('skpd'));

        $data['jumlah'] = $this->rka->getJumlah($this->input->post('skpd'));

        $this->load->view('laporan/printrka', $data);
    }

    public function realisasi()
    {
        $data['title'] = 'Laporan Realisasi';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $data['skpd'] = $this->skpad->get();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('laporan/realisasi', $data);
        $this->load->view('templates/footer', $data);
    }

    public function printrealisasi()
    {
        $awal = $this->input->get('awal');
        $akhir = $this->input->get('akhir');
        $skpd = $this->input->get('skpd');

        $this->db->select('b.jumlahrealisasi jumlah, b.koderka, b.koderealisasi, a.tglrealisasi');
        $this->db->join('realisasi_detail b', 'b.koderealisasi = a.id_realisasi');
        $this->db->where('a.tglrealisasi between "' . $awal . '" AND "' . $akhir . '"');
        $data['realisasi'] = $this->db->get_where('realisasi a', ['a.kodeskpd' => $skpd])->result_array();

        $this->db->select('sum(b.jumlahrealisasi) jumlah');
        $this->db->join('realisasi_detail b', 'b.koderealisasi = a.id_realisasi');
        $this->db->where('a.tglrealisasi between "' . $awal . '" AND "' . $akhir . '"');
        $data['jumlah2'] = $this->db->get_where('realisasi a', ['a.kodeskpd' => $skpd])->row_array();

        $this->db->join('rkadetail b', 'b.koderka = a.koderka');
        $this->db->join('kegiatan c', 'c.id_kegiatan = b.id_kegiatan');
        $this->db->join('program d', 'd.kodeprogram = c.kodeprogram');
        $this->db->join('uraian e', 'e.kodeuraian = b.kodeuraian');
        $this->db->where('a.kodeskpd', $skpd);
        $this->db->where('a.tglpengesahanrka between "' . $awal . '" AND "' . $akhir . '"');
        $data['detailrka'] = $this->db->get('rka a')->result_array();

        $data['skpd'] = $this->rka->getByIdSKPD($skpd);

        $data['jumlah'] = $this->rka->getJumlah($skpd);

        $this->load->view('laporan/printrealisasi', $data);
    }

    public function coba()
    {
        // $this->db->select('a.*, b.*, c.*, d.*, e.*');
        // $this->db->from('realisasi a');
        // $this->db->join('skpd b', 'b.kodeskpd = a.kodeskpd');
        // $this->db->join('pengguna c', 'c.id_pengguna=a.kodepengguna');
        // $this->db->join('rka d', 'd.kodeskpd = a.kodeskpd');
        // $this->db->join('realisasi_detail e', 'e.koderealisasi = a.id_realisasi');
        // $this->db->join('rkadetail f', 'f.koderka = d.koderka');
        // $this->db->where('a.kodeskpd', $skpd);
        // $this->db->where('a.tglrealisasi between "' . $awal . '" AND "' . $akhir . '"');
        // $this->db->where('d.tglpengesahanrka between "' . $awal . '" AND "' . $akhir . '"');

        $this->db->join('realisasi_detail b', 'b.koderealisasi = a.id_realisasi');
        $this->db->where('a.tglrealisasi between "' . $awal . '" AND "' . $akhir . '"');
        $realisasi = $this->db->get_where('realisasi a', ['a.kodeskpd' => $skpd])->result_array();


        $this->db->join('rkadetail b', 'b.koderka = a.koderka');
        $this->db->where('a.kodeskpd', $skpd);
        $this->db->where('a.tglpengesahanrka between "' . $awal . '" AND "' . $akhir . '"');
        $data['detailrka'] = $this->db->get('rka a')->result_array();

        $skpd = $this->rka->getByIdSKPD($this->input->post('skpd'));
    }
}
