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
          <h2>Jadwal Pelaksanaan</h2>
       
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
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Jadwal Pelaksanaan</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Jadwal Pelaksanaan OPD</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Auditor</a>
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
                            <label for="jenis_pengawasan" class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Pengawasan</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="jenis_pengawasan" class="form-control col-md-7 col-xs-12" type="text" name="jenis_pengawasan" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="rmp" class="control-label col-md-3 col-sm-3 col-xs-12">RMP</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="rmp" class="form-control col-md-7 col-xs-12" type="text" name="rmp" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="rpl" class="control-label col-md-3 col-sm-3 col-xs-12">RPL</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="rpl" class="form-control col-md-7 col-xs-12" type="text" name="rpl" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="output_lhp" class="control-label col-md-3 col-sm-3 col-xs-12">Output LHP</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="output_lhp" class="form-control col-md-7 col-xs-12" type="text" name="output_lhp" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="hari_pengawasan" class="control-label col-md-3 col-sm-3 col-xs-12">Hari Pengawasan</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="hari_pengawasan" class="form-control col-md-7 col-xs-12" type="text" name="hari_pengawasan" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="keterangan" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="keterangan" class="form-control col-md-7 col-xs-12" type="text" name="keterangan" required="required">
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
                            <label for="nama_auditor" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Auditor</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="nama_auditor" class="form-control col-md-7 col-xs-12" type="text" name="nama_auditor" required="required">
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="jabatan" class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="jabatan" class="form-control col-md-7 col-xs-12" type="text" name="jabatan" required="required">
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