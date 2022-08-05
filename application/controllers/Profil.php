<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('usersmodel');
    }

    public function editProfil($id)
    {

        $data['content'] = 'profil/profil';
        $data['title'] = ' Edit Profil';
        $data['prf'] = $this->usersmodel->get_id_profil($id);

        if ($data['prf']) {
            $data['profil'] = $this->usersmodel->getProfil();
            $this->load->view('dashboard', $data);
        } else {
            $this->session->set_flashdata('info', '<div class="alert alert-danger">Data Tidak Ada');
            redirect('dashboard');
        }
    }


    public function update()
    {
        $id = htmlentities($this->input->post('id', TRUE));
        // $id_anggota    = htmlentities($this->input->post('id_anggota', TRUE));
        $nama_anggota = htmlentities($this->input->post('nama_anggota', TRUE));
        $username = htmlentities($this->input->post('username', TRUE));
        $password = htmlentities($this->input->post('password'));
        $group = htmlentities($this->input->post('group', TRUE));
        $nisn = htmlentities($this->input->post('nisn', TRUE));
        $jenis_kelamin = htmlentities($this->input->post('jenis_kelamin', TRUE));
        $alamat = htmlentities($this->input->post('alamat', TRUE));
        $status = htmlentities($this->input->post('status', TRUE));
        $nomor_telp = htmlentities($this->input->post('nomor_telp', TRUE));

        // setting konfigurasi upload
        $namafile = "user_" . time();
        $config['upload_path'] = './assets_style/image/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['file_name'] = $namafile;
        // load library upload
        $this->load->library('upload', $config);
        // upload gambar 1


        if (!$this->upload->do_upload('gambar')) {
            if ($this->input->post('password') !== '') {
                $data = array(
                    // 'id' => $id,
                    // 'id_anggota' => $id_anggota,
                    'nama_anggota' => $nama_anggota,
                    'username' => $username,
                    'password' => md5($password),
                    'group' => $group,
                    'nisn' => $nisn,
                    'jenis_kelamin' => $jenis_kelamin,
                    'alamat' => $alamat,
                    'nomor_telp' => $nomor_telp,
                );
                $this->usersmodel->update($id, $data);
                if ($this->session->userdata('group') == 'Administrator') {

                    $this->session->set_flashdata('info', 'Data berhasil disimpan');
                    redirect('users');
                } elseif ($this->session->userdata('group') == 'Siswa') {

                    $this->session->set_flashdata('info', 'Data berhasil disimpan');
                    redirect('users/edit');
                }
            } else {
                $data = array(
                    // 'id' => $id,
                    // 'id_anggota' => $id_anggota,
                    'nama_anggota' => $nama_anggota,
                    'username' => $username,
                    'group' => $group,
                    'nisn' => $nisn,
                    'jenis_kelamin' => $jenis_kelamin,
                    'alamat' => $alamat,
                    'nomor_telp' => $nomor_telp,
                );
                $this->usersmodel->update('users', 'id', $id, $data);

                if ($this->session->userdata('group') == 'Administrator') {

                    $this->session->set_flashdata('info', 'Data berhasil disimpan');
                    redirect('users');
                } elseif ($this->session->userdata('group') == 'Siswa') {

                    $this->session->set_flashdata('info', 'Data berhasil disimpan');
                    redirect('users/edit');
                }
            }
        } else {
            $result1 = $this->upload->data();
            $result = array('gambar' => $result1);
            $data1 = array('upload_data' => $this->upload->data());
            unlink('./assets_style/image/' . $this->input->post('foto'));
            if ($this->input->post('password') !== '') {
                $data = array(
                    // 'id' => $id,
                    // 'id_anggota' => $id_anggota,
                    'nama_anggota' => $nama_anggota,
                    'username' => $username,
                    'password' => md5($password),
                    'group' => $group,
                    'nisn' => $nisn,
                    'jenis_kelamin' => $jenis_kelamin,
                    'alamat' => $alamat,
                    'nomor_telp' => $nomor_telp,
                    'foto' => $data1['upload_data']['file_name'],
                );
                $this->usersmodel->update($id, $data);

                if ($this->session->userdata('group') == 'Administrator') {

                    $this->session->set_flashdata('info', 'Data berhasil disimpan');
                    redirect('users');
                } elseif ($this->session->userdata('group') == 'Siswa') {

                    $this->session->set_flashdata('info', 'Data berhasil disimpan');
                    redirect('users/edit');
                }
            } else {
                $data = array(
                    // 'id' => $id,
                    // 'id_anggota' => $id_anggota,
                    'nama_anggota' => $nama_anggota,
                    'username' => $username,
                    'password' => md5($password),
                    'group' => $group,
                    'nisn' => $nisn,
                    'jenis_kelamin' => $jenis_kelamin,
                    'alamat' => $alamat,
                    'nomor_telp' => $nomor_telp,
                    'foto' => $data1['upload_data']['file_name'],
                );
                $this->usersmodel->update($id, $data);

                if ($this->session->userdata('group') == 'Administrator') {

                    $this->session->set_flashdata('info', 'Data berhasil disimpan');
                    redirect('users');
                } elseif ($this->session->userdata('group') == 'Siswa') {

                    $this->session->set_flashdata('info', 'Data berhasil disimpan');
                    redirect('users/edit');
                }
            }
        }
        // $query = $this->usersmodel->update($id, $data);
        // if ($query = true) {
        //     $this->session->set_flashdata('info', 'Data berhasil di-update');
        //     redirect('users');
        // }
    }
}
