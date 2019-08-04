<!-- page content -->

<!-- <div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Rekap Pokja</h3>
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
              <label for="nama" class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="nama" class="form-control col-md-7 col-xs-12" type="text" name="nama"  >
              </div>
            </div>
            <div class="form-group">
              <label for="pagu" class="control-label col-md-3 col-sm-3 col-xs-12">Pagu</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="pagu" class="form-control col-md-7 col-xs-12" type="int" name="pagu"  >
              </div>
            </div>
            <div class="form-group">
              <label for="jabatan_bawah" class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan Bawah</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="jabatan_bawah" class="form-control col-md-7 col-xs-12" type="text" name="jabatan_bawah"  >
              </div>
            </div>
            <div class="form-group">
              <label for="ket" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="ket" class="form-control col-md-7 col-xs-12" type="text" name="ket"  >
              </div>
            </div>
            <div class="form-group">
              <label for="paket_kerja" class="control-label col-md-3 col-sm-3 col-xs-12">Paket Kerja</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="paket_kerja" class="form-control col-md-7 col-xs-12" type="text" name="paket_kerja"  >
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
  </div> -->



  <!-- /page content -->

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
          <h2>Rekap Pokja</h2>
       
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
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Rekap Pokja</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Detail Rekap Pokja</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Paket Kerja</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url("opd/e/$data[formname]/$data[id_laporan]"); ?>' method="post">
                        <input value="rekap_pokja" type="hidden" name="nama_tabel">
                            <div class="form-group">
                            <label for="tgl" class="control-label col-md-3 col-sm-3 col-xs-12">Bulan dan Tahun</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <h3><?php echo date('M, Y', strtotime($data['fetch']['rp']['tgl'])); ?></h3>
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

                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content2" aria-labelledby="profile-tab">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url("opd/e/$data[formname]/$data[id_laporan]"); ?>' method="post">
                          <input value="detail_rekap_pokja" type="hidden" name="nama_tabel">
                          <button type='button' onclick='add_field()'>Tambah</button>
                          <div id="container-opsi">
                            
                          <?php if($data['fetch']['drp'] != NULL){ 
                            foreach($data['fetch']['drp'] as $drp){  
                          ?>
                          <div>  <!-- PENTING -->
                          <div class="col-md-12 col-sm-12 col-xs-12" style='border: 2px solid black; padding:10px;'>
                          <input value='<?php echo $drp['id_detail_rekap_pokja']; ?>' type='hidden' name='id_detail_rekap_pokja[]'>

                          <div class="form-group">
                          <label for="nama" class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value='<?php echo $drp['nama']; ?>' class="form-control col-md-7 col-xs-12" type="text" name="nama[<?php echo $drp['id_detail_rekap_pokja']?>][]"  >
                          </div>
                          </div>
                          <div class="form-group">
                          <label for="jabatan" class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value='<?php echo $drp['jabatan']; ?>' class="form-control col-md-7 col-xs-12" type="text" name="jabatan[<?php echo $drp['id_detail_rekap_pokja']?>][]"  >
                          </div>
                          </div>
                          <div class="form-group">
                          <label for="ket" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value='<?php echo $drp['ket']; ?>' class="form-control col-md-7 col-xs-12" type="text" name="ket[<?php echo $drp['id_detail_rekap_pokja']?>][]"  >
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
                          
                          <div id='deleted'></div>
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
                          <input value="paket_kerja" type="hidden" name="nama_tabel">
                          <div id="container-opsi">
                            
                            <?php if($data['fetch']['drp'] != NULL){ 
                                    foreach($data['fetch']['drp'] as $drp){  
                            ?>

                            <div class="col-md-12 col-sm-12 col-xs-12" style='border: 2px solid black; padding:10px;'>
                            <input value='<?php echo $drp['id_detail_rekap_pokja']; ?>' type='hidden' name='id_detail_rekap_pokja[]'>
                            <h2><?php echo $drp['nama']; ?></h2>
                            <button type='button' onclick='add_hasil_temuan(this)'>Tambah Paket Kerja</button>

                            <?php
                                foreach($data['fetch']['pk'][$drp['id_detail_rekap_pokja']] as $pk){
                            ?>

                          <div class="form-group">
                          <label for="nama_paket_kerja" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Paket Kerja</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value='<?php echo $pk['nama_paket_kerja']; ?>' class="form-control col-md-7 col-xs-12" type="text" name="nama_paket_kerja[<?php echo $pk['id_detail_rekap_pokja']; ?>'][]"  >
                          </div>
                          </div>
                          <div class="form-group">
                          <label for="pagu" class="control-label col-md-3 col-sm-3 col-xs-12">Pagu</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value='<?php echo $pk['pagu']; ?>' class="form-control col-md-7 col-xs-12" type="text" name="pagu[<?php echo $pk['id_detail_rekap_pokja']; ?>'][]"  >
                          </div>
                          </div>

                          <br/>
                          <?php } ?>
                          </div>
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
    </div>
  </div>

<script>

function add_field(){
    var cont = document.getElementById('container-opsi');
    console.log(cont);
    cont.innerHTML = "<div>\
                            <div style='border: 2px solid black;'>\
                            <div class='form-group'>\
                            <label for='nama' class='control-label col-md-3 col-sm-3 col-xs-12'>Nama Temuan</label>\
                            <div class='col-md-6 col-sm-6 col-xs-12'>\
                                <input class='form-control col-md-7 col-xs-12' type='text' name='new[][nama]'  >\
                            </div>\
                            </div>\
                            <div class='form-group'>\
                            <div class='col-md-6 col-sm-6 col-xs-12 col-md-offset-3'>\
                              <button type='button' onclick='delete_node(this)'>Hapus</button>\
                            </div>\
                            </div>\
                            </div></div>\
                      "
                   + cont.innerHTML;
  }

function add_hasil_temuan(node){
  var id = node.parentNode.childNodes[1].value;
    console.log(node.parentNode.childNodes);
    node.parentNode.innerHTML = node.parentNode.innerHTML+"\

    <div class='form-group'>\
    <label for='nama_paket_kerja' class='control-label col-md-3 col-sm-3 col-xs-12'>Nama Paket Kerja</label>\
    <div class='col-md-6 col-sm-6 col-xs-12'>\
      <input class='form-control col-md-7 col-xs-12' type='text' name='nama_paket_kerja["+id+"][] ' >\
    </div>\
    </div>\
    <div class='form-group'>\
    <label for='pagu' class='control-label col-md-3 col-sm-3 col-xs-12'>Pagu</label>\
    <div class='col-md-6 col-sm-6 col-xs-12'>\
      <input class='form-control col-md-7 col-xs-12' type='text' name='pagu["+id+"][]'  >\
    </div>\
    </div>\
    <br/>";
}

function delete_node(node){
    var cont = document.getElementById('deleted');
    // console.log(node.parentNode.childNodes[1].nodeName);
    var id = node.parentNode.parentNode.parentNode.childNodes[1];
    console.log(node.parentNode.parentNode);
    if(id.nodeName == "INPUT"){
      id = id.value;
      console.log(id);
      cont.innerHTML += "<input type='hidden' value='"+id+"' name='to_del[]'>";
    }
    
    node.parentNode.parentNode.parentNode.parentNode.removeChild(node.parentNode.parentNode.parentNode);
  }
</script>

  <!-- /page content -->