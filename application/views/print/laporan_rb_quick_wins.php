<?php include "header.php"; ?>

<body>
    <div id='header-laporan'>
        <center>
            <h2>
                Laporan Capaian Rencana Aksi Reformasi Birokrasi Pemerintah Daerah Kota Daerah Madiun per (tanggal) pada Prioritas yang Terkait dengan Peningkatan Kualitas Pelayanan Fokus Pelayanan Quick Wins<br />
                <?php echo $data['nama_opd']; ?><br />
            </h2>
        </center>
    </div>
    <table style='width: 100%;'>
        <!-- Table header -->
        <tr>
            <th rowspan='2'>NO</th>
            <th rowspan='2'>QUICK WINS</th>
            <th rowspan='2'>SASARAN</th>
            <th rowspan='2'>PROGRAM</th>
            <th rowspan='2'>KEGIATAN</th>
            <th rowspan='2'>INDIKATOR</th>
            <th colspan='2'>OUTPUT</th>
            <th colspan='2'>BULAN KE-</th>
            <th colspan='2'>ANGGARAN</th>
            <th colspan='2'>STATUS CAPAIAN (V)</th>
            <th rowspan='2'>ALASAN TIDAK TERCAPAI</th>
            
        </tr>
        <tr>
            <th>TARGET</th>
            <th>REALISASI</th>
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
            <th>12</th>
            <th>13</th>
            <th>14</th>
            <th>15</th>
        </tr>
        <!-- End of Table Header -->
        <!-- Table Contents -->
        <?php
        $counter = 0;
        foreach ($data['fetch']['rbqw'] as $rbqw) {
            $rowspan_rincian = 0;
            
            foreach($data['fetch']['rbqws'][$rbqw['id_rb_quick_wins']] as $rbqws){
                $rowspan_rincian += sizeof($data['fetch']['rbqwk'][$rbqws['id_rb_quick_wins_sasaran']]);
            }
            // var_dump($rowspan); die();
            $firstrow_sasaran = reset($data['fetch']['rbqws'][$rbqw['id_rb_quick_wins']]);
            $rowspan_sasaran = sizeof($data['fetch']['rbqwk'][$firstrow_sasaran['id_rb_quick_wins_sasaran']]);
            $firstrow_kegiatan = reset($data['fetch']['rbqwk'][$firstrow_sasaran['id_rb_quick_wins_sasaran']]);
            $counter += 1;
            echo "
                 <tr>
                     <td rowspan='$rowspan_rincian'><center>$counter</center></td>
                     <td rowspan='$rowspan_rincian'><center>$rbqw[rincian]</center></td>
                     <td rowspan='$rowspan_sasaran'><center>$firstrow_sasaran[sasaran]</center></td>
                     <td rowspan='$rowspan_sasaran'><center>$firstrow_sasaran[nama_program]</center></td>
                     <td><center>$firstrow_kegiatan[nama_kegiatan]</center></td>
                     <td><center>$firstrow_kegiatan[indikator]</center></td>
                     <td><center>$firstrow_kegiatan[target_output]</center></td>
                     <td><center>$firstrow_kegiatan[realisasi_output]</center></td>
                     <td><center>$firstrow_kegiatan[target_waktu]</center></td>
                     <td><center>$firstrow_kegiatan[realisasi_waktu]</center></td>
                     <td><center>$firstrow_kegiatan[target_anggaran]</center></td>
                     <td><center>$firstrow_kegiatan[realisasi_anggaran]</center></td>
                     <td><center>$firstrow_kegiatan[capaian]</center></td>
                     <td><center>$firstrow_kegiatan[ket]</center></td>
                </tr>
            ";

            foreach($data['fetch']['rbqws'][$rbqw['id_rb_quick_wins']] as $rbqws){
                $rowspan_sasaran = sizeof($data['fetch']['rbqwk'][$rbqws['id_rb_quick_wins_sasaran']]);

            }
            
        }
        ?>
        <!-- End of Table Contents -->
    </table>
    <div id='footer-laporan'></div>
</body>

</html>