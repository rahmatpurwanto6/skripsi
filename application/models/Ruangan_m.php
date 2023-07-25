<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ruangan_m extends CI_Model
{

    var $table = 'tbruangan'; //nama tabel dari database
    var $column_order = array(null, 'id_ruangan', 'ruangan', 'id_kampus'); //field yang ada di table user
    var $column_search = array('ruangan', 'id_kampus'); //field yang diizin untuk pencarian 
    var $order = array('id_ruangan' => 'asc'); // default order 


    private function _get_datatables_query()
    {

        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    public function get()
    {
        return $this->db->get('tbruangan')->result_array();
    }

    public function simpandata($data)
    {
        $this->db->insert('tbruangan', $data);
    }

    public function getId($id)
    {
        $this->db->where('id_ruangan', $id);
        return $this->db->get('tbruangan')->result_array();
    }

    public function edit_data($data, $id)
    {
        $this->db->where('id_ruangan', $id);
        $this->db->update('tbruangan', $data);
    }

    public function delete_data($id)
    {
        $this->db->where('id_ruangan', $id);
        $this->db->delete('tbruangan');
    }

    public function ruangan1()
    {
        $this->db->from('tbruangan');
        $this->db->where('id_kampus', 1);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function ruangan2()
    {
        $this->db->from('tbruangan');
        $this->db->where('id_kampus', 2);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function ruanganupdate($id, $ruangan, $kampus, $status)
    {
        $this->db->where('id_ruangan', $id);
        $this->db->set('ruangan', $ruangan);
        $this->db->set('id_kampus', $kampus);
        $this->db->set('status', $status);
        $this->db->update('tbruangan');
    }

    public function ambilupdate($id)
    {
        $this->db->where('id_ruangan', $id);
        $query = $this->db->get('tbruangan');
        return $query->result();
    }

    public function ambilket($id)
    {
        $this->db->select('tbpinjam.id_pinjam, tbpinjam.nama, tbpinjam.id_kampus, tbpinjam.tgl1, tbpinjam.tgl2, tbpinjam.mulai, tbpinjam.selesai, tbruangan.ruangan');
        $this->db->from('tbpinjam');
        $this->db->where('tbruangan.id_ruangan', $id);
        $this->db->where('tbruangan.id_kampus', 1);
        $this->db->join('tbruangan', 'tbruangan.id_ruangan = tbpinjam.id_ruangan');
        $query = $this->db->get();
        return $query->result();
    }

    public function ambilket2($id)
    {
        $this->db->select('tbpinjam.id_pinjam, tbpinjam.nama, tbpinjam.id_kampus, tbpinjam.tgl1, tbpinjam.tgl2, tbpinjam.mulai, tbpinjam.selesai, tbruangan.ruangan');
        $this->db->from('tbpinjam');
        $this->db->where('tbruangan.id_ruangan', $id);
        $this->db->where('tbruangan.id_kampus', 2);
        $this->db->join('tbruangan', 'tbruangan.id_ruangan = tbpinjam.id_ruangan');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_data($kampus, $ruangan)
    {
        $this->db->where('ruangan', $ruangan);
        $this->db->where('id_kampus', $kampus);

        return $this->db->get('tbruangan')->result_array();
    }
}

/* End of file Ruangan_m.php */
