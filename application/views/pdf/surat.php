<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title><?= $title; ?></title>

    <style>
        .garis {
            height: 0px;
            width: 90%;
            border-left: black 1px solid;
            color: black;
        }
    </style>

</head>

<body>
    <table border="1">
        <tr>
            <?php foreach ($tampil as $data) : ?>
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
            <td width="25%">&nbsp; <?= date('d-m-Y', strtotime($data['tgl1'])); ?> sd <?= date('d-m-Y', strtotime($data['tgl2'])); ?></td>
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
    <?php endforeach; ?>
    </tr>
    </table>

    <br>
    <p style="font-family: Times New Roman, Times, serif; font-size: 11pt;">Kepada<br>
        Yth, Koordinator Aset<br>
        Di Tempat
    </p>

    <p style="font-family: Times New Roman, Times, serif; font-size: 11pt;">Yang bertanda tangan di bawah ini:</p>
    <table border="0">
        <tr>
            <?php $i = 1;
            foreach ($tampil as $row) : ?>
                <td style="padding-left: 45px; font-family: Times New Roman, Times, serif; font-size: 11pt;">
                    Nama
                </td>
                <td style="font-family: Times New Roman, Times, serif; font-size: 11pt;">&nbsp; : &nbsp;<?= $row['nama']; ?></td>
        </tr>
        <tr>
            <td style="padding-left: 45px; font-family: Times New Roman, Times, serif; font-size: 11pt;">Jabatan</td>
            <td style="font-family: Times New Roman, Times, serif; font-size: 11pt;">&nbsp; : &nbsp;<?= $row['jabatan']; ?></td>
        </tr>
    </table>

    <p style="font-family: Times New Roman, Times, serif; font-size: 11pt;">Bermaksud untuk mengajukan permohonan penggunaan ruangan <?= $row['ruangan']; ?> Kampus <?= $row['kampus']; ?> Sekolah Tinggi Teknologi Bandung.</p>

    <table border="0">
        <tr>
            <td width="20%" style="font-family: Times New Roman, Times, serif; font-size: 11pt;">
                <p>Lama penggunaan</p>
            </td>
            <td style="font-family: Times New Roman, Times, serif; font-size: 11pt;">&nbsp; : &nbsp;<?= $row['mulai']; ?> sd <?= $row['selesai']; ?></td>
        </tr>
        <tr>
            <td style="font-family: Times New Roman, Times, serif; font-size: 11pt;">
                <p>Untuk keperluan</p>
            </td>
            <td style="font-family: Times New Roman, Times, serif; font-size: 11pt;">&nbsp; : &nbsp;<?= $row['keperluan']; ?></td>
        </tr>
    </table>

<?php endforeach; ?>

<br>
<p align="justify" ; style="font-family: Times New Roman, Times, serif; font-size: 11pt;">Demikian daftar permohonan penggunaan Ruangan <?= $row['ruangan']; ?> yang saya ajukan, atas kerjasamanya saya ucapkan terimakasih.</p>

<br><br>
<p align="right" style="font-family: Times New Roman, Times, serif; font-size: 11pt;">Bandung, <?= tanggal_helper(date('Y-m-d', strtotime($row['tgl_pengajuan']))); ?></p>

<?php
$qrCode = new Endroid\QrCode\QrCode('Akademik');
$qrCode->writeFile('assets/qrcode_img/Syifa Nur Fauziah.png');
?>

<?php
$qrCode = new Endroid\QrCode\QrCode('Kemahasiswaan');
$qrCode->writeFile('assets/qrcode_img/Indra Julias Pradana.png');
?>

<?php
$qrCode = new Endroid\QrCode\QrCode('Koordinator Aset');
$qrCode->writeFile('assets/qrcode_img/Yudi Guntara.png');
?>

<?php
$qrCode = new Endroid\QrCode\QrCode('Wakil Ketua 2');
$qrCode->writeFile('assets/qrcode_img/Agus Rahmat Hermawanto.png');
?>

<table border="0" width="680px">
    <tr>
        <td style="font-family: Times New Roman, Times, serif; font-size: 11pt;" colspan="4">Merekomendasikan,</td>
    </tr>
    <tr>
        <td align="center" style="font-family: Times New Roman, Times, serif; font-size: 11pt;" width="25%">Akademik</td>
        <td align="center" style="font-family: Times New Roman, Times, serif; font-size: 11pt;">Kemahasiswaan</td>
        <td width="25%"></td>
        <td align="center" style="font-family: Times New Roman, Times, serif; font-size: 11pt;">Pemohon,</td>
    </tr>

    <tr>
        <td align="center">
            <img src="<?= base_url('assets/qrcode_img/Syifa Nur Fauziah.png') ?>" style="width: 100px; align-content: center;">
            <br>
            <hr class="garis">
        </td>
        <td align="center">
            <img src="<?= base_url('assets/qrcode_img/Indra Julias Pradana.png') ?>" style="width: 100px;" class="center">
            <br>
            <hr class="garis">
        </td>
        <td></td>
        <td>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <hr class="garis">
        </td>
    </tr>
</table>

<br>

<table border="0" width="700px">
    <tr>
        <td align="center" style="font-family: Times New Roman, Times, serif; font-size: 11pt;">Menyetujui,</td>
        <td></td>
        <td></td>
        <td align="center" style="font-family: Times New Roman, Times, serif; font-size: 11pt;">Mengetahui,</td>
    </tr>
    <tr>
        <td align="center" width="20%" style="font-family: Times New Roman, Times, serif; font-size: 11pt;">Koordinator Aset</td>
        <td></td>
        <td width="40%"></td>
        <td align="center" style="font-family: Times New Roman, Times, serif; font-size: 11pt;">WK II Bidang Peng. Aset dan SDM</td>
    </tr>
    <tr>
        <td align="center"><img src="<?= base_url('assets/qrcode_img/Yudi Guntara.png') ?>" style="width: 100px;"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="center"><img src="<?= base_url('assets/qrcode_img/Agus Rahmat Hermawanto.png') ?>" style="width: 100px;"></td>
    </tr>
    <tr>
        <td align="center" style="font-family: Times New Roman, Times, serif; font-size: 11pt;">Yudi Guntara</td>
        <td></td>
        <td></td>
        <td align="center" style="font-family: Times New Roman, Times, serif; font-size: 11pt;">Agus Rahmat Hermawanto, S.H., M.M</td>
    </tr>
</table>
</body>

</html>