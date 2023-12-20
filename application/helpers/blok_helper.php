<?php

function blok_login()
{
    $ci = get_instance();

    if (!$ci->session->userdata('username')) {
        redirect('auth');
    } else {
        $roleId = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $getId = $ci->db->get_where('user_sub_menu', ['url' => $menu])->row_array();

        $menuId = $getId['menu_id'];

        $userAccess = $ci->db->get_where('user_access', ['role_id' => $roleId, 'menu_id' => $menuId]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blok');
        } else {
        }
    }
}

function cek_akses($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
