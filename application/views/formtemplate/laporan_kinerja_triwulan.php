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
          <h2>Laporan Kinerja Triwulan</h2>
       
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url("opd/e/$data[formname]/$data[id_laporan]"); ?>' method="post">
            <input type='hidden' name='tipe_opsi' value='<?php echo $data['tipe_opsi'] ?>'>
            <input value="laporan_kinerja_triwulan" type="hidden" name="nama_tabel">
            <div class="form-group">
              <label for="uraian" class="control-label col-md-3 col-sm-3 col-xs-12">Uraian</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input  class="form-control col-md-7 col-xs-12" type="text" name="uraian"  >
              </div>
            </div>
            <div class="form-group">
              <label for="indikator_kinerja" class="control-label col-md-3 col-sm-3 col-xs-12">Indikator Kinerja</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input  class="form-control col-md-7 col-xs-12" type="text" name="indikator_kinerja"  >
              </div>
            </div>
            <div class="form-group">
              <label for="target" class="control-label col-md-3 col-sm-3 col-xs-12">Target</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input  class="form-control col-md-7 col-xs-12" type="number" name="target"  >
              </div>
            </div>
            <div class="form-group">
              <label for="realisasi_target" class="control-label col-md-3 col-sm-3 col-xs-12">Realisasi Target</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input  class="form-control col-md-7 col-xs-12" type="number" name="realisasi_target"  >
              </div>
            </div>
            <div class="form-group">
              <label for="program" class="control-label col-md-3 col-sm-3 col-xs-12">Program</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input  class="form-control col-md-7 col-xs-12" type="text" name="program"  >
              </div>
            </div>
            <div class="form-group">
              <label for="anggaran" class="control-label col-md-3 col-sm-3 col-xs-12">Anggaran</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input  class="form-control col-md-7 col-xs-12" type="int" name="anggaran"  >
              </div>
            </div>
            <div class="form-group">
              <label for="capaian_realisasi_anggaran" class="control-label col-md-3 col-sm-3 col-xs-12">Capaian Realisasi Anggaran</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input  class="form-control col-md-7 col-xs-12" type="number" name="capaian_realisasi_anggaran"  >
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



  <!-- /page content -->