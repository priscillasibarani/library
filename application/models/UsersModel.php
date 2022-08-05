<?php

class UsersModel extends CI_model
{

    public function id_anggota()
    {
        $this->db->select('RIGHT(users.id_anggota, 3) as code', FALSE);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {
            $data = $query->row();
            $code = intval($data->code) + 1;
        } else {
            $code = 1;
        }

        $codemax = str_pad($code, 3, "0", STR_PAD_LEFT);
        $coderesult = "AG" . $codemax;
        return $coderesult;
    }

    public function edit($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('users')->row_array();
    }


    // public  function getProfil()
    // {
    //     return $this->db->get('users')->result();
    // }

    // public function get_id_profil($id)
    // {
    //     $this->db->where('id_anggota', $id);
    //     return $this->db->get('users')->row();
    // }

    // function get_tableid_edit($id)
    // {
    //     $this->db->where('id_anggota', $id);
    //     $query = $this->db->get('users');

    //     return $query->row();
    // }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    function update_table($table_name, $where, $id, $data)
    {
        $this->db->where($where, $id);
        $update = $this->db->update($table_name, $data);
        return $update;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
    }

    function CountTableId($table_name, $where, $id)
    {
        $this->db->where($where, $id);
        $Count = $this->db->get($table_name);
        return $Count->num_rows();
    }

    function get_tableid_edit($table_name, $where, $id)
    {
        $this->db->where($where, $id);
        $tulis = $this->db->get($table_name);
        return $tulis->row();
    }


    function detail_users($id = NULL)
    {
        $query = $this->db->get_where('users', array('id' => $id))->row();
        return $query;
    }
}
