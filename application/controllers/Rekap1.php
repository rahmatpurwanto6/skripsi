<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Rekap1 extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model(['Rekap_m', 'Rekap1_m', 'Pengajuan_m']);
        if (!$this->session->userdata('role_id')) {
            redirect('auth');
        }
    }

    public function index()
    {
        //jika bukan admin1
        if ($this->session->userdata('role_id') != 2) {
            redirect('auth/blocked');
        }

        $data['title'] = 'Halaman Menu Rekap Data Peminjaman Ruangan';
        $data['tampil'] = $this->Rekap_m->getrekap1();
        $data['notif'] = $this->Pengajuan_m->total_notif();
        $this->template->load('template', 'rekap1/index', $data);
    }

    function get_rekap1()
    {
        $list = $this->Rekap1_m->get_datatables();
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
            $row[] = Tanggal_helper(date('Y-m-d', strtotime($item->tgl_pengajuan)));
            $row[] = Tanggal_helper(date('Y-m-d', strtotime($item->tgl1)));
            $row[] = Tanggal_helper(date('Y-m-d', strtotime($item->tgl2)));
            $row[] = $item->mulai;
            $row[] = $item->selesai;

            $row[] = '<a href="' . base_url('rekap1/detail_rekap/' . encrypt_url(($item->id_rekap))) . '" class="btn btn-info btn-sm">
            <li class="fa fa-eye">
            </li></a>
            <a href="' . base_url('rekap1/print_rekap1/' . encrypt_url(($item->id_rekap))) . '" class="btn btn-primary btn-sm" target="_blank">
            <li class="fa fa-print">
            </li></a>
            <a href="' . base_url('rekap1/hapus/' . encrypt_url(($item->id_rekap))) . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah anda yakin akan menghapus data ini?\');">
            <li class="fa fa-trash">
            </li></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Rekap1_m->count_all(),
            "recordsFiltered" => $this->Rekap1_m->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }

    public function detail_rekap($id)
    {
        $id = decrypt_url($id);
        $data['title'] = 'Rincian Rekap Data Peminjaman Ruangan';
        $data['tampil'] = $this->Rekap_m->getdetail($id);
        $this->template->load('template', 'rekap1/detail/detail_rekap', $data);
    }

    public function hapus($id)
    {
        $id = decrypt_url($id);
        $this->Rekap_m->delete($id);
        $this->session->set_flashdata('pesan', 'Data rekap berhasil dihapus');
        redirect('rekap1');
    }

    public function print_periode1()
    {
        ob_start();
        $tgl1 = $this->input->post('tgl1');
        $tgl2 = $this->input->post('tgl2');

        $data['title'] = 'Laporan Rekap Peminjam Ruangan';
        $data['tampil'] = $this->Rekap_m->getPeriode1($tgl1, $tgl2);
        $this->load->view('pdf/rekap_periode', $data);

        $html = ob_get_contents();
        ob_end_clean();

        require_once('./vendor/autoload.php');
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output('laporan rekap data.pdf', 'I');
    }

    public function print_rekap1($id)
    {
        $id = decrypt_url($id);
        ob_start();

        $data['title'] = 'Laporan Rekap Peminjam Ruangan';
        $data['tampil'] = $this->Rekap_m->getprintrekap1($id);
        $this->load->view('pdf/surat', $data);

        $html = ob_get_contents();
        ob_end_clean();

        require_once('./vendor/autoload.php');
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output('laporan rekap data.pdf', 'I');
    }

    public function print_rekap_ormawa1($id)
    {
        $id = decrypt_url($id);
        ob_start();

        $data['title'] = 'Laporan Rekap Peminjam Ruangan';
        $data['tampil'] = $this->Rekap_m->getprintrekap1($id);
        $this->load->view('pdf/rekapormawa_print', $data);

        $html = ob_get_contents();
        ob_end_clean();

        require_once('./vendor/autoload.php');
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output('laporan rekap data.pdf', 'I');
    }
}

/* End of file Rekap1.php */
