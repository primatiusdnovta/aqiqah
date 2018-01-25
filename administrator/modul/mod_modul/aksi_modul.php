<?php 
session_start();
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
	include "../../../config/connection.php";
    $module = $_GET['module'];
    $act = $_GET['act'];

     //input modul
    if($module=='modul' AND $act=='input'){
        //cari urutan akhir
        $query = mysqli_query($koneksi,"SELECT urutan FROM modul ORDER BY urutan DESC LIMIT 1");
        $r = mysqli_fetch_array($query);
        
        $urutan = $r['urutan']+1;
        $nama_modul = $_POST['nama_modul'];
        $link = $_POST['link'];
        
        $input  = "INSERT modul SET nama_modul = '$nama_modul',
                                    link = '$link',
                                    urutan = '$urutan',
                                    status = 'user'";

        mysqli_query($koneksi,$input);
        header("location:../../media.php?module=".$module);
    }

    //update modul 
     //update modul
    elseif($module=='modul' AND $act=='update'){
        $id         = $_POST['id'];
        $urutan     = $_POST['urutan'];
        $nama_modul = $_POST['nama_modul'];
        $link       = $_POST['link'];
        $status     = $_POST['status'];
        $aktif      = $_POST['aktif'];
        
        $update = "UPDATE modul SET nama_modul  = '$nama_modul',
                                    link = '$link',
                                    urutan = '$urutan',
                                    status = '$status', 
                                    aktif = '$aktif'
                        WHERE id_modul = '$id'";
        mysqli_query($koneksi,$update);
        header("location:../../media.php?module=".$module);
    }
}