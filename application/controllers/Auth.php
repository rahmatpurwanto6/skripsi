<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library(['form_validation', 'session']);
        $this->load->model('Auth_m');
    }

    public function index()
    {
        // sudah_login();
        if ($this->session->userdata('role_id') == 1) {
            redirect('superadmin');
        } elseif ($this->session->userdata('role_id') == 2) {
            redirect('admin1');
        } elseif ($this->session->userdata('role_id') == 3) {
            redirect('admin2');
        } elseif ($this->session->userdata('role_id') == 4) {
            redirect('kemhs');
        } elseif ($this->session->userdata('role_id') == 5) {
            redirect('dosen');
        } elseif ($this->session->userdata('role_id') == 6) {
            redirect('mhs');
        }

        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username harus di isi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password harus di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Selamat Datang';
            $this->load->view('auth/login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $user = $this->input->post('username', true);
        $pass = $this->input->post('password', true);

        $datauser = $this->Auth_m->login($user);

        //datanya ada
        if ($datauser) {
            foreach ($datauser as $row);
            //cek password
            if (password_verify($pass, $row['password'])) {
                $data = [
                    'id' => $row['id_user'],
                    'username' => $row['username'],
                    'nama' => $row['nama'],
                    'role_id' => $row['role_id'],
                    'role' => $row['role']
                ];

                $this->session->set_userdata($data);
                //cek level
                if ($this->session->userdata('role_id') == 1) {
                    redirect('superadmin');
                } elseif ($this->session->userdata('role_id') == 2) {
                    redirect('admin1');
                } elseif ($this->session->userdata('role_id') == 3) {
                    redirect('admin2');
                } elseif ($this->session->userdata('role_id') == 4) {
                    redirect('kemhs');
                } elseif ($this->session->userdata('role_id') == 5) {
                    redirect('k_aset');
                } elseif ($this->session->userdata('role_id') == 6) {
                    redirect('wk2');
                } elseif ($this->session->userdata('role_id') == 7) {
                    redirect('dosen');
                } else {
                    redirect('mhs');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">User belum terdaftar</div>');
            redirect('auth');
        }
    }

    //halaman registrasi
    public function registrasi()
    {
        $data['title'] = 'Halaman Registrasi';
        $this->load->view('auth/registrasi', $data);
    }

    public function simpan()
    {
        $this->form_validation->set_rules('username', 'NIM', 'required|trim|min_length[8]', [
            'required' => 'NIM harus di isi',
            'min_length' => 'Nim minimal harus 8 karakter'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama harus di isi'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
            'required' => 'Password harus di isi',
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Registrasi';
            $this->load->view('auth/registrasi', $data);
        } else {

            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 8
            ];

            // $data2 = [
            //     'nim' => htmlspecialchars($this->input->post('username', true)),
            //     'nama_mhs' => htmlspecialchars($this->input->post('nama', true)),
            // ];


            $this->Auth_m->savedata($data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Silahkan login</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('role_id');
        $this->session->sess_destroy();
        redirect('auth');
    }

    public function blocked()
    {
        $data['title'] = 'Blocked!';
        $this->template->load('template', 'auth/blocked', $data);
    }
}

/* End of file Auth.php */
