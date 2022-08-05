<?php

class Dashboard_model extends CI_Model
{



  public function countUsers()
  {
    return $this->db->count_all('users');
  }
  public function countBuku()
  {
    return $this->db->count_all('buku');
  }



  public function countPeminjaman()
  {
    return $this->db->count_all('peminjaman');
  }

  public function countPengembalian()
  {
    return $this->db->count_all('pengembalian');
  }
}
