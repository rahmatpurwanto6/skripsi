<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Wk2 extends CI_Controller
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
        //jika bukan wk2
        if ($this->session->userdata('role_id') != 6) {
            redirect('auth/blocked');
        }

        $data['title'] = 'Halaman Wakil Ketua 2';
        $data['notif'] = $this->Pengajuan_m->total_notif();
        $this->template->load('template', 'wk2/index', $data);
    }
}

/* End of file Wk2.php */
