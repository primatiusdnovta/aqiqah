<?php 
if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
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
        <div class="box-header with-border">
          <h3 class="box-title">List Menu</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
			 <ul class="bs-glyphicons">
                  <li>
                    <span class="glyphicon glyphicon-user "style="color:green"></span>
                    <span class="glyphicon-class"><a href="?module=user"><h4>Manajemen User</h4></a></span>
                  </li>
				  <li>
                    <span class="glyphicon glyphicon-globe"></span>
                    <span class="glyphicon-class"><a href="?module=modul"><h4>Manajemen Modul</h4></a></span>
                  </li>
				  <li>
                    <span class="glyphicon glyphicon-globe"></span>
                    <span class="glyphicon-class"><a href="?module=identitas"><h4>Identitas Web</h4></a></span>
                  </li>
				  <li>
                    <span class="glyphicon glyphicon-globe"></span>
                    <span class="glyphicon-class"><a href="?module=produk"><h4>Manajemen Produk</h4></a></span>
                  </li>
				  <li>
                    <span class="glyphicon glyphicon-globe"></span>
                    <span class="glyphicon-class"><a href="?module=kategori"><h4>Manajemen Kategori</h4></a></span>
                  </li>
				  <li>
                    <span class="glyphicon glyphicon-globe"></span>
                    <span class="glyphicon-class"><a href="#"><h4>Manajemen Berita</h4></a></span>
                  </li>
				  <li>
                    <span class="glyphicon glyphicon-globe"></span>
                    <span class="glyphicon-class"><a href="#"><h4>Manajemen Berita</h4></a></span>
                  </li>
				  <li>
                    <span class="glyphicon glyphicon-globe"></span>
                    <span class="glyphicon-class"><a href="#"><h4>Manajemen Berita</h4></a></span>
                  </li>
				  <li>
                    <span class="glyphicon glyphicon-globe"></span>
                    <span class="glyphicon-class"><a href="#"><h4>Manajemen Berita</h4></a></span>
                  </li>
				  <li>
                    <span class="glyphicon glyphicon-globe"></span>
                    <span class="glyphicon-class"><a href="#"><h4>Manajemen Berita</h4></a></span>
                  </li>
				  <li>
                    <span class="glyphicon glyphicon-globe"></span>
                    <span class="glyphicon-class"><a href="#"><h4>Manajemen Berita</h4></a></span>
                  </li>
			 </ul>	  
		  
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <?php echo date('Y'); ?>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  
<?php  } ?>
