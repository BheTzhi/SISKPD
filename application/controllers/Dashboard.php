<?php


class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Rka_model', 'rka');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $data['test'] = $this->coba();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function getallrkabyskpd()
    {
        $this->db->select('SUM(totalrka) total');
        $rka = $this->db->get('rka')->row_array()['total'];

        $this->db->select('SUM(jumlahrealisasi) jml');
        $realisasi = $this->db->get('realisasi_detail')->row_array()['jml'];

        echo json_encode([
            'rka' => $rka,
            'realisasi' => $realisasi
        ]);
    }

    public function coba()
    {
        $query = 'SELECT c.kodeskpd, SUM(a.jumlahrealisasi) jml, c.namaskpd, SUM(d.totalrka) ttl

        FROM realisasi_detail a 
        JOIN realisasi b ON b.id_realisasi = a.koderealisasi
        JOIN skpd c ON c.kodeskpd = b.kodeskpd
        JOIN rka d ON d.koderka = a.koderka
        
        GROUP BY c.namaskpd';

        $data = $this->db->query($query)->result_array();

        return $data;
    }

    public function coba2()
    {
        $query = 'SELECT c.kodeskpd, SUM(a.jumlahrealisasi) jml, c.namaskpd, SUM(d.totalrka) ttl, a.koderka

        FROM realisasi_detail a 
        JOIN realisasi b ON b.id_realisasi = a.koderealisasi
        JOIN skpd c ON c.kodeskpd = b.kodeskpd
        JOIN rka d ON d.koderka = a.koderka
        
        GROUP BY c.namaskpd';

        $this->db->query($query)->result_array();

        $this->db->select('b.namaskpd, a.totalrka');
        $this->db->join('skpd b', 'b.kodeskpd=a.kodeskpd');
        $data2 = $this->db->get('rka a')->result_array();

        echo json_encode($data2);
    }
}
