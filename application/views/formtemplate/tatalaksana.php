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
          <h2>Tata Laksana</h2>
       
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
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Tata Laksana</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Tata Laksana OPD</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url('admin/submit'); ?>' method="post">
                            <div class="form-group">
                            <label for="tahun" class="control-label col-md-3 col-sm-3 col-xs-12">Tahun</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="tahun" class="form-control col-md-7 col-xs-12" type="number" name="tahun" required="required">
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
                            <label for="uji_kompetensi" class="control-label col-md-3 col-sm-3 col-xs-12">Uji Kompetensi</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="uji_kompetensi" class="form-control col-md-7 col-xs-12" type="number" name="uji_kompetensi" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="sop" class="control-label col-md-3 col-sm-3 col-xs-12">SOP</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="sop" class="form-control col-md-7 col-xs-12" type="number" name="sop" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="tata_naskah_dinas" class="control-label col-md-3 col-sm-3 col-xs-12">Tata Naskah Dinas</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="tata_naskah_dinas" class="form-control col-md-7 col-xs-12" type="number" name="tata_naskah_dinas" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="pakaian_dinas" class="control-label col-md-3 col-sm-3 col-xs-12">Pakaian Dinas</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="pakaian_dinas" class="form-control col-md-7 col-xs-12" type="number" name="pakaian_dinas" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="jam_kerja" class="control-label col-md-3 col-sm-3 col-xs-12">Jam Kerja</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="jam_kerja" class="form-control col-md-7 col-xs-12" type="number" name="jam_kerja" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="jml_nilai" class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Nilai</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="jml_nilai" class="form-control col-md-7 col-xs-12" type="number" name="jml_nilai" required="required">
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
              </div>
        </div>
      </div>
    </div>
  </div>



  <!-- /page content -->