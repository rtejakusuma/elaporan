<!-- page content -->

<div class="">
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
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
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
            </div>

            
             
        <!-- /page content -->