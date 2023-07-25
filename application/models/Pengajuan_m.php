<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_m extends CI_Model
{
    var $column_order = array(null, 'username'); //field yang ada di table user
    var $column_search = array('username'); //field yang diizin untuk pencarian 
    var $order = array('id_pinjam' => 'desc'); // default order 

    private function _get_datatables_query()
    {
        $this->db->select('tbpinjam.*, tbuser.id_user as id_user, tbuser.username as username, tbruangan.ruangan, tbkampus.kampus');
        $this->db->from('tbpinjam');
        $this->db->join('tbuser', 'tbuser.id_user = tbpinjam.id_user');
        $this->db->join('tbruangan', 'tbruangan.id_ruangan = tbpinjam.id_ruangan');
        $this->db->join('tbkampus', 'tbkampus.id_kampus = tbpinjam.id_kampus');

        $i = 0;
        foreach ($this->column_search as $item) { // loop column
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all()
    {
        $this->db->from('tbpinjam');
        return $this->db->count_all_results();
    }

    //ambil semua data
    public function get()
    {
        $this->db->select('tbpinjam.*, tbuser.username, tbruangan.id_ruangan, tbruangan.ruangan, tbkampus.id_kampus, tbkampus.kampus');
        $this->db->from('tbpinjam');
        $this->db->order_by('tbpinjam.id_pinjam', 'DESC');
        $this->db->join('tbuser', 'tbuser.id_user = tbpinjam.id_user');
        $this->db->join('tbruangan', 'tbruangan.id_ruangan = tbpinjam.id_ruangan');
        $this->db->join('tbkampus', 'tbkampus.id_kampus = tbpinjam.id_kampus');

        $query = $this->db->get();
        return $query->result_array();
    }

    //ambil id user
    public function getid($id)
    {
        $this->db->select('a.id_pinjam, a.nama, a.tgl, a.mulai, a.selesai, a.keperluan, a.status, a.approve1, a.approve2, a.alasan, a.status_pinjam, b.id_user, b.username, b.role_id, c.ruangan, d.kampus, e.kelas, f.jurusan, g.organisasi');
        $this->db->from('tbpinjam a');
        $this->db->where('a.id_pinjam', $id);
        $this->db->order_by('a.id_pinjam', 'DESC');
        $this->db->join('tbuser b', 'b.id_user = a.id_user');
        $this->db->join('tbruangan c', 'c.id_ruangan = a.id_ruangan');
        $this->db->join('tbkampus d', 'd.id_kampus = a.id_kampus');
        $this->db->join('tbkelas e', 'e.id_kelas = a.id_kelas');
        $this->db->join('tbjurusan f', 'f.id_jurusan = a.id_jurusan');
        $this->db->join('tborganisasi g', 'g.id_organisasi = a.id_organisasi', 'LEFT');
        $query = $this->db->get();
        return $query->result_array();
    }

    //search dropdown select2
    public function getdosen($perpage, $page, $search, $type)
    {
        $this->db->select('*');
        $this->db->where('role_id', 7);
        $this->db->from('tbuser');
        $this->db->like('username', $search);
        $this->db->limit($perpage, $page);
        if ($type == 'data') {
            $query = $this->db->get();
            return $query->result_array();
        } else {
            return $this->db->count_all_results();
        }
    }

    public function getkemhs($perpage, $page, $search, $type)
    {
        $this->db->select('*');
        $this->db->where('role_id', 4);
        $this->db->from('tbuser');
        $this->db->like('username', $search);
        $this->db->limit($perpage, $page);
        if ($type == 'data') {
            $query = $this->db->get();
            return $query->result_array();
        } else {
            return $this->db->count_all_results();
        }
    }

    //search dropdown select2
    public function getmhs($perpage, $page, $search, $type)
    {
        $this->db->select('*');
        $this->db->where('role_id', 8);
        $this->db->from('tbuser');
        $this->db->like('username', $search);
        $this->db->limit($perpage, $page);
        if ($type == 'data') {
            $query = $this->db->get();
            return $query->result_array();
        } else {
            return $this->db->count_all_results();
        }
    }

    //ambil data kampus
    public function getkampus()
    {
        return $this->db->get('tbkampus')->result_array();
    }

    //ambil data id kampus
    public function getIdkampus($id)
    {
        $this->db->where('id_kampus', $id);
        $query = $this->db->get('tbruangan');
        $output = '<option value=""></option>';
        foreach ($query->result_array() as $row) {
            $output .= '<option value="' . $row['id_ruangan'] . '">' . $row['ruangan'] . '</option>';
        }
        return $output;
    }

    //cek data 
    public function cek($date1, $date2, $mulai, $selesai, $ruangan, $kampus)
    {
        $this->db->select('p.*, u.username as id, u.role_id as role, r.id_ruangan, r.ruangan, k.kampus');
        $this->db->from('tbpinjam p');
        $this->db->where('tgl1', $date1);
        $this->db->where('tgl2', $date2);
        $this->db->where('mulai', $mulai);
        $this->db->where('selesai', $selesai);
        $this->db->where('p.id_ruangan', $ruangan);
        $this->db->where('p.id_kampus', $kampus);
        $this->db->order_by('p.id_pinjam', 'DESC');
        $this->db->join('tbuser u', 'u.id_user = p.id_user');
        $this->db->join('tbruangan r', 'r.id_ruangan = p.id_ruangan');
        $this->db->join('tbkampus k', 'k.id_kampus = p.id_kampus');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function save($data)
    {
        $this->db->insert('tbpinjam', $data);
        require APPPATH . '../vendor/autoload.php';

        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            '0166cb402b0e4792b138',
            '9b761392398deb82fcf4',
            '1234482',
            $options
        );

        $data['title'] = 'Sekolah Tinggi Teknologi Bandung';
        $data['message'] = ' ' . $data['nama'] . ' telah membuat 1 pengajuan';
        $pusher->trigger('peminjamanruangansttb', 'my-event', $data);
    }

    //ambil id detail user
    public function ambildetail($id)
    {
        $this->db->select('p.*, u.username as id, u.role_id as role, r.ruangan, k.kampus');
        $this->db->from('tbpinjam p');
        $this->db->where('p.id_pinjam', $id);
        $this->db->join('tbuser u', 'u.id_user = p.id_user');
        $this->db->join('tbruangan r', 'r.id_ruangan = p.id_ruangan');
        $this->db->join('tbkampus k', 'k.id_kampus = p.id_kampus');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDetailuser($id)
    {
        $name = $this->session->userdata['nama'];

        $this->db->select('p.id_pinjam, p.nama, p.id_user, u.username as id, u.role_id as role, r.ruangan, k.kampus, kl.kelas, j.jurusan,
		o.organisasi, p.tgl, p.mulai, p.selesai, p.keperluan, p.status, p.alasan, p.approve1, p.approve2, p.status_pinjam');
        $this->db->from('tbpinjam p');
        $this->db->where('p.nama', $name);
        $this->db->where('p.id_pinjam', $id);
        $this->db->order_by('p.id_pinjam', 'DESC');
        $this->db->join('tbuser u', 'u.id_user = p.id_user');
        $this->db->join('tbruangan r', 'r.id_ruangan = p.id_ruangan');
        $this->db->join('tbkampus k', 'k.id_kampus = p.id_kampus');
        $this->db->join('tbkelas kl', 'kl.id_kelas = p.id_kelas');
        $this->db->join('tbjurusan j', 'j.id_jurusan = p.id_jurusan');
        $this->db->join('tborganisasi o', 'o.id_organisasi = p.id_organisasi', 'LEFT');
        $query = $this->db->get();
        return $query->result_array();
    }

    //menampilkan data dosen
    public function getdatadosen()
    {
        $name = $this->session->userdata('nama');

        $this->db->select('a.*, b.id_user, b.username, b.role_id, c.ruangan, d.kampus');
        $this->db->from('tbpinjam a');
        $this->db->where('a.nama', $name);
        $this->db->order_by('a.id_pinjam', 'DESC');
        $this->db->join('tbuser b', 'b.id_user = a.id_user');
        $this->db->join('tbruangan c', 'c.id_ruangan = a.id_ruangan');
        $this->db->join('tbkampus d', 'd.id_kampus = a.id_kampus');

        $query = $this->db->get();
        return $query->result_array();
    }

    //menampilkan data mahasiswa
    public function getdatamhs()
    {
        $name = $this->session->userdata('nama');

        $this->db->select('a.*, b.id_user, b.username, b.role_id, c.ruangan, d.kampus');
        $this->db->from('tbpinjam a');
        $this->db->where('a.nama', $name);
        // $this->db->where('a.status_pinjam', 6);
        $this->db->order_by('a.id_pinjam', 'DESC');
        $this->db->join('tbuser b', 'b.id_user = a.id_user');
        $this->db->join('tbruangan c', 'c.id_ruangan = a.id_ruangan');
        $this->db->join('tbkampus d', 'd.id_kampus = a.id_kampus');

        $query = $this->db->get();
        return $query->result_array();
    }

    //menampilkan data mahasiswa
    public function getdatakemhs()
    {
        $name = $this->session->userdata('nama');

        $this->db->select('a.*, b.id_user, b.username, b.role_id, c.ruangan, d.kampus');
        $this->db->from('tbpinjam a');
        $this->db->where('a.nama', $name);
        // $this->db->where('a.status_pinjam', 6);
        $this->db->order_by('a.id_pinjam', 'DESC');
        $this->db->join('tbuser b', 'b.id_user = a.id_user');
        $this->db->join('tbruangan c', 'c.id_ruangan = a.id_ruangan');
        $this->db->join('tbkampus d', 'd.id_kampus = a.id_kampus');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function total_notif()
    {
        $this->db->select('tbpinjam.*, tbuser.username, tbruangan.id_ruangan, tbruangan.ruangan, tbkampus.id_kampus, tbkampus.kampus');
        $this->db->from('tbpinjam');
        $this->db->order_by('tbpinjam.id_pinjam', 'DESC');
        $this->db->join('tbuser', 'tbuser.id_user = tbpinjam.id_user');
        $this->db->join('tbruangan', 'tbruangan.id_ruangan = tbpinjam.id_ruangan');
        $this->db->join('tbkampus', 'tbkampus.id_kampus = tbpinjam.id_kampus');

        return $query = $this->db->count_all_results();
    }

    //ambil data peminjaman hanya kampus 1 
    public function getAdmin1()
    {
        $this->db->select('tbpinjam.*, tbuser.username, tbruangan.ruangan, tbkampus.kampus');
        $this->db->from('tbpinjam');
        $this->db->where('tbpinjam.id_kampus', 1);
        $this->db->order_by('tbpinjam.id_pinjam', 'DESC');
        $this->db->join('tbuser', 'tbuser.id_user = tbpinjam.id_user');
        $this->db->join('tbruangan', 'tbruangan.id_ruangan = tbpinjam.id_ruangan');
        $this->db->join('tbkampus', 'tbkampus.id_kampus = tbpinjam.id_kampus');

        $query = $this->db->get();
        return $query->result_array();
    }

    //ambil data peminjaman hanya kampus 2 
    public function getAdmin2()
    {
        $this->db->select('tbpinjam.*, tbuser.username, tbruangan.ruangan, tbkampus.kampus');
        $this->db->from('tbpinjam');
        $this->db->where('tbpinjam.id_kampus', 2);
        $this->db->order_by('tbpinjam.id_pinjam', 'DESC');
        $this->db->join('tbuser', 'tbuser.id_user = tbpinjam.id_user');
        $this->db->join('tbruangan', 'tbruangan.id_ruangan = tbpinjam.id_ruangan');
        $this->db->join('tbkampus', 'tbkampus.id_kampus = tbpinjam.id_kampus');

        $query = $this->db->get();
        return $query->result_array();
    }

    //hapus superadmin
    public function hapusdata($id)
    {
        $this->db->where('id_pinjam', $id);
        $this->db->delete('tbpinjam');
    }

    //batal superadmin
    public function cancel($id)
    {
        $this->db->where('id_pinjam', $id);
        $this->db->delete('tbpinjam');
    }

    //cetak per ID
    public function cetakperid($id)
    {
        $this->db->select('p.*, u.username as id, u.role_id as role, r.ruangan, k.kampus');
        $this->db->from('tbpinjam p');
        $this->db->where('p.id_pinjam', $id);
        $this->db->join('tbuser u', 'u.id_user = p.id_user');
        $this->db->join('tbruangan r', 'r.id_ruangan = p.id_ruangan');
        $this->db->join('tbkampus k', 'k.id_kampus = p.id_kampus');

        $query = $this->db->get();
        return $query->result_array();
    }

    // public function cetakperidormawa($id)
    // {
    //     $this->db->select('tbpinjam.id_pinjam, tbpinjam.nama, tbpinjam.tgl, tbpinjam.mulai, tbpinjam.selesai, tbpinjam.keperluan, tbpinjam.status, tbpinjam.approve1, tbpinjam.approve2, tbpinjam.alasan, tbpinjam.status_pinjam, tbuser.username, tbruangan.ruangan, tbkampus.kampus, tbkelas.kelas, tbjurusan.jurusan, tborganisasi.organisasi');
    //     $this->db->from('tbpinjam');
    //     $this->db->where('tbpinjam.id_pinjam', $id);
    //     $this->db->where('tbpinjam.status_pinjam', 7);
    //     $this->db->join('tbuser', 'tbuser.id_user = tbpinjam.id_user');
    //     $this->db->join('tbruangan', 'tbruangan.id_ruangan = tbpinjam.id_ruangan');
    //     $this->db->join('tbkampus', 'tbkampus.id_kampus = tbpinjam.id_kampus');
    //     $this->db->join('tbkelas', 'tbkelas.id_kelas = tbpinjam.id_kelas');
    //     $this->db->join('tbjurusan', 'tbjurusan.id_jurusan = tbpinjam.id_jurusan');
    //     $this->db->join('tborganisasi', 'tborganisasi.id_organisasi = tbpinjam.id_organisasi', 'LEFT');

    //     $query = $this->db->get();
    //     return $query->result_array();
    // }
}

/* End of file Pengajuan_m.php */
