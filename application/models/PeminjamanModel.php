<?php

class PeminjamanModel extends CI_model
{

  public function id_pinjam()
  {
    $this->db->select('RIGHT(peminjaman.id_pinjam, 3) as code', FALSE);
    $this->db->order_by('id_pinjam', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get('peminjaman');

    if ($query->num_rows() > 0) {
      $data = $query->row();
      $code = intval($data->code) + 1;
    } else {
      $code = 1;
    }

    $codemax = str_pad($code, 3, "0", STR_PAD_LEFT);
    $coderesult = "PJ" . $codemax;
    return $coderesult;
  }

  public function getpinjam()
  {
    $this->db->select('peminjaman.*, users.nama_anggota as nama_anggota, buku.judul_buku as judul_buku');
    $this->db->from('peminjaman');
    $this->db->join('users', 'users.id_anggota = peminjaman.id_anggota');
    $this->db->join('buku', 'buku.nomor_buku = peminjaman.nomor_buku');
    // $this->db->order_by('id_pm', 'DESC');
    $result = $this->db->get();
    return $result;
  }

  public function getbyid($id)
  {
    $this->db->select('*');
    $this->db->from('peminjaman');
    $this->db->join('users', 'users.id_anggota = peminjaman.id_anggota');
    $this->db->join('buku', 'buku.nomor_buku = peminjaman.nomor_buku');
    $this->db->where('peminjaman.id_pinjam', $id);
    return $this->db->get()->row_array();
  }


  public function edit($id)
  {
    $this->db->select('*, buku.judul_buku as judul_buku');
    $this->db->from('peminjaman');
    $this->db->join('users', 'users.id_anggota = peminjaman.id_anggota');
    $this->db->join('buku', 'buku.nomor_buku = peminjaman.nomor_buku');
    $this->db->where('peminjaman.id_pinjam', $id);
    $this->db->order_by('id_pinjam', 'DESC');
    $result = $this->db->get()->row_array();

    return $result;
  }

  public function update($id_pinjam, $data)
  {
    $this->db->where('id_pinjam', $id_pinjam);
    $this->db->update('peminjaman', $data);
  }
  public function delete($id)
  {
    $this->db->where('id_pinjam', $id);
    $this->db->delete('peminjaman');
  }
}
