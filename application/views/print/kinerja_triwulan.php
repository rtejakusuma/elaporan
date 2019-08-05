<?php include "header.php"; ?>

<body>
    <div id='header-laporan'>
        <center>
            <h2>
                LAPORAN KINERJA TRIWULAN<br />
                <?php echo $data['nama_opd']; ?><br />
            </h2>
        </center>
    </div>
    <table style='width: 100%;'>
        <!-- Table header -->
        <tr>
            <th rowspan='2'>No.</th>
            <th colspan='4'>Sasaran Kegiatan</th>
            <th rowspan='2'>Program</th>
            <th rowspan='2'>Anggaran</th>
            <th rowspan='2'>Realisasi</th>
        </tr>
        <tr>
            <th>Uraian</th>
            <th>Indikator Kinerja</th>
            <th>Target</th>
            <th>Realisasi</th>
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
        </tr>
        <!-- End of Table Header -->
        <!-- Table Contents -->

        <!-- End of Table Contents -->
    </table>
    <div id='footer-laporan'></div>
</body>

</html>