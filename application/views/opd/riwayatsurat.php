<div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Riwayat Surat</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">ID Surat</th>
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
                                        <td>$datasurat[id_surat]</td>
                                        <td>$datasurat[nama_surat]</td>
                                        <td>$datasurat[created_at]</td>
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