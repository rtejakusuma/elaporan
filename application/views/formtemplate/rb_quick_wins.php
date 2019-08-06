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
           <h2>Laporan RB</h2>

           <div class="clearfix"></div>
         </div>
         <div class="x_content">
           <br />
           <div class="clearfix"></div>

           <div class="">
             <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                 <div class="x_content">
                   <a href='<?php if (isset($data['id_laporan'])) echo base_url("opd/p/$data[formname]/$data[id_laporan]"); ?>' target='_blank'><button class="btn btn-primary"><i class="fa fa-print"></i> PRINT</button></a>
                   <div class="" role="tabpanel" data-example-id="togglable-tabs">
                     <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                       <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Laporan RB</a>
                       </li>
                       <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">RB Quick Wins</a>
                       </li>
                       <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">RB Quick Wins Sasaran</a>
                       </li>
                       <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">RB Quick Wins Kegiatan</a>
                       </li>
                     </ul>
                     <div id="myTabContent" class="tab-content">
                       <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                         <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url("opd/e/$data[formname]/$data[id_laporan]"); ?>' method="post">
                           <input value="laporan_rb" type="hidden" name="nama_tabel">
                           <div class="form-group">
                             <label for="tahun" class="control-label col-md-3 col-sm-3 col-xs-12">Tahun</label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                               <h2><?php echo date('Y', strtotime($data['fetch']['rb']['tgl'])); ?></h2>
                             </div>
                           </div>
                         </form>

                       </div>
                       <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                         <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url("opd/e/$data[formname]/$data[id_laporan]"); ?>' method="post">
                         <input value="rb_quick_wins" type="hidden" name="nama_tabel">
                           <button type='button' onclick='add_field()'>Tambah</button>
                           <div id='container-opsi'>

                           <?php if ($data['fetch']['rbqw'] != NULL) {
                              foreach ($data['fetch']['rbqw'] as $rbqw) {
                           ?>
                           <div>
                           <div class="col-md-12 col-sm-12 col-xs-12" style='border: 2px solid black; padding:10px;'>
                           
                           <!-- FOR TARUH SINI -->



                           <!-- FOR TARUH SINI -->

                           <div class="form-group">
                             <label for="rincian" class="control-label col-md-3 col-sm-3 col-xs-12">Rincian</label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                               <input value='<?php echo $rbqw['rincian']; ?>' class="form-control col-md-7 col-xs-12" type="text" name="rincian[]">
                             </div>
                           </div>

                           <div class="form-group">
                              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type='button' onclick='delete_node(this)'>Hapus</button>
                              </div>
                            </div>

                            </div>
                            </div>
                                <?php }} ?>
                            </div>

                           <div class="ln_solid"></div>
                           <div class="form-group">
                             <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                             <button style="position: fixed; bottom: 28px; right: 48px;font-size:20px;  width: 100px;" type="submit" class="btn btn-success" >Submit</button>
                             </div>
                           </div>
                         </form>

                       </div>
                       <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                         <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url("opd/e/$data[formname]/$data[id_laporan]"); ?>' method="post">
                         <input value="rb_quick_wins_sasaran" type="hidden" name="nama_tabel">
                           <button type='button' onclick='add_field()'>Tambah</button>
                           <div id='container-opsi'>

                           <?php if ($data['fetch']['rb'] != NULL) {
                              foreach ($data['fetch']['rb'] as $rbqw) {
                           ?>
                           <div>
                           <div class="col-md-12 col-sm-12 col-xs-12" style='border: 2px solid black; padding:10px;'>
                           
                           <!-- FOR TARUH SINI -->





                           <!-- FOR TARUH SINI -->

                           <div class="form-group">
                             <label for="sasaran" class="control-label col-md-3 col-sm-3 col-xs-12">Sasaran</label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                               <input value='<?php echo $rbqws['rincian']; ?>'  class="form-control col-md-7 col-xs-12" type="text" name="sasaran[]">
                             </div>
                           </div>

                           <div class="form-group">
                             <label for="nama_program" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Program</label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                               <input  value='<?php echo $rbqws['rincian']; ?>' class="form-control col-md-7 col-xs-12" type="text" name="nama_program[]">
                             </div>
                           </div>

                            <div class="form-group">
                              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type='button' onclick='delete_node(this)'>Hapus</button>
                              </div>
                            </div>

                            </div>
                            </div>
                              <?php }} ?>
                            </div>

                           <div class="ln_solid"></div>
                           <div class="form-group">
                             <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                             <button style="position: fixed; bottom: 28px; right: 48px;font-size:20px;  width: 100px;" type="submit" class="btn btn-success" >Submit</button>
                             </div>
                           </div>
                         </form>
                       </div>

                       <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                         <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url("opd/e/$data[formname]/$data[id_laporan]"); ?>' method="post">
                         <input value="rb_quick_wins_sasaran" type="hidden" name="nama_tabel">
                           <button type='button' onclick='add_field()'>Tambah</button>
                           <div id='container-opsi'>

                           <?php if ($data['fetch']['rb'] != NULL) {
                              foreach ($data['fetch']['rb'] as $rbqw) {
                           ?>
                           <div>
                           <div class="col-md-12 col-sm-12 col-xs-12" style='border: 2px solid black; padding:10px;'>
                           
                           <!-- FOR TARUH SINI -->






                           <!-- FOR TARUH SINI -->

                           <div class="form-group">
                             <label for="nama_kegiatan" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kegiatan</label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                               <input value='<?php echo $rbqwk['nama_kegiatan']; ?>' class="form-control col-md-7 col-xs-12" type="text" name="nama_kegiatan[]">
                             </div>
                           </div>

                           <div class="form-group">
                             <label for="indikator" class="control-label col-md-3 col-sm-3 col-xs-12">Indikator</label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                               <input value='<?php echo $rbqwk['indikator']; ?>' class="form-control col-md-7 col-xs-12" type="text" name="indikator[]">
                             </div>
                           </div>

                           <div class="form-group">
                             <label for="target_output" class="control-label col-md-3 col-sm-3 col-xs-12">Target Output</label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                               <input value='<?php echo $rbqwk['target_output']; ?>' class="form-control col-md-7 col-xs-12" type="text" name="target_output[]">
                             </div>
                           </div>

                           <div class="form-group">
                             <label for="realisasi_output" class="control-label col-md-3 col-sm-3 col-xs-12">Realisasi Output</label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                               <input value='<?php echo $rbqwk['realisasi_output']; ?>' class="form-control col-md-7 col-xs-12" type="text" name="realisasi_output[]">
                             </div>
                           </div>

                           <div class="form-group">
                             <label for="target_waktu" class="control-label col-md-3 col-sm-3 col-xs-12">Target Waktu</label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                               <input value='<?php echo $rbqwk['target_waktu']; ?>' class="form-control col-md-7 col-xs-12" type="text" name="target_waktu[]">
                             </div>
                           </div>

                           <div class="form-group">
                             <label for="realisasi_waktu" class="control-label col-md-3 col-sm-3 col-xs-12">Realisasi Waktu</label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                               <input value='<?php echo $rbqwk['realisasi_waktu']; ?>' class="form-control col-md-7 col-xs-12" type="text" name="realisasi_waktu[]">
                             </div>
                           </div>

                           <div class="form-group">
                             <label for="target_anggaran" class="control-label col-md-3 col-sm-3 col-xs-12">Target Anggaran</label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                               <input value='<?php echo $rbqwk['target_anggaran']; ?>' class="form-control col-md-7 col-xs-12" type="text" name="targer_anggaran[]">
                             </div>
                           </div>

                           <div class="form-group">
                             <label for="realisasi_anggaran" class="control-label col-md-3 col-sm-3 col-xs-12">Keluaran Realisasi Anggaran</label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                               <input value='<?php echo $rbqwk['realisasi_anggaran']; ?>' class="form-control col-md-7 col-xs-12" type="text" name="realisasi_anggaran[]">
                             </div>
                           </div>

                           <div class="form-group">
                             <label for="capaian" class="control-label col-md-3 col-sm-3 col-xs-12">Capaian</label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                               <input value='<?php echo $rbqwk['capaian']; ?>' class="form-control col-md-7 col-xs-12" type="text" name="capaian[]">
                             </div>
                           </div>

                           <div class="form-group">
                             <label for="ket" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                               <input value='<?php echo $rbqwk['ket']; ?>' class="form-control col-md-7 col-xs-12" type="text" name="ket[]">
                             </div>
                           </div>

                           <div class="form-group">
                              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type='button' onclick='delete_node(this)'>Hapus</button>
                              </div>
                            </div>

                            </div>
                            </div>
                              <?php }} ?>
                            </div>

                           <div class="ln_solid"></div>
                           <div class="form-group">
                             <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                             <button style="position: fixed; bottom: 28px; right: 48px;font-size:20px;  width: 100px;" type="submit" class="btn btn-success" >Submit</button>
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