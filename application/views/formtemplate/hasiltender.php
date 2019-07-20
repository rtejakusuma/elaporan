<!-- page content -->

<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Hasil Tender</h3>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pokja">Nama Pokja <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="pokja" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_surat">Nomor Surat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="no_surat" name="no_surat" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="sifat" class="control-label col-md-3 col-sm-3 col-xs-12">Sifat Surat</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="sifat" class="form-control col-md-7 col-xs-12" type="text" name="sifat" required="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="lampiran" class="control-label col-md-3 col-sm-3 col-xs-12">Lampiran</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="lampiran" class="form-control col-md-7 col-xs-12" type="text" name="lampiran" required="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="perihal" class="control-label col-md-3 col-sm-3 col-xs-12">Perihal</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="perihal" class="form-control col-md-7 col-xs-12" type="text" name="perihal" required="required">
                        </div>
                      </div>
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
                        <label for="kode_tender" class="control-label col-md-3 col-sm-3 col-xs-12">Kode Tender</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="kode_tender" class="form-control col-md-7 col-xs-12" type="number" name="kode_tender" required="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="paket_kerja" class="control-label col-md-3 col-sm-3 col-xs-12">Paket Kerja</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="paket_kerja" class="form-control col-md-7 col-xs-12" type="text" name="paket_kerja" required="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="pagu" class="control-label col-md-3 col-sm-3 col-xs-12">Pagu</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="pagu" class="form-control col-md-7 col-xs-12" type="number" name="pagu" required="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="total_hps" class="control-label col-md-3 col-sm-3 col-xs-12">Total HPS</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="total_hps" class="form-control col-md-7 col-xs-12" type="int" name="total_hps" required="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="perangkat_daerah" class="control-label col-md-3 col-sm-3 col-xs-12">Perangkat Daerah</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="perangkat_daerah" class="form-control col-md-7 col-xs-12" type="text" name="perangkat_daerah" required="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="nama_penyedia_jasa" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Penyedia Jasa</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nama_penyedia_jasa" class="form-control col-md-7 col-xs-12" type="text" name="nama_penyedia_jasa" required="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="alamat_perusahaan" class="control-label col-md-3 col-sm-3 col-xs-12">Alamat Perusahaan</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="alamat_perusahaan" class="form-control col-md-7 col-xs-12" type="text" name="alamat_perusahaan" required="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="npwp" class="control-label col-md-3 col-sm-3 col-xs-12">NPWP</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="npwp" class="form-control col-md-7 col-xs-12" type="text" name="npwp" required="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="harga_tawar" class="control-label col-md-3 col-sm-3 col-xs-12">Harga Tawar</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="harga_tawar" class="form-control col-md-7 col-xs-12" type="number" name="harga_tawar" required="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="ket_harga_tawar" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan Harga Tawar</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="ket_harga_tawar" class="form-control col-md-7 col-xs-12" type="text" name="ket_harga_tawar" required="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="harga_koreksi" class="control-label col-md-3 col-sm-3 col-xs-12">Harga Koreksi</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="harga_koreksi" class="form-control col-md-7 col-xs-12" type="number" name="harga_koreksi" required="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="ket_harga_koreksi" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan Harga Koreksi</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="ket_harga_koreksi" class="form-control col-md-7 col-xs-12" type="text" name="ket_harga_koreksi" required="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="harga_kontrak" class="control-label col-md-3 col-sm-3 col-xs-12">Harga Kontrak</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="harga_kontrak" class="form-control col-md-7 col-xs-12" type="number" name="harga_kontrak" required="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="ket_harga_kontrak" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan Harga Kontrak</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="ket_harga_kontrak" class="form-control col-md-7 col-xs-12" type="text" name="ket_harga_kontrak" required="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="tgl_tawar" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Penawaran</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tgl_tawar" class="form-control col-md-7 col-xs-12" type="date" name="tgl_tawar" required="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="jabatan" class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="jabatan" class="form-control col-md-7 col-xs-12" type="text" name="jabatan" required="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="jabatan_pokja_atas" class="control-label col-md-3 col-sm-3 col-xs-12">Jabtan Pokja Atas</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="jabatan_pokja_atas" class="form-control col-md-7 col-xs-12" type="text" name="jabatan_pokja_atas" required="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="nama_pembuat" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Pembuat</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nama_pembuat" class="form-control col-md-7 col-xs-12" type="text" name="nama_pembuat" required="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="nip" class="control-label col-md-3 col-sm-3 col-xs-12">NIP</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nip" class="form-control col-md-7 col-xs-12" type="text" name="nip" required="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="tembusan" class="control-label col-md-3 col-sm-3 col-xs-12">Tembusan Surat</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tembusan" class="form-control col-md-7 col-xs-12" type="text" name="tembusan" required="required">
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