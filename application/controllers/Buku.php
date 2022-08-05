<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('bukumodel');
    $this->load->helper(array('form', 'url'));
    if ($this->session->userdata('masuk_sistem_rekam') != TRUE) {
      $url = base_url('login');
      redirect($url);
    }
  }

  public function index()
  {
    $data['content'] = 'buku/buku';
    $data['title']   = 'Daftar Data Buku';
    $data['buku'] = $this->bukumodel->getbuku()->result();

    $this->load->view('dashboard', $data);
  }

  public function createBuku()
  {

    $this->data['title'] = 'Form Tambah Buku ';
    $this->data['idbo'] = $this->session->userdata('ses_id');
    $this->data['content'] = 'buku/tambah_buku';
    $this->data['nomor_buku'] = $this->bukumodel->nomor_buku();


    if ($this->session->userdata('group') == 'Siswa') {
      $this->session->set_flashdata('info', 'Tidak Dapat Akses');
      redirect('buku');
    } else {
      $this->data['buku'] =  $this->db->query("SELECT * FROM buku ORDER BY nomor_buku DESC");
    }


    $this->load->view('dashboard', $this->data);


    // $data['content'] = 'buku/tambah_buku';
    // $data['title'] = 'Form Tambah Buku';
    // $data['nomor_buku'] = $this->bukumodel->nomor_buku();


    // $this->load->view('dashboard', $data);
  }

  public function simpanBuku()
  {
    if ($this->session->userdata('group') == 'Administrator') {

      $this->load->helper(array('form', 'url'));

      $this->form_validation->set_rules(
        'nomor_buku',
        'Nomor Buku',
        'required|is_unique[buku.nomor_buku]',
        [
          'required'      => 'Nomor Buku Wajid Diisi !',
          'is_unique'     => 'Nomor Buku ini Sudah Terdaftar'
        ]
      );

      $this->form_validation->set_rules(
        'judul_buku',
        'Judul Buku',
        'required',
        [
          'required'      => 'Judul Buku Wajid Diisi !',
        ]
      );

      $this->form_validation->set_rules(
        'nama_pengarang',
        'Nama Pengarang',
        'required',
        [
          'required'      => 'Nama Pengarang Wajid Diisi !',
        ]
      );

      $this->form_validation->set_rules(
        'nama_penerbit',
        'Nama Penerbit',
        'required',
        [
          'required'      => 'Nama Penerbit Wajid Diisi !',
        ]
      );

      $this->form_validation->set_rules(
        'tahun_terbit',
        'Tahun Terbit',
        'required',
        [
          'required'      => 'Tahun Terbit Wajid Diisi !',
        ]
      );

      $this->form_validation->set_rules(
        'jumlah',
        'Jumlah',
        'required',
        [
          'required'      => 'Jumlah Wajid Diisi !',
        ]
      );

      // $nomor_buku =  $this->input->post('nomor_buku', TRUE);
      // $judul_buku = $this->input->post('judul_buku', TRUE);
      // $nama_pengarang =  $this->input->post('nama_pengarang', TRUE);
      // $nama_penerbit =  $this->input->post('nama_penerbit', TRUE);
      // $tahun_terbit = $this->input->post('tahun_terbit', TRUE);
      // $jumlah = $this->input->post('jumlah', TRUE);

      // $databuku = [
      //   'nomor_buku' => $nomor_buku,
      //   'judul_buku' => $judul_buku,
      //   'nama_pengarang' => $nama_pengarang,
      //   'nama_penerbit' => $nama_penerbit,
      //   'tahun_terbit' => $tahun_terbit,
      //   'jumlah' => $jumlah
      // ];

      if ($this->form_validation->run() == TRUE) {
        $nomor_buku =  $this->input->post('nomor_buku');
        $judul_buku = $this->input->post('judul_buku');
        $nama_pengarang =  $this->input->post('nama_pengarang');
        $nama_penerbit =  $this->input->post('nama_penerbit');
        $tahun_terbit = $this->input->post('tahun_terbit');
        $jumlah = $this->input->post('jumlah');


        $databuku = array(
          'nomor_buku' => $nomor_buku,
          'judul_buku' => $judul_buku,
          'nama_pengarang' => $nama_pengarang,
          'nama_penerbit' => $nama_penerbit,
          'tahun_terbit' => $tahun_terbit,
          'jumlah' => $jumlah,
        );


        $query =  $this->db->insert('buku', $databuku);

        if ($query = true) {
          $this->session->set_flashdata('info', 'Data berhasil disimpan');
          redirect('buku');
        }
      } else {
        $data['content'] = 'buku/tambah_buku';
        $data['title'] = 'Form Tambah Buku';
        $data['nomor_buku'] = $this->bukumodel->nomor_buku();


        $this->load->view('dashboard', $data);

        // // $query = $this->db->insert('buku', $databuku);

        // // if ($query = true) {
        // $this->session->set_flashdata('info', 'Data berhasil disimpan');
        // redirect('buku');
      }
    } else {
      $this->session->set_flashdata('info', 'Tidak Memiliki Akses Untuk Menambah Data');
      redirect('buku');
    }
  }

  public function editBuku($id)
  {

    $data['content'] = 'buku/edit_buku';
    $data['title'] = 'Form Edit Buku';
    $data['buku'] = $this->bukumodel->edit($id);


    $this->load->view('dashboard', $data);
  }

  public function updateBuku()
  {
    $nomor_buku = $this->input->post('nomor_buku');
    $data = array(
      'nomor_buku'      => $this->input->post('nomor_buku'),
      'nama_pengarang' => $this->input->post('nama_pengarang'),
      'nama_penerbit'  => $this->input->post('nama_penerbit'),
      'judul_buku'   => $this->input->post('judul_buku'),
      'tahun_terbit' => $this->input->post('tahun_terbit'),
      'jumlah'       => $this->input->post('jumlah'),
    );

    $query = $this->bukumodel->update($nomor_buku, $data);
    if ($query = true) {
      $this->session->set_flashdata('info', 'Data berhasil di-update');
      redirect('buku');
    }
  }

  public function deleteBuku($id)
  {
    if ($this->session->userdata('group') == 'Administrator') {

      $query = $this->bukumodel->delete($id);

      if ($query = true) {
        $this->session->set_flashdata('info', 'Data berhasil dihapus');
        redirect('buku');
      }
    } else {
      $this->session->set_flashdata('info', 'Tidak Memiliki Akses Untuk Hapus Data');
      redirect('buku');
    }
  }

  public function detailBuku($id)
  {

    $this->bukumodel;
    $detail = $this->bukumodel->detail_buku($id);

    $data['detail'] = $detail;


    $data['content'] = 'buku/detail_buku';
    $data['title'] = 'Form Detail Buku';
    $data['nomor_buku'] = $this->bukumodel->nomor_buku();

    $this->load->view('dashboard', $data);
  }
}




  // public function simpanBuku()
  // {
  //   $this->load->helper(array('form', 'url'));

  //   $this->load->library('form_validation');

    

  //   $nomor_buku = $this->request->getVar('nomor_buku');
  //   $judul_buku = $this->request->getVar('judul_buku');
  //   $nama_pengarang = $this->request->getVar('nama_pengarang');
  //   $nama_penerbit = $this->request->getVar('nama_penerbit');
  //   $tahun_terbit = $this->request->getVar('tahun_terbit');
  //   $jumlah = $this->request->getVar('jumlah');

  //   $databuku = [
  //     'nomor_buku' => $nomor_buku,
  //     'judul_buku' => $judul_buku,
  //     'nama_pengarang' => $nama_pengarang,
  //     'nama_penerbit' => $nama_penerbit,
  //     'tahun_terbit' => $tahun_terbit,
  //     'jumlah' => $jumlah
  //   ];
  //   $query = $this->db->insert('buku', $databuku);

  //   if ($query = true) {
  //     $this->session->set_flashdata('info', 'Data berhasil disimpan');
  //     redirect('buku');
  //   }
  // }
