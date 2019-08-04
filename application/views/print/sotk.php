<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIAP PRINT: SOTK</title>
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
        JUMLAH LEMBAGA/SOTK<br/>
        <?php echo $data['nama_opd']; ?><br/>
    </h2></center>
    </div>
    <table style='width: 100%;'>
        <!-- Table header -->
        <tr>
            <th >No.</th>
            <th >OPD</th>
            <th >BESARAN</th>
        </tr>
        <!-- End of Table Header -->
        <!-- Table Contents -->
        <?php
         $counter = 0;
         foreach($data['fetch']['sotkopd'] as $sotkopd){ 
             
             $counter += 1;
             echo "
                 <tr>
                     <td ><center>$counter</center></td>
                     <td >". ucwords($sotkopd['nama_opd'])."</center></td>
                     <td><center>$sotkopd[besaran]</center></td>
                 </tr>
             ";

         }  
        ?>
        <!-- End of Table Contents -->
    </table>
    <div id='footer-laporan'></div>
</body>
</html>
