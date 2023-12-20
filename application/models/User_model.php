<?php

class User_model extends CI_Model
{
    public function get()
    {
        $select = 'a.id_pengguna, a.username, a.namapengguna, a.alamat, a.jk, a.tempatlahir, a.tgllahir, a.notelp, a.foto, b.role, c.namaskpd';
        $this->db->select($select);
        $this->db->join('user_role b', 'b.id=a.role_id');
        $this->db->join('skpd c', 'c.kodeskpd=a.kodeskpd');
        return $this->db->get('pengguna a')->result_array();
    }

    public function getById($id)
    {
        // jika ingin join tabel gunakan yang di bawah ini
        // $this->db->select('a.id_pengguna, a.username, a.namapengguna, a.foto, a.role_id');
        // $this->db->join('user_role b', 'b.id=a.role_id');
        // akhir komen

        $this->db->where('a.id_pengguna', $id);
        return $this->db->get('pengguna a')->row_array();
    }

    public function add()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nama = $this->input->post('nama');
        $role = $this->input->post('role');
        $foto = $this->foto($username);
        $alamat = $this->input->post('alamat');
        $jk = $this->input->post('jk');
        $tempatlahir = $this->input->post('tempatlahir');
        $tgllahir = $this->input->post('tgllahir');
        $kodeskpd = $this->input->post('skpd');
        $notelp = preg_replace("/[^0-9]/", "", $this->input->post('notelp'));

        $data = [
            'namapengguna' => $nama,
            'foto' => $foto,
            'jk' => $jk,
            'tempatlahir' => $tempatlahir,
            'tgllahir' => $tgllahir,
            'notelp' => $notelp,
            'alamat' => $alamat,
            'username' => $username,
            'password' => md5($password),
            'kodeskpd' => $kodeskpd,
            'role_id' => $role,
        ];

        $this->db->insert('pengguna', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil di tambah!</div>');

        redirect('user');
    }

    private function foto($username)
    {
        $gambar = $_FILES['foto']['name'];

        if ($gambar) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '5000';
            $config['upload_path'] = './assets/images/users/';
            $config['file_name'] = 'foto' . $username;

            $this->load->library('upload', $config);

            $is_upload = $this->upload->do_upload('foto');

            if ($is_upload != false) {
                return $this->upload->data('file_name');
            }
        }

        return 'default.jpg';
    }

    public function edit()
    {
        $id = $this->input->post('uid');
        $nama = $this->input->post('unama');
        $username = $this->input->post('uusername');
        $role = $this->input->post('urole');
        $foto = $this->ufoto($id, $username);
        $alamat = $this->input->post('ualamat');
        $jk = $this->input->post('ujk');
        $tempatlahir = $this->input->post('utempatlahir');
        $tgllahir = $this->input->post('utgllahir');
        $kodeskpd = $this->input->post('uskpd');
        $notelp = preg_replace("/[^0-9]/", "", $this->input->post('unotelp'));

        $data = [
            'namapengguna' => $nama,
            'foto' => $foto,
            'jk' => $jk,
            'tempatlahir' => $tempatlahir,
            'tgllahir' => $tgllahir,
            'notelp' => $notelp,
            'alamat' => $alamat,
            'username' => $username,
            'kodeskpd' => $kodeskpd,
            'role_id' => $role,
        ];

        $this->db->where('id_pengguna', $id);
        $this->db->update('pengguna', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil di ubah!</div>');

        redirect('user');
    }

    private function ufoto($id, $username)
    {
        $get = $this->db->get_where('pengguna', ['id_pengguna' => $id])->row_array();
        $gambar = $_FILES['ufoto']['name'];

        if ($gambar) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '5000';
            $config['upload_path'] = './assets/images/users/';
            $config['file_name'] = 'foto' . $username;

            $this->load->library('upload', $config);

            $is_upload = $this->upload->do_upload('ufoto');

            if ($is_upload != false) {

                $lama = $get['foto'];

                if ($lama != 'default.jpg') {

                    unlink(FCPATH . 'assets/images/users/' . $lama);
                    return $this->upload->data('file_name');
                } else {
                    return $this->upload->data('file_name');
                }
            }
        }

        return $get['foto'];
    }

    public function delete($id)
    {
        $get = $this->db->get_where('pengguna', ['id_pengguna' => $id])->row_array();

        if ($get['role_id'] == 1) :
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Admin Super tidak bisa dihapus!</div>');

            redirect('user');

        else :

            if ($get['foto'] != 'default.jpg') {
                unlink(FCPATH . 'assets/images/users/' . $get['foto']);
            }
            $this->db->delete('pengguna', ['id_pengguna' => $id]);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil di hapus!</div>');

            redirect('user');

        endif;
    }
}
