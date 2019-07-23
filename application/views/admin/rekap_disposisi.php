<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><?= $data['title'] ?></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. Surat</th>
                        <th>Tgl. Masuk</th>
                        <th>No. Agenda</th>
                        <th>Perihal</th>
                        <th>Kepada</th>
                        <th>Isi</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                    $no = 0;
                    foreach ($data['rawdata'] as $row) {
                        $no++;
                        ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row['no_surat'] ?></td>
                            <td><?= $row['tgl_masuk'] ?></td>
                            <td><?= $row['no_agenda'] ?></td>
                            <td><?= $row['perihal'] ?></td>
                            <td><?= $row['diteruskan'] ?></td>
                            <td><?= $row['isi'] ?></td>
                            <td></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>