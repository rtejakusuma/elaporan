<!-- page content -->

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>NPKND</h3>
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
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?= 'hahaha'?>" method="post">
            <input type="hidden" name="id_tipe" value="<?php echo $data['id_tipe']; ?>">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_surat">Nama Surat <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="no_surat" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl_surat">Tanggal Surat <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="date" id="tgl_surat" name="tgl_surat" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label for="penerima_surat" class="control-label col-md-3 col-sm-3 col-xs-12">Penerima Surat</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="penerima_surat" class="form-control col-md-7 col-xs-12" type="text" name="penerima_surat" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="kepentingan" class="control-label col-md-3 col-sm-3 col-xs-12">Kepentingan Surat</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="kepentingan" class="form-control col-md-7 col-xs-12" type="text" name="kepentingan_Surat" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="tentang" class="control-label col-md-3 col-sm-3 col-xs-12">Tentang</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="tentang" class="form-control col-md-7 col-xs-12" type="text" name="tentang" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="catatan" class="control-label col-md-3 col-sm-3 col-xs-12">Catatan</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="catatan" class="form-control col-md-7 col-xs-12" type="text" name="catatan" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="lampiran" class="control-label col-md-3 col-sm-3 col-xs-12">Lampiran</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="lampiran" class="form-control col-md-7 col-xs-12" type="text" name="lampiran" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="ket" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="ket" class="form-control col-md-7 col-xs-12" type="text" name="ket" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="jabatan_atas" class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan Atas</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="jabatan_atas" class="form-control col-md-7 col-xs-12" type="text" name="jabatan_atas" required="required">
              </div>
            </div>

            <div class="form-group">
              <label for="nama" class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="nama" class="form-control col-md-7 col-xs-12" type="text" name="nama" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="jabatan_bawah" class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan Bawah</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="jabatan_bawah" class="form-control col-md-7 col-xs-12" type="text" name="jabatan_bawah" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="nip" class="control-label col-md-3 col-sm-3 col-xs-12">NIP</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="nip" class="form-control col-md-7 col-xs-12" type="text" name="nip" required="required">
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