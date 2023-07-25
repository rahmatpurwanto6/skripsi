<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Persetujuan_kemhs extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model(['Persetujuan_m', 'Pengajuan_m', 'Persetujuan_kemhs_m']);
		if (!$this->session->userdata('role_id')) {
			redirect('auth');
		}
	}

	public function index()
	{
		//jika bukan kemahasiswaan
		if ($this->session->userdata('role_id') != 4) {
			redirect('auth/blocked');
		}

		$data['title'] = 'Halaman Menu Persetujuan Kemahasiswaan';
		$data['tampil'] = $this->Persetujuan_m->getpersetujuankemhs();
		$data['notif'] = $this->Pengajuan_m->total_notif();
		$this->template->load('template', 'persetujuan/kmhs/index', $data);
	}

	public function get_persetujuan_kmhs()
	{
		$list = $this->Persetujuan_kemhs_m->get_datatables();
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

			$row[] = '<a href="' . base_url('persetujuan_kemhs/detail_kemhs/' . encrypt_url(($item->id_pinjam))) . '" class="btn btn-info btn-sm">
            <li class="fa fa-eye">
            </li></a>';

			$data[] = $row;
		}

		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->Persetujuan_kemhs_m->count_all(),
			"recordsFiltered" => $this->Persetujuan_kemhs_m->count_filtered(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function detail_kemhs($id)
	{
		$id = decrypt_url($id);
		$data['title'] = 'Halaman Persetujuan Kemahasiswaan';
		$data['tampil'] = $this->Persetujuan_m->getdetailkemhs($id);
		$this->template->load('template', 'persetujuan/detail/persetujuan_kemhs', $data);
	}

	public function approve()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$aksi = $this->input->post('aksi');
		$alasan = $this->input->post('alasan');

		if ($aksi == 2) {
			$data = [
				'id_pinjam' => $id,
				'nama' => $nama,
				'acc_kmhs' => $aksi,
				'status' => $aksi,
				'alasan' => $alasan
			];
		} else {
			$data = [
				'id_pinjam' => $id,
				'nama' => $nama,
				'acc_kmhs' => $aksi,
				'alasan' => $alasan
			];
		}

		$this->Persetujuan_m->diterima($id, $data);
		$this->session->set_flashdata('pesan', 'Persetujuan berhasil diberikan');
		redirect('persetujuan_kemhs');
	}
}

/* End of file Persetujuan_kemhs.php */
