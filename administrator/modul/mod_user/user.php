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
	 $aksi = "modul/mod_user/user.php";
	 $act = isset($_GET['act']) ? $_GET['act'] : '';
	 
	 switch($act){
		 //tampill data 
		 default:
			echo "
				 <!-- Content Header (Page header) -->
					<section class=\"content-header\">
					  <h1>
						Data Manajemen User</h1>
					  <ol class=\"breadcrumb\">
						<li><a href=\"?module=beranda\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
						<li class=\"active\" ><a href=\"?module=user\">Data User</a></li>
					  </ol>
					</section>
			<section class=\"content\">		
			<div class=\"box\">";
			if($_SESSION['leveluser']=='admin'){
					$query  = "SELECT * FROM users ORDER BY username";
					$tampil = mysqli_query($koneksi,$query);
					echo "<div class=\"box-header\">
							<button class=\"btn btn-success\" onclick=window.location.href=\"?module=user&act=tambahuser\">Add User</button>
						</div>
				<div class=\"box-body\">";
					}
					else{
						$query  = "SELECT * FROM users WHERE username = '$_SESSION[namauser]'";
						$tampil = mysqli_query($koneksi, $query);
					}
				
				
				echo"<table id=\"example1\" class=\"table table-striped table-bordered bootstrap-datatable datatable responsive\">
						<thead>
							<tr>
									<th>No.</th>    
									<th>Username</th>
									<th>Nama Lengkap</th>
									<th>E-mail</th>
									<th>Level</th>
									<th>Blokir</th>
									<th>Actions</th>
							</tr>
						</thead>
						<tbody>";
		$no = 1;
    while ($tyo = mysqli_fetch_array($tampil)){
         echo "<tr><td>$no</td>
				   <td>$tyo[username]</td>
                   <td>$tyo[nama_lengkap]</td>
                   <td>$tyo[email]</td>
                   <td>$tyo[level]</td>";
         if($tyo['blokir']=='Y'){
             echo "<td class=\"center\">
                       <span class=\" label-default label label-danger\">$tyo[blokir]</span> 
                 </td>";
         }
         else{
                echo "<td class=\"center\">
                    <span class=\" label-success label label-default  \">$tyo[blokir]</span>
                    </td>";
         }
        echo "           
                   <td>
            <a class=\"btn btn-info\" href=\"?module=user&act=edituser&id=$tyo[id_session]\">
                <i class=\"glyphicon glyphicon-edit icon-white\"></i>
                Edit
            </a>
                   </td>    
             </tr>";
       $no++; 
    }
				 
				echo "</tbody>
		</table>";  
		
			echo "</div>
			</div>
			</section>";
		
	break;
	
	case "tambahuser":
		
		echo "<section class=\"content\">		
			<div class=\"box\">
				<div class=\"box-header with-border\">
					<h3 class=\"box-title\">Tambah Data User</h3>
					  <div class=\"box-tools pull-right\">
						<button type=\"button\" class=\"btn btn-box-tool\" data-widget=\"collapse\" data-toggle=\"tooltip\"
								title=\"Collapse\">
						  <i class=\"fa fa-minus\"></i></button>
						<button type=\"button\" class=\"btn btn-box-tool\" data-widget=\"remove\" data-toggle=\"tooltip\" title=\"Remove\">
						  <i class=\"fa fa-times\"></i></button>
					  </div>";
		echo " <div class=\"box-body\">  
			  <!-- form start -->
            <form class=\"form-horizontal\" action=\"$aksi?module=user&act=input\" method=\"POST\">
              <div class=\"box-body\">
                <div class=\"form-group\">
                  <label  class=\"col-sm-2 control-label\">Username</label>
                  <div class=\"col-sm-6\">
                    <input type=\"text\" class=\"form-control\" name='username' id=\"username\" placeholder=\"Username\">
                  </div>
                </div>
                <div class=\"form-group\">
                  <label for=\"Link\" class=\"col-sm-2 control-label\">Password</label>
                  <div class=\"col-sm-6\">
                    <input type=\"password\" class=\"form-control\" name='password' id=\"password\" placeholder=\"Password\">
                  </div>
                </div>
                
				<div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\">Nama Lengkap</label>
                  <div class=\"col-sm-6\">
                    <input type=\"text\" class=\"form-control\" id=\"nama_lengkap\" name=\"nama_lengkap\" placeholder=\"Nama Lengkap\">
                  </div>
                </div>
				
				<div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\">Email</label>
                  <div class=\"col-sm-6\">
                    <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" placeholder=\"Email\">
                  </div>
                </div>
				
				
                </div>
              </div>
              <!-- /.box-body -->
              <div class=\"box-footer\">
                <button type=\"button\" class=\"btn btn-default\" onclick=\"self.history.back()\">Cancel</button>
                <button type=\"submit\" class=\"btn btn-info pull-right\">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>	  
        </div>
        <!-- /.box-body -->
		</div>
		</section>";
	break;
	
	case "edituser":
	  $query = "SELECT * FROM users WHERE id_session='$_GET[id]'";
      $hasil = mysqli_query($koneksi, $query);
      $r     = mysqli_fetch_array($hasil);
        
	if($_SESSION['leveluser']=='admin'){
		echo "<section class=\"content\">		
			<div class=\"box\">
				<div class=\"box-header with-border\">
					<h3 class=\"box-title\">Update Data User</h3>
					  <div class=\"box-tools pull-right\">
						<button type=\"button\" class=\"btn btn-box-tool\" data-widget=\"collapse\" data-toggle=\"tooltip\"
								title=\"Collapse\">
						  <i class=\"fa fa-minus\"></i></button>
						<button type=\"button\" class=\"btn btn-box-tool\" data-widget=\"remove\" data-toggle=\"tooltip\" title=\"Remove\">
						  <i class=\"fa fa-times\"></i></button>
					  </div>";
		echo " <div class=\"box-body\">  
			  <!-- form start -->
            <form class=\"form-horizontal\" action=\"$aksi?module=user&act=update\" method=\"POST\">
              <input type=\"hidden\" value=\"$r[id_session]\" name=\"id\">
			  <div class=\"box-body\">
                <div class=\"form-group\">
                  <label  class=\"col-sm-2 control-label\">Username</label>
                  <div class=\"col-sm-6\">
                    <input type=\"text\" class=\"form-control\" name='username' id=\"username\" placeholder=\"Username\">
                  </div>
                </div>
                <div class=\"form-group\">
                  <label for=\"Link\" class=\"col-sm-2 control-label\">Password</label>
                  <div class=\"col-sm-6\">
                    <input type=\"password\" class=\"form-control\" name='password' id=\"password\" placeholder=\"Password\">
                  </div>
                </div>
                
				<div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\">Nama Lengkap</label>
                  <div class=\"col-sm-6\">
                    <input type=\"text\" class=\"form-control\" id=\"nama_lengkap\" name=\"nama_lengkap\" placeholder=\"Nama Lengkap\">
                  </div>
                </div>";
		if($r['blokir']=='Y'){
			echo "<div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\">Blokir User</label>
                  <div class=\"col-sm-6\">
					<input type=\"radio\" name=\"blokir\" class=\"minimal\" value=\"Y\" checked /> Y | <input type=\"radio\" name=\"blokir\" class=\"minimal\" value=\"N\" /> N  	
                  </div>
                </div>";
		}		
		else{
			echo "<div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\">Blokir User</label>
                  <div class=\"col-sm-6\">
					<input type=\"radio\" name=\"blokir\" class=\"minimal\" value=\"Y\"/> Y | <input type=\"radio\" name=\"blokir\" class=\"minimal\" value=\"N\" checked/> N  	
                  </div>
                </div>";
		}
		
		if($r['level']=='admin'){
			echo "<div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\">Level</label>
                  <div class=\"col-sm-6\">
					<input type=\"radio\" name=\"level\" class=\"minimal\" value=\"admin\" checked /> admin | <input type=\"radio\" name=\"level\" class=\"minimal\" value=\"user\" /> user  	
                  </div>
                </div>";
		}
		else{
			echo "<div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\">Level</label>
                  <div class=\"col-sm-6\">
					<input type=\"radio\" name=\"level\" class=\"minimal\" value=\"admin\"  /> admin | <input type=\"radio\" name=\"level\" class=\"minimal\" value=\"user\" checked /> user  	
                  </div>
                </div>";
		}
		
				
        echo"        </div>
              </div>
              <!-- /.box-body -->
              <div class=\"box-footer\">
                <button type=\"button\" class=\"btn btn-default\" onclick=\"self.history.back()\">Cancel</button>
                <button type=\"submit\" class=\"btn btn-info pull-right\">Update</button>
              </div>
              <!-- /.box-footer -->
            </form>	  
        </div>
        <!-- /.box-body -->
		</div>
		</section>";								
	}//end if session	
	
	break;
			 
			 
			 
			 
			 
	 }
}