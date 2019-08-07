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
                       <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">RB Area Perubahan</a>
                       </li>
                       <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">RB Area Perubahan Program</a>
                       </li>
                       <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">RB Area Perubahan Kegiatan</a>
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
                         <input value="rb_area_perubahan" type="hidden" name="nama_tabel">
                           <button type='button' onclick='add_tab2()'>Tambah</button>
                           <div id='container-opsi'>

                           <?php if ($data['fetch']['rbap'] != NULL) {
                              foreach ($data['fetch']['rbap'] as $rbap) {
                           ?>
                           <div>
                           <div class="col-md-12 col-sm-12 col-xs-12" style='border: 2px solid black; padding:10px;'>
                           <input value='<?php echo $rbap['id_rb_area_perubahan']; ?>' type='hidden' name='id_rb_area_perubahan[]'>


                           <div class="form-group">
                             <label for="rincian" class="control-label col-md-3 col-sm-3 col-xs-12">Rincian</label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                               <input value='<?php if(isset($rbap['rincian']))echo $rbap['rincian']; ?>' class="form-control col-md-7 col-xs-12" type="text" name="rincian[]">
                             </div>
                           </div>

                           <div class="form-group">
                              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type='button' onclick='delete_node2(this)'>Hapus</button>
                              </div>
                            </div>

                            </div>
                            </div>
                                <?php }} ?>
                            </div>

                           <div id='deleted2'></div>
                           <div class="ln_solid"></div>
                           <div class="form-group">
                             <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                             <button style="position: fixed; bottom: 28px; right: 48px;font-size:20px;  width: 100px;" type="submit" class="btn btn-success" >Submit</button>
                             </div>
                           </div>
                         </form>

                       </div>
                       <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                         <form id="demo-form3" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url("opd/e/$data[formname]/$data[id_laporan]"); ?>' method="post">
                          <input value="rb_area_perubahan_program" type="hidden" name="nama_tabel">
                           
                           <div id='container-opsi'>

                           <?php if ($data['fetch']['rbaps'] != NULL) {
                              foreach ($data['fetch']['rbap'] as $rbap) {
                           ?>
                           <div>
                           <div class="col-md-12 col-sm-12 col-xs-12" style='border: 2px solid black; padding:10px;'>
                           <input disabled value='<?php echo $rbap['id_rb_area_perubahan']; ?>' type='hidden' name='id_rb_area_perubahan[]'>
                            <h2><?php echo $rbap['rincian']; ?></h2>
                            <button type='button' onclick='add_tab3(this)'>Tambah Program</button>
                           <!-- FOR TARUH SINI -->

                           <?php
                              foreach ($data['fetch']['rbaps'][$rbap['id_rb_area_perubahan']] as $rbaps) {
                            ?>

                          <div>
                          <div>
                          
                           <input value='<?php echo $rbaps['id_rb_area_perubahan_program']; ?>' type='hidden' name='id_rb_area_perubahan_program[]'>
                           <input value='<?php echo $rbaps['id_rb_area_perubahan']; ?>' type='hidden' name='id_rb_area_perubahan[]'>

                           <div class="form-group">
                             <label for="nama_program" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Program</label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                               <input  value='<?php if(isset($rbaps['nama_program']))echo $rbaps['nama_program']; ?>' class="form-control col-md-7 col-xs-12" type="text" name="nama_program[]">
                             </div>
                           </div>

                            <div class="form-group">
                              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type='button' onclick='delete_node3(this)'>Hapus</button>
                              </div>
                            </div>

                            </div>
                            </div>

                            <?php }?>
                            </div></div>
                              <?php }} ?>
                            </div>

                            <div id='deleted3'></div>
                           <div class="ln_solid"></div>
                           <div class="form-group">
                             <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                             <button style="position: fixed; bottom: 28px; right: 48px;font-size:20px;  width: 100px;" type="submit" class="btn btn-success" >Submit</button>
                             </div>
                           </div>
                         </form>
                       </div>

                       <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                         <form id="demo-form4" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url("opd/e/$data[formname]/$data[id_laporan]"); ?>' method="post">
                         <input value="rb_area_perubahan_kegiatan" type="hidden" name="nama_tabel">
                           <div id='container-opsi'>

                           <?php if ($data['fetch']['rbaps'] != NULL) {             
                              foreach ($data['fetch']['rbaps'] as $rbapss) {//printf("<pre>%s</pre>", json_encode($rbaps, JSON_PRETTY_PRINT));
                                foreach($rbapss as $rbaps){
                           ?>
                           <div>
                           <div class="col-md-12 col-sm-12 col-xs-12" style='border: 2px solid black; padding:10px;'>
                           <input disabled value='<?php echo $rbaps['id_rb_area_perubahan_program']; ?>' type='hidden' name='id_rb_area_perubahan_program[]'>
                            <h2><?php echo $rbaps['nama_program']; ?></h2>
                            <button type='button' onclick='add_tab4(this)'>Tambah Kegiatan</button>
                           <!-- FOR TARUH SINI -->
                           <?php
                              foreach ($data['fetch']['rbapk'][$rbaps['id_rb_area_perubahan_program']] as $rbapk) {
                            ?>

                          <div>
                          <div>
        
                          <input value='<?php echo $rbaps['id_rb_area_perubahan_program']; ?>' type='hidden' name='id_rb_area_perubahan_program[]'>

                           <div class="form-group">
                             <label for="nama_kegiatan" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kegiatan</label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                               <input value='<?php if(isset($rbapk['nama_kegiatan']))echo $rbapk['nama_kegiatan']; ?>' class="form-control col-md-7 col-xs-12" type="text" name="nama_kegiatan[]">
                             </div>
                           </div>

                           <div class="form-group">
                             <label for="target_waktu" class="control-label col-md-3 col-sm-3 col-xs-12">Target Waktu</label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                               <input value='<?php if(isset($rbapk['target_waktu']))echo $rbapk['target_waktu']; ?>' class="form-control col-md-7 col-xs-12" type="text" name="target_waktu[]">
                             </div>
                           </div>

                           <div class="form-group">
                             <label for="realisasi_waktu" class="control-label col-md-3 col-sm-3 col-xs-12">Realisasi Waktu</label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                               <input value='<?php if(isset($rbapk['realisasi_waktu']))echo $rbapk['realisasi_waktu']; ?>' class="form-control col-md-7 col-xs-12" type="text" name="realisasi_waktu[]">
                             </div>
                           </div>

                           <div class="form-group">
                             <label for="target_anggaran" class="control-label col-md-3 col-sm-3 col-xs-12">Target Anggaran</label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                               <input value='<?php if(isset($rbapk['target_anggaran']))echo $rbapk['target_anggaran']; ?>' class="form-control col-md-7 col-xs-12" type="text" name="target_anggaran[]">
                             </div>
                           </div>

                           <div class="form-group">
                             <label for="realisasi_anggaran" class="control-label col-md-3 col-sm-3 col-xs-12">Keluaran Realisasi Anggaran</label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                               <input value='<?php if(isset($rbapk['realisasi_anggaran']))echo $rbapk['realisasi_anggaran']; ?>' class="form-control col-md-7 col-xs-12" type="text" name="realisasi_anggaran[]">
                             </div>
                           </div>

                           <div class="form-group">
                             <label for="capaian" class="control-label col-md-3 col-sm-3 col-xs-12">Capaian</label>
                             <div class='col-md-6 col-sm-6 col-xs-12'>
                              <select name=capaian[]>
                                <option value='0' <?php if(isset($rbapk['capaian']) && $rbapk['capaian'] == '0') echo "selected='selected'"; ?>>Tidak Tercapai</option>
                                <option value='1' <?php if(isset($rbapk['capaian']) && $rbapk['capaian'] == '1') echo "selected='selected'"; ?>>Tercapai</option>
                              </select>
                              </div>
                           </div>

                           <div class="form-group">
                             <label for="ket" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                               <input value='<?php if(isset($rbapk['ket']))echo $rbapk['ket']; ?>' class="form-control col-md-7 col-xs-12" type="text" name="ket[]">
                             </div>
                           </div>

                           <div class="form-group">
                              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type='button' onclick='delete_node4(this)'>Hapus</button>
                              </div>
                            </div>

                            </div></div>
                              <?php } ?>
                            </div></div>
                              <?php }}} ?>
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
                              
                            
                           

