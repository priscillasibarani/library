<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('dashboard_model');
    if ($this->session->userdata('masuk_sistem_rekam') != TRUE) {
      $url = base_url('login');
      redirect($url);
    }
  }

  public function index()
  {
    $this->security_model->getSecurity();
    $data['content'] = 'home';
    $data['title']   = 'Dashboard';
    $data['users'] = $this->dashboard_model->countUsers();
    $data['buku'] = $this->dashboard_model->countBuku();
    $data['peminjaman'] = $this->dashboard_model->countPeminjaman();
    $data['pengembalian'] = $this->dashboard_model->countPengembalian();

    $this->load->view('dashboard', $data);
  }
}
