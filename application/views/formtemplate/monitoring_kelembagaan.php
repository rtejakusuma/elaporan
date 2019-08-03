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
          <h2>Monitoring Kelembagaan</h2>
       
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
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Monitoring Kelembagaan</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Permasalahan Kelembagaan</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url("opd/e/$data[formname]/$data[id_laporan]"); ?>' method="post">
                        <input value="monitoring_kelembagaan" type="hidden" name="nama_tabel">
                            <div class="form-group">
                            <label for="tahun" class="control-label col-md-3 col-sm-3 col-xs-12">Tahun</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <h2><?php echo date('Y', strtotime($data['fetch']['mk']['tgl'])); ?></h2>
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
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url("opd/e/$data[formname]/$data[id_laporan]"); ?>' method="post">
                            
                            <input value="permasalahan_kelembagaan" type="hidden" name="nama_tabel">
                            <button type='button' onclick='add_field()'>Tambah</button>
                            <div id='container-opsi'>

                            <?php if($data['fetch']['pk'] != NULL){ 
                                    foreach($data['fetch']['pk'] as $pkdata){  
                            ?>
                            <div class="form-group">  
                              
                              <div class="col-md-12 col-sm-12 col-xs-12" style='border: 2px solid black; padding:10px;'>
                              <label for="opd" class="control-label col-md-3 col-sm-3 col-xs-12">Nama OPD</label>
                                <select class="col-md-6 col-sm-6 col-xs-12" name='id_opd[]'>
                            <?php 
                              foreach($data['opsi_opd'] as $opd){
                                $sel = '';
                                if($pkdata['id_opd'] == $opd['id_opd']) $sel = "selected='selected'";
                                echo "<option value='$opd[id_opd]' $sel>$opd[nama_opd]</option>";
                              }
                            ?>
                            </select>
                            <br/><br/>
                            <div class="form-group">
                            <label for="permasalahan_kelembagaan" class="control-label col-md-3 col-sm-3 col-xs-12">Permasalahan Kelembagaan</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value='<?php echo $pkdata['permasalahan_kelembagaan'] ?>'  class="form-control col-md-7 col-xs-12" type="text" name="permasalahan_kelembagaan[]"  >
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="usulan" class="control-label col-md-3 col-sm-3 col-xs-12">Usulan</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value='<?php echo $pkdata['usulan'] ?>'  class="form-control col-md-7 col-xs-12" type="text" name="usulan[]"  >
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="dasar_hukum" class="control-label col-md-3 col-sm-3 col-xs-12">Dasar Hukum</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value='<?php echo $pkdata['dasar_hukum'] ?>'  class="form-control col-md-7 col-xs-12" type="text" name="dasar_hukum[]"  >
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="ket" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input value='<?php echo $pkdata['ket'] ?>'  class="form-control col-md-7 col-xs-12" type="text" name="ket[]"  >
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type='button' onclick='delete_node(this)'>Hapus</button>
                            </div>
                            </div>
                            </div>
                              <br/><br/></div>
                              <?php }} ?>
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
  

<script>

var opd = "<div class='form-group'>\
                <div class='col-md-12 col-sm-12 col-xs-12' style='border: 2px solid black; padding:10px;'>\
                <label for='opd' class='control-label col-md-3 col-sm-3 col-xs-12'>Nama OPD</label>\
                <select class='col-md-6 col-sm-6 col-xs-12' name='id_opd[]'>\
              <?php 
                foreach($data['opsi_opd'] as $opd){
                  echo "<option value='$opd[id_opd]'>$opd[nama_opd]</option>";
                }
              ?>\
            </select>\
            <br/><br/>\
            <div class='form-group'>\
                            <label for='permasalahan_kelembagaan' class='control-label col-md-3 col-sm-3 col-xs-12'>Permasalahan Kelembagaan</label>\
                            <div class='col-md-6 col-sm-6 col-xs-12'>\
                                <input  class='form-control col-md-7 col-xs-12' type='text' name='permasalahan_kelembagaan[]'  >\
                            </div>\
                            </div>\
                            <div class='form-group'>\
                            <label for='usulan' class='control-label col-md-3 col-sm-3 col-xs-12'>Usulan</label>\
                            <div class='col-md-6 col-sm-6 col-xs-12'>\
                                <input  class='form-control col-md-7 col-xs-12' type='text' name='usulan[]'  >\
                            </div>\
                            </div>\
                            <div class='form-group'>\
                            <label for='dasar_hukum' class='control-label col-md-3 col-sm-3 col-xs-12'>Dasar Hukum</label>\
                            <div class='col-md-6 col-sm-6 col-xs-12'>\
                                <input  class='form-control col-md-7 col-xs-12' type='text' name='dasar_hukum[]'  >\
                            </div>\
                            </div>\
                            <div class='form-group'>\
                            <label for='ket' class='control-label col-md-3 col-sm-3 col-xs-12'>Keterangan</label>\
                            <div class='col-md-6 col-sm-6 col-xs-12'>\
                                <input  class='form-control col-md-7 col-xs-12' type='text' name='ket[]'  >\
                            </div>\
                            </div>\
                            <div class='form-group'>\
                              <div class='col-md-6 col-sm-6 col-xs-12 col-md-offset-3'>\
              <button type='button' onclick='delete_node(this)'>Hapus</button>\
              </div>\
              </div>\
            </div>\
            <br/><br/></div>";

  function add_field(){
    var cont = document.getElementById('container-opsi');
    console.log(cont);
    cont.innerHTML = opd + cont.innerHTML;
  }
  function delete_node(node){
    node.parentNode.parentNode.parentNode.removeChild(node.parentNode.parentNode);
  }
</script>

  <!-- /page content -->