<?php

class Role_model extends CI_Model
{
    public function get()
    {
        return $this->db->get('user_role')->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('user_role', ['id' => $id])->row_array();
    }

    public function add()
    {
        $this->db->insert('user_role', ['role' => $this->input->post('role')]);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil tambah data!</div>');
        redirect('access');
    }

    public function edit()
    {
        $data = ['id' => $this->input->post('id2'), 'role' => $this->input->post('role2')];

        $this->db->replace('user_role', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil ubah data!</div>');
        redirect('access');
    }

    public function delete($id)
    {
        if ($id == 1) :
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Admin super tidak bisa di hapus!</div>');
            redirect('access');
        else :
            $akses = $this->db->delete('user_role', ['id' => $id]);

            if ($akses) : $this->db->delete('user_access', ['role_id' => $id]);
            endif;

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil hapus data!</div>');
            redirect('access');
        endif;
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'menu_id' => $menu_id,
            'role_id' => $role_id
        ];

        $result = $this->db->get_where('user_access', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access', $data);
        } else {
            $this->db->delete('user_access', $data);
        }

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Akses Diubah!</div>');
    }
}
