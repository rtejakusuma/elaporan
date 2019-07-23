<div class="page-title">
    <div class="title_left">
        <h3>Lampiran Disposisi</h3>
    </div>
</div>
<div class="clearfix"></div>
<?php foreach ($data['rawdata'] as $row) {
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel collapsed">
                <div class="x_title">
                    <h2><?= ucwords($row['nama_opd']) . ' Nomor Surat ' . $row['no_surat'] ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <a href="#" class="btn btn-success"><i class="fa fa-camera"></i> Tambah Lampiran</a>
                        <a href="#" class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        <a href="#" class="close-link"><i class="fa fa-close"></i></a>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <div class="row">
                        <p> PDF Lampiran </p>
                        <ul>
                            <li>a</li>
                            <li>b</li>
                            <li>c</li>
                        </ul>
                    </div>
                    <hr>
                    <div class="row">
                        <p> Foto Lampiran </p>
                        <div class="col-md-55">
                            <div class="thumbnail">
                                <div class="image view view-first" style="height:100%;">
                                    <img style="width: 100%; display: block;" src="<?= base_url('assets/production/') ?>images/user.png" alt="image" onclick="window.open('<?= base_url('assets/production/') ?>images/user.png', ' _blank');" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-55">
                            <div class="thumbnail">
                                <div class="image view view-first" style="height:100%;">
                                    <img style="width: 100%; display: block;" src="<?= base_url('assets/production/') ?>images/user.png" alt="image" onclick="window.open('<?= base_url('assets/production/') ?>images/user.png', ' _blank');" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-55">
                            <div class="thumbnail">
                                <div class="image view view-first" style="height:100%;">
                                    <img style="width: 100%; display: block;" src="<?= base_url('assets/production/') ?>images/user.png" alt="image" onclick="window.open('<?= base_url('assets/production/') ?>images/user.png', ' _blank');" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-55">
                            <div class="thumbnail">
                                <div class="image view view-first" style="height:100%;">
                                    <img style="width: 100%; display: block;" src="<?= base_url('assets/production/') ?>images/user.png" alt="image" onclick="window.open('<?= base_url('assets/production/') ?>images/user.png', ' _blank');" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-55">
                            <div class="thumbnail">
                                <div class="image view view-first" style="height:100%;">
                                    <img style="width: 100%; display: block;" src="<?= base_url('assets/production/') ?>images/user.png" alt="image" onclick="window.open('<?= base_url('assets/production/') ?>images/user.png', ' _blank');" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-55">
                            <div class="thumbnail">
                                <div class="image view view-first" style="height:100%;">
                                    <img style="width: 100%; display: block;" src="<?= base_url('assets/production/') ?>images/user.png" alt="image" onclick="window.open('<?= base_url('assets/production/') ?>images/user.png', ' _blank');" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-55">
                            <div class="thumbnail">
                                <div class="image view view-first" style="height:100%;">
                                    <img style="width: 100%; display: block;" src="<?= base_url('assets/production/') ?>images/user.png" alt="image" onclick="window.open('<?= base_url('assets/production/') ?>images/user.png', ' _blank');" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-55">
                            <div class="thumbnail">
                                <div class="image view view-first" style="height:100%;">
                                    <img style="width: 100%; display: block;" src="<?= base_url('assets/production/') ?>images/user.png" alt="image" onclick="window.open('<?= base_url('assets/production/') ?>images/user.png', ' _blank');" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>