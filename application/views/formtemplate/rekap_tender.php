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

                     <a href='<?php if (isset($data['id_laporan'])) echo base_url("opd/p/$data[formname]/$data[id_laporan]"); ?>' target='_blank'><button class="btn btn-primary"><i class="fa fa-print"></i> PRINT</button></a>
                     <div class="" role="tabpanel" data-example-id="togglable-tabs">
                       <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                         <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Rekap Tender</a>
                         </li>
                         <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Detail Rekap Tender</a>
                         </li>
                         <!-- <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Paket Kerja</a>
                        </li> -->
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url("opd/e/$data[formname]/$data[id_laporan]"); ?>' method="post">
                        <input value="rekap_tender" type="hidden" name="nama_tabel">
                            <div class="form-group">
                            <label for="judul_rekap_tender" class="control-label col-md-3 col-sm-3 col-xs-12">Judul Rekap Tender</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value='<?php if(isset($data['fetch']['rt']['judul_rekap_tender'])) echo $data['fetch']['rt']['judul_rekap_tender']; ?>' class="form-control col-md-7 col-xs-12" type="text" name="judul_rekap_tender"  >
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="tgl" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <h2><?php echo date('Y', strtotime($data['fetch']['rt']['tgl'])); ?></h2>
                                <!-- <input  class="form-control col-md-7 col-xs-12" type="date" name="tgl"  > -->
                            </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button style="position: fixed; bottom: 28px; right: 48px;font-size:20px;  width: 100px;" type="submit" class="btn btn-success" >Submit</button>
                            </div>
                            </div>
                        </form>
                        </div>

                         <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                           <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url("opd/e/$data[formname]/$data[id_laporan]"); ?>' method="post">
                           <input value="detail_rekap_tender" type="hidden" name="nama_tabel">
                           <button type='button' onclick='add_field()'>Tambah</button>
                           <div id="container-opsi">
                           <?php if ($data['fetch']['drt'] != NULL) {
                              foreach ($data['fetch']['drt'] as $drtdata) {
                                ?>
                            <div class="form-group">
                            <label for="opd" class="control-label col-md-3 col-sm-3 col-xs-12">Nama OPD</label>
                              <select class="col-md-6 col-sm-6 col-xs-12" name='id_opd[]'>
                                <?php 
                                  foreach($data['opsi_opd'] as $opd){
                                    $sel = '';
                                    if($drtdata['id_opd'] == $opd['id_opd']) $sel = "selected='selected'";
                                    echo "<option value='$opd[id_opd]' $sel>$opd[nama_opd]</option>";
                                  }
                                ?>
                              </select>
                            </div>
                            
                            <div class="form-group">
                            <label for="nama_paket_kerja" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Paket Kerja</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value='<?php echo $drtdata['nama_paket_kerja'] ?>' class="form-control col-md-7 col-xs-12" type="text" name="nama_paket_kerja[]"  >
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="pagu" class="control-label col-md-3 col-sm-3 col-xs-12">Pagu</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value='<?php echo $drtdata['pagu'] ?>' class="form-control col-md-7 col-xs-12" type="number" name="pagu[]"  >
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="nilai_hps" class="control-label col-md-3 col-sm-3 col-xs-12">Nilai HPS</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value='<?php echo $drtdata['nilai_hps'] ?>'  class="form-control col-md-7 col-xs-12" type="number" name="nilai_hps[]"  >
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="pemenang" class="control-label col-md-3 col-sm-3 col-xs-12">Pemenang</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value='<?php echo $drtdata['pemenang'] ?>' class="form-control col-md-7 col-xs-12" type="text" name="pemenang[]"  >
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="harga_kontrak" class="control-label col-md-3 col-sm-3 col-xs-12">Harga Kontrak</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value='<?php echo $drtdata['harga_kontrak'] ?>'  class="form-control col-md-7 col-xs-12" type="number" name="harga_kontrak[]"  >
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="presentase_kontrak_thd_hps" class="control-label col-md-3 col-sm-3 col-xs-12">Presentase Kontrak Terhadap HPS</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value='<?php echo $drtdata['presentase_kontrak_thd_hps'] ?>'  class="form-control col-md-7 col-xs-12" type="number" name="presentase_kontrak_thd_hps[]"  >
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="ket" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value='<?php echo $drtdata['ket'] ?>'  class="form-control col-md-7 col-xs-12" type="text" name="ket[]"  >
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

                             <!-- </div>

                             <div class="ln_solid"></div>
                             <div class="form-group">
                               <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                 <button type="submit" class="btn btn-success">Submit</button>
                               </div>
                             </div>
                           </form> -->

                         </div>
                         <!-- <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url("opd/e/$data[formname]/$data[id_laporan]"); ?>' method="post">
                        <input value="paket_kerja" type="hidden" name="nama_tabel">
                            <div class="form-group">
                            <label for="nama_paket_kerja" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Paket Kerja</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input  class="form-control col-md-7 col-xs-12" type="text" name="nama_paket_kerja[]"  >
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="pagu" class="control-label col-md-3 col-sm-3 col-xs-12">Pagu</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input  class="form-control col-md-7 col-xs-12" type="number" name="pagu[]"  >
                            </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                            </div>
                        </form>

                        </div> -->
                       </div>
                     </div>

                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>


<script>
  var idlap = '<?php echo $data['fetch']['rt']['id_laporan']; ?>';
  var opd = "<div>\
              \
                <div class='col-md-12 col-sm-12 col-xs-12' style='border: 2px solid black; padding:10px;'>\
                <div class='form-group'>\
                <label for='opd' class='control-label col-md-3 col-sm-3 col-xs-12'>Nama OPD</label>\
                <select class='col-md-6 col-sm-6 col-xs-12' name='id_opd[]'>\
              <?php
              foreach ($data['opsi_opd'] as $opd) {
                echo "<option value='$opd[id_opd]'>$opd[nama_opd]</option>";
              }
              ?>\
            </select>\
            </div>\
            <div class='form-group'>\
                <label for='nama_paket_kerja' class='control-label col-md-3 col-sm-3 col-xs-12'>Nama Paket Kerja</label>\
                <div class='col-md-6 col-sm-6 col-xs-12'>\
                    <input  class='form-control col-md-7 col-xs-12' type='text' name='new[nama_paket_kerja][]'  >\
                </div>\
                </div>\
                <div class='form-group'>\
                <label for='pagu' class='control-label col-md-3 col-sm-3 col-xs-12'>Pagu</label>\
                <div class='col-md-6 col-sm-6 col-xs-12'>\
                    <input  class='form-control col-md-7 col-xs-12' type='number' name='new[pagu][]'  >\
                </div>\
                </div>\
                <div class='form-group'>\
                <label for='nilai_hps' class='control-label col-md-3 col-sm-3 col-xs-12'>Nilai HPS</label>\
                <div class='col-md-6 col-sm-6 col-xs-12'>\
                    <input  class='form-control col-md-7 col-xs-12' type='number' name='new[nilai_hps][]'  >\
                </div>\
                </div>\
                <div class='form-group'>\
                <label for='pemenang' class='control-label col-md-3 col-sm-3 col-xs-12'>Pemenang</label>\
                <div class='col-md-6 col-sm-6 col-xs-12'>\
                    <input class='form-control col-md-7 col-xs-12' type='text' name='new[pemenang][]'  >\
                </div>\
                </div>\
                <div class='form-group'>\
                <label for='harga_kontrak' class='control-label col-md-3 col-sm-3 col-xs-12'>Harga Kontrak</label>\
                <div class='col-md-6 col-sm-6 col-xs-12'>\
                    <input   class='form-control col-md-7 col-xs-12' type='number' name='new[harga_kontrak][]'  >\
                </div>\
                </div>\
                <div class='form-group'>\
                <label for='presentase_kontrak_thd_hps' class='control-label col-md-3 col-sm-3 col-xs-12'>Presentase Kontrak Terhadap HPS</label>\
                <div class='col-md-6 col-sm-6 col-xs-12'>\
                    <input   class='form-control col-md-7 col-xs-12' type='number' name='new[presentase_kontrak_thd_hps][]'  >\
                </div>\
                </div>\
                <div class='form-group'>\
                <label for='ket' class='control-label col-md-3 col-sm-3 col-xs-12'>Keterangan</label>\
                <div class='col-md-6 col-sm-6 col-xs-12'>\
                    <input  class='form-control col-md-7 col-xs-12' type='text' name='new[ket][]'  >\
                </div>\
                </div>\
                <div class='form-group'>\
                <div class='col-md-6 col-sm-6 col-xs-12 col-md-offset-3'>\
                  <button type='button' onclick='delete_node(this)'>Hapus</button>\
                </div>\
                </div>\
            </div>\
            <br/><br/></div>";

  function add_field() {
    var cont = document.getElementById('container-opsi');
    console.log(cont);
    cont.innerHTML = opd + cont.innerHTML;
  }

  function delete_node(node) {
    node.parentNode.parentNode.parentNode.parentNode.removeChild(node.parentNode.parentNode.parentNode);
  }
</script>

       <!-- /page content -->