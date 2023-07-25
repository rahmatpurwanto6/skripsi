<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jurusan_m');
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

        $data['title'] = 'Halaman Menu Jurusan';
        $data['tampil'] = $this->Jurusan_m->get();
        $data['notif'] = $this->Pengajuan_m->total_notif();
        $this->template->load('template', 'jurusan/index', $data);
    }

    public function get_datajurusan()
    {
        $list = $this->Jurusan_m->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;

            $row[] = $field->jurusan;
            $row[] = '<a href="' . base_url('jurusan/ubah/' . encrypt_url(($field->id_jurusan))) . '" class="btn btn-primary btn-sm">
						<li class="fa fa-pencil-square-o">
						ubah
						</li></a>
					<a href="' . base_url('jurusan/hapus/' . encrypt_url(($field->id_jurusan))) . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah anda yakin?\');">
						<li class="fa fa-trash">
						hapus
						</li></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Jurusan_m->count_all(),
            "recordsFiltered" => $this->Jurusan_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function tambah()
    {
        $data['title'] = 'Halaman Tambah Jurusan';
        $this->template->load('template', 'jurusan/tambah', $data);
    }

    public function simpan()
    {
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required', [
            'required' => 'Jurusan harus di isi'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Halaman Tambah Jurusan';
            $this->template->load('template', 'jurusan/tambah', $data);
        } else {
            $jurusan = $this->input->post('jurusan');
            $result = $this->Jurusan_m->get_data($jurusan);

            if ($result) {
                foreach ($result as $row);
                if ($jurusan == $row['jurusan']) {
                    echo "<script> 
					alert('Jurusan sudah ada!'); 
					window.location='" . base_url('jurusan/tambah') . "';
					</script>";
                }
            } else {
                $data = [
                    'jurusan' => $jurusan
                ];
            }

            $this->Jurusan_m->simpandata($data);
            $this->session->set_flashdata('pesan', 'Jurusan berhasil ditambahkan.');
            redirect('jurusan');
        }
    }

    public function ubah($id)
    {
        $id = decrypt_url($id);
        $data['title'] = 'Halaman Ubah Jurusan';
        $data['row'] = $this->Jurusan_m->getId($id);
        $this->template->load('template', 'jurusan/ubah', $data);
    }

    public function edit_jurusan()
    {
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required', [
            'required' => 'Jurusan harus di isi.'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Ubah Jurusan';
            $this->template->load('template', 'jurusan/ubah', $data);
        } else {
            $id = $this->input->post('id');
            $data = [
                'id_jurusan' => $id,
                'jurusan' => $this->input->post('jurusan')
            ];

            $this->Jurusan_m->edit_data($data, $id);
            $this->session->set_flashdata('pesan', 'Jurusan berhasil dirubah.');
            redirect('jurusan');
        }
    }

    public function hapus($id)
    {
        $id = decrypt_url($id);
        $this->Jurusan_m->delete_data($id);
        $this->session->set_flashdata('pesan', 'Jurusan berhasil dihapus.');
        redirect('jurusan');
    }
}

/* End of file Jurusan.php */
