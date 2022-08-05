<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengembalian extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('pengembalianmodel');
    $this->load->helper(array('form', 'url'));
    if ($this->session->userdata('masuk_sistem_rekam') != TRUE) {
      $url = base_url('login');
      redirect($url);
    }
  }

  public function index()
  {
    $this->data['content'] = 'pengembalian/pengembalian';
    $this->data['title'] = 'Data Pengembalian ';
    $this->data['idbo'] = $this->session->userdata('ses_id');
    $this->data['pengembalian'] = $this->pengembalianmodel->getkembali()->result();


    if ($this->session->userdata('group') == 'Siswa') {
      $this->data['pengembalian'] = $this->db->query(
        "SELECT DISTINCT `id_kembali`, `id_pinjam`,`id_anggota`, `nomor_buku`, `judul_buku`,
				`status`, `tanggal_pinjam`, `tanggal_kembali`,`tanggal_pengembalian`,`denda`
				FROM pengembalian WHERE status = 'Dikembalikan' 
				AND id_anggota = ? ORDER BY id_kembali DESC",
        array($this->session->userdata('id_anggota'))
      );
    } else {
      $this->data['pengembalian'] = $this->db->query("SELECT DISTINCT `id_kembali`, `id_pinjam`,`id_anggota`, `nomor_buku`, `judul_buku`,
      `status`, `tanggal_pinjam`, `tanggal_kembali`,`tanggal_pengembalian`,`denda`
				FROM pengembalian WHERE status = 'Dikembalikan' ORDER BY id_kembali DESC");
    }


    // var_dump($data['pengembalian']);

    $this->load->view('dashboard', $this->data);
  }


  public function delete($id)
  {
    $query = $this->pengembalianmodel->delete($id);
    if ($query = true) {
      $this->session->set_flashdata('info', 'Data berhasil dihapus');
      redirect('pengembalian');
    }
  }

  public function detailKembali($id)
  {


    $this->pengembalianmodel;
    $detail = $this->pengembalianmodel->detail_kembali($id);
    $data['detail'] = $detail;

    $data['content'] = 'pengembalian/detail_kembali';
    $data['title'] = 'Form Detail Pengembalian';

    $this->load->view('dashboard', $data);
  }
}
