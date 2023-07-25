<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        //belum login
        if (!$this->session->userdata('role_id')) {
            redirect('auth');
        }
        $this->load->model('Pengajuan_m');
    }

    public function index()
    {
        //jika bukan dosen
        if ($this->session->userdata('role_id') != 7) {
            redirect('auth/blocked');
        }

        $data['title'] = 'Halaman Dosen';
        $data['notif'] = $this->Pengajuan_m->total_notif();
        $this->template->load('template', 'dosen/index', $data);
    }
}

/* End of file Dosen.php */
