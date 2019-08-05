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
            <th rowspan='3'>NO.</th>
            <th rowspan='3'>TEMUAN</th>
            <th rowspan='3'>REKOMENDASI</th>
            <th colspan='3'>STATUS TAHUN</th>
            <th rowspan='3'>TINDAK LANJUT</th>
            <th colspan='3'>STATUS TAHUN</th>
            <th rowspan='3'>CATATAN BPK</th>
        </tr>
        <tr>
            <td colspan='3'>
                <center>
                <?php if(isset($data['fetch']['ptl']['tgl_status_rekomendasi'])) echo date('d-m-Y', strtotime($data['fetch']['ptl']['tgl_status_rekomendasi'])); ?>
                </center>    
            </td>
            
            <td colspan='3'>
                <center>
                <?php if(isset($data['fetch']['ptl']['tgl_status_tindak_lanjut'])) echo date('d-m-Y', strtotime($data['fetch']['ptl']['tgl_status_tindak_lanjut'])); ?>
                </center>    
            </td>
        </tr>
        <tr>
            <th>TS</th>
            <th>TB </th>
            <th>TT</th>
            <th>TS</th>
            <th>TB </th>
            <th>TT</th>
        </tr>
        <!-- <tr>
            <th></th>
            <th>SPI</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr> -->
        <!-- End of Table Header -->
        <!-- Table Contents -->
        <?php
            // foreach($data)
        ?>
        <!-- End of Table Contents -->
    </table>
    <div id='footer-laporan'></div>
</body>

</html>