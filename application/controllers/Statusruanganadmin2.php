<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Statusruanganadmin2 extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model(['Pengajuan_m', 'Ruangan_m']);
    }

    public function index()
    {
        $data['title'] = 'Halaman Menu Status Ruangan';
        $data['tampil'] = $this->Ruangan_m->ruangan1();
        $data['notif'] = $this->Pengajuan_m->total_notif();
        $this->template->load('template', 'ruangan/statusruangan2', $data);
    }

    public function ajaxruangan2()
    {
        $data = $this->Ruangan_m->ruangan2();
        echo json_encode($data);
    }

    public function updateruangan()
    {
        $id = $this->input->post('id');
        $ruangan = $this->input->post('ruangan');
        $kampus = $this->input->post('kampus');
        $status = $this->input->post('status');
        $result = $this->Ruangan_m->ruanganupdate($id, $ruangan, $kampus, $status);
        echo json_encode($result);
    }

    public function setruangan($id)
    {
        $id = decrypt_url($id);
        $data = ['status' => 0];
        $this->Ruangan_m->ruanganupdate($id, $data);
        redirect('statusruangan');
    }

    public function getupdate()
    {
        $output = array();
        $id = $this->input->post('id');
        $data = $this->Ruangan_m->ambilupdate($id);
        foreach ($data as $row) {
            $output['id_ruangan'] = $row->id_ruangan;
            $output['ruangan'] = $row->ruangan;
            $output['id_kampus'] = $row->id_kampus;
        }
        echo json_encode($output);
    }
}

/* End of file Statusruanganadmin2.php */
