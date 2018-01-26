<?php 
if(empty($_SESSION['nmuser']) AND empty($_SESSION['passuser'])){
	echo "<link href=\"../../css/style.css\" rel=\"stylesheet\" type=\"text/css\"  media=\"all\" />
  <!--start-wrap--->
  <div class=\"wrap\">
  <!---start-header---->
  <div class=\"header\">
  <div class=\"logo\">
  <h1><a href=\"#\">ATTENTION !!!</a></h1>
  </div>
  </div>
  <!---End-header---->
  <!--start-content------>
  <div class=\"content\">
  <img src=\"images/error-img.png\" title=\"error\" />
  <p><span><label>O</label>hh.....</span>Please Login, Before Access This Page !!!</p>
  <a href=\"index.php\">Back To Home</a>
  <div class=\"copy-right\">
  <p>&copy; 2018 Ohh. All Rights Reserved</p>
  </div>
  </div>
  <!--End-Cotent------>
  </div>
  <!--End-wrap--->";
}
else {		
  ?>
  <!-- =============================================== -->

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Welcome To Administrator Room (<?= $_SESSION['namalengkap']; ?>)</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="#">Dashboard</a></li>

    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header">
        <?php  
        if (!isset($_GET['page'])){
          ?>
          <h3 class="box-title data_k"><i class="fa fa-th"></i> Data Tag</h3>
          <h3 class="box-title add_k" style="display: none;"><i class="fa fa-plus"></i> Tambah Tag</h3>

          <?php }else{
            echo '<h3 class="box-title data_k"><i class="fa fa-edit"></i> Edit Tag</h3>';
          } ?>
        </div>
        <!-- /.box-header -->
        <?php  
        if (isset($_GET['page']) && $_GET['page'] == 'update' && isset($_GET['sub'])) {
          ?>
          <div class="box-body">
            <div class="col-sm-12">
              <div class="add-tag-content">
                <form method="POST" action="modul/mod_tag/aksi.php?action=update" class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="nm" class="col-sm-2 control-label">nm Tag</label>
                      <div class="col-sm-10">
                        <?php  
                        $sql   = "SELECT * FROM tag WHERE id_tag = '{$_GET['sub']}'";
                        $query = mysqli_query($koneksi, $sql);
                        $k     = mysqli_fetch_array($query);
                        ?>
                        <input type="hidden" name="id" value="<?php echo $k['id_tag'] ?>">
                        <input type="text" class="form-control" name="nm" id="nm" value="<?php echo $k['nama_tag'] ?>" placeholder="Isi disini..." >
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="tag_seo" class="col-sm-2 control-label">Tag Seo</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="tag_seo" id="tag_seo" value="<?php echo $k['tag_seo'] ?>" placeholder="Isi disini..." autocomplete="off" onclick="this.select()">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="pilihan" class="col-sm-2 control-label">pilihan</label>
                      <div class="col-sm-10">
                         <input type="text" class="form-control" name="pilihan" id="pilihan" value="<?php echo $k['pilihan'] ?>" placeholder="Y/N" autocomplete="off" onclick="this.select()">
                      </div>
                    </div>

                  </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <button type="button" class="btn btn-danger" onclick="window.location = 'media.php?module=tag'">Batal</button>
                      <button type="submit" class="btn btn-info">Kirim</button>
                    </div>
                    <!-- /.box-footer -->
                  </form>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
            <?php } else{ ?>
            <div class="box-body">
              <div class="col-sm-12">
                <div class="col-sm-3">
                  <button type="button" class="btn-add_k btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Data</button>
                  <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Tambah Data</h4>
                        </div>
                        <div class="modal-body">
                          <div class="add-tag-content dn">
                            <form method="POST" action="modul/mod_tag/aksi.php?action=add" class="form-horizontal">
                              <div class="box-body">
                                <div class="form-group">
                                  <label for="nm" class="col-sm-2 control-label">nm tag</label>

                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nm" id="nm" placeholder="Isi disini..." autocomplete="off">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="tag_seo" class="col-sm-2 control-label">Tag Seo</label>

                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tag_seo" id="tag_seo" placeholder="Isi disini..." autocomplete="off">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="pilihan" class="col-sm-2 control-label">Pilihan</label>

                                  <div class="col-sm-10">
                                    <input type="radio"  name="pilihan" id="y" value="Y" > Yes
                                    <input type="radio" name="pilihan" id="n" value="N" >No
                                  </div>
                                </div>

                              </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                              <button type="button" class="btn btn-danger btn-cancel_k">Batal</button>
                              <button type="submit" class="btn btn-info">Kirim</button>
                            </div>
                            <!-- /.box-footer -->
                          </form>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                </div>

              </div>
              <div class="col-sm-4 col-sm-offset-5">
                <?php  
                if (isset($_GET['notif']) && $_GET['notif'] == 'success') {
                  echo '<div class="alert alert-success alert_k alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <strong>Success</strong> Melakukan Aksi
                  </div>';
                }
                elseif (isset($_GET['notif']) && $_GET['notif'] == 'error') {
                  echo '<div class="alert alert-danger alert_k alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <strong>Kesalahan</strong> Melakukan Aksi
                  </div>';
                }
                ?>
              </div>
              <div class="col-sm-12">
                <div class="table-responsive tbl-tag">
                  <table id="example1" class="table table-bordered table-striped dataTable" >
                    <thead>
                      <tr>
                        <th>nm tag</th>
                        <th>Tag Seo</th>
                        <th>Pilihan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php  
                      $query = mysqli_query($koneksi, "SELECT * FROM tag");
                      while ($k = mysqli_fetch_array($query)) :
                        ?>
                        <tr>
                          <td><?php echo $k['nama_tag'] ?></td>
                           <td><?php echo $k['tag_seo'] ?></td>
                            <td><?php echo $k['pilihan'] ?></td>
                          <td align="center">
                            <div class="btn-group">
                              <a href="modul/mod_tag/aksi.php?action=delete&sub=<?php echo $k['id_tag'] ?>" class="btn btn-default" title="Hapus Data?">
                                <i class="fa fa-trash"></i>                          
                              </a>
                              <a href="media.php?module=tag&page=update&sub=<?php echo $k['id_tag'] ?>" class="btn btn-default" title="Edit Data?"><i class="fa fa-edit"></i></a>
                            </div>
                          </td>
                        </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
              </div>

              <!-- /.box-body -->
            </div>
          </div>
          <?php } ?>
          <!-- /.box -->

        </section>
        <!-- /.content -->

        <?php  } ?>
