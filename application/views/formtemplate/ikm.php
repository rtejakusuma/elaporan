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
          <h2>IKM</h2>
       
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
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">IKM</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">IKM OPD</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url("opd/e/$data[formname]/$data[id_laporan]"); ?>' method="post">
                            <input value="ikm" type="hidden" name="nama_tabel">
                            <div class="form-group">
                            <label for="tahun" class="control-label col-md-3 col-sm-3 col-xs-12">Tahun</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <h2><?php echo date('Y', strtotime($data['fetch']['ikm']['tgl'])); ?></h2>
                            </div>
                            </div>
                        </form>

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url("opd/e/$data[formname]/$data[id_laporan]"); ?>' method="post">
                            <input value="ikm_opd" type="hidden" name="nama_tabel">
                            <input type='hidden' name='id_laporan' value='<?php echo $data['fetch']['ikm']['id_laporan']; ?>'>
                            <div id='container-opsi'>
                            
                            <?php if($data['fetch']['ikmopd'] != NULL){ 
                                    foreach($data['fetch']['ikmopd'] as $ikmopd){  
                            ?>
                              
                            <div style='border: 2px solid black;'>
                            <select name='id_opd[]'>
                            <?php 
                              foreach($data['opsi_opd'] as $opd){
                                $sel = '';
                                if($ikmopd['id_opd'] == $opd['id_opd']) $sel = "selected='selected'";
                                echo "<option value'$opd[id_opd]' $sel>$opd[nama_opd]</option>";
                              }
                            ?>
                            </select>
                            <div class='form-group'>
                            <label for='predikat' class='control-label col-md-3 col-sm-3 col-xs-12'>Predikat</label>
                            <div class='col-md-6 col-sm-6 col-xs-12'>
                              <input class='form-control col-md-7 col-xs-12' type='text' name='predikat[]' >
                            </div>
                            </div>
                            <div class='form-group'>
                            <label for='nilai' class='control-label col-md-3 col-sm-3 col-xs-12'>Nilai</label>
                            <div class='col-md-6 col-sm-6 col-xs-12'>
                              <input class='form-control col-md-7 col-xs-12' type='text' name='nilai[]' >
                            </div>
                            </div>
                            </div>
                              

                            <?php }} ?>
                            <button type='button' onclick='add_field()'>Tambah</button>
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

  var opd = "\
                <div style='border: 2px solid black;'>\
                \<select name='id_opd[]'>\
                <?php 
                  foreach($data['opsi_opd'] as $opd){
                    echo "<option value'$opd[id_opd]'>$opd[nama_opd]</option>";
                  }
                ?>\
              </select>\
              <div class='form-group'>\
              <label for='predikat' class='control-label col-md-3 col-sm-3 col-xs-12'>Predikat</label>\
              <div class='col-md-6 col-sm-6 col-xs-12'>\
                <input class='form-control col-md-7 col-xs-12' type='text' name='predikat[]' >\
              </div>\
              </div>\
              <div class='form-group'>\
              <label for='nilai' class='control-label col-md-3 col-sm-3 col-xs-12'>Nilai</label>\
              <div class='col-md-6 col-sm-6 col-xs-12'>\
                <input class='form-control col-md-7 col-xs-12' type='text' name='nilai[]' >\
              </div>\
              </div>\
              </div>\
              ";
    function add_field(){
      var cont = document.getElementById('container-opsi');
      console.log(cont);
      cont.innerHTML = opd + cont.innerHTML;
    }    
</script>


  <!-- /page content -->