<?php

class Rka_model extends CI_Model
{
    public function get()
    {
        $select = 'a.koderka, b.kodeskpd, b.namaskpd, a.tglpengesahanrka, a.totalrka';
        $this->db->select($select);
        $this->db->from('rka a');
        $this->db->join('skpd b', 'b.kodeskpd=a.kodeskpd');

        return $this->db->get()->result_array();
    }

    public function getKode()
    {
        $this->db->select('koderka');
        $this->db->order_by('koderka', 'desc');
        $data = $this->db->get('rka')->row_array();

        if ($data) {
            return json_encode(['status' => 1, 'res' => $data]);
        } else {
            return json_encode(['status' => 0, 'res' => null]);
        }
    }

    public function getById($id)
    {
        $select = 'a.koderka, b.kodeskpd, b.namaskpd, a.tglpengesahanrka, a.totalrka, b.namapenggunaananggaran nama, b.nippenggunaananggaran nip';
        $this->db->select($select);
        $this->db->from('rka a');
        $this->db->join('skpd b', 'b.kodeskpd=a.kodeskpd');
        $this->db->where('a.koderka', $id);
        return $this->db->get('rka')->row_array();
    }

    public function getByIdSKPD($id)
    {
        $select = 'a.koderka, b.kodeskpd, b.namaskpd, b.alamatskpd, a.tglpengesahanrka, a.totalrka, b.namapenggunaananggaran nama, b.nippenggunaananggaran nip, b.notelp, b.namabendahara bendahara';
        $this->db->select($select);
        $this->db->from('rka a');
        $this->db->join('skpd b', 'b.kodeskpd=a.kodeskpd');
        $this->db->where('b.kodeskpd', $id);
        return $this->db->get('rka')->row_array();
    }

    public function add()
    {
        $rka = $this->input->post('rka');
        $skpd = $this->input->post('kodespkd');
        $trka =  preg_replace("/[^0-9]/", "", $this->input->post('trka'));
        $tglrka = $this->input->post('tglrka');

        $data = [
            'koderka' => $rka,
            'kodeskpd' => $skpd,
            'totalrka' => $trka,
            'tglpengesahanrka' => $tglrka,
        ];

        $this->db->insert('rka', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil di tambah!</div>');

        redirect('rka');
    }

    public function getDRKAByID($id)
    {
        $select = 'a.koderkadetail, c.kodeskpd, a.id_kegiatan, d.namakegiatan, d.kodeprogram, e.namaprogram, f.kodeuraian, f.namauraian, a.jumlahrka';

        $this->db->select($select);
        $this->db->from('rkadetail a');
        $this->db->join('rka b', 'b.koderka=a.koderka');
        $this->db->join('skpd c', 'c.kodeskpd=b.kodeskpd');
        $this->db->join('kegiatan d', 'd.id_kegiatan = a.id_kegiatan');
        $this->db->join('program e', 'e.kodeprogram = d.kodeprogram');
        $this->db->join('uraian f', 'f.kodeuraian=a.kodeuraian');
        $this->db->where('a.koderka', $id);
        return $this->db->get()->result_array();
    }

    public function getBySkpd($id)
    {
        $skpd = $this->db->get_where('rka', ['kodeskpd' => $id])->row_array();

        $select = 'a.koderkadetail, c.kodeskpd, a.id_kegiatan, d.namakegiatan, d.kodeprogram, e.namaprogram, f.kodeuraian, f.namauraian, a.jumlahrka';

        $this->db->select($select);
        $this->db->from('rkadetail a');
        $this->db->join('rka b', 'b.koderka=a.koderka');
        $this->db->join('skpd c', 'c.kodeskpd=b.kodeskpd');
        $this->db->join('kegiatan d', 'd.id_kegiatan = a.id_kegiatan');
        $this->db->join('program e', 'e.kodeprogram = d.kodeprogram');
        $this->db->join('uraian f', 'f.kodeuraian=a.kodeuraian');
        $this->db->where('a.koderka', $skpd['koderka']);
        return $this->db->get()->result_array();
    }

    public function getJumlah($id)
    {
        $skpd = $this->db->get_where('rka', ['kodeskpd' => $id])->row_array();

        $this->db->select('sum(a.jumlahrka) jml');
        $this->db->from('rkadetail a');
        $this->db->where('a.koderka', $skpd['koderka']);
        return $this->db->get()->row_array();
    }

    public function addDRKA($id)
    {
        $koderka = $id;
        $kegiatan = $this->input->post('kegiatan');
        $uraian = $this->input->post('uraian');
        $jumlah = preg_replace("/[^0-9]/", "", $this->input->post('jumlah'));

        $data = [
            'koderka' => $koderka,
            'id_kegiatan' => $kegiatan,
            'kodeuraian' => $uraian,
            'jumlahrka' => $jumlah,
        ];

        $this->db->insert('rkadetail', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil di tambah!</div>');

        redirect('rka/detail/' . encrypt_url($id));
    }

    public function deleteDRKA($id)
    {
        $koderka = $this->db->get_where('rkadetail', ['koderkadetail' => $id])->row_array()['koderka'];

        $this->db->delete('rkadetail', ['koderkadetail' => $id]);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil di hapus!</div>');

        redirect('rka/detail/' . encrypt_url($koderka));
    }
}
