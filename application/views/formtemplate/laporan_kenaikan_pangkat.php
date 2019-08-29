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
           <h2>Laporan Kenaikan Pangkat</h2>

           <div class="clearfix"></div>
         </div>
         <div class="x_content">
           <br />
           <div class="clearfix"></div>

           <div class="">
             <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                 <div class="x_content">
                   <a href='<?php if (isset($data['id_laporan'])) echo base_url("export/$data[formname]/$data[id_laporan]"); ?>' target='_blank'><button class="btn btn-success"><i class="fa fa-print"></i> Excel</button></a>
                   <a href='<?php if (isset($data['id_laporan'])) echo base_url("opd/p/$data[formname]/$data[id_laporan]"); ?>' target='_blank'><button class="btn btn-primary"><i class="fa fa-print"></i> PRINT</button></a>
                   <div class="" role="tabpanel" data-example-id="togglable-tabs">
                     <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                       <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Laporan Kenaikan Pangkat</a>
                       </li>
                       <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Laporan Kenaikan Pangkat</a>
                       </li>
                     </ul>
                     <div id="myTabContent" class="tab-content">
                       <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                         <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url("opd/e/$data[formname]/$data[id_laporan]"); ?>' method="post">
                           <input value="laporan_kenaikan_pangkat" type="hidden" name="nama_tabel">
                           <div class="form-group">
                             <label for="tahun" class="control-label col-md-3 col-sm-3 col-xs-12">Tahun</label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                               <h2><?php echo date('Y', strtotime($data['fetch']['laporan_kenaikan_pangkat']['tgl'])); ?></h2>
                             </div>
                           </div>
                         </form>

                       </div>
                       <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                         <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url("opd/e/$data[formname]/$data[id_laporan]"); ?>' method="post">
                           <input value="laporan_kenaikan_pangkat_opd" type="hidden" name="nama_tabel">
                           <button type='button' onclick='add_field()'>Tambah</button>
                           <div id='container-opsi'>

                             <?php if ($data['fetch']['lkpopd'] != NULL) {
                                foreach ($data['fetch']['lkpopd'] as $lkpopd) {
                                  ?>
                                 <div>

                                   <div class="col-md-12 col-sm-12 col-xs-12" style='border: 2px solid black; padding:10px;'>
                                     <!-- <input value='<?php //echo $lkp['id_temuan']; 
                                                        ?>' type='hidden' name='id_temuan[]'> -->
                                     <div class='form-group'>
                                       <label for="opd" class="control-label col-md-3 col-sm-3 col-xs-12">Nama OPD</label>
                                       <select class="col-md-6 col-sm-6 col-xs-12" name='id_opd[]'>
                                         <?php
                                          foreach ($data['opsi_opd'] as $opd) {
                                            $sel = '';
                                            if ($lkpopd['id_opd'] == $opd['id_opd']) $sel = "selected='selected'";
                                            echo "<option value='$opd[id_opd]' $sel>$opd[nama_opd]</option>";
                                          }
                                          ?>
                                       </select>
                                     </div>

                                     <div class='form-group'>
                                       <label for='no' class='control-label col-md-3 col-sm-3 col-xs-12'>Nomor</label>
                                       <div class='col-md-6 col-sm-6 col-xs-12'>
                                         <input value='<?php echo $lkpopd['no']; ?>' class='form-control col-md-7 col-xs-12' type='text' name='no[]'>
                                       </div>
                                     </div>

                                      <div class='form-group'>
                                       <label for='nama' class='control-label col-md-3 col-sm-3 col-xs-12'>Nama</label>
                                       <div class='col-md-6 col-sm-6 col-xs-12'>
                                         <input value='<?php echo $lkpopd['Nama']; ?>' class='form-control col-md-7 col-xs-12' type='text' Name='Nama[]'>
                                       </div>
                                     </div>

                                      <div class='form-group'>
                                       <label for='NIP' class='control-label col-md-3 col-sm-3 col-xs-12'>NIP</label>
                                       <div class='col-md-6 col-sm-6 col-xs-12'>
                                         <input value='<?php echo $lkpopd['NIP']; ?>' class='form-control col-md-7 col-xs-12' type='text' name='NIP[]'>
                                       </div>
                                     </div>

                                     <div class='form-group'>
                                       <label for='Jabatan' class='control-label col-md-3 col-sm-3 col-xs-12'>Jabatan</label>
                                       <div class='col-md-6 col-sm-6 col-xs-12'>
                                         <input value='<?php echo $lkpopd['Jabatan']; ?>' class='form-control col-md-7 col-xs-12' type='text' name='Jabatan[]'>
                                       </div>
                                     </div>

                                      <div class='form-group'>
                                       <label for='Instansi' class='control-label col-md-3 col-sm-3 col-xs-12'>Instansi</label>
                                       <div class='col-md-6 col-sm-6 col-xs-12'>
                                         <input value='<?php echo $lkpopd['Instansi']; ?>' class='form-control col-md-7 col-xs-12' type='text' name='Instansi[]'>
                                       </div>
                                     </div>

                                     <div class="form-group">
                                       <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                         <button type='button' onclick='delete_node(this)'>Hapus</button>
                                       </div>
                                     </div>

                                   </div>
                                 </div>

                               <?php }
                              } ?>
                           </div>

                           <div class="ln_solid"></div>
                           <div class="form-group">
                             <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                               <button style="position: fixed; bottom: 28px; right: 48px;font-size:20px;  width: 100px;" type="submit" class="btn btn-success">Submit</button>
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
         <div>


           <script>
             var opd = "<div>\
  <div class='col-md-12 col-sm-12 col-xs-12' style='border: 2px solid black; padding:10px;'>\
  \
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
\
<div class='form-group'>\
<label for='no' class='control-label col-md-3 col-sm-3 col-xs-12'>no</label>\
<div class='col-md-6 col-sm-6 col-xs-12'>\
  <input class='form-control col-md-7 col-xs-12' type='text' name='no[]' >\
</div>\
</div>\
\
<div class='form-group'>\
<label for='nama' class='control-label col-md-3 col-sm-3 col-xs-12'>nama</label>\
<div class='col-md-6 col-sm-6 col-xs-12'>\
  <input class='form-control col-md-7 col-xs-12' type='text' name='nama[]' >\
</div>\
</div>\
\
<div class='form-group'>\
<label for='NIP' class='control-label col-md-3 col-sm-3 col-xs-12'>NIP</label>\
<div class='col-md-6 col-sm-6 col-xs-12'>\
  <input class='form-control col-md-7 col-xs-12' type='text' name='NIP[]' >\
</div>\
</div>\
\
<div class='form-group'>\
<label for='Jabatan' class='control-label col-md-3 col-sm-3 col-xs-12'>Jabatan</label>\
<div class='col-md-6 col-sm-6 col-xs-12'>\
  <input class='form-control col-md-7 col-xs-12' type='text' name='Jabatan[]' >\
</div>\
</div>\
\
<div class='form-group'>\
<div class='col-md-6 col-sm-6 col-xs-12 col-md-offset-3'>\
  <button type='button' onclick='delete_node(this)'>Hapus</button>\
</div>\
</div>\
\
</div>\
</div>\
";

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