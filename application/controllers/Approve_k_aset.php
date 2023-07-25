<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Approve_k_aset extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('Persetujuan_m');
        if (!$this->session->userdata('role_id')) {
            redirect('auth');
        }
        $this->load->model(['Pengajuan_m', 'Persetujuan_k_aset_m']);
    }

    public function index()
    {
        if ($this->session->userdata('role_id') != 5) {
            redirect('auth/blocked');
        }

        $data['title'] = 'Halamana Menu Persetujuan Koordinator Aset';
        $data['tampil'] = $this->Persetujuan_m->get();
        $data['notif'] = $this->Pengajuan_m->total_notif();
        $this->template->load('template', 'persetujuan/k_aset/index', $data);
    }

    public function get_persetujuan_k_aset()
    {
        $list = $this->Persetujuan_k_aset_m->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no;

            $row[] = $item->username;
            $row[] = $item->nama;
            $row[] = $item->ruangan;
            $row[] = $item->kampus;
            $row[] = tanggal_helper($item->tgl_pengajuan);
            $row[] = tanggal_helper($item->tgl1);
            $row[] = tanggal_helper($item->tgl2);
            $row[] = $item->mulai;
            $row[] = $item->selesai;
            $row[] = ($item->acc_kmhs == 1 && $item->acc_akdmk == 0 && $item->status == 0 ? '<div class="btn btn-warning btn-xs">Menunggu acc akademik</div>' : ($item->acc_akdmk == 1 && $item->acc_k_aset == 0 && $item->status == 0 ? '<div class="btn btn-warning btn-xs">Menunggu acc koordinator aset</div>' : ($item->acc_k_aset == 1 && $item->acc_wk2 == 0 && $item->status == 0 ? '<div class="btn btn-warning btn-xs">Menunggu acc wakil ketua 2</div>' : ($item->acc_wk2 == 1 && $item->status == 1 ? '<div class="btn btn-success btn-xs">Diterima</div>' : ($item->status == 2 ? '<div class="btn btn-danger btn-xs">Ditolak</div>' : '<div class="btn btn-warning btn-xs">Menunggu acc kemahasiswaan</div>')))));

            $row[] = '<a href="' . base_url('approve_k_aset/detail/' . encrypt_url(($item->id_pinjam))) . '" class="btn btn-info btn-sm">
            <li class="fa fa-eye">
            </li></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Persetujuan_k_aset_m->count_all(),
            "recordsFiltered" => $this->Persetujuan_k_aset_m->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }

    public function detail($id)
    {
        $id = decrypt_url($id);
        $data['title'] = 'Halaman Persetujuan Koordinator Aset';
        $data['tampil'] = $this->Persetujuan_m->ambildata($id);
        $this->template->load('template', 'persetujuan/k_aset/detail/persetujuan_k_aset', $data);
    }

    public function simpanpersetujuan()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $aksi = $this->input->post('aksi');
        $alasan = $this->input->post('alasan');


        $acc = $this->Persetujuan_m->ambildata($id);

        if ($acc) {
            foreach ($acc as $row);
            if ($row['acc_kmhs'] == 0) {
                echo "<script> 
                alert('Harus disetujui Kemahasiswaan terlebih dahulu!'); 
                window.location='" . base_url('approve_k_aset') . "';
                </script>";
            } elseif ($row['acc_akdmk'] == 0) {
                echo "<script> 
                alert('Harus disetujui Akademik terlebih dahulu!'); 
                window.location='" . base_url('approve_k_aset') . "';
                </script>";
            } else {
                if ($aksi == 2) {
                    $data = [
                        'id_pinjam' => $id,
                        'nama' => $nama,
                        'acc_k_aset' => $aksi,
                        'status' => $aksi,
                        'alasan' => $alasan
                    ];
                } else {
                    $data = [
                        'id_pinjam' => $id,
                        'nama' => $nama,
                        'acc_k_aset' => $aksi,
                        'alasan' => $alasan
                    ];
                }
            }
        }

        $this->Persetujuan_m->acc_k_aset($id, $data);
        $this->session->set_flashdata('pesan', 'Persetujuan berhasil diberikan');
        redirect('approve_k_aset');
    }
}

/* End of file Approve_k_aset.php */
