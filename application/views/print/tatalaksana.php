<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIAP PRINT: Tatalaksana</title>
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
        LAPORAN HASIL PENGAMATAN TATALAKSANA<br/>
        <?php echo $data['nama_opd']; ?><br/>
    </h2></center>
    </div>
    <table style='width: 100%;'>
        <!-- Table header -->
        <tr>
            <th >No.</th>
            <th >Nama Perangkat Daerah</th>
            <th >Nilai Peserta Uji Kompetensi Ketatalaksanaan</th>
            <th >Nilai Hasil Uji Kompetensi x 40%</th>
            <th >SOP</th>
            <th >Tata Naskah Dinas</th>
            <th >Pakaian Dinas</th>
            <th >Hari dan Jam Kerja</th>
            <th >Nilai Penilaian Lapangan x 60%</th>
            <th >Jumlah Nilai</th>
            <th >Ket</th>
        </tr>
        <!-- End of Table Header -->
        <!-- Table Contents -->
        <?php
            $counter = 0;
            foreach($data['fetch']['prog'] as $prog){ 
                $prog_rowspan = sizeof($data['fetch']['kg'][$prog['kode_program']])+1;
                $counter += 1;
                echo "
                    <tr>
                        <td rowspan='$prog_rowspan'>$counter</td>
                        <td rowspan='$prog_rowspan'>". ucwords($prog['nama_program'])."</td>
                        <td></td>
                        <td>". $prog['capaian_indikator'] . "</td>
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
                foreach($data['fetch']['kg'][$prog['kode_program']] as $kg){
                    echo "
                        <tr>
                            <td>". ucwords($kg['nama_kegiatan']). "</td>
                            <td><strong><u>Output:</u></strong> ".ucwords($kg['keluaran_indikator'])."
                                <br/><br/>
                                <strong><u>Outcome:</u></strong> ". ucwords($kg['hasil_indikator'])."</td>
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
