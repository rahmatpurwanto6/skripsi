<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Superadmin extends CI_Controller
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
        if ($this->session->userdata('role_id') != 1) {
            redirect('auth/blocked');
        }
        $data['title'] = 'Halaman Kepala BAAK';
        $data['notif'] = $this->Pengajuan_m->total_notif();
        $this->template->load('template', 'admin/superadmin', $data);
    }
}

/* End of file Superadmin.php */
