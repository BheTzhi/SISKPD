<?php

class Program_model extends CI_Model
{

    public function get()
    {
        return $this->db->get('program')->result_array();
    }

    public function getKode()
    {
        $this->db->select('kodeprogram');
        $this->db->order_by('kodeprogram', 'desc');
        $data = $this->db->get('program')->row_array();

        if ($data) {
            return json_encode(['status' => 1, 'result' => $data]);
        } else {
            return json_encode(['status' => 0, 'result' => null]);
        }
    }

    public function getJson()
    {
        $data = $this->db->get_where('program', ['kodeprogram' => $this->input->post('id')])->row_array();
        return json_encode(['status' => 1, 'result' => $data]);
    }

    public function add()
    {
        $kode = preg_replace("/[^0-9]/", "", $this->input->post('kode'));
        $nama = $this->input->post('nama');

        $data = [
            'kodeprogram' => $kode,
            'namaprogram' => $nama
        ];

        $this->db->insert('program', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil di tambah!</div>');

        redirect('program');
    }

    public function edit()
    {
        $kode = preg_replace("/[^0-9]/", "", $this->input->post('ukode'));
        $nama = $this->input->post('unama');

        $data = [
            'kodeprogram' => $kode,
            'namaprogram' => $nama
        ];

        $this->db->replace('program', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil di ubah!</div>');

        redirect('program');
    }

    public function delete($id)
    {
        $this->db->delete('program', ['kodeprogram' => $id]);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil di hapus!</div>');

        redirect('program');
    }
}
