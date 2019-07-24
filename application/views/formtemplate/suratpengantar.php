<!-- page content -->

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Surat Pengantar</h3>
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
              <label for="tgl_surat" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Surat</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="tgl_surat" class="form-control col-md-7 col-xs-12" type="date" name="tgl_surat" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="penerima_surat" class="control-label col-md-3 col-sm-3 col-xs-12">Penerima Surat</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="penerima_surat" class="form-control col-md-7 col-xs-12" type="text" name="penerima_surat" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="tempat_penerima" class="control-label col-md-3 col-sm-3 col-xs-12">Tempat Penerima</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="tempat_penerima" class="form-control col-md-7 col-xs-12" type="text" name="tempat_penerima" required="required">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_surat">Nama Surat <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="no_surat" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label for="perihal" class="control-label col-md-3 col-sm-3 col-xs-12">Perihal</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="perihal" class="form-control col-md-7 col-xs-12" type="text" name="perihal" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="jumlah" class="control-label col-md-3 col-sm-3 col-xs-12">jumlah</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="jumlah" class="form-control col-md-7 col-xs-12" type="int" name="Jumlah" required="required">
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