<?php

class Kegiatan_model extends CI_Model
{

    public function get()
    {
        $select = 'a.id_kegiatan, a.namakegiatan, b.kodeprogram, b.namaprogram';

        $this->db->select($select);
        $this->db->join('program b', 'b.kodeprogram=a.kodeprogram');
        $this->db->order_by('a.id_kegiatan', 'asc');
        return $this->db->get('kegiatan a')->result_array();
    }

    public function getJson()
    {
        $select = 'a.id_kegiatan, a.namakegiatan, b.kodeprogram, b.namaprogram';

        $this->db->select($select);
        $this->db->join('program b', 'b.kodeprogram=a.kodeprogram');
        $this->db->where('a.id_kegiatan', $_POST['id']);
        $data = $this->db->get('kegiatan a')->row_array();

        return json_encode(['status' => 1, 'result' => $data]);
    }

    public function getKode()
    {
        $this->db->select('id_kegiatan');
        $this->db->order_by('id_kegiatan', 'desc');
        $data = $this->db->get('kegiatan')->row_array();

        if ($data) {
            return json_encode(['status' => 1, 'result' => $data]);
        } else {
            return json_encode(['status' => 0, 'result' => null]);
        }
    }

    public function add()
    {
        $kode = preg_replace("/[^0-9]/", "", $this->input->post('kode'));
        $kegiatan = $this->input->post('kegiatan');
        $program = $this->input->post('program');

        $data = [
            'id_kegiatan' => $kode,
            'namakegiatan' => $kegiatan,
            'kodeprogram' => $program
        ];

        $this->db->insert('kegiatan', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil di tambah!</div>');

        redirect('kegiatan');
    }

    public function edit()
    {
        $kode = preg_replace("/[^0-9]/", "", $this->input->post('ukode'));
        $kegiatan = $this->input->post('ukegiatan');
        $program = $this->input->post('uprogram');

        $data = [
            'id_kegiatan' => $kode,
            'namakegiatan' => $kegiatan,
            'kodeprogram' => $program
        ];

        $this->db->replace('kegiatan', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil di ubah!</div>');

        redirect('kegiatan');
    }

    public function delete($id)
    {
        $this->db->delete('kegiatan', ['id_kegiatan' => $id]);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil di hapus!</div>');

        redirect('kegiatan');
    }
}
