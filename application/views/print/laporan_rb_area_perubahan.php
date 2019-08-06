<?php include "header.php"; ?>

<body>
    <div id='header-laporan'>
        <center>
            <h2>
                Laporan Rencana Aksi Reformasi Birokrasi Pemerintah Daerah Tahun <?php echo date('Y', strtotime($data['fetch']['ikm']['tgl'])); ?> pada Delapan Area Perubahan (???)<br />
                <?php echo $data['nama_opd']; ?><br />
            </h2>
        </center>
    </div>
    <table style='width: 100%;'>
        <!-- Table header -->
        <tr>
            <th rowspan='2'>NO</th>
            <th rowspan='2'>AREA PERUBAHAN</th>
            <th rowspan='2'>PROGRAM</th>
            <th rowspan='2'>KEGIATAN</th>
            <th colspan='2'>PERIODE PELAKSANA</th>
            <th colspan='2'>ANGGARAN (Rp. 000.000)</th>
            <th colspan='2'>STATUS CAPAIAN (V)</th>
            <th rowspan='2'>ALASAN TIDAK TERCAPAI</th>
            
        </tr>
        <tr>
            <th>TARGET</th>
            <th>REALISASI</th>
            <th>TARGET</th>
            <th>REALISASI</th>
            <th>TERCAPAI</th>
            <th>TIDAK TERCAPAI</th>
        </tr>
        <tr>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th>8</th>
            <th>9</th>
            <th>10</th>
            <th>11</th>
        </tr>
        <!-- End of Table Header -->
        <!-- Table Contents -->
        <?php
        // $counter = 0;
        // foreach ($data['fetch']['ikmopd'] as $ikm) {

        //     $counter += 1;
        //     echo "
        //          <tr>
        //              <td ><center>$counter</center></td>
        //              <td >" . ucwords($ikm['nama_opd']) . "</center></td>
        //              <td><center>$ikm[nilai]</center></td>
        //              <td><center>$ikm[predikat]</center></td>
        //          </tr>
        //      ";
        // }
        ?>
        <!-- End of Table Contents -->
    </table>
    <div id='footer-laporan'></div>
</body>

</html>