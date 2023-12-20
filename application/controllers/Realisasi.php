<?php

class Realisasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        blok_login();

        $this->load->model('Skpad_model','skpad');
        $this->load->model('Realisasi_model', 'realisasi');
        $this->load->model('Rka_model', 'rka');
    }

    public function index()
    {
        $data['title'] = 'Data Realisasi';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $data['skpd'] = $this->skpad->get();
        $data['realisasi'] = $this->realisasi->get();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('realisasi/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function getkode()
    {
        echo $this->realisasi->getKode();
    }

    public function getjson()
    {

        $data = $this->realisasi->getDetailById($this->input->post('id'));
        if ($data) :
            echo json_encode(['status' => 1, 'result' => $data]);
        else :
            echo json_encode(['status' => 0, 'result' => null]);
        endif;
    }

    public function add()
    {
        $this->realisasi->add();
    }

    public function edit()
    {
        $this->realisasi->edit();
    }

    public function delete($id, $rka)
    {
        $id = decrypt_url($id);
        $rka = decrypt_url($rka);

        $this->realisasi->delete($id, $rka);
    }

    public function getrka()
    {
        $option = '';

        $tgl = $this->input->post('tgl');
        $skpd = $this->input->post('kodeskpd');

        $bulan = getBulan($tgl);
        $tahun = getTahun($tgl);
        $bt = $tahun . '-' . $bulan;

        $query = 'SELECT a.koderka, a.tglpengesahanrka, b.namaskpd 
        FROM rka a
        INNER JOIN skpd b ON b.kodeskpd = a.kodeskpd
        WHERE a.kodeskpd = "' . $skpd . '"
        AND a.tglpengesahanrka BETWEEN "' . $bt . '-01" AND "' . $tgl . '"';

        $data = $this->db->query($query)->result_array();

        if ($data) :

            foreach ($data as $key) :

                $option .= '<option value="' . $key['koderka'] . '">' . $key['koderka'] . ' - ' . $key['namaskpd'] . ' - ' . date('d F Y', strtotime($key['tglpengesahanrka'])) . '</option>';

            endforeach;

        else :
            $option .= '<option>- Tidak ada RKA -</option>';
        endif;
        echo json_encode(['status' => 'ok', 'html' => $option]);
    }

    public function detail($id)
    {
        $id = decrypt_url($id);

        $data['title'] = 'Data Realisasi';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $data['result'] = $this->realisasi->getDetailById($id);
        $data['drka'] = $this->rka->getDRKAByID($data['result']['koderka']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('realisasi/detail', $data);
        $this->load->view('templates/footer', $data);
    }
}
