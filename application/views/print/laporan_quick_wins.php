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
            $prog_rowspan = 2 * sizeof($data['fetch']['rbqwk'][$rbqw['kode_program']]) + 1;
            $counter += 1;
            echo "
                 <tr>
                     <td ><center>$counter</center></td>
                     <td><center>$rbqw[rincian]</center></td>";
            
            foreach ($data['fetch']['rbqws'] as $rbqws) {
                echo "
                    <td><center>$rbqws[sasaran]</center></td> 
                    <td><center>$rbqws[nama_program]</center></td>";
                
                foreach ($data['fetch']['rbqwk'] as $rbqwk) {
                    echo "
                        <td><center>$rbqwk[nama_kegiatan]</center></td> 
                        <td><center>$rbqwk[indikator]</center></td>
                        <td><center>$rbqwk[target_output]</center></td>
                        <td><center>$rbqwk[realisasi_output]</center></td>
                        <td><center>$rbqwk[target_Waktu]</center></td>
                        <td><center>$rbqwk[realisasi_waktu]</center></td>
                        <td><center>$rbqwk[target_anggaran]</center></td>
                        <td><center>$rbqwk[realisasi_anggaran]</center></td>
                        <td><center>$rbqwk[capaian]</center></td>
                        <td><center>$rbqwk[ket]</center></td>
                        </tr>
                        ";
                }
            }
        }
        ?>
        <!-- End of Table Contents -->
    </table>
    <div id='footer-laporan'></div>
</body>

</html>