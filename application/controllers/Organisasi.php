<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Organisasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model(['Organisasi_m', 'Pengajuan_m']);
        if (!$this->session->userdata('role_id')) {
            redirect('auth');
        }
    }

    public function index()
    {
        //jika bukan superadmin
        if ($this->session->userdata('role_id') != 1) {
            redirect('auth/blocked');
        }

        $data['title'] = 'Halaman Menu Organisasi';
        $data['tampil'] = $this->Organisasi_m->get();
        $data['notif'] = $this->Pengajuan_m->total_notif();
        $this->template->load('template', 'organisasi/index', $data);
    }

    public function get_dataorganisasi()
    {
        $list = $this->Organisasi_m->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;

            $row[] = $field->organisasi;
            $row[] = '<a href="' . base_url('organisasi/ubah/' . encrypt_url(($field->id_organisasi))) . '" class="btn btn-primary btn-sm">
						<li class="fa fa-pencil-square-o">
						ubah
						</li></a>
					<a href="' . base_url('organisasi/hapus/' . encrypt_url(($field->id_organisasi))) . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah anda yakin?\');">
						<li class="fa fa-trash">
						hapus
						</li></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Organisasi_m->count_all(),
            "recordsFiltered" => $this->Organisasi_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function tambah()
    {
        $data['title'] = 'Halaman Tambah Organisasi';
        $this->template->load('template', 'organisasi/tambah', $data);
    }

    public function simpan()
    {
        $this->form_validation->set_rules('organisasi', 'Organisasi', 'trim|required', [
            'required' => 'Organisasi harus di isi'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Halaman Tambah Organisasi';
            $this->template->load('template', 'organisasi/tambah', $data);
        } else {
            $organisasi = $this->input->post('organisasi');
            $result = $this->Organisasi_m->get_data($organisasi);

            if ($result) {
                foreach ($result as $row);
                if ($organisasi == $row['organisasi']) {
                    echo "<script> 
					alert('Organisasi sudah ada!'); 
					window.location='" . base_url('organisasi/tambah') . "';
					</script>";
                }
            } else {
                $data = [
                    'organisasi' => $organisasi
                ];
            }

            $this->Organisasi_m->simpandata($data);
            $this->session->set_flashdata('pesan', 'Organisasi berhasil ditambahkan.');
            redirect('organisasi');
        }
    }

    public function ubah($id)
    {
        $id = decrypt_url($id);
        $data['title'] = 'Halaman Ubah Organisasi';
        $data['row'] = $this->Organisasi_m->getId($id);
        $this->template->load('template', 'organisasi/ubah', $data);
    }

    public function edit_organisasi()
    {
        $this->form_validation->set_rules('organisasi', 'Organisasi', 'trim|required', [
            'required' => 'Organisasi harus di isi.'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Ubah Organisasi';
            $this->template->load('template', 'organisasi/ubah', $data);
        } else {
            $id = $this->input->post('id');
            $data = [
                'id_organisasi' => $id,
                'organisasi' => $this->input->post('organisasi')
            ];

            $this->Organisasi_m->edit_data($data, $id);
            $this->session->set_flashdata('pesan', 'Organisasi berhasil dirubah.');
            redirect('organisasi');
        }
    }

    public function hapus($id)
    {
        $id = decrypt_url($id);
        $this->Organisasi_m->delete_data($id);
        $this->session->set_flashdata('pesan', 'Organisasi berhasil dihapus.');
        redirect('organisasi');
    }
}

/* End of file Organisasi.php */
