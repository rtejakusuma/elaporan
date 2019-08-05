<?php include "header.php"; ?>

<body>
    <div id='header-laporan'>
        <center>
            <h2>
                INVENTARISASI DATA PERMASALAHAN KELEMBAGAAN PADA SKPD DI LINGKUNGAN PEMERINTAH MADIUN<br />
                <?php echo $data['nama_opd']; ?><br />
            </h2>
        </center>
    </div>
    <table style='width: 100%;'>
        <!-- Table header -->
        <tr>
            <th>NO.</th>
            <th>Nama Perangkat Daerah</th>
            <th>Permasalahan Kelembagaan</th>
            <th>Dasar Hukum/Dasar Pertimbangan</th>
            <th>Usulan</th>
            <th>Keterangan</th>
        </tr>

        <!-- End of Table Header -->
        <!-- Table Contents -->
        <?php
        $counter = 0;
        foreach ($data['fetch']['pk'] as $pk) {
            $counter += 1;
            echo "
                <tr>
                    <td><center>$counter</center></td>
                    <td>" . ucwords($pk['nama_opd']) . "</td>
                    <td><center>$pk[permasalahan_kelembagaan]</center></td>
                    <td><center>$pk[dasar_hukum]</center></td>
                    <td><center>$pk[usulan]</center></td>
                    <td><center>$pk[ket]</center></td>
                </tr>
            ";
        }
        ?>
        <!-- End of Table Contents -->
    </table>
    <div id='footer-laporan'></div>
</body>

</html>