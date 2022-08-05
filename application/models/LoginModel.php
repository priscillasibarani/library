<?php

class LoginModel extends CI_Model
{

  public function proses($user, $pass)
  {
    $password = md5($pass);

    $user = $this->db->where('username', $user);
    $pass = $this->db->where('password', $password);
    $query = $this->db->get('users');

    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $session = array(
          'id'       => $row->id,
          'id_anggota'       => $row->id_anggota,
          'nama_anggota'     => $row->nama_anggota,
          'username' => $row->username,
          'password' => $row->password,
          'group'    => $row->group,
          'nisn'    => $row->nisn,
          'jenis_kelamin'    => $row->jenis_kelamin,
          'alamat'    => $row->alamat,
          'nomor_telp'    => $row->nomor_telp,
          'foto'    => $row->foto,
        );
        $hasil_login = $query->row_array();
        $this->session->set_userdata($session);
        // create session
        $this->session->set_userdata('masuk_sistem_rekam', TRUE);
        $this->session->set_userdata('group', $hasil_login['group']);
        $this->session->set_userdata('ses_id', $hasil_login['id']);
        $this->session->set_userdata('id_anggota', $hasil_login['id_anggota']);
      }
      redirect('dashboard');
    } else {
      $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Gagal Login, Username atau Password Salah</div>');
      redirect('Login/index');
    }
  }
}
