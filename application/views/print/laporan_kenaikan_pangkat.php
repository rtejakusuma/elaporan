<?php include "header.php"; ?>

<body>
    <div id='header-laporan'>
        <center>
            <h2>
                LAPORAN KENAIKAN PANGKAT<br />
                TAHUN <?php echo date('Y', strtotime($data['fetch']['laporan_kenaikan_pangkat']['tgl'])); ?> DI LINGKUNGAN PEMERINTAH KOTA MADIUN<br />
                <?php echo $data['nama_opd']; ?><br />
            </h2>
        </center>
    </div>
    <table style='width: 100%;'>
        <!-- Table header -->
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Jabatan</th>
            <th>Instansi</th>
            <th>NILAI TAHUN <?php echo date('Y', strtotime($data['fetch']['ikm']['tgl'])); ?> </th>
        </tr>
        <!-- End of Table Header -->
        <!-- Table Contents -->
        <?php
        $counter = 0;
        foreach ($data['fetch']['lkpopd'] as $lkp) {

            $counter += 1;
            echo "
                 <tr>
                     <td ><center>$counter</center></td>
                     <td >" . ucwords($lkp['nama_opd']) . "</center></td>
                     <td><center>$laporan_kenaikan_pangkat[nama]</center></td>
                     <td><center>$laporan_kenaikan_pangkat[NIP]</center></td>
                     <td><center>$laporan_kenaikan_pangkat[Jabatan]</center></td>
                     <td><center>$laporan_kenaikan_pangkat[Instansi]</center></td>
                 </tr>
             ";
        }
        ?>
        <!-- End of Table Contents -->
    </table>
    <div id='footer-laporan'></div>
</body>

</html>