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
          <h2>Pelayanan Publik</h2>
       
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
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Pelayanan Publik</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Pelayanan Publik OPD</a>
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
                              <label for="indeks_pelayanan_publik" class="control-label col-md-3 col-sm-3 col-xs-12">Indeks Pelayanan Publik</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input id="indeks_pelayanan_publik" class="form-control col-md-7 col-xs-12" type="number" name="indeks_pelayanan_publik" required="required">
                              </div>
                              </div>
                              <label for="konversi_100" class="control-label col-md-3 col-sm-3 col-xs-12">Konversi 100</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input id="konversi_100" class="form-control col-md-7 col-xs-12" type="number" name="konversi_100" required="required">
                              </div>
                              </div>
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



  <!-- /page content -->