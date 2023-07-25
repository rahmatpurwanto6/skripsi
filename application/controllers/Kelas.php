<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kelas_m');
		if (!$this->session->userdata('role_id')) {
			redirect('auth');
		}
		$this->load->model('Pengajuan_m');
	}


	public function index()
	{
		//jika bukan superadmin
		if ($this->session->userdata('role_id') != 1) {
			redirect('auth/blocked');
		}

		$data['title'] = 'Halaman Menu Kelas';
		$data['tampil'] = $this->Kelas_m->get();
		$data['notif'] = $this->Pengajuan_m->total_notif();
		$this->template->load('template', 'kelas/index', $data);
	}

	public function get_datakelas()
	{
		$list = $this->Kelas_m->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;

			$row[] = $field->kelas;
			$row[] = '<a href="' . base_url('kelas/ubah/' . encrypt_url(($field->id_kelas))) . '" class="btn btn-primary btn-sm">
						<li class="fa fa-pencil-square-o">
						ubah
						</li></a>
					<a href="' . base_url('kelas/hapus/' . encrypt_url(($field->id_kelas))) . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah anda yakin?\');">
						<li class="fa fa-trash">
						hapus
						</li></a>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Kelas_m->count_all(),
			"recordsFiltered" => $this->Kelas_m->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}

	public function tambah()
	{
		$data['title'] = 'Halaman Tambah Kelas';
		$this->template->load('template', 'kelas/tambah', $data);
	}

	public function simpan()
	{
		$this->form_validation->set_rules('kelas', 'Kelas', 'trim|required', [
			'required' => 'Kelas harus di isi'
		]);

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Halaman Tambah Kelas';
			$this->template->load('template', 'kelas/tambah', $data);
		} else {
			$kelas = $this->input->post('kelas');
			$result = $this->Kelas_m->get_data($kelas);

			if ($result) {
				foreach ($result as $row);
				if ($kelas == $row['kelas']) {
					echo "<script> 
					alert('Kelas sudah ada!'); 
					window.location='" . base_url('kelas/tambah') . "';
					</script>";
				}
			} else {
				$data = [
					'kelas' => $kelas
				];
			}

			$this->Kelas_m->simpandata($data);
			$this->session->set_flashdata('pesan', 'Kelas berhasil ditambahkan.');
			redirect('kelas');
		}
	}

	public function ubah($id)
	{
		$id = decrypt_url($id);
		$data['title'] = 'Halaman Ubah Kelas';
		$data['row'] = $this->Kelas_m->getId($id);
		$this->template->load('template', 'kelas/ubah', $data);
	}

	public function edit_kelas()
	{
		$this->form_validation->set_rules('kelas', 'Kelas', 'trim|required', [
			'required' => 'Kelas harus di isi.'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Halaman Ubah Kelas';
			$this->template->load('template', 'kelas/ubah', $data);
		} else {
			$id = $this->input->post('id');
			$data = [
				'id_kelas' => $id,
				'kelas' => $this->input->post('kelas')
			];

			$this->Kelas_m->edit_data($data, $id);
			$this->session->set_flashdata('pesan', 'Kelas berhasil dirubah.');
			redirect('kelas');
		}
	}

	public function hapus($id)
	{
		$id = decrypt_url($id);
		$this->Kelas_m->delete_data($id);
		$this->session->set_flashdata('pesan', 'Kelas berhasil dihapus.');
		redirect('kelas');
	}
}

/* End of file Kelas.php */
