<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title><?= $title; ?></title>
</head>

<body>
    <table border="1">
        <tr>
            <td rowspan="5" width="40px"><img src="assets/img/sttb.png" alt=""></td>
            <td align="center" rowspan="4" width="300px">
                <p style="font-family: Times New Roman, Times, serif; font-size: 12pt; font-weight: bold;">SEKOLAH TINGGI TEKNOLOGI <br>
                    BANDUNG</SEKOLAH>
                </p>
                <p style="font-family: Times New Roman, Times, serif; font-size: 9pt;"><b>Jl. Soekarno-Hatta No.378, Bandung 40235 <br>
                        (022) 6224000, info@sttbandung.ac.id</b></p>
            </td>
            <td width="15%">
                <p style="font-family: Times New Roman, Times, serif; font-size: 9pt;">&nbsp;No. Dok</p>
            </td>
            <td width="30%">&nbsp;:</td>
        <tr>
            <td>
                <p style="font-family: Times New Roman, Times, serif; font-size: 9pt;">&nbsp;No. Revisi</p>
            </td>
            <td>&nbsp;:</td>
        </tr>
        <tr>
            <td>
                <p style="font-family: Times New Roman, Times, serif; font-size: 9pt;">&nbsp;Tanggal Berlaku</p>
            </td>
            <td>&nbsp;:</td>
        </tr>
        <tr>
            <td rowspan="2">
                <p style="font-family: Times New Roman, Times, serif; font-size: 9pt;">&nbsp;Hal</p>
            </td>
            <td rowspan="2">&nbsp;:</td>
        </tr>
        <tr>
            <td align="center">
                <p style="font-family: Times New Roman, Times, serif; font-size: 12pt; font-weight: bold;">PERMOHONAN PENGGUNAAN <br>
                    FASILITAS RUANGAN</p>
            </td>
        </tr>
    </table>

    <br>
    <p style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;">Kepada Yth, <br>
        Kepada Bagian Akademik <br>
        Di <br>
        Tempat
    </p>

    <p style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;">Yang bertanda tangan di bawah ini:</p>

    <table border="0">
        <tr>
            <?php $i = 1;
            foreach ($tampil as $row) : ?>
                <td style="padding-left: 45px; font-family: Arial, Helvetica, sans-serif; font-size: 11pt;">
                    NIM
                </td>
                <td style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;">&nbsp; : &nbsp;<?= $row['username']; ?></td>
        </tr>
        <tr>
            <td style="padding-left: 45px; font-family: Arial, Helvetica, sans-serif; font-size: 11pt;">Nama</td>
            <td style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;">&nbsp; : &nbsp;<?= $row['nama']; ?></td>
        </tr>
        <tr>
            <td style="padding-left: 45px; font-family: Arial, Helvetica, sans-serif; font-size: 11pt;">Organisasi</td>
            <td style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;">&nbsp; : &nbsp;<?= $row['organisasi']; ?></td>
        </tr>

    </table> <br>

    <p style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;">Bermaksud untuk mengajukan permohonan penggunaan fasilitas ruangan sebagai berikut:</p>

    <table border="1" class="center">
        <tr>
            <th class="text-center" style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;">No</th>
            <th class="text-center" style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;">Ruangan</th>
            <th class="text-center" style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;">Kampus</th>
            <th class="text-center" style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;">Kelas</th>
            <th class="text-center" style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;">Jurusan</th>
            <th class="text-center" style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;">Tanggal</th>
            <th class="text-center" style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;">Mulai</th>
            <th class="text-center" style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;">Selesai</th>
            <th class="text-center" style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;">Keperluan</th>
        </tr>
        <tr>
            <td width="5%" class="text-center" style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;"><?= $i++; ?></td>
            <td width="15%" class="text-center" style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;"><?= $row['ruangan']; ?></td>
            <td width="10%" class="text-center" style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;"><?= $row['kampus']; ?></td>
            <td width="15%" class="text-center" style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;"><?= $row['kelas']; ?></td>
            <td width="15%" class="text-center" style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;"><?= $row['jurusan']; ?></td>
            <td width="15%" class="text-center" style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;"><?= date('d-m-Y', strtotime($row['tgl'])); ?></td>
            <td width="10%" class="text-center" style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;"><?= $row['mulai']; ?></td>
            <td width="10%" class="text-center" style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;"><?= $row['selesai']; ?></td>
            <td width="20%" class="text-center" style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;"><?= $row['keperluan']; ?></td>
        <?php endforeach; ?>
        </tr>
    </table>

    <br>
    <p align="justify" ; style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;">Demikian daftar permohonan penggunaan fasilitas ruangan tersebut disampaikan. Saya akan menjaga fasilitas tersebut dan akan bertanggung jawab jika terjadi kerusakan atau kehilangan, atas kerjasamanya saya ucapkan terimakasih.</p>

    <br><br>
    <p align="right" style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;">Bandung, <?= tanggal_helper(date('Y-m-d', strtotime($row['tgl']))); ?></p>

    <?php
    $qrCode = new Endroid\QrCode\QrCode('Akademik');
    $qrCode->writeFile('assets/qrcode_img/Syifa Nur Fauziah.png');
    ?>

    <?php
    $qrCode = new Endroid\QrCode\QrCode('Kemahasiswaan');
    $qrCode->writeFile('assets/qrcode_img/Indra Julias Pradana.png');
    ?>

    <table border="0" width="680px">
        <tr>
            <td colspan="2" style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;">&nbsp;&nbsp;&nbsp;Menyetujui,</td>
            <td style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;" class="text-center">Pemohon</td>
        </tr>
        <tr>
            <td width="20%"><img src="<?= base_url('assets/qrcode_img/Syifa Nur Fauziah.png') ?>" style="width: 100px;"></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/qrcode_img/Indra Julias Pradana.png') ?>" style="width: 100px;"></td>
            <td width="25%"></td>
        </tr>
        <tr>
            <td rowspan="2">(Bag. Akademik)</td>
            <td>(Bag. Kemahasiswaan)</td>

            <td class="text-center">(<?= $row['nama'] ?>)</td>
        </tr>
    </table>
    <br>
    <br><br>
    <br>
    <p style="font-family: Arial, Helvetica, sans-serif; font-size: 11pt;">Tembusan <br>
        &nbsp;&nbsp;&nbsp;&nbsp;1. Security <br>
        &nbsp;&nbsp;&nbsp;&nbsp;2. Saran dan Prasarana
    </p>

</body>

</html>