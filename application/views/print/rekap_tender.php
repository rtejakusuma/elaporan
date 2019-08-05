<?php include "header.php"; ?>

<body>
    <div id='header-laporan'>
        <center>
            <h2>
                LAPORAN REKAP TENDER<br />
                <?php echo $data['nama_opd']; ?><br />
            </h2>
        </center>
    </div>
    <table style='width: 100%;'>
        <!-- Table header -->
        <tr>
            <th>Paket Pekerjaan</th>
            <th>Nilai Pagu</th>
            <th>Nilai HPS</th>
            <th>Pemenang</th>
            <th>Harga Kontrak</th>
            <th>Prosentase Harga Kontrak terhadap HPS</th>
            <th>OPD</th>
            <th>Ket</th>
        </tr>
        <tr>
            <th>2</th>
            <th>3</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th>8</th>
            <th>10</th>
        </tr>
        <!-- End of Table Header -->
        <!-- Table Contents -->
        <?php
        $counter = 0;
        foreach ($data['fetch']['prog'] as $prog) {
            $prog_rowspan = sizeof($data['fetch']['kg'][$prog['kode_program']]) + 1;
            $counter += 1;
            echo "
                <tr>
                    <td rowspan='$prog_rowspan'>$counter</td>
                    <td rowspan='$prog_rowspan'>" . ucwords($prog['nama_program']) . "</td>
                    <td></td>
                    <td>" . $prog['capaian_indikator'] . "</td>
                    <td>$prog[capaian_satuan]</td>
                    <td>target???</td>
                    <td>realisasi???</td>
                    <td>persen???</td>
                    <td>anggaran???</td>
                    <td>realisasi???</td>
                    <td>persen???</td>
                    <td rowspan='$prog_rowspan'></td>
                </tr>
            ";
            foreach ($data['fetch']['kg'][$prog['kode_program']] as $kg) {
                echo "
                    <tr>
                        <td>" . ucwords($kg['nama_kegiatan']) . "</td>
                        <td><strong><u>Output:</u></strong> " . ucwords($kg['keluaran_indikator']) . "
                            <br/><br/>
                            <strong><u>Outcome:</u></strong> " . ucwords($kg['hasil_indikator']) . "</td>
                        <td>$kg[keluaran_satuan]</td>
                        <td>target???</td>
                        <td>realisasi???</td>
                        <td>persen???</td>
                        <td>anggaran???</td>
                        <td>realisasi???</td>
                        <td>persen???</td>
                    </tr>
                ";
            }
        }
        ?>
        <!-- End of Table Contents -->
    </table>
    <div id='footer-laporan'></div>
</body>

</html>