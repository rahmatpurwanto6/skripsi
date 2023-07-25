<?php

defined('BASEPATH') or exit('No direct script access allowed');

class K_aset extends CI_Controller
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
        //jika bukan k_aset
        if ($this->session->userdata('role_id') != 5) {
            redirect('auth/blocked');
        }

        $data['title'] = 'Halaman Koordinator Aset';
        $data['notif'] = $this->Pengajuan_m->total_notif();
        $this->template->load('template', 'k_aset/index', $data);
    }
}

/* End of file Dosen.php */
