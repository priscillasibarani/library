<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LaporanKembali extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_model');
        $this->load->helper('tglIndo_helper');
        $this->load->library('pdf');
        if ($this->session->userdata('masuk_sistem_rekam') != TRUE) {
            $url = base_url('login');
            redirect($url);
        }
    }

    public function index()
    {
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');

        $this->session->set_userdata('tgl_awal', $tgl_awal);
        $this->session->set_userdata('tgl_akhir', $tgl_akhir);

        if (empty($tgl_awal) || empty($tgl_akhir)) {
            $data['content'] = 'laporankembali/laporankembali';
            $data['title']   = 'Laporan Pengembalian';
            $data['laporankembali'] = $this->laporan_model->getAllKembali();
        } else {
            $data['content'] = 'laporankembali/laporankembali';
            $data['title']   = 'Laporan Pengembalian';
            $data['laporankembali'] = $this->laporan_model->filterKembali($tgl_awal, $tgl_akhir);
        }
        $data['sum_denda'] = $this->laporan_model->get_sum();
        $this->load->view('dashboard', $data);
    }

    public function pdfKembali()
    {
        if (empty($this->session->userdata('tgl_awal')) || empty($this->session->userdata('tgl_akhir'))) {
            $data['laporankembali'] = $this->laporan_model->getAllKembali();
            $this->load->view('laporankembali/pdf_kembali', $data);
        } else {
            $data['laporankembali'] = $this->laporan_model->filterKembali($this->session->userdata('tgl_awal'), $this->session->userdata('tgl_akhir'));
            $this->load->view('laporankembali/pdf_kembali', $data);
        }
    }
}
