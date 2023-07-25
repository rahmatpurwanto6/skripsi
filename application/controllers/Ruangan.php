<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ruangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model(['Ruangan_m', 'Pengajuan_m']);
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

        $data['title'] = 'Halaman Menu Ruangan';
        $data['tampil'] = $this->Ruangan_m->get();
        $data['notif'] = $this->Pengajuan_m->total_notif();
        $this->template->load('template', 'ruangan/index', $data);
    }

    public function get_dataruangan()
    {
        $list = $this->Ruangan_m->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;

            $row[] = $field->ruangan;
            $row[] = $field->id_kampus;
            $row[] = '<a href="' . base_url('ruangan/ubah/' . encrypt_url(($field->id_ruangan))) . '" class="btn btn-primary btn-sm">
						<li class="fa fa-pencil-square-o">
						ubah
						</li></a>
					<a href="' . base_url('ruangan/hapus/' . encrypt_url(($field->id_ruangan))) . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah anda yakin?\');">
						<li class="fa fa-trash">
						hapus
						</li></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Ruangan_m->count_all(),
            "recordsFiltered" => $this->Ruangan_m->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function tambah()
    {
        $data['title'] = 'Halaman Tambah Ruangan';
        $this->template->load('template', 'ruangan/tambah', $data);
    }

    public function simpan()
    {
        $this->form_validation->set_rules('ruangan', 'Ruangan', 'trim|required', [
            'required' => 'Ruangan harus di isi'
        ]);
        $this->form_validation->set_rules('kampus', 'Kampus', 'trim|required', [
            'required' => 'Kampus harus di isi'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Halaman Tambah Ruangan';
            $this->template->load('template', 'ruangan/tambah', $data);
        } else {
            $ruangan = $this->input->post('ruangan');
            $kampus = $this->input->post('kampus');
            $result = $this->Ruangan_m->get_data($kampus, $ruangan);

            if ($result) {
                foreach ($result as $row);
                if ($ruangan == $row['ruangan'] and $kampus == $row['id_kampus']) {
                    echo "<script> 
					alert('Ruangan sudah ada!'); 
					window.location='" . base_url('ruangan/tambah') . "';
					</script>";
                }
            } else {
                $data = [
                    'ruangan' => $ruangan,
                    'id_kampus'  => $kampus
                ];
            }

            $this->Ruangan_m->simpandata($data);
            $this->session->set_flashdata('pesan', 'Ruangan berhasil ditambahkan.');
            redirect('ruangan');
        }
    }

    public function ubah($id)
    {
        $id = decrypt_url($id);
        $data['title'] = 'Halaman Ubah Ruangan';
        $data['row'] = $this->Ruangan_m->getId($id);
        $this->template->load('template', 'ruangan/ubah', $data);
    }

    public function edit_ruangan()
    {
        $this->form_validation->set_rules('ruangan', 'Ruangan', 'trim|required', [
            'required' => 'Ruangan harus di isi.'
        ]);

        $this->form_validation->set_rules('kampus', 'Kampus', 'trim|required', [
            'required' => 'Ruangan harus di isi.'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Ubah Ruangan';
            $this->template->load('template', 'ruangan/ubah', $data);
        } else {
            $id = $this->input->post('id');
            $data = [
                'id_ruangan' => $id,
                'ruangan' => $this->input->post('ruangan'),
                'id_kampus' => $this->input->post('kampus')
            ];

            $this->Ruangan_m->edit_data($data, $id);
            $this->session->set_flashdata('pesan', 'Ruangan berhasil dirubah.');
            redirect('ruangan');
        }
    }

    public function hapus($id)
    {
        $id = decrypt_url($id);
        $this->Ruangan_m->delete_data($id);
        $this->session->set_flashdata('pesan', 'Ruangan berhasil dihapus.');
        redirect('ruangan');
    }
}

/* End of file Ruangan.php */
