<?php

class Laporan_model extends CI_Model
{

  public function getAllData()
  {
    $this->db->select('*');
    $this->db->from('peminjaman');
    $this->db->join('users', 'users.id_anggota = peminjaman.id_anggota');
    $this->db->join('buku ', 'buku.nomor_buku  = peminjaman.nomor_buku');
    return $this->db->get()->result();
  }

  public function getAllKembali()
  {
    $this->db->select('pengembalian.*, buku.judul_buku as judul_buku');
    $this->db->from('pengembalian');
    $this->db->join('users', 'users.id_anggota = pengembalian.id_anggota');
    $this->db->join('buku ', 'buku.nomor_buku  = pengembalian.nomor_buku');
    return $this->db->get()->result();
  }

  public function filterData($tgl_awal, $tgl_akhir)
  {
    $this->db->select('*');
    $this->db->from('peminjaman');
    $this->db->join('users', 'users.id_anggota = peminjaman.id_anggota');
    $this->db->join('buku ', 'buku.nomor_buku  = peminjaman.nomor_buku');
    $this->db->where('peminjaman.tanggal_pinjam >=', $tgl_awal);
    $this->db->where('peminjaman.tanggal_pinjam <=', $tgl_akhir);
    return $this->db->get()->result();
  }

  public function filterKembali($tgl_awal, $tgl_akhir)
  {
    $this->db->select('*');
    $this->db->from('pengembalian');
    $this->db->join('users', 'users.id_anggota = pengembalian.id_anggota');
    $this->db->join('buku', 'buku.nomor_buku = pengembalian.nomor_buku', 'buku.judul_buku = pengembalian.judul_buku');
    // $this->db->join('buku ', 'buku.judul_buku = pengembalian.judul_buku');
    $this->db->where('pengembalian.tanggal_pengembalian >=', $tgl_awal);
    $this->db->where('pengembalian.tanggal_pengembalian <=', $tgl_akhir);
    return $this->db->get()->result();
  }

  public function get_sum()
  {
    $this->db->select_sum('denda', 'jumlah');
    $this->db->from('pengembalian');
    return $this->db->get('')->row();
  }
}
