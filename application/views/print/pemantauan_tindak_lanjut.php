<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIAP PRINT: Kinerja Triwulan</title>
    <style>
        table, tr, td, th{
            border: 2px solid black;
            border-collapse: collapse;
            padding: 6px;
        }
    </style>
</head>
<body>
    <div id='header-laporan'>
    <center><h2>
        LAPORAN KINERJA TRIWULAN<br/>
        <?php echo $data['nama_opd']; ?><br/>
    </h2></center>
    </div>
    <table style='width: 100%;'>
        <!-- Table header -->
        <tr>
            <th rowspan='2'>NO.</th>
            <th rowspan='2'>TEMUAN</th>
            <th rowspan='2'>REKOMENDASI</th>
            <th colspan='3'>STATUS TAHUN</th>
            <th rowspan='2'>TINDAK LANJUT</th>
            <th colspan='3'>STATUS TAHUN</th>
            <th rowspan='2'>CATATAN BPK</th>
        </tr>
        <tr>
            <th>TS</th><th>TB </th><th>TT</th>
			<th>TS</th><th>TB </th><th>TT</th>
        </tr>
        <tr>
            <th></th><th>SPI</th><th></th><th></th>
			<th></th><th></th><th></th><th></th>
            <th></th><th></th><th></th><th></th>
        </tr>
        <!-- End of Table Header -->
        <!-- Table Contents -->
       
        <!-- End of Table Contents -->
    </table>
    <div id='footer-laporan'></div>
</body>
</html>
