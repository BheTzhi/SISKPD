<?php

class Submenu_model extends CI_Model
{
    public function get()
    {
        $this->db->select('a.id, b.menu, a.title, a.url, a.icon');
        $this->db->join('user_menu b', 'b.id=a.menu_id');
        return $this->db->get('user_sub_menu a')->result_array();
    }

    public function getById($id)
    {
        $this->db->select('a.id, a.menu_id, a.title, a.url, a.icon');
        $this->db->join('user_menu b', 'b.id=a.menu_id');
        $this->db->where('a.id', $id);
        return $this->db->get('user_sub_menu a')->row_array();
    }

    public function add()
    {
        $data = [
            'menu_id' => $this->input->post('menu'),
            'title' => $this->input->post('title'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
        ];

        $this->db->insert('user_sub_menu', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil tambah data!</div>');
        redirect('submenu');
    }

    public function edit()
    {
        $data = [
            'id' => $this->input->post('uid'),
            'menu_id' => $this->input->post('umenu'),
            'title' => $this->input->post('utitle'),
            'url' => $this->input->post('uurl'),
            'icon' => $this->input->post('uicon'),
        ];

        $this->db->replace('user_sub_menu', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil ubah data!</div>');
        redirect('submenu');
    }

    public function delete($id)
    {
        $this->db->delete('user_sub_menu', ['id' => $id]);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil hapus data!</div>');
        redirect('submenu');
    }
}
