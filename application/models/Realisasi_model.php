<?php

class Realisasi_model extends CI_Model
{
    public function get()
    {
        $select = 'a.id_realisasi, a.tglrealisasi, b.namaskpd, c.namapengguna, a.kodepengguna, a.keterangan, d.jumlahrealisasi, d.koderka';

        $this->db->select($select);
        $this->db->from('realisasi a');
        $this->db->join('skpd b', 'b.kodeskpd=a.kodeskpd');
        $this->db->join('pengguna c', 'c.id_pengguna=a.kodepengguna');
        $this->db->join('realisasi_detail d', 'd.koderealisasi = a.id_realisasi');

        return $this->db->get()->result_array();
    }

    public function getDetailById($id)
    {
        $select = 'a.id_realisasi, a.tglrealisasi, b.namaskpd, c.namapengguna, a.kodepengguna, a.keterangan, d.jumlahrealisasi, b.kodeskpd,';
        $select .= 'b.namapenggunaananggaran nama, b.nippenggunaananggaran nip, e.totalrka, e.tglpengesahanrka,';
        $select .= 'SUM(f.jumlahrka) ttl, d.koderka';

        $this->db->select($select);
        $this->db->from('realisasi a');
        $this->db->join('skpd b', 'b.kodeskpd=a.kodeskpd');
        $this->db->join('pengguna c', 'c.id_pengguna=a.kodepengguna');
        $this->db->join('realisasi_detail d', 'd.koderealisasi = a.id_realisasi');
        $this->db->join('rka e', 'e.koderka=d.koderka');
        $this->db->join('rkadetail f', 'f.koderka = d.koderka');

        $this->db->where('a.id_realisasi', $id);

        return $this->db->get()->row_array();
    }

    public function getKode()
    {
        $this->db->select('id_realisasi');
        $this->db->order_by('id_realisasi', 'desc');
        $data = $this->db->get('realisasi')->row_array();

        if ($data) {
            return json_encode(['status' => 1, 'result' => $data]);
        } else {
            return json_encode(['status' => 0, 'result' => null]);
        }
    }

    public function add()
    {
        $id = $this->input->post('kode');
        $skpd = $this->input->post('kodeskpd');
        $pengguna = $this->input->post('pengguna');
        $tgl = $this->input->post('tgl');
        $keterangan = $this->input->post('keterangan');

        $rka = $this->input->post('rka');
        $jml = preg_replace("/[^0-9]/", "", $this->input->post('jml'));

        $data = [
            'id_realisasi' => $id,
            'tglrealisasi' => $tgl,
            'kodeskpd' => $skpd,
            'kodepengguna' => $pengguna,
            'keterangan' => $keterangan,
        ];

        if ($this->db->insert('realisasi', $data)) :
            $data2 = [
                'koderealisasi' => $id,
                'koderka' => $rka,
                'jumlahrealisasi' => $jml
            ];

            $this->db->insert('realisasi_detail', $data2);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil di tambah!</div>');

            redirect('realisasi');

        else :
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data gagal di tambah!</div>');

            redirect('realisasi');
        endif;
    }

    public function edit()
    {
        $id = $this->input->post('ukode');
        $skpd = $this->input->post('ukodeskpd');
        $pengguna = $this->input->post('upengguna');
        $tgl = $this->input->post('utgl');
        $keterangan = $this->input->post('uketerangan');
        $lama = $this->input->post('lama');

        $rka = $this->input->post('urka');
        $jml = preg_replace("/[^0-9]/", "", $this->input->post('ujml'));

        $data = [
            'tglrealisasi' => $tgl,
            'kodeskpd' => $skpd,
            'kodepengguna' => $pengguna,
            'keterangan' => $keterangan,
        ];

        $delete = $this->db->delete('realisasi_detail', ['koderealisasi' => $id, 'koderka' => $lama]);

        if ($delete) :

            $this->db->where('id_realisasi', $id);
            $update = $this->db->update('realisasi', $data);

            if ($update) :
                $data2 = [
                    'koderealisasi' => $id,
                    'koderka' => $rka,
                    'jumlahrealisasi' => $jml
                ];

                $this->db->insert('realisasi_detail', $data2);

                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil di ubah!</div>');

                redirect('realisasi');
            else :
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data gagal di tambah!</div>');

                redirect('realisasi');
            endif;
        else :
        endif;
    }

    public function delete($id, $rka)
    {
        $rd = $this->db->delete('realisasi_detail', ['koderealisasi' => $id, 'koderka' => $rka]);

        if ($rd) {
            $this->db->delete('realisasi', ['id_realisasi' => $id]);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil di hapus!</div>');

            redirect('realisasi');
        }
    }
}
