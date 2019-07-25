<div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Riwayat Surat</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                  <div id='search box' style='border: 1px solid; padding: 5px'>
                      <form action="<?php echo base_url('admin/riwayatsurat'); ?>" method="get">
                        <table>
                          <tbody>
                            <tr>
                              <td class="col-sm-1">
                              <center>
                                <strong>ID Surat</strong> <br/>
                                <input type="text" name="id_surat">
                              </center>
                              </td>
                              <td class="col-sm-1">
                              <center>
                                <strong>OPD</strong> <br/>
                                <select name="id_opd">
                                  <?php
                                    foreach($data['opsi_opd'] as $row){
                                      echo "<option value='$row->id_opd'>$row->nama_opd</option>";
                                    }
                                  ?>
                                  
                                </select>
                              </center>
                              </td>
                              <td class="col-sm-1">
                              <center>
                                <strong> Jenis Surat </strong> <br/>
                                <select name="id_tipe">
                                  <?php
                                      foreach ($data['opsi_surat'] as $type) {
                                        echo "<option value='$type->id_tipe'>$type->nama_surat</option>";
                                      }
                                  ?>
                                </select>
                              </center>
                              </td>
                              <td class="col-sm-1">
                              <center>
                                <strong> Waktu Awal </strong> <br/>
                                <input type="date" name="start_date" value="<?php echo date('Y-m-d'); ?>">
                              </center>
                              </td>
                              <td class="col-sm-1">
                              <center>
                                <strong> Waktu Akhir </strong> <br/>
                                <input type="date" name="end_date" value="<?php echo date('Y-m-d'); ?>">
                              </center>
                              </td>
                              <td class="col-sm-1">
                              <center>
                                <button type="submit">Cari</button>
                              </center>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </form>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">ID Surat</th>
                            <th class="column-title">OPD</th>
                            <th class="column-title">Tipe Surat</th>
                            <th class="column-title">Waktu Pembuatan</th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php
                            if($data['list_surat'] == NULL || sizeof($data['list_surat']) <= 0){
                              echo "<h2>Tidak ada riwayat surat</h2>";
                            } else {
                              $counter = "even pointer";
                              foreach($data['list_surat'] as $datasurat){
                                echo "<tr class=$counter>
                                        <td>$datasurat->id_surat</td>
                                        <td>$datasurat->nama_opd</td>
                                        <td>$datasurat->nama_surat</td>
                                        <td>".date('d-m-Y H:i:s', strtotime($datasurat->created_at))."</td>
                                      </tr>";
                                if($counter == "even pointer") $counter = "odd pointer";
                                else $counter = "even pointer";
                              }
                            }
                          ?>

                        </tbody>
                      </table>
                    </div>
							
						
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
