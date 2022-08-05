<?php

class PengembalianModel extends CI_Model
{


  public function id_kembali()
  {
    $this->db->select('RIGHT(pengembalian.id_kembali, 3) as code', FALSE);
    $this->db->order_by('id_kembali', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get('pengembalian');

    if ($query->num_rows() > 0) {
      $data = $query->row();
      $code = intval($data->code) + 1;
    } else {
      $code = 1;
    }

    $codemax = str_pad($code, 3, "0", STR_PAD_LEFT);
    $coderesult = "PG" . $codemax;
    return $coderesult;
  }

  public function getkembali()
  {
    $this->db->select('pengembalian.*, users.nama_anggota as nama_anggota, buku.judul_buku as judul_buku');
    $this->db->from('pengembalian');
    $this->db->join('users', 'users.id_anggota = pengembalian.id_anggota');
    $this->db->join('buku', 'buku.nomor_buku = pengembalian.nomor_buku');
    $this->db->order_by('id_kembali', 'DESC');
    return $this->db->get();
  }

  function denda()
  {
  }

  public function delete($id)
  {
    $this->db->where('id_kembali', $id);
    $this->db->delete('pengembalian');
  }

  function detail_kembali($id = NULL)
  {
    $query = $this->db->get_where('pengembalian', array('id_kembali' => $id))->row();
    return $query;
  }
}
