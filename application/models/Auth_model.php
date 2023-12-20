<?php


class Auth_model extends CI_Model
{
    public function login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $cek = $this->db->get_where('pengguna', ['username' => $username])->row_array();

        if ($cek != false) {
            if ($cek['password'] == $password) {

                $data = ['username' => $cek['username'], 'role_id' => $cek['role_id']];
                $this->session->set_userdata($data);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Anda belum terdaftar!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil logout!!!</div>');
        redirect(base_url());
    }
}
