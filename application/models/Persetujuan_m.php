<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Persetujuan_m extends CI_Model
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

    public function get()
    {
        $this->db->select('tbpinjam.*, tbuser.username, tbruangan.ruangan, tbkampus.kampus');
        $this->db->from('tbpinjam');
        $this->db->order_by('tbpinjam.id_pinjam', 'DESC');
        $this->db->join('tbuser', 'tbuser.id_user = tbpinjam.id_user');
        $this->db->join('tbruangan', 'tbruangan.id_ruangan = tbpinjam.id_ruangan');
        $this->db->join('tbkampus', 'tbkampus.id_kampus = tbpinjam.id_kampus');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function ambildata($id)
    {
        $this->db->select('p.*, u.username as id, u.role_id as role, r.id_ruangan ,r.ruangan, k.id_kampus, k.kampus');
        $this->db->from('tbpinjam p');
        $this->db->where('p.id_pinjam', $id);
        $this->db->join('tbuser u', 'u.id_user = p.id_user');
        $this->db->join('tbruangan r', 'r.id_ruangan = p.id_ruangan');
        $this->db->join('tbkampus k', 'k.id_kampus = p.id_kampus');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_persetujuan($id, $data)
    {
        $this->db->where('id_pinjam', $id);
        $this->db->update('tbpinjam', $data);

        if ($this->input->post('aksi') == '2') {
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
            $data['message'] = 'Pengajuan ' . $data['nama'] . ' telah ditolak akademik';
            $pusher->trigger('peminjamanruangansttb', 'acc_akdmk', $data);
        } else {
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
            $data['message'] = 'Pengajuan ' . $data['nama'] . ' telah disetujui akademik';
            $pusher->trigger('peminjamanruangansttb', 'acc_akdmk', $data);
        }
    }

    public function acc_k_aset($id, $data)
    {
        $this->db->where('id_pinjam', $id);
        $this->db->update('tbpinjam', $data);

        if ($this->input->post('aksi') == '2') {
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
            $data['message'] = 'Pengajuan ' . $data['nama'] . ' telah ditolak koordinator aset';
            $pusher->trigger('peminjamanruangansttb', 'k_aset', $data);
        } else {
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
            $data['message'] = 'Pengajuan ' . $data['nama'] . ' telah disetujui koordinator aset';
            $pusher->trigger('peminjamanruangansttb', 'k_aset', $data);
        }
    }

    public function acc_wk2($id, $data, $d2)
    {
        $this->db->where('id_pinjam', $id);
        $this->db->update('tbpinjam', $data);
        $this->db->insert('tbrekap', $d2);


        if ($this->input->post('aksi') == '2') {
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
            $data['message'] = 'Pengajuan ' . $data['nama'] . ' telah ditolak wakil ketua 2';
            $pusher->trigger('peminjamanruangansttb', 'acc_wk2', $data);
        } else {
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
            $data['message'] = 'Pengajuan ' . $data['nama'] . ' telah disetujui wakil ketua 2';
            $pusher->trigger('peminjamanruangansttb', 'acc_wk2', $data);
        }
    }

    //persetujuan kemahasiswaan
    public function getpersetujuankemhs()
    {
        $this->db->select('tbpinjam.*, tbuser.id_user, tbuser.username, tbruangan.id_ruangan, tbruangan.ruangan, tbkampus.id_kampus, tbkampus.kampus');
        $this->db->from('tbpinjam');
        $this->db->order_by('tbpinjam.id_pinjam', 'DESC');
        $this->db->join('tbuser', 'tbuser.id_user = tbpinjam.id_user');
        $this->db->join('tbruangan', 'tbruangan.id_ruangan = tbpinjam.id_ruangan');
        $this->db->join('tbkampus', 'tbkampus.id_kampus = tbpinjam.id_kampus');

        $query = $this->db->get();
        return $query->result_array();
    }

    //detail persetujuan kemhs
    public function getdetailkemhs($id)
    {
        $this->db->select('tbpinjam.*, tbuser.id_user, tbuser.username, tbruangan.id_ruangan, tbruangan.ruangan, tbkampus.id_kampus, tbkampus.kampus');
        $this->db->from('tbpinjam');
        $this->db->where('tbpinjam.id_pinjam', $id);
        $this->db->order_by('tbpinjam.id_pinjam', 'DESC');
        $this->db->join('tbuser', 'tbuser.id_user = tbpinjam.id_user');
        $this->db->join('tbruangan', 'tbruangan.id_ruangan = tbpinjam.id_ruangan');
        $this->db->join('tbkampus', 'tbkampus.id_kampus = tbpinjam.id_kampus');

        $query = $this->db->get();
        return $query->result_array();
    }

    //persetujuan admin1
    public function getadmin1()
    {
        $this->db->select('tbpinjam.*, tbuser.username, tbruangan.ruangan, tbkampus.kampus');
        $this->db->from('tbpinjam');
        $this->db->where('tbkampus.kampus', 1);
        $this->db->order_by('tbpinjam.id_pinjam', 'DESC');
        $this->db->join('tbuser', 'tbuser.id_user = tbpinjam.id_user');
        $this->db->join('tbruangan', 'tbruangan.id_ruangan = tbpinjam.id_ruangan');
        $this->db->join('tbkampus', 'tbkampus.id_kampus = tbpinjam.id_kampus');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getadmin2()
    {
        $this->db->select('tbpinjam.*, tbuser.username, tbruangan.ruangan, tbkampus.kampus');
        $this->db->from('tbpinjam');
        $this->db->where('tbkampus.kampus', 2);
        $this->db->order_by('tbpinjam.id_pinjam', 'DESC');
        $this->db->join('tbuser', 'tbuser.id_user = tbpinjam.id_user');
        $this->db->join('tbruangan', 'tbruangan.id_ruangan = tbpinjam.id_ruangan');
        $this->db->join('tbkampus', 'tbkampus.id_kampus = tbpinjam.id_kampus');

        $query = $this->db->get();
        return $query->result_array();
    }

    //data persetujuan kampus 1
    public function detail_kampus1($id)
    {
        $this->db->select('p.*, u.username as id, u.role_id as role, r.id_ruangan ,r.ruangan, k.id_kampus, k.kampus');
        $this->db->from('tbpinjam p');
        $this->db->where('p.id_pinjam', $id);
        $this->db->where('k.kampus', 1);
        $this->db->join('tbuser u', 'u.id_user = p.id_user');
        $this->db->join('tbruangan r', 'r.id_ruangan = p.id_ruangan');
        $this->db->join('tbkampus k', 'k.id_kampus = p.id_kampus');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function detail_kampus2($id)
    {
        $this->db->select('p.*, u.username as id, u.role_id as role, r.id_ruangan ,r.ruangan, k.id_kampus, k.kampus');
        $this->db->from('tbpinjam p');
        $this->db->where('p.id_pinjam', $id);
        $this->db->where('k.kampus', 2);
        $this->db->join('tbuser u', 'u.id_user = p.id_user');
        $this->db->join('tbruangan r', 'r.id_ruangan = p.id_ruangan');
        $this->db->join('tbkampus k', 'k.id_kampus = p.id_kampus');

        $query = $this->db->get();
        return $query->result_array();
    }

    // public function update_ormawa($id, $data)
    // {
    //     $this->db->where('id_pinjam', $id);
    //     $this->db->update('tbpinjam', $data);

    //     require APPPATH . '../vendor/autoload.php';

    //     $options = array(
    //         'cluster' => 'ap1',
    //         'useTLS' => true
    //     );
    //     $pusher = new Pusher\Pusher(
    //         '0166cb402b0e4792b138',
    //         '9b761392398deb82fcf4',
    //         '1234482',
    //         $options
    //     );

    //     $data['title'] = 'Sekolah Tinggi Teknologi Bandung';
    //     $data['message'] = ' ' . $data['nama'] . ' telah membuat 1 pengajuan';
    //     $pusher->trigger('peminjamanruangansttb', 'my-event', $data);
    // }

    public function diterima($id, $data)
    {
        $this->db->where('id_pinjam', $id);
        $this->db->update('tbpinjam', $data);

        if ($this->input->post('aksi') == '2') {
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
            $data['message'] = 'Pengajuan ' . $data['nama'] . ' telah ditolak kemahasiswaan';
            $pusher->trigger('peminjamanruangansttb', 'acc_kmhs', $data);
        } else {
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
            $data['message'] = 'Pengajuan ' . $data['nama'] . ' telah disetujui kemahasiswaan';
            $pusher->trigger('peminjamanruangansttb', 'acc_kmhs', $data);
        }
    }
}

/* End of file Persetujuan_m.php */
