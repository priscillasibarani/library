<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('loginmodel');
  }

  public function index()
  {
    $this->load->view('loginview');
  }

  public function proses()
  {

    $this->form_validation->set_rules(
      'username',
      'Username',
      'required',
      [
        'required'  =>  'Username Tidak Boleh Kosong!'
      ]
    );

    $this->form_validation->set_rules(
      'password',
      'Password',
      'required',
      [
        'required'  =>  'Password Tidak Boleh Kosong!'
      ]
    );

    if ($this->form_validation->run() == TRUE) {
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $this->loginmodel->proses($username, $password);
    } else {
      $this->load->view('loginview');
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('login');
  }
}
