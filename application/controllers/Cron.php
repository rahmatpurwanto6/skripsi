<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cron extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model(['Cron_m', 'Ruangan_m']);
    }

    public function index()
    {
        if (!$this->input->is_cli_request()) {
            echo 'Masih dalam percobaan' . PHP_EOL;
            return;
        }
    }

    public function loadwaktu()
    {
        date_default_timezone_set('Asia/Jakarta');

        $tgl_sekarang = date('Y-m-d');
        $waktu_sekarang = date('H:i:s');

        $cron = $this->Cron_m->getcron();

        if ($cron->num_rows() > 0) {
            $hasil = $cron->result_array();

            if ($hasil) {
                foreach ($hasil as $row) {

                    if ($tgl_sekarang == $row['tgl1'] and $tgl_sekarang == $row['tgl2'] and strtotime($waktu_sekarang) >= strtotime($row['mulai']) and strtotime($waktu_sekarang) <= strtotime($row['selesai']) and  $row['status'] == 1) {
                        $id = $row['id_ruangan'];
                        $data = ['status' => 1];

                        $result = $this->Cron_m->getupdateotomatis($id, $data);
                        echo json_encode($result);
                        echo 'berhasil di update';
                    } elseif ($tgl_sekarang == $row['tgl1'] and $tgl_sekarang == $row['tgl2'] and strtotime($waktu_sekarang) >= strtotime($row['mulai']) and strtotime($waktu_sekarang) >= strtotime($row['selesai']) and $row['status'] == 1) {
                        $id = $row['id_ruangan'];
                        $data = ['status' => 0];

                        $result = $this->Cron_m->getupdateotomatis($id, $data);
                        echo json_encode($result);
                    } else {
                        $id = $row['id_ruangan'];
                        $data = ['status' => 0];

                        $result = $this->Cron_m->getupdateotomatis($id, $data);
                        echo json_encode($result);
                    }
                }
            }
        }
    }

    // public function load_data()
    // {
    //     date_default_timezone_set('Asia/Jakarta');

    //     $tgl_sekarang = date('Y-m-d');
    //     $waktu_sekarang = date('H:i:s');

    //     $cron = $this->Cron_m->getcron();

    //     if ($cron->num_rows() > 0) {
    //         $hasil = $cron->result_array();

    //         if ($hasil) {
    //             foreach ($hasil as $row) {

    //                 if ($row['id_ruangan'] == 43 and $tgl_sekarang == $row['tgl1'] and $tgl_sekarang == $row['tgl2'] and strtotime($waktu_sekarang) >= strtotime($row['mulai']) and strtotime($waktu_sekarang) <= strtotime($row['selesai']) and $row['status'] == 1) {
    //                     $id = $row['id_ruangan'];
    //                     $data = ['status' => 1];

    //                     $result = $this->Cron_m->getupdateotomatis($id, $data);
    //                     echo json_encode($result);
    //                     echo 'berhasil di update';

    //                     $data2 = array(
    //                         array(
    //                             'id_ruangan' => '21',
    //                             'status' => 1
    //                         ),
    //                         array(
    //                             'id_ruangan' => '22',
    //                             'status' => 1
    //                         ),
    //                         array(
    //                             'id_ruangan' => '23',
    //                             'status' => 1
    //                         ),
    //                         array(
    //                             'id_ruangan' => '24',
    //                             'status' => 1
    //                         ),
    //                     );

    //                     $this->db->update_batch('tbruangan', $data2, 'id_ruangan');
    //                 } elseif ($tgl_sekarang == $row['tgl1'] and $tgl_sekarang == $row['tgl2'] and strtotime($waktu_sekarang) >= strtotime($row['mulai']) and strtotime($waktu_sekarang) <= strtotime($row['selesai']) and  $row['status'] == 1) {
    //                     $id = $row['id_ruangan'];
    //                     $data = ['status' => 1];

    //                     $result = $this->Cron_m->getupdateotomatis($id, $data);
    //                     echo json_encode($result);
    //                     echo 'berhasil di update';
    //                 } elseif ($row['id_ruangan'] == 43 and $tgl_sekarang == $row['tgl1'] and $tgl_sekarang == $row['tgl2'] and strtotime($waktu_sekarang) >= strtotime($row['mulai']) and strtotime($waktu_sekarang) >= strtotime($row['selesai']) and $row['status'] == 1) {
    //                     $id = $row['id_ruangan'];
    //                     $data = ['status' => 0];

    //                     $data2 = array(
    //                         array(
    //                             'id_ruangan' => '21',
    //                             'status' => 0
    //                         ),
    //                         array(
    //                             'id_ruangan' => '22',
    //                             'status' => 0
    //                         ),
    //                         array(
    //                             'id_ruangan' => '23',
    //                             'status' => 0
    //                         ),
    //                         array(
    //                             'id_ruangan' => '24',
    //                             'status' => 0
    //                         ),
    //                     );

    //                     $this->db->update_batch('tbruangan', $data2, 'id_ruangan');
    //                     $result = $this->Cron_m->getupdateotomatis($id, $data);
    //                     echo json_encode($result);
    //                 } else {
    //                     $id = $row['id_ruangan'];
    //                     $data = ['status' => 0];

    //                     $result = $this->Cron_m->getupdateotomatis($id, $data);
    //                     echo json_encode($result);
    //                 }
    //             }
    //         }
    //     }
    // }
}

/* End of file Cron.php */