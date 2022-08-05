<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('usersmodel');
        $this->load->helper(array('form', 'url'));
        if ($this->session->userdata('masuk_sistem_rekam') != TRUE) {
            $url = base_url('login');
            redirect($url);
        }
    }

    public function index()
    {
        $data['content'] = 'users/users';
        $data['title'] = 'Kelola Akun';
        $data['users'] = $this->db->get('users')->result();

        $this->load->view('dashboard', $data);
    }

    public function tambahPengguna()
    {
        $data['content'] = 'users/tambah_users';
        $data['title'] = 'Form Tambah Pengguna';
        $data['id_anggota'] = $this->usersmodel->id_anggota();

        $this->load->view('dashboard', $data);
    }


    public function simpan()
    {


        $this->form_validation->set_rules(
            'nama_anggota',
            'Nama Pengguna ',
            'required',
            [
                'required'  =>  'Nama Pengguna Wajib Diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'username',
            'Username ',
            'required',
            [
                'required'  =>  'Username  Wajib Diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'password',
            'Password ',
            'required',
            [
                'required'  =>  'Password  Wajib Diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'nisn',
            'NISN ',
            'required',
            [
                'required'  =>  'NISN  Wajib Diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'jenis_kelamin',
            'Gender ',
            'required',
            [
                'required'  =>  'Gender  Wajib Diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'alamat',
            'Alamat ',
            'required',
            [
                'required'  =>  'Alamat  Wajib Diisi!'
            ]
        );

        $this->form_validation->set_rules(
            'nomor_telp',
            'Nomor Telepon  ',
            'required',
            [
                'required'  =>  'Nomor   Wajib Diisi!'
            ]
        );




        // $id    = $this->input->post('id');
        $id_anggota    = $this->input->post('id_anggota', TRUE);
        $nama_anggota   = $this->input->post('nama_anggota', TRUE);
        $username   = $this->input->post('username', TRUE);
        $password    = md5($this->input->post('password', TRUE));
        $group   = $this->input->post('group', TRUE);
        $nisn    = $this->input->post('nisn', TRUE);
        $jenis_kelamin  = $this->input->post('jenis_kelamin', TRUE);
        $alamat = $this->input->post('alamat', TRUE);
        $nomor_telp = $this->input->post('nomor_telp', TRUE);

        $dd = $this->db->query("SELECT * FROM users WHERE username = '$username' OR nama_anggota = '$nama_anggota'");
        if ($dd->num_rows() > 0) {
            $this->session->set_flashdata('info', '<div id="notifikasi"><div class="alert alert-warning">
                        <p> Gagal Update User : ' . $nama_anggota . ' !, Username </p>
                        </div></div>');
            redirect(base_url('users/tambahPengguna'));
        } else {
            $namafile = "user_" . time();
            $config['upload_path'] = './assets_style/image/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_name'] = $namafile;
            // load library upload
            $this->load->library('upload', $config);

            $this->upload->do_upload('gambar');
            $result1 = $this->upload->data();
            $result = array('gambar' => $result1);
            $data1 = array('upload_data' => $this->upload->data());
            $data = array(
                // 'id' => $id,
                'id_anggota' => $id_anggota,
                'nama_anggota' => $nama_anggota,
                'username' => $username,
                'password' => $password,
                'group' => $group,
                'nisn' => $nisn,
                'jenis_kelamin' => $jenis_kelamin,
                'alamat' => $alamat,
                'nomor_telp' => $nomor_telp,
                'foto' => $data1['upload_data']['file_name'],
            );
            $this->db->insert('users', $data);
            $this->session->set_flashdata('info', 'Data berhasil disimpan');
            redirect(base_url('users'));
        }


        // if ($this->form_validation->run() == TRUE) {
        // $datausers = array(
        //     'id'    => $this->input->post('id'),
        //     'id_anggota'    => $this->input->post('id_anggota'),
        //     'nama_anggota'    => $this->input->post('nama_anggota'),
        //     'username'    => $this->input->post('username'),
        //     'password'    => md5($this->input->post('password')),
        //     'group'    => $this->input->post('group'),
        //     'nisn'    => $this->input->post('nisn'),
        //     'jenis_kelamin'  => $this->input->post('jenis_kelamin'),
        //     'alamat' => $this->input->post('alamat'),
        //     'nomor_telp' => $this->input->post('nomor_telp'),
        //     'foto'        => $this->input->post('foto'),
        // );
        //     $query = $this->db->insert('users', $datausers);

        //     if ($query = true) {
        //         $this->session->set_flashdata('info', 'Data berhasil disimpan');
        //         redirect('users');
        //     }
        // } else {
        //     $data['content'] = 'users/tambah_users';
        //     $data['title'] = 'Form Tambah Pengguna';
        //     $data['id_users'] = $this->usersmodel->id_users();

        //     $this->load->view('dashboard', $data);
        // }


    }

    public function edit($id)
    {
        $data['content'] = 'users/edit_users';
        $data['title'] = 'Form Edit Pengguna';
        $data['users'] = $this->usersmodel->edit($id);

        $this->load->view('dashboard', $data);
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

    public function delete($id)
    {
        $query = $this->usersmodel->delete($id);
        if ($query = true) {
            $this->session->set_flashdata('info', 'Data berhasil dihapus');
            redirect('users');
        }
    }

    public function detailUsers($id)
    {

        $this->usersmodel;
        $users = $this->usersmodel->detail_users($id);
        $data['users'] = $users;

        $data['content'] = 'users/detail_users';
        $data['title'] = 'Form Detail Pengguna';
        $data['id_anggota'] = $this->usersmodel->id_anggota();

        $this->load->view('dashboard', $data);
    }

    public function card()
    {
        if ($this->session->userdata('group') == 'Super Admin') {
            if ($this->uri->segment('3') == '') {
                echo '<script>alert("halaman tidak ditemukan");window.location="' . base_url('users') . '";</script>';
            }
            $this->data['idbo'] = $this->session->userdata('ses_id');
            $count = $this->usersmodel->CountTableId('users', 'id', $this->uri->segment('3'));
            if ($count > 0) {
                $this->data['users'] = $this->usersmodel->get_tableid_edit('users', 'id', $this->uri->segment('3'));
            } else {
                echo '<script>alert("USER TIDAK DITEMUKAN");window.location="' . base_url('users') . '"</script>';
            }
        }
        $this->data['title'] = 'Print Kartu Anggota ';
        $this->load->view('users/card', $this->data);
    }
}
