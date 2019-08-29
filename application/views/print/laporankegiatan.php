<?php include "header.php"; ?>

<body>
    <div id='header-laporan'>
        <center>
            <h2>
                LAPORAN KEGIATAN DAN ANGGARAN<br />
                TAHUN <?php echo date('Y', strtotime($data['fetch']['laporankegiatan']['tgl'])); ?> DI LINGKUNGAN PEMERINTAH KOTA MADIUN<br />
                <?php echo $data['nama_opd']; ?><br />
            </h2>
        </center>
    </div>
    <table style='width: 100%;'>
        <!-- Table header -->
        <tr>
            <th>No.</th>
            <th>NAMA OPD</th>
            <th>KODE REK </th>
            <th>PROGRAM</th>
            <th>URAIAN KEGIATAN</th>
            <th>PAGU ANGGARAN</th>
        </tr>
        <!-- End of Table Header -->
        <!-- Table Contents -->
        <?php
        $counter = 0;
        foreach ($data['fetch']['laporankegiatanopd'] as $laporankegiatan) {

            $counter += 1;
            echo "
                 <tr>
                     <td ><center>$counter</center></td>
                     <td >" . ucwords($laporankegiatan['nama_opd']) . "</center></td>
                     <td><center>$laporankegiatan[kode_rekening]</center></td>
                     <td><center>$laporankegiatan[program]</center></td>
                     <td><center>$laporankegiatan[uraian_kegiatan]</center></td>
                     <td><center>$laporankegiatan[pagu_anggaran]</center></td>
                 </tr>
             ";
        }
        ?>
        <!-- End of Table Contents -->
    </table>
    <div id='footer-laporan'></div>
</body>

</html>