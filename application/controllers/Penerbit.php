<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerbit extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('penerbit_model');
  }

  public function index()
  {
    $data['content'] = 'penerbit/penerbit';
    $data['title'] = 'Data Penerbit';
    $data['penerbit'] = $this->db->get('penerbit')->result();

    $this->load->view('dashboard', $data);
  }

  public function tambahPenerbit()
  {
    $data['content'] = 'penerbit/tambah_penerbit';
    $data['title']   = 'Form Tambah Penerbit';

    $this->load->view('dashboard', $data);
  }

  public function simpanPenerbit()
  {
    if ($this->session->userdata('group') == 'Administrator') {
      $this->form_validation->set_rules(
        'nama_penerbit',
        'Nama Penerbit',
        'required',
        [
          'required'  =>  'Nama Penerbit Wajib Diisi!'
        ]
      );

      if ($this->form_validation->run() == TRUE) {
        $id_penerbit = $this->input->post('id_penerbit');
        $nama_penerbit = $this->input->post('nama_penerbit');

        $datapenerbit = [
          'id_penerbit' => $id_penerbit,
          'nama_penerbit' => $nama_penerbit
        ];

        $query = $this->db->insert('penerbit', $datapenerbit);

        if ($query = true) {
          $this->session->set_flashdata('info', 'Data berhasil disimpan');
          redirect('penerbit');
        }
      } else {
        $data['content'] = 'penerbit/tambah_penerbit';
        $data['title']   = 'Form Tambah Penerbit';

        $this->load->view('dashboard', $data);
      }
    } else {
      $this->session->set_flashdata('info', 'Tidak Memiliki Akses Untuk Edit Data');
      redirect('pengarang');
    }
  }

  public function edit($id)
  {
    if ($this->session->userdata('group') == 'Administrator') {
      $data['content'] = 'penerbit/edit_penerbit';
      $data['title'] = 'Form Edit Penerbit';
      $data['penerbit'] = $this->penerbit_model->edit($id);

      $this->load->view('dashboard', $data);
    } else {
      $this->session->set_flashdata('info', 'Tidak Memiliki Akses Untuk Edit Data');
      redirect('pengarang');
    }
  }

  public function update()
  {
    $id_penerbit = $this->input->post('id_penerbit');
    $data = array(
      'nama_penerbit'  => $this->input->post('nama_penerbit'),
    );

    $query = $this->penerbit_model->update($id_penerbit, $data);
    if ($query = true) {
      $this->session->set_flashdata('info', 'Data berhasil di-update');
      redirect('penerbit');
    }
  }

  public function delete($id)
  {
    if ($this->session->userdata('group') == 'Administrator') {
      $query = $this->penerbit_model->delete($id);
      if ($query = true) {
        $this->session->set_flashdata('info', 'Data berhasil dihapus');
        redirect('penerbit');
      }
    } else {
      $this->session->set_flashdata('info', 'Tidak Memiliki Akses Untuk Edit Data');
      redirect('pengarang');
    }
  }
}
