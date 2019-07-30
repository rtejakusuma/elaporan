<!-- page content -->

<!-- <div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Rekap Tender</h3>
    </div>

  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Form Design <small>different form elements</small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url() . "submitform" ?>' method="post">

            <div class="form-group">
              <label for="paket_kerja" class="control-label col-md-3 col-sm-3 col-xs-12">Paket Kerja</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="paket_kerja" class="form-control col-md-7 col-xs-12" type="text" name="paket_kerja" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="pagu" class="control-label col-md-3 col-sm-3 col-xs-12">Pagu</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="pagu" class="form-control col-md-7 col-xs-12" type="int" name="pagu" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="nilai_hps" class="control-label col-md-3 col-sm-3 col-xs-12">Nilai HPS</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="nilai_hps" class="form-control col-md-7 col-xs-12" type="int" name="nilai_hps" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="pemenang" class="control-label col-md-3 col-sm-3 col-xs-12">Pemenang</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="pemenag" class="form-control col-md-7 col-xs-12" type="text" name="pemenang" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="harga_kontrak" class="control-label col-md-3 col-sm-3 col-xs-12">Harga Kontrak</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="harga_kontrak" class="form-control col-md-7 col-xs-12" type="number" name="harga_kontrak" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="presentase_thd_hps" class="control-label col-md-3 col-sm-3 col-xs-12">Presentase Terhadap HPS</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="presentase_thd_hps" class="form-control col-md-7 col-xs-12" type="float" name="presentase_thd_hps" required="required">
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
                <button class="btn btn-primary" type="button">Cancel</button>
                <button class="btn btn-primary" type="reset">Reset</button>
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> -->



  <!-- /page content -->

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
          <h2>Rekap Tender</h2>
       
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <div class="clearfix"></div>

            <div class="">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">


                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Rekap Tender</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Detail Rekap Tender</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Paket Kerja</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url('admin/submit'); ?>' method="post">
                
                            <div class="form-group">
                            <label for="tgl" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="tgl" class="form-control col-md-7 col-xs-12" type="date" name="tgl" required="required">
                            </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-primary" type="button">Cancel</button>
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                            </div>
                        </form>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url('admin/submit'); ?>' method="post">
                            
                            <input type='hidden' name='tipe_opsi' value='<?php echo $data['tipe_opsi'] ?>'>
                            <div class="form-group">
                            <label for="username" class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="user" name="id" >
                                <?php
                                    foreach($data['opsi_user'] as $user){
                                    echo "<option value='" . $user['id'] . "'>" . strtoupper($user['username']) . "</option>";
                                    }
                                ?>
                                </select>
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="nilai_hps" class="control-label col-md-3 col-sm-3 col-xs-12">Nilai HPS</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="nilai_hps" class="form-control col-md-7 col-xs-12" type="number" name="nilai_hps" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="pemenang" class="control-label col-md-3 col-sm-3 col-xs-12">Pemenang</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="pemenang" class="form-control col-md-7 col-xs-12" type="text" name="pemenang" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="harga_kontrak" class="control-label col-md-3 col-sm-3 col-xs-12">Harga Kontrak</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="harga_kontrak" class="form-control col-md-7 col-xs-12" type="number" name="harga_kontrak" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="presentase_kontrak_thd_hps" class="control-label col-md-3 col-sm-3 col-xs-12">Presentase Kontrak Terhadap HPS</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="presentase_kontrak_thd_hps" class="form-control col-md-7 col-xs-12" type="number" name="presentase_kontrak_thd_hps" required="required">
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
                                <button class="btn btn-primary" type="button">Cancel</button>
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                            </div>
                        </form>

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url('admin/submit'); ?>' method="post">
  
                            <div class="form-group">
                            <label for="nama_paket_kerja" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Paket Kerja</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="nama_paket_kerja" class="form-control col-md-7 col-xs-12" type="text" name="nama_paket_kerja" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="pagu" class="control-label col-md-3 col-sm-3 col-xs-12">Pagu</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="pagu" class="form-control col-md-7 col-xs-12" type="number" name="pagu" required="required">
                            </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-primary" type="button">Cancel</button>
                                <button class="btn btn-primary" type="reset">Reset</button>
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