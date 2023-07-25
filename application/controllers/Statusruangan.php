<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Statusruangan extends CI_Controller
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
        $data['tampil2'] = $this->Ruangan_m->ruangan2();
        $data['pengajuan'] = $this->Pengajuan_m->get();
        $data['notif'] = $this->Pengajuan_m->total_notif();
        $this->template->load('template', 'ruangan/statusruangan', $data);
    }

    public function ajaxruangan1()
    {
        $data = $this->Ruangan_m->ruangan1();
        echo json_encode($data);
    }

    public function ajaxruangan2()
    {
        // $role = $this->session->userdata('role_id');
        $data = $this->Ruangan_m->ruangan2();
        // $i = 1;
        // foreach ($data as $row) {
        //     echo '<tr>';
        //     echo '<td>' . $i++ . '</td>';
        //     echo '<td>' . $row['ruangan'] . '</td>';
        //     echo '<td>' . $row['id_kampus'] . '</td>';
        //     echo '<td>' . ($row['status'] == 1 ? '<div class="btn btn-danger btn-xs">Dipinjam</div>' : '<div class="btn btn-success btn-xs">Tersedia</div>') . '</td>';
        //     if ($role == 1 || $role == 2 || $role == 3) {
        //         echo '<td><a href="' . base_url('statusruangan/updateruangan/' . $row['id_ruangan']) . '" class="btn btn-primary btn-xs">on</a> <a href="' . base_url('statusruangan/setruangan/' . encrypt_url($row['id_ruangan'])) . '" class="btn btn-danger btn-xs">off</a></td>';
        //     }
        //     echo '</tr>';
        // }
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

    public function getket()
    {
        $output = array();
        $id = $this->input->post('id');
        $data = $this->Ruangan_m->ambilket($id);

        foreach ($data as $row) {
            $output['id'] = $row->id_pinjam;
            $output['nama'] = $row->nama;
            $output['ruangan'] = $row->ruangan;
            $output['kampus'] = $row->id_kampus;
            $output['tgl1'] = $row->tgl1;
            $output['tgl2'] = $row->tgl2;
            $output['mulai'] = $row->mulai;
            $output['selesai'] = $row->selesai;
        }
        echo json_encode($output);
    }

    public function getket2()
    {
        $output = array();
        $id = $this->input->post('id');
        $data = $this->Ruangan_m->ambilket2($id);

        foreach ($data as $row) {
            $output['id'] = $row->id_pinjam;
            $output['nama'] = $row->nama;
            $output['ruangan'] = $row->ruangan;
            $output['kampus'] = $row->id_kampus;
            $output['tgl1'] = $row->tgl1;
            $output['tgl2'] = $row->tgl2;
            $output['mulai'] = $row->mulai;
            $output['selesai'] = $row->selesai;
        }
        echo json_encode($output);
    }
}

/* End of file Statusruangan.php */
