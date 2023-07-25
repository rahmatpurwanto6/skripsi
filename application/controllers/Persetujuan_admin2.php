<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Persetujuan_admin2 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model(['Persetujuan_m', 'Pengajuan_m', 'Persetujuan_admin2_m']);
        if (!$this->session->userdata('role_id')) {
            redirect('auth');
        }
    }

    public function index()
    {
        //jika bukan admin2
        if ($this->session->userdata('role_id') != 3) {
            redirect('auth/blocked');
        }

        $data['title'] = 'Halaman Menu Persetujuan Akademik Kampus 2';
        $data['tampil'] = $this->Persetujuan_m->getadmin2();
        $data['notif'] = $this->Pengajuan_m->total_notif();
        $this->template->load('template', 'persetujuan/admin2/index', $data);
    }

    public function get_persetujuanadmin2()
    {
        $list = $this->Persetujuan_admin2_m->get_datatables();
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

            $row[] = '<a href="' . base_url('persetujuan_admin2/detail_persetujuan/' . encrypt_url(($item->id_pinjam))) . '" class="btn btn-info btn-sm">
            <li class="fa fa-eye">
            </li></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Persetujuan_admin2_m->count_all(),
            "recordsFiltered" => $this->Persetujuan_admin2_m->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }

    public function detail_persetujuan($id)
    {
        $id = decrypt_url($id);
        $data['title'] = 'Halaman Persetujuan Akademik Kampus 2';
        $data['tampil'] = $this->Persetujuan_m->detail_kampus2($id);
        $this->template->load('template', 'persetujuan/admin2/detail/detail_persetujuan', $data);
    }

    //persetujuan ormawa
    // public function detail_ormawa($id)
    // {
    //     $id = decrypt_url($id);
    //     $data['title'] = 'Halaman Persetujuan Akademik';
    //     $data['tampil'] = $this->Persetujuan_m->ambildata($id);
    //     $this->template->load('template', 'persetujuan/admin2/detail/persetujuan_ormawa_akademik2', $data);
    // }

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
                alert('Harus disetujui kemahasiswaan terlebih dahulu!'); 
                window.location='" . base_url('persetujuan_admin2') . "';
                </script>";
            } else {
                if ($aksi == 2) {
                    $data = [
                        'id_pinjam' => $id,
                        'nama' => $nama,
                        'acc_akdmk' => $aksi,
                        'status' => $aksi,
                        'alasan' => $alasan
                    ];
                } else {
                    $data = [
                        'id_pinjam' => $id,
                        'nama' => $nama,
                        'acc_akdmk' => $aksi,
                        'alasan' => $alasan
                    ];
                }
            }
        }

        $this->Persetujuan_m->update_persetujuan($id, $data);
        $this->session->set_flashdata('pesan', 'Persetujuan berhasil diberikan');
        redirect('persetujuan_admin2');
    }

    //persetujuan ormawa
    // public function simpanormawa()
    // {
    //     $id = $this->input->post('id');
    //     $date = $this->input->post('tgl');
    //     $mulai = $this->input->post('mulai');
    //     $selesai = $this->input->post('selesai');
    //     $aksi = $this->input->post('aksi');
    //     $alasan = $this->input->post('alasan');


    //     if ($aksi == 2) {
    //         $data = [
    //             'id_pinjam' => $id,
    //             'tgl' => date('Y-m-d H:i:s', strtotime($date)),
    //             'mulai' => $mulai,
    //             'selesai' => $selesai,
    //             'approve1' => $aksi,
    //             'status' => $aksi,
    //             'alasan' => $alasan
    //         ];
    //     } else {
    //         $data = [
    //             'id_pinjam' => $id,
    //             'tgl' => date('Y-m-d H:i:s', strtotime($date)),
    //             'mulai' => $mulai,
    //             'selesai' => $selesai,
    //             'approve1' => $aksi,
    //             'alasan' => $alasan,
    //         ];
    //     }

    //     $this->Persetujuan_m->update_ormawa($id, $data);
    //     $this->session->set_flashdata('pesan', 'Persetujuan berhasil diberikan');
    //     redirect('persetujuan_admin2');
    // }
}

/* End of file Persetujuan_admin2.php */
