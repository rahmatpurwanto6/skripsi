<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cron_m extends CI_Model
{

    public function getcron()
    {
        $this->db->select('tbpinjam.*, tbpinjam.id_ruangan as ruangpinjam, tbuser.username, tbruangan.id_ruangan as ruangan_id, tbruangan.ruangan, tbkampus.id_kampus, tbkampus.kampus');
        $this->db->from('tbpinjam');
        $this->db->order_by('tbpinjam.tgl1', 'ASC');
        $this->db->join('tbuser', 'tbuser.id_user = tbpinjam.id_user');
        $this->db->join('tbruangan', 'tbruangan.id_ruangan = tbpinjam.id_ruangan');
        $this->db->join('tbkampus', 'tbkampus.id_kampus = tbpinjam.id_kampus');

        $query = $this->db->get();
        return $query;
    }

    public function getupdateotomatis($id, $data)
    {
        $this->db->where('id_ruangan', $id);
        $this->db->update('tbruangan', $data);
    }

    public function gethapusotomatis($id)
    {
        $this->db->where('id_pinjam', $id);
        $this->db->delete('tbpinjam');
    }
}

/* End of file Cron_m.php */