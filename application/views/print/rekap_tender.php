<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIAP PRINT: Rekap Tender</title>
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
        LAPORAN REKAP TENDER<br/>
        <?php echo $data['nama_opd']; ?><br/>
    </h2></center>
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
            <th>2</th><th>3</th><th>4</th><th>5</th>
            <th>6</th><th>7</th><th>8</th><th>10</th>
        </tr>
        <!-- End of Table Header -->
        <!-- Table Contents -->
        <?php
        $counter = 0;
        
        foreach($data['fetch']['drt'] as $drt){ 

            echo "
                <tr>
                    <td><center>$drt[nama_paket_kerja]</center></td>
                    <td><center>$drt[pagu]</center></td>
                    <td><center>$drt[nilai_hps]</center></td>
                    <td><center>$drt[pemenang]</center></td>
                    <td><center>$drt[harga_kontrak]</center></td>
                    <td><center>$drt[presentase_kontrak_thd_hps]</center></td>
                    <td >". ucwords($drt['nama_opd'])."</center></td>
                    <td><center>$drt[ket]</center></td>

                </tr>
            ";
        }
        ?>
        <!-- End of Table Contents -->
    </table>
    <div id='footer-laporan'></div>
</body>
</html>