<script>

function add_tab2() {
  var cont = document.getElementById('container-opsi');
  
  var tab2 ="<div>\
           <div class='col-md-12 col-sm-12 col-xs-12' style='border: 2px solid black; padding:10px;'>\
\
           <div class='form-group'>\
            <label for='rincian' class='control-label col-md-3 col-sm-3 col-xs-12'>Rincian</label>\
                <div class='col-md-6 col-sm-6 col-xs-12'>\
                    <input class='form-control col-md-7 col-xs-12' type='text' name='new[rincian][]'>\
                </div>\
            </div>\
\
            <div class='form-group'>\
                <div class='col-md-6 col-sm-6 col-xs-12 col-md-offset-3'>\
                    <button type='button' onclick='delete_node2(this)'>Hapus</button>\
                </div>\
            </div>\
\
            </div>\
            </div>\
        ";

  cont.innerHTML = tab2 + cont.innerHTML;
}

function add_tab3(node) {
  var id = node.parentNode.childNodes[1].value;
  var tab3 ="<div>\
           <div>\
           <input value='"+id+"' type='hidden' name='new[id_rb_area_perubahan][]'>\
\
            <div class='form-group'>\
                <label for='nama_program' class='control-label col-md-3 col-sm-3 col-xs-12'>Nama Program</label>\
                <div class='col-md-6 col-sm-6 col-xs-12'>\
                <input class='form-control col-md-7 col-xs-12' type='text' name='new[nama_program][]'>\
                </div>\
            </div>\
\
            <div class='form-group'>\
                <div class='col-md-6 col-sm-6 col-xs-12 col-md-offset-3'>\
                <button type='button' onclick='delete_node3(this)'>Hapus</button>\
                </div>\
            </div>\
\
            </div>\
            </div>\
        ";
  node.parentNode.innerHTML = node.parentNode.innerHTML + tab3;
}

