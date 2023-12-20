<?php

class Skpad_Model extends CI_Model
{

    public function get()
    {
        return $this->db->get('skpd')->result_array();
    }

    public function getkode()
    {
        $select = 'MAX(SUBSTRING(a.kodeskpd,-3)) urut, (SELECT b.kodeskpd FROM skpd b WHERE SUBSTRING(b.kodeskpd, -3) = max(SUBSTRING(a.kodeskpd,-3))) full';

        $this->db->select($select);
        $data = $this->db->get('skpd a')->row_array();

        $result = ['urut' => $data['urut'], 'kode' => kd($data['full'])];

        return json_encode(['status' => 1, 'result' =>  $result]);
    }

    public function getJson($id)
    {
        return $this->db->get_where('skpd', ['kodeskpd' => $id])->row_array();
    }

    public function add()
    {
        $kode = preg_replace("/[^0-9]/", "", $this->input->post('kode'));
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $notelp = preg_replace("/[^0-9]/", "", $this->input->post('notelp'));
        $pengguna = $this->input->post('pengguna');
        $nippengguna = preg_replace("/[^0-9]/", "", $this->input->post('nippengguna'));
        $bendahara = $this->input->post('bendahara');
        $nipbendahara = preg_replace("/[^0-9]/", "", $this->input->post('nipbendahara'));


        $data = [
            'kodeskpd' => $kode,
            'namaskpd' => $nama,
            'alamatskpd' => $alamat,
            'notelp' => $notelp,
            'namapenggunaananggaran' => $pengguna,
            'nippenggunaananggaran' => $nippengguna,
            'namabendahara' => $bendahara,
            'nipbendahara' => $nipbendahara,
        ];

        $this->db->insert('skpd', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil di tambah!</div>');

        redirect('skpd');
    }

    public function edit()
    {
        $id = preg_replace("/[^0-9]/", "", $this->input->post('uid'));
        $nama = $this->input->post('unama');
        $alamat = $this->input->post('ualamat');
        $notelp = preg_replace("/[^0-9]/", "", $this->input->post('unotelp'));
        $pengguna = $this->input->post('upengguna');
        $nippengguna = preg_replace("/[^0-9]/", "", $this->input->post('unippengguna'));
        $bendahara = $this->input->post('ubendahara');
        $nipbendahara = preg_replace("/[^0-9]/", "", $this->input->post('unipbendahara'));

        $data = [
            'namaskpd' => $nama,
            'alamatskpd' => $alamat,
            'notelp' => $notelp,
            'namapenggunaananggaran' => $pengguna,
            'nippenggunaananggaran' => $nippengguna,
            'namabendahara' => $bendahara,
            'nipbendahara' => $nipbendahara,
        ];

        $this->db->where('kodeskpd', $id);
        $this->db->update('skpd', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil di Ubah!</div>');

        redirect('skpd');
    }

    public function delete($id)
    {
        $this->db->delete('skpd', ['kodeskpd' => $id]);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil di hapus!</div>');

        redirect('skpd');
    }
}
