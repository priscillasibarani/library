<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('form', 'url'));
    $this->load->model('peminjamanmodel');
    if ($this->session->userdata('masuk_sistem_rekam') != TRUE) {
      $url = base_url('login');
      redirect($url);
    }
  }


  public function index()
  {

    $this->data['title'] = 'Data Peminjaman ';
    $this->data['idbo'] = $this->session->userdata('ses_id');
    $this->data['content'] = 'peminjaman/peminjaman';

    if ($this->session->userdata('group') == 'Siswa') {
      $this->data['peminjaman'] = $this->db->query(
        "SELECT DISTINCT `id_pinjam`, `id_anggota`, `nomor_buku`,
				`status`, `tanggal_pinjam`, `tanggal_kembali`
				FROM peminjaman WHERE status = 'Dipinjam' 
				AND id_anggota = ? ORDER BY id_pinjam DESC",
        array($this->session->userdata('id_anggota'))
      );
    } else {
      $this->data['peminjaman'] = $this->db->query("SELECT DISTINCT `id_pinjam`, `id_anggota`, `nomor_buku`,
				`status`, `tanggal_pinjam`, `tanggal_kembali`
				FROM peminjaman WHERE status = 'Dipinjam' ORDER BY id_pinjam DESC");
    }


    // $data['title'] = 'Data Peminjaman';
    // $data['peminjaman'] = $this->peminjamanmodel->getpinjam()->result();

    // $this->load->view('dashboard', $data);

    $this->load->view('dashboard', $this->data);
  }

  public function tambahPeminjaman()
  {
    $data['content'] = 'peminjaman/tambah_peminjaman';
    $data['title']   = 'Form Tambah Peminjaman';
    $data['id_pinjam'] = $this->peminjamanmodel->id_pinjam();
    $data['peminjam'] = $this->db->get('users')->result();
    $data['buku'] = $this->db->get('buku')->result();

    $this->load->view('dashboard', $data);
  }

  public function simpan()
  {

    $this->form_validation->set_rules(
      'id_pinjam',
      'ID Peminjaman',
      'required',
      [
        'required'  =>  'ID Peminjaman Wajib Diisi!'
      ]
    );

    $this->form_validation->set_rules(
      'id_anggota',
      'ID Anggota',
      'required',
      [
        'required'  =>  'ID Anggota Wajib Diisi!'
      ]
    );

    $this->form_validation->set_rules(
      'nomor_buku',
      'Nomor Buku',
      'required',
      [
        'required'  =>  'Nomor Buku Wajib Diisi!'
      ]
    );

    $this->form_validation->set_rules(
      'tanggal_pinjam',
      'Tanggal Peminjaman',
      'required',
      [
        'required'  =>  'Tanggal Peminjaman Wajib Diisi!'
      ]
    );

    $this->form_validation->set_rules(
      'tanggal_kembali',
      'Tanggal Kembali',
      'required',
      [
        'required'  =>  'Tanggal Kembali Wajib Diisi!'
      ]
    );

    $id_pinjam = $this->id_pinjam;

    // $denda = $this->db->query("SELECT * FROM tbl_denda WHERE pinjam_id = '$pinjam_id'");
    // $total_denda = $denda->row(); 
    $tanggal_kembali = new DateTime($this->tanggal_kembali);
    $tanggal_sekarang = new DateTime();
    $selisih = $tanggal_sekarang->diff($tanggal_kembali)->format("%a");

    if ($this->form_validation->run() == TRUE) {
      if ($tanggal_kembali <= $tanggal_sekarang or $selisih == 0) {

        $datapeminjam = array(
          'id_pinjam'       => $this->input->post('id_pinjam'),
          'id_anggota'  => $this->input->post('id_anggota'),
          'nomor_buku'     => $this->input->post('nomor_buku'),
          'tanggal_pinjam'  => $this->input->post('tanggal_pinjam'),
          'tanggal_kembali' => $this->input->post('tanggal_kembali'),
          'status' => 'Dipinjam'
        );

        $query = $this->db->insert('peminjaman', $datapeminjam);

        if ($query = true) {
          $this->session->set_flashdata('info', 'Data berhasil ditambahkan');
          redirect('peminjaman');
        }
      } elseif ($tanggal_kembali >= $tanggal_sekarang or $selisih == 0) {
        $datapeminjam = array(
          'id_pinjam'       => $this->input->post('id_pinjam'),
          'id_anggota'  => $this->input->post('id_anggota'),
          'nomor_buku'     => $this->input->post('nomor_buku'),
          'tanggal_pinjam'  => $this->input->post('tanggal_pinjam'),
          'tanggal_kembali' => $this->input->post('tanggal_kembali'),
          'status' => 'Dipinjam'
        );

        $query = $this->db->insert('peminjaman', $datapeminjam);

        if ($query = true) {
          $this->session->set_flashdata('info', 'Data berhasil ditambahkan');
          redirect('peminjaman');
        }
      } else {
        $data['content'] = 'peminjaman/tambah_peminjaman';
        $data['title']   = 'Form Tambah Peminjaman';
        $data['id_pinjam'] = $this->peminjamanmodel->id_pinjam();
        $data['peminjam'] = $this->db->get('users')->result();
        $data['buku'] = $this->db->get('buku')->result();

        $this->load->view('dashboard', $data);
      }
    }
  }

  public function kembalikan($id)
  {
    $data = $this->peminjamanmodel->getbyid($id);
    $tanggal_kembali = new DateTime($data['tanggal_kembali']);
    $tanggal_sekarang = new DateTime();
    $selisih = $tanggal_sekarang->diff($tanggal_kembali)->format("%a");
    $denda = $selisih * 1000;
    $kembalikan = array(
      'id_pinjam' => $data['id_pinjam'],
      'id_anggota'       => $data['id_anggota'],
      'nomor_buku'          => $data['nomor_buku'],
      'judul_buku'          => $data['judul_buku'],
      'tanggal_pinjam'       => $data['tanggal_pinjam'],
      'tanggal_kembali'      => $data['tanggal_kembali'],
      'tanggal_pengembalian' => date('Y-m-d'),
      'status' => 'Dikembalikan',
      'denda' => 'Rp ' . $denda
    );

    $query = $this->db->insert('pengembalian', $kembalikan);

    if ($query = true) {
      $delete = $this->peminjamanmodel->delete($id);
      if ($delete = true) {
        $this->session->set_flashdata('info', 'Buku berhasil dikembalikan');
        redirect('peminjaman');
      }
    }
  }


  public function editPinjam($id)
  {
    if ($this->session->userdata('group') == 'Administrator') {

      $data['content'] = 'peminjaman/edit_peminjaman';
      $data['title'] = 'Form Edit Peminjaman';
      $data['peminjaman'] = $this->peminjamanmodel->edit($id);
      $data['buku'] = $this->db->get('buku')->result();

      $this->load->view('dashboard', $data);
    } else {
      $this->session->set_flashdata('info', 'Tidak Memiliki Akses Untuk Edit Data');
      redirect('peminjaman');
    }
  }

  public function updatePinjam()
  {
    $id_pinjam = $this->input->post('id_pinjam');
    $data = array(
      'id_pinjam'      => $this->input->post('id_pinjam'),
      'id_anggota' => $this->input->post('id_anggota'),
      'nomor_buku'  => $this->input->post('nomor_buku'),
      'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
      'tanggal_kembali'       => $this->input->post('tanggal_kembali'),
      'status'   => 'Dipinjam',

    );

    $query = $this->peminjamanmodel->update($id_pinjam, $data);
    if ($query = true) {
      $this->session->set_flashdata('info', 'Data berhasil di-update');
      redirect('peminjaman');
    }
  }
}
