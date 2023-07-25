<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <link rel="stylesheet" href="<?= base_url('assets') ?>/bootstrap/css/bootstrap.min.css">

    <style>
        .center {
            margin-left: 10px;
            margin-right: 10px;
        }

        /* table,
        tr,
        td,
        th,
        tbody,
        thead {
            page-break-inside: auto !important;
        } */
    </style>

</head>

<body>

    <table border="1">
        <tr>
            <td rowspan="5" width="40px"><img src="assets/img/sttb.png" alt=""></td>
            <td align="center" rowspan="4" width="400px">
                <p style="font-family: Times New Roman, Times, serif; font-size: 12pt; font-weight: bold;">SEKOLAH TINGGI TEKNOLOGI BANDUNG</SEKOLAH>
                </p>
                <!-- <p style="font-family: Times New Roman, Times, serif; font-size: 9pt;"><b>Jl. Soekarno-Hatta No.378, Bandung 40235 <br>
                        (022) 6224000, info@sttbandung.ac.id</b></p> -->
            </td>
            <td width="11%">
                <p style="font-family: Times New Roman, Times, serif; font-size: 12pt; font-weight: bold;">&nbsp;Kode</p>
            </td>
            <td class="align-center" width="2%">&nbsp;:</td>
            <td width="25%">
                <p style="font-size: 12pt;">&nbsp; FM/ASET/08/008/STTB</p>
            </td>
        <tr>
            <td>
                <p style="font-family: Times New Roman, Times, serif; font-size: 12pt; font-weight: bold;">&nbsp;Tanggal</p>
            </td>
            <td class="align-center" width="2%">&nbsp;:</td>
            <td width="25%">&nbsp; <?= date('d-m-Y'); ?></td>
        </tr>
        <tr>
            <td>
                <p style="font-family: Times New Roman, Times, serif; font-size: 12pt; font-weight: bold;">&nbsp;Revisi</p>
            </td>
            <td class="align-center" width="2%">&nbsp;:</td>
            <td width="25%"></td>
        </tr>
        <tr>
            <td rowspan="2">
                <p style="font-family: Times New Roman, Times, serif; font-size: 12pt; font-weight: bold;">&nbsp;Halaman</p>
            </td>
            <td rowspan="2" class="align-center" width="2%">&nbsp;:</td>
            <td rowspan="2" width="25%"></td>
        </tr>
        <tr>
            <td align="center">
                <p style="font-family: Times New Roman, Times, serif; font-size: 12pt; font-weight: bold;">FORM PEMINJAMAN <br> RUANGAN</p>
            </td>

        </tr>
        </tr>
    </table>
    <br>

    <p style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;">Kepada Yth, <br>
        Kepada Bagian Koordinator Aset dan Wakil Ketua 2<br>
        Di <br>
        Tempat
    </p>
    <br>

    <?php foreach ($tampil as $data) : ?>
    <?php endforeach; ?>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Berikut ini adalah rincian rekap data peminjaman ruangan selama periode tanggal <?= tanggal_helper(date('Y-m-d', strtotime($this->input->post('tgl1')))); ?>, sampai dengan tanggal <?= tanggal_helper(date('Y-m-d', strtotime($this->input->post('tgl2')))); ?>.</p>

    <table border="1" style="page-break-inside: avoid;">
        <thead>
            <tr>
                <th class="text-center" style=" font-size: 11pt;">No</th>

                <th class="text-center" style=" font-size: 11pt;">Ruangan</th>
                <th class="text-center" style=" font-size: 11pt;">Kampus</th>
                <th class="text-center" style=" font-size: 11pt;">Kegiatan</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($tampil as $row) : ?>
                <tr>
                    <td width="3%" ; class="text-center" style=" font-size: 11pt;"><?= $i++; ?></td>

                    <td width="10%" ; class="text-center" style=" font-size: 11pt;"><?= $row['ruangan']; ?></td>
                    <td width="10%" ; class="text-center" style=" font-size: 11pt;"><?= $row['kampus']; ?></td>
                    <td width="10%" ; class="text-center" style=" font-size: 11pt;"><?= $row['keperluan']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br>

    <p align="justify" ; style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;">Demikian surat rekap data peminjaman ruangan ini disampaikan atas segala kekurangannya, saya ucapkan terimakasih.</p>

    <br><br>
    <p align="right" style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;">Bandung, <?= tanggal_helper(date('Y-m-d')); ?></p>

    <?php
    $qrCode = new Endroid\QrCode\QrCode('Akademik');
    $qrCode->writeFile('assets/qrcode_img/Syifa Nur Fauziah.png');
    ?>

    <table border="0" width="680px" class="text-center">
        <tr>
            <td style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;">&nbsp;</td>
            <td style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;">Mengetahui,</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td width="25%"><img src="<?= base_url('assets/qrcode_img/Syifa Nur Fauziah.png') ?>" style="width: 100px;"></td>
        </tr>
        <tr>
            <td class="text-center"></td>
            <td>(Bag. Akademik)</td>
        </tr>
    </table>


</body>

</html>