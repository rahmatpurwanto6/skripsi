<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Approve_wk2 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model(['Persetujuan_m', 'Pengajuan_m', 'Persetujuan_wk2_m']);
        if (!$this->session->userdata('role_id')) {
            redirect('auth');
        }
    }

    public function index()
    {
        if ($this->session->userdata('role_id') != 6) {
            redirect('auth/blocked');
        }

        $data['title'] = 'Halaman Menu Persetujuan Wakil Ketua 2';
        $data['tampil'] = $this->Persetujuan_m->get();
        $data['notif'] = $this->Pengajuan_m->total_notif();
        $this->template->load('template', 'persetujuan/wk2/index', $data);
    }

    public function get_persetujuan_wk2()
    {
        $list = $this->Persetujuan_wk2_m->get_datatables();
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

            $row[] = '<a href="' . base_url('approve_wk2/detail/' . encrypt_url(($item->id_pinjam))) . '" class="btn btn-info btn-sm">
            <li class="fa fa-eye">
            </li></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Persetujuan_wk2_m->count_all(),
            "recordsFiltered" => $this->Persetujuan_wk2_m->count_filtered(),
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
        $this->template->load('template', 'persetujuan/wk2/detail/persetujuan_wk2', $data);
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
                window.location='" . base_url('approve_wk2') . "';
                </script>";
            } elseif ($row['acc_akdmk'] == 0) {
                echo "<script> 
                alert('Harus disetujui Akademik terlebih dahulu!'); 
                window.location='" . base_url('approve_wk2') . "';
                </script>";
            } elseif ($row['acc_k_aset'] = 0) {
                echo "<script> 
                alert('Harus disetujui Koordinator Aset terlebih dahulu!'); 
                window.location='" . base_url('approve_wk2') . "';
                </script>";
            } else {
                if ($aksi == '2') {
                    $data = [
                        'id_pinjam' => $id,
                        'nama' => $nama,
                        'acc_wk2' => $aksi,
                        'status' => $aksi,
                        'alasan' => $alasan
                    ];

                    $this->Persetujuan_m->diterima($id, $data);
                    $this->session->set_flashdata('pesan', 'Persetujuan berhasil diberikan');
                    redirect('approve_wk2');
                } else {
                    $data = [
                        'id_pinjam' => $id,
                        'nama' => $nama,
                        'acc_wk2' => $aksi,
                        'status' => $aksi,
                        'alasan' => $alasan
                    ];

                    $d2 = [
                        'id_pinjam' => $this->input->post('id'),
                        'id_user' => $this->input->post('id2'),
                        'nama' => $this->input->post('nama'),
                        'jabatan' => $this->input->post('jabatan'),
                        'id_kampus' => $this->input->post('kampus'),
                        'id_ruangan' => $this->input->post('ruangan'),
                        'tgl_pengajuan' => $this->input->post('pengajuan'),
                        'tgl1' => $this->input->post('tgl1'),
                        'tgl2' => $this->input->post('tgl2'),
                        'mulai' => $this->input->post('mulai'),
                        'selesai' => $this->input->post('selesai'),
                        'keperluan' => $this->input->post('keperluan'),
                        'alasan' => $this->input->post('alasan')
                    ];
                }
            }
        }

        $this->Persetujuan_m->acc_wk2($id, $data, $d2);
        $this->session->set_flashdata('pesan', 'Persetujuan berhasil diberikan');
        redirect('approve_wk2');
    }
}

/* End of file Approve_k_aset.php */
