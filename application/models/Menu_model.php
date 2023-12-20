<?php

class Menu_model extends CI_Model
{
    public function get()
    {
        return $this->db->get('user_menu')->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('user_menu', ['id' => $id])->row_array();
    }

    public function add()
    {
        $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil tambah data!</div>');
        redirect('menu');
    }

    public function edit()
    {
        $data = ['id' => $this->input->post('id2'), 'menu' => $this->input->post('menu2')];
        $this->db->replace('user_menu', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil ubah data!</div>');
        redirect('menu');
    }

    public function delete($id)
    {

        $this->db->delete('user_menu', ['id' => $id]);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil hapus data!</div>');
        redirect('menu');
    }
}