function add_tab4(node) {
  var id = node.parentNode.childNodes[1].value;
  var tab4 ="<div>\
           <div>\
           <input value='"+id+"' type='hidden' name='id_rb_area_perubahan_program[]'>\
           <div class='form-group'>\
            <label for='nama_kegiatan' class='control-label col-md-3 col-sm-3 col-xs-12'>Nama Kegiatan</label>\
                <div class='col-md-6 col-sm-6 col-xs-12'>\
                    <input class='form-control col-md-7 col-xs-12' type='text' name='nama_kegiatan[]'>\
                </div>\
            </div>\
\
            <div class='form-group'>\
                <label for='target_waktu' class='control-label col-md-3 col-sm-3 col-xs-12'>Target Waktu</label>\
                <div class='col-md-6 col-sm-6 col-xs-12'>\
                <input class='form-control col-md-7 col-xs-12' type='text' name='target_waktu[]'>\
                </div>\
            </div>\
\
            <div class='form-group'>\
                <label for='realisasi_waktu' class='control-label col-md-3 col-sm-3 col-xs-12'>Realisasi Waktu</label>\
                <div class='col-md-6 col-sm-6 col-xs-12'>\
                <input class='form-control col-md-7 col-xs-12' type='text' name='realisasi_waktu[]'>\
                </div>\
            </div>\
\
            <div class='form-group'>\
                <label for='target_anggaran' class='control-label col-md-3 col-sm-3 col-xs-12'>Target Anggaran</label>\
                <div class='col-md-6 col-sm-6 col-xs-12'>\
                <input class='form-control col-md-7 col-xs-12' type='text' name='target_anggaran[]'>\
                </div>\
            </div>\
\
            <div class='form-group'>\
                <label for='realisasi_anggaran' class='control-label col-md-3 col-sm-3 col-xs-12'>Keluaran Realisasi Anggaran</label>\
                <div class='col-md-6 col-sm-6 col-xs-12'>\
                <input class='form-control col-md-7 col-xs-12' type='text' name='realisasi_anggaran[]'>\
                </div>\
            </div>\
\
            <div class='form-group'>\
                <label for='capaian' class='control-label col-md-3 col-sm-3 col-xs-12'>Capaian</label>\
                <div class='col-md-6 col-sm-6 col-xs-12'>\
                <select name=capaian[]>\
                  <option value='0' selected='selected'>Tidak Tercapai</option>\
                  <option value='1'>Tercapai</option>\
                </select>\
                </div>\
            </div>\
\
            <div class='form-group'>\
                <label for='ket' class='control-label col-md-3 col-sm-3 col-xs-12'>Keterangan</label>\
                <div class='col-md-6 col-sm-6 col-xs-12'>\
                <input class='form-control col-md-7 col-xs-12' type='text' name='ket[]'>\
                </div>\
            </div>\
\
            <div class='form-group'>\
                <div class='col-md-6 col-sm-6 col-xs-12 col-md-offset-3'>\
                <button type='button' onclick='delete_node4(this)'>Hapus</button>\
                </div>\
            </div>\
\
            </div>\
            </div>\
\
        ";
        node.parentNode.innerHTML = node.parentNode.innerHTML + tab4;
}

function delete_node2(node) {
  var cont = document.getElementById('deleted2');
  // console.log(node.parentNode.childNodes[1].nodeName);
  var id = node.parentNode.parentNode.parentNode.childNodes[1];
  console.log(node.parentNode.parentNode.parentNode);
  if (id.nodeName == "INPUT") {
    id = id.value;
    console.log(id);
    cont.innerHTML += "<input type='hidden' value='" + id + "' name='to_del[]'>";
  }
  node.parentNode.parentNode.parentNode.parentNode.removeChild(node.parentNode.parentNode.parentNode);
}

function delete_node3(node) {
  var cont = document.getElementById('deleted3');
  // console.log(node.parentNode.childNodes[1].nodeName);
  var id = node.parentNode.parentNode.parentNode.childNodes[1];
  console.log(node.parentNode.parentNode.parentNode.childNodes[1]);
  if (id.nodeName == "INPUT") {
    id = id.value;
    console.log(id);
    cont.innerHTML += "<input type='hidden' value='" + id + "' name='to_del[]'>";
  }
  node.parentNode.parentNode.parentNode.parentNode.removeChild(node.parentNode.parentNode.parentNode);
}

function delete_node4(node) {
  // var cont = document.getElementById('deleted3');
  // // console.log(node.parentNode.childNodes[1].nodeName);
  // var id = node.parentNode.parentNode.parentNode.childNodes[1];
  // console.log(node.parentNode.parentNode.parentNode.childNodes[1]);
  // if (id.nodeName == "INPUT") {
  //   id = id.value;
  //   console.log(id);
  //   cont.innerHTML += "<input type='hidden' value='" + id + "' name='to_del[]'>";
  // }
  console.log(node.parentNode.parentNode.parentNode.parentNode);
  node.parentNode.parentNode.parentNode.parentNode.removeChild(node.parentNode.parentNode.parentNode);
}

</script>

     <!-- page content -->