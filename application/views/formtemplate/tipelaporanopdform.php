<!-- Start to do list -->
<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>To Do List <small>Sample tasks</small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
        <select id="opd" name="id_opd" >
            <?php
              foreach($data['opsi_opd'] as $opd){
                echo "<option value=\'" . $opd->id_opd . "\'>" . strtoupper($opd->nama_opd) . "</option>";
              }
            ?>
        </select>
    </div>
                <div class="x_content">

                  <div class="">
                    <ul class="to_do">
                      <?php
                        foreach($data['opsi_tipelaporan'] as $opsi_tipe){
                          echo "<li><p><input type='checkbox'  class='flat'> $opsi_tipe->nama_laporan</p></li>";
                        }
                      ?>
                      
                    </ul>
                  </div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-primary" type="button">Cancel</button>
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                 </div>
                </div>
              </div>
            </div>
            <!-- End to do list -->