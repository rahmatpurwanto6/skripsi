<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_kemhs extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model(['Pengajuan_m', 'Pengajuan_kemhs_m', 'Ruangan_m']);
        if (!$this->session->userdata('role_id')) {
            redirect('auth');
        }
    }

    public function index()
    {
        //jika bukan mahasiswa
        if ($this->session->userdata('role_id') != 4) {
            redirect('auth/blocked');
        }

        $data['title'] = 'Halaman Menu Pengajuan Peminjaman Kemahasiswa';
        $data['tampil'] = $this->Pengajuan_m->getdatakemhs();
        $data['notif'] = $this->Pengajuan_m->total_notif();
        $this->template->load('template', 'pengajuan/pengajuan_kemhs/index', $data);
    }

    public function get_datakemhs()
    {
        $list = $this->Pengajuan_kemhs_m->get_datatables();
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

            $row[] = '<a href="' . base_url('pengajuan_kemhs/detail/' . encrypt_url(($item->id_pinjam))) . '" class="btn btn-info btn-sm">
            <li class="fa fa-eye">
            </li></a>
            <a href="' . base_url('pengajuan_kemhs/batal/' . encrypt_url(($item->id_pinjam))) . '" ' . ($item->status == 1 || $item->status == 2 ? 'style="display:none;' : '') . ' id="batal" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah anda akan membatalkannya?\');">
            <li class="fa fa-close">
            </li></a> <a href="' . base_url('pengajuan_kemhs/cetak_laporan/' . encrypt_url(($item->id_pinjam))) . '" ' . ($item->status == 0 || $item->status == 2 ? 'style="display:none;' : '') . ' class="btn btn-primary btn-sm" target="_blank">
            <li class="fa fa-print">
            </li></a> 
        <a href="' . base_url('pengajuan_kemhs/hapus/' . encrypt_url(($item->id_pinjam))) . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah anda yakin?\');">
            <li class="fa fa-trash">
            </li></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Pengajuan_kemhs_m->count_all(),
            "recordsFiltered" => $this->Pengajuan_kemhs_m->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }

    public function detail($id)
    {
        $id = decrypt_url($id);
        $data['title'] = 'Rincian Peminjaman Ruangan';
        $data['tampil'] = $this->Pengajuan_m->ambildetail($id);
        $this->template->load('template', 'pengajuan/pengajuan_kemhs/detail/detail', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Halaman Pengajuan Peminjaman Kemahasiswaan';
        $data['kampus'] = $this->Pengajuan_m->getkampus();
        $this->template->load('template', 'pengajuan/pengajuan_kemhs/tambah', $data);
    }

    public function simpan()
    {
        $this->form_validation->set_rules('id', 'NIDN', 'required|trim', [
            'required' => 'NIDN harus di isi'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama harus di isi'
        ]);
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim', [
            'required' => 'Kelas harus di isi'
        ]);
        $this->form_validation->set_rules('kampus', 'Kampus', 'required|trim', [
            'required' => 'Kampus harus di isi'
        ]);
        $this->form_validation->set_rules('ruangan', 'Ruangan', 'required|trim', [
            'required' => 'Ruangan harus di isi'
        ]);
        $this->form_validation->set_rules('tgl1', 'Dari Tanggal', 'required|trim', [
            'required' => 'Dari Tanggal harus di isi'
        ]);
        $this->form_validation->set_rules('tgl2', 'Sampai Tanggal', 'required|trim', [
            'required' => 'Sampai Tanggal harus di isi'
        ]);
        $this->form_validation->set_rules('mulai', 'Mulai', 'required|trim', [
            'required' => 'Mulai harus di isi'
        ]);
        $this->form_validation->set_rules('selesai', 'Selesai', 'required|trim', [
            'required' => 'Selesai harus di isi'
        ]);
        $this->form_validation->set_rules('keperluan', 'Keperluan', 'required|trim', [
            'required' => 'Keperluan harus di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Menu Pengajuan Peminjaman Kemahasiswa';
            $data['kampus'] = $this->Pengajuan_m->getkampus();
            $this->template->load('template', 'pengajuan/pengajuan_kemhs/tambah', $data);
        } else {
            $id = $this->session->userdata('id');
            $nama = $this->input->post('nama');
            $jabatan = $this->input->post('jabatan');
            $kampus = $this->input->post('kampus');
            $date1 = $this->input->post('tgl1');
            $date2 = $this->input->post('tgl2');
            $ruangan = $this->input->post('ruangan');
            $mulai = $this->input->post('mulai');
            $selesai = $this->input->post('selesai');
            $keperluan = $this->input->post('keperluan');

            $cek = $this->Pengajuan_m->cek($date1, $date2, $mulai, $selesai, $ruangan, $kampus);

            if ($cek) {
                foreach ($cek as $row);
                if ($kampus == $row['kampus'] and $ruangan == $row['id_ruangan'] and $date1 == $row['tgl1'] and $date2 == $row['tgl2'] and strtotime($mulai) == strtotime($row['mulai']) and strtotime($selesai) == strtotime($row['selesai'])) {
                    echo "<script> 
                                alert('Ruangan sudah di pinjam pada tanggal dan jam tersebut!'); 
                                window.location='" . base_url('pengajuan_kemhs/tambah') . "';
                                </script>";
                }
            } else {
                $data = [
                    'id_user' => $id,
                    'nama' => $nama,
                    'jabatan' => $jabatan,
                    'id_ruangan' => $ruangan,
                    'id_kampus' => $kampus,
                    'tgl_pengajuan' => date('Y-m-d H:i:s'),
                    'tgl1' => date('Y-m-d H:i:s', strtotime($date1)),
                    'tgl2' => date('Y-m-d H:i:s', strtotime($date2)),
                    'mulai' => $mulai,
                    'selesai' => $selesai,
                    'keperluan' => $keperluan,
                    'status' => 0
                ];

                $this->Pengajuan_m->save($data);
                $this->session->set_flashdata('pesan', 'Pengajuan berhasil dibuat');
                redirect('pengajuan_kemhs');
            }
        }
    }

    public function batal($id)
    {
        $id = decrypt_url($id);
        $this->Pengajuan_m->cancel($id);
        $this->session->set_flashdata('pesan', 'Pengajuan berhasil dibatalkan');
        redirect('pengajuan_kemhs');
    }

    public function hapus($id)
    {
        $id = decrypt_url($id);
        $this->Pengajuan_m->hapusdata($id);
        $this->session->set_flashdata('pesan', 'Pengajuan berhasil dihapus');
        redirect('pengajuan_kemhs');
    }

    public function cetak_laporan($id)
    {
        $id = decrypt_url($id);
        ob_start();
        $data['title'] = 'Surat Pinjam Ruangan';
        $data['tampil'] = $this->Pengajuan_m->cetakperid($id);
        $this->load->view('pdf/surat', $data);

        $html = ob_get_contents();
        ob_end_clean();

        require_once('./vendor/autoload.php');
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output('surat_pinjam.pdf', 'I');
    }
}

/* End of file Pengajuan_mhs.php */
