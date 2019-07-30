 <!-- page content -->

 <div class="">
  <div class="page-title">
    <div class="title_left">
      <!-- <h3>Reset Password</h3> -->
    </div>

  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Realisasi Fisik</h2>
       
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <div class="clearfix"></div>

            <div class="">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">

                    <a href='<?php if(isset($data['id_laporan'])) echo base_url("opd/p/$data[formname]/$data[id_laporan]"); ?>' target='_blank'><button>PRINT</button></a>
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Realisasi Fisik</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Program</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Kegiatan</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url('admin/submit'); ?>' method="post">
                            <div class="form-group">
                            <label for="tgl" class="control-label col-md-3 col-sm-3 col-xs-12">Bulan & Tahun</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <!-- <input disabled id="tgl" class="form-control col-md-7 col-xs-12" type="date" name="tgl"> -->
                                <h3><?php echo date('M', time($data['fetch']['rf']['tgl'])) .", " . date('Y', time($data['fetch']['rf']['tgl'])); ?></h3>
                            </div>
                            </div>
                            <div class="ln_solid"></div>
                        </form>

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url("opd/e/$data[kode_tipe]/$data[id_laporan]"); ?>' method="post">
                            <input value="program" type="hidden" name="nama_tabel">
                            <?php foreach($data['fetch']['prog'] as $prog){ ?>
                            
                            <div class="form-group">
                            <label for="kode_program" class="control-label col-md-3 col-sm-3 col-xs-12">Kode Program</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value="<?php echo ucwords($prog['kode_program']); ?>" disabled class="form-control col-md-7 col-xs-12" type="text" name="kode_program[]" required="required">
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <label for="nama_program" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Program</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value="<?php echo ucwords($prog['nama_program']); ?>" disabled class="form-control col-md-7 col-xs-12" type="text" name="nama_program[]" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="capaian_indikator" class="control-label col-md-3 col-sm-3 col-xs-12">Indikator Capaian</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value="<?php echo ucwords($prog['capaian_indikator']); ?>" disabled class="form-control col-md-7 col-xs-12" type="text" name="capaian_indikator[]" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="capaian_target" class="control-label col-md-3 col-sm-3 col-xs-12">Target Capaian Kinerja (<?php echo $prog['capaian_satuan']; ?>)</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value="<?php echo ucwords($prog['capaian_target']); ?>" disabled class="form-control col-md-7 col-xs-12" type="number" name="capaian_target[]" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="capaian_realisasi_kinerja" class="control-label col-md-3 col-sm-3 col-xs-12">Realisasi Capaian Kinerja (<?php echo $prog['capaian_satuan']; ?>)</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value="<?php if(isset($prog['capaian_realisasi_kinerja']))echo ucwords($prog['capaian_realisasi_kinerja']); ?>" class="form-control col-md-7 col-xs-12" type="number" name="capaian_realisasi_kinerja[]">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="capaian_anggaran_keuangan" class="control-label col-md-3 col-sm-3 col-xs-12">Anggaran Capaian Keuangan</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value="<?php echo "urung ana field e";//ucwords($prog['capaian_target']); ?>" disabled class="form-control col-md-7 col-xs-12" type="number" name="capaian_anggaran_keuangan[]" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="capaian_realisasi_keuangan" class="control-label col-md-3 col-sm-3 col-xs-12">Realisasi Capaian Keuangan</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value="<?php if(isset($prog['capaian_realisasi_keuangan']))echo ucwords($prog['capaian_realisasi_keuangan']); ?>" class="form-control col-md-7 col-xs-12" type="number" name="capaian_realisasi_keuangan[]">
                            </div>
                            </div>
                            <?php echo "<br/><br/>";} ?>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                            </div>
                        </form>

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url("opd/e/$data[kode_tipe]/$data[id_laporan]"); ?>' method="post">
                            <input value="kegiatan" type="hidden" name="nama_tabel">
                            
                            
                            <div class="form-group">
                            <label for="pagu_renja" class="control-label col-md-3 col-sm-3 col-xs-12">Pagu Renja</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="pagu_renja" class="form-control col-md-7 col-xs-12" type="number" name="pagu_renja" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="pagu_rkpd" class="control-label col-md-3 col-sm-3 col-xs-12">Pagu RKPD</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="pagu_rkpd" class="form-control col-md-7 col-xs-12" type="number" name="pagu_rkpd" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="pagu_ppas_draft" class="control-label col-md-3 col-sm-3 col-xs-12">Pagu PPAS Draft</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="pagu_ppas_draft" class="form-control col-md-7 col-xs-12" type="number" name="pagu_ppas_draft" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="pagu_ppas_final" class="control-label col-md-3 col-sm-3 col-xs-12">Pagu PPAS Final</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="pagu_ppas_final" class="form-control col-md-7 col-xs-12" type="number" name="pagu_ppas_final" required="required">
                            </div>
                            </div>
                            <br/>
                            <div class="form-group">
                            <label for="keluaran_indikator" class="control-label col-md-3 col-sm-3 col-xs-12">Keluaran Indikator</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="keluaran_indikator" class="form-control col-md-7 col-xs-12" type="text" name="keluaran_indikator" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="keluaran_target" class="control-label col-md-3 col-sm-3 col-xs-12">Keluaran Target</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="keluaran_target" class="form-control col-md-7 col-xs-12" type="number" name="keluaran_target" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="keluaran_target_rkpd" class="control-label col-md-3 col-sm-3 col-xs-12">Keluaran Target RKPD</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="keluaran_target_rkpd" class="form-control col-md-7 col-xs-12" type="number" name="keluaran_target_rkpd" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="keluaran_target_ppas_draft" class="control-label col-md-3 col-sm-3 col-xs-12">Keluaran Target PPAS Draft</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="keluaran_target_ppas_draft" class="form-control col-md-7 col-xs-12" type="number" name="keluaran_target_ppas_draft" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="keluaran_target_ppas_final" class="control-label col-md-3 col-sm-3 col-xs-12">Keluaran Target PPAS Final</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="keluaran_target_ppas_final" class="form-control col-md-7 col-xs-12" type="number" name="keluaran_target_ppas_final" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="keluaran_realisasi_anggaran" class="control-label col-md-3 col-sm-3 col-xs-12">Keluaran Realisasi Anggaran</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="keluaran_realisasi_anggaran" class="form-control col-md-7 col-xs-12" type="number" name="keluaran_realisasi_anggaran" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="keluaran_realisasi_kinerja" class="control-label col-md-3 col-sm-3 col-xs-12">Keluaran Realisasi Kinerja</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="keluaran_realisasi_kinerja" class="form-control col-md-7 col-xs-12" type="number" name="keluaran_realisasi_kinerja" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="keluaran_realisasi_fisik" class="control-label col-md-3 col-sm-3 col-xs-12">Keluaran Realisasi Fisik</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="keluaran_realisasi_fisik" class="form-control col-md-7 col-xs-12" type="number" name="keluaran_realisasi_fisik" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="keluaran_satuan" class="control-label col-md-3 col-sm-3 col-xs-12">Keluaran Satuan</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="keluaran_satuan" class="form-control col-md-7 col-xs-12" type="text" name="keluaran_satuan" required="required">
                            </div>
                            </div>
                            <br/>
                            <div class="form-group">
                            <label for="hasil_indikator" class="control-label col-md-3 col-sm-3 col-xs-12">Hasil Indikator</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="hasil_indikator" class="form-control col-md-7 col-xs-12" type="text" name="hasil_indikator" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="hasil_target" class="control-label col-md-3 col-sm-3 col-xs-12">Hasil Target</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="hasil_target" class="form-control col-md-7 col-xs-12" type="number" name="hasil_target" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="hasil_target_rkpd" class="control-label col-md-3 col-sm-3 col-xs-12">Hasil Target RKPD</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="hasil_target_rkpd" class="form-control col-md-7 col-xs-12" type="number" name="hasil_target_rkpd" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="hasil_target_ppas_draft" class="control-label col-md-3 col-sm-3 col-xs-12">Hasil Target PPAS Draft</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="hasil_target_ppas_draft" class="form-control col-md-7 col-xs-12" type="number" name="hasil_target_ppas_draft" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="hasil_target_ppas_final" class="control-label col-md-3 col-sm-3 col-xs-12">Hasil Target PPAS Final</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="hasil_target_ppas_final" class="form-control col-md-7 col-xs-12" type="number" name="hasil_target_ppas_final" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="hasil_realisasi_anggaran" class="control-label col-md-3 col-sm-3 col-xs-12">Hasil Realisasi Anggaran</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="hasil_realisasi_anggaran" class="form-control col-md-7 col-xs-12" type="number" name="hasil_realisasi_anggaran" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="hasil_realisasi_kinerja" class="control-label col-md-3 col-sm-3 col-xs-12">Hasil Realisasi Kinerja</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="hasil_realisasi_kinerja" class="form-control col-md-7 col-xs-12" type="number" name="hasil_realisasi_kinerja" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="hasil_realisasi_fisik" class="control-label col-md-3 col-sm-3 col-xs-12">Hasil Realisasi Fisik</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="hasil_realisasi_fisik" class="form-control col-md-7 col-xs-12" type="number" name="hasil_realisasi_fisik" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="hasil_satuan" class="control-label col-md-3 col-sm-3 col-xs-12">Hasil Satuan</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="hasil_satuan" class="form-control col-md-7 col-xs-12" type="text" name="hasil_satuan" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="ket" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="ket" class="form-control col-md-7 col-xs-12" type="text" name="ket" required="required">
                            </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                            </div>
                        </form>

                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>



  <!-- /page content -->