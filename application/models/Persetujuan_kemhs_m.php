<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persetujuan_kemhs_m extends CI_Model
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
}

/* End of file ModelName.php */
