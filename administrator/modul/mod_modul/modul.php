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
				<img src=\"../../images/error-img.png\" title=\"error\" />
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
else{ 
	$aksi = "modul/mod_modul/aksi_modul.php";
	
	$act = isset($_GET['act']) ? $_GET['act'] : '';
	
	switch($act){
		//tampil modul	
		default:
			echo "
				 <!-- Content Header (Page header) -->
					<section class=\"content-header\">
					  <h1>
						Data Manajemen Modul
						
					  </h1>
					  <ol class=\"breadcrumb\">
						<li><a href=\"?module=beranda\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
						<li class=\"active\">Data Modul</li>
					  </ol>
					</section>
			<section class=\"content\">		
			<div class=\"box\">
				<div class=\"box-header\">
					<a class=\"btn btn-success\" onclick=window.location.href=\"?module=modul&act=tambahmodul\">
						<i class=\"glyphicon glyphicon-add icon-white\"></i>
							Add Modul
					</a>
				</div>
				<div class=\"box-body\">
					<table id=\"example1\" class=\"table table-bordered table-striped\">
						<thead>
							<tr>
								<th>Urutan Modul</th>
								<th>Nama Modul</th>
								<th>Link</th>
								
								<th>Tools</th>
							</tr>
						</thead>
						<tbody>";
		$query = "SELECT * FROM modul ORDER BY  urutan";
		$tampil = mysqli_query($koneksi, $query);
		while($t = mysqli_fetch_array($tampil)){
			echo "<tr>
					<td>$t[urutan]</td>
					<td>$t[nama_modul]</td>
                 <td>$t[link]</td>";
			echo "                      
       <td>
            <a class=\"btn btn-info\" href=\"?module=modul&act=editmodul&id=$t[id_modul]\">
                <i class=\"glyphicon glyphicon-edit icon-white\"></i>
                Edit
            </a></td>
          </tr>";	 
		}
		echo "</tbody>
		</table>";  
		
			echo "</div>
			</div>
			</section>";
		break;
		
	//add module	
	case "tambahmodul":
		echo " <!-- Content Header (Page header) -->
					<section class=\"content-header\">
					  <h1>
						Tambah Manajemen Modul
					  </h1>
					  <ol class=\"breadcrumb\">
						<li><a href=\"?module=beranda\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
						<li class=\"active\">Data Modul</li>
					  </ol>
					</section>";
		echo "<section class=\"content\">		
			<div class=\"box\">
				<div class=\"box-header with-border\">
					<h3 class=\"box-title\">Tambah Data Modul</h3>
					  <div class=\"box-tools pull-right\">
						<button type=\"button\" class=\"btn btn-box-tool\" data-widget=\"collapse\" data-toggle=\"tooltip\"
								title=\"Collapse\">
						  <i class=\"fa fa-minus\"></i></button>
						<button type=\"button\" class=\"btn btn-box-tool\" data-widget=\"remove\" data-toggle=\"tooltip\" title=\"Remove\">
						  <i class=\"fa fa-times\"></i></button>
					  </div>";
		echo " <div class=\"box-body\">  
			  <!-- form start -->
            <form class=\"form-horizontal\" action=\"$aksi?module=modul&act=input\" method=\"POST\">
              <div class=\"box-body\">
                <div class=\"form-group\">
                  <label for=\"inputEmail3\" class=\"col-sm-2 control-label\">Nama Modul</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name='nama_modul' class=\"form-control\" id=\"modul\" placeholder=\"Nama Modul\">
                  </div>
                </div>
                <div class=\"form-group\">
                  <label for=\"Link\" class=\"col-sm-2 control-label\">Link</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" class=\"form-control\" name=\"link\" id=\"link\" placeholder=\"Link\">
                  </div>
                </div>
                
                </div>
              </div>
              <!-- /.box-body -->
              <div class=\"box-footer\">
                <button type=\"button\" class=\"btn btn-default\" onclick=\"self.history.back()\">Cancel</button>
                <button type=\"submit\" class=\"btn btn-info pull-right\">Sign in</button>
              </div>
              <!-- /.box-footer -->
            </form>	  
        </div>
        <!-- /.box-body -->
		</div>
	
		</section>";			  
		
	break;
	
	//edit page
	case "editmodul":	
		 $r    = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM modul WHERE id_modul='$_GET[id]'"));
  		echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Modul</h3>
                </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST action='$aksi?module=modul&act=update' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                  <input type=hidden name=id value='$r[id_modul]'>
                    <tr><th width='120px' scope='row'>Nama Modul</th><td><input type='text' class='form-control' name='nama_modul' value='$r[nama_modul]' required></td></tr>
                    <tr><th scope='row'>Link</th>                   <td><input type='text' class='form-control' name='link' value='$r[link]'></td></tr>
                   
                    <tr><th scope='row'>Aktif</th>                  <td>"; if ($r['aktif']=='Y'){ echo "<input type='radio' name='aktif' value='Y' checked> Ya &nbsp; <input type='radio' name='aktif' value='N'> Tidak"; }else{ echo "<input type='radio' name='aktif' value='Y'> Ya &nbsp; <input type='radio' name='aktif' value='N' checked> Tidak"; } echo "</td></tr>
                    <tr><th scope='row'>Status</th>                 <td>"; if ($r['status']=='admin'){ echo "<input type='radio' name='status' value='admin' checked> Admin &nbsp; <input type='radio' name='status' value='user'> User"; }else{ echo "<input type='radio' name='status' value='admin'> Admin &nbsp; <input type='radio' name='status' value='user' checked> User"; } echo "</td></tr>
                    <tr><th scope='row'>Urutan</th>                 <td><input type='text' class='form-control' name='urutan' value='$r[urutan]'></td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <button type=\"button\" class='btn btn-default pull-right' onclick=\"self.history.back()\">Cancel</button>
              </div>
            </div>
          </div>
          <div style='clear:both'></div>";
  
  break;
	
	
	}//end switch
}//end else