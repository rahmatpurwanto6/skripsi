<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap2_m extends CI_Model {
    var $column_order = array(null, 'username'); //field yang ada di table user
    var $column_search = array('tbuser.username', 'tbrekap.nama', 'tbruangan.ruangan', 'tbkampus.kampus'); //field yang diizin untuk pencarian 
    var $order = array('id_rekap' => 'desc'); // default order 

    private function _get_datatables_query()
    {
        $this->db->select('tbrekap.*, tbuser.username, tbruangan.ruangan, tbkampus.kampus');
        $this->db->from('tbrekap');
        $this->db->where('tbkampus.kampus', 2);
        $this->db->join('tbpinjam', 'tbpinjam.id_pinjam = tbrekap.id_pinjam', 'LEFT');
        $this->db->join('tbuser', 'tbuser.id_user = tbrekap.id_user');
        $this->db->join('tbruangan', 'tbruangan.id_ruangan = tbrekap.id_ruangan');
        $this->db->join('tbkampus', 'tbkampus.id_kampus = tbrekap.id_kampus');


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
        $this->db->from('tbrekap');
        return $this->db->count_all_results();
    }
    

}

/* End of file ModelName.php */
