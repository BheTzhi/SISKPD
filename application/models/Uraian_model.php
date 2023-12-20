<?php

class Uraian_model extends CI_Model
{

    public function get()
    {
        return $this->db->get('uraian')->result_array();
    }

    public function getkode()
    {
        $this->db->select('kodeuraian');
        $this->db->order_by('kodeuraian', 'desc');
        $data = $this->db->get('uraian')->row_array();

        if ($data) {
            return json_encode(['status' => 1, 'result' => $data]);
        } else {
            return json_encode(['status' => 0, 'result' => null]);
        }
    }

    public function getJson()
    {
        $data = $this->db->get_where('uraian', ['kodeuraian' => $this->input->post('id')])->row_array();
        return json_encode(['status' => 1, 'result' => $data]);
    }

    public function add()
    {

        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');

        $data = [
            'kodeuraian' => $kode,
            'namauraian' => $nama,
        ];

        $this->db->insert('uraian', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil di tambah!</div>');

        redirect('uraian');
    }

    public function edit()
    {

        $kode = $this->input->post('ukode');
        $nama = $this->input->post('unama');

        $data = [
            'kodeuraian' => $kode,
            'namauraian' => $nama,
        ];

        $this->db->replace('uraian', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil di ubah!</div>');

        redirect('uraian');
    }

    public function delete($id)
    {
        $this->db->delete('uraian', ['kodeuraian' => $id]);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil di hapus!</div>');

        redirect('program');
    }
}
