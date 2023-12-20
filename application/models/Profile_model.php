<?php

class Profile_model extends CI_Model
{

    public function editprofile($id)
    {

        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $jk = $this->input->post('jk');
        $tmplahir = $this->input->post('tmplahir');
        $tgllahir = $this->input->post('tgllahir');
        $notelp =  preg_replace("/[^0-9]/", "", $this->input->post('notelp'));
        $alamat = $this->input->post('alamat');

        $foto = $this->ufoto($id, $username);

        $data = [
            'namapengguna' => $nama,
            'foto' => $foto,
            'jk' => $jk,
            'tempatlahir' => $tmplahir,
            'tgllahir' => $tgllahir,
            'notelp' => $notelp,
            'alamat' => $alamat,
            'username' => $username,
        ];

        $this->db->where('id_pengguna', $id);

        $update = $this->db->update('pengguna', $data);

        if ($update) :
            $cek = $this->db->get_where('pengguna', ['username' => $username])->row_array();
            $data = ['username' => $cek['username'], 'role_id' => $cek['role_id']];

            $this->session->set_userdata($data);
        else :
        endif;

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil di ubah!</div>');

        redirect('profile');
    }

    private function ufoto($id, $username)
    {
        $get = $this->db->get_where('pengguna', ['id_pengguna' => $id])->row_array();

        $gambar = $_FILES['foto']['name'];

        if ($gambar) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '5000';
            $config['upload_path'] = './assets/images/users/';
            $config['file_name'] = 'foto' . $username;

            $this->load->library('upload', $config);

            $is_upload = $this->upload->do_upload('foto');

            if ($is_upload != false) {
                $lama = $get['foto'];

                if ($lama != 'default.jpg') {
                    unlink(FCPATH . 'assets/images/users/' . $lama);
                    return $this->upload->data('file_name');
                } else {
                    return $this->upload->data('file_name');
                }
            }
        } else {
            return $get['foto'];
        }
    }

    public function changePassword()
    {
        $user = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $old = $this->input->post('old');
        $new = $this->input->post('new');
        $confirm = $this->input->post('confirm');

        if ($user['password'] == md5($old)) :
            if ($new == $confirm) :

                $this->db->set('password', md5($new));
                $this->db->where('id_pengguna', $user['id_pengguna']);
                $this->db->update('pengguna');

                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil ganti password!</div>');

                redirect('profile/editpassword');
            else :
                $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Data konfirmasi password tidak sesuai!</div>');

                redirect('profile/editpassword');
            endif;
        else :

            $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Data password lama salah!</div>');

            redirect('profile/editpassword');

        endif;
    }
}
