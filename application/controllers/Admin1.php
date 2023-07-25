<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin1 extends CI_Controller
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
        //jika bukan admin
        if ($this->session->userdata('role_id') != 2) {
            redirect('auth/blocked');
        }

        $data['title'] = 'Halaman Akademik Kampus 1';
        $data['notif'] = $this->Pengajuan_m->total_notif();
        $this->template->load('template', 'admin1/index', $data);
    }
}

/* End of file Admin1.php */
