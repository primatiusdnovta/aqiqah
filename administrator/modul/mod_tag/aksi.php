<?php 
session_start();
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
	include '../../../config/connection.php';
	switch ($_GET['action']) {
	    case "add":
			$nm = $_POST['nm'];
			$tag_seo = $_POST['tag_seo'];
			$pilihan = $_POST['pilihan'];	
			$cek_sql   = "SELECT nama_tag FROM tag WHERE nama_tag = '$nm'";
			$cek_query = mysqli_query($koneksi, $cek_sql);
			$cek       = mysqli_num_rows($cek_query);

	        if ($cek > 0) {
	        	header('location:../../media.php?module=tag&notif=error');
	        }
	        else{
		        $add = "INSERT tag SET nama_tag = '$nm',tag_seo = '$tag_seo',pilihan = '$pilihan'";
		        if (mysqli_query($koneksi, $add)) {
		        	header('location:../../media.php?module=tag&notif=success');
		        }
		        else{
	        		header('location:../../media.php?module=tag&notif=error');
		        }
	        }
	        break;
	    case "update":
			$id = $_POST['id'];
			$nm = $_POST['nm'];
			$tag_seo = $_POST['tag_seo'];
			$pilihan = $_POST['pilihan'];

			$cek_sql   = "SELECT nama_tag FROM tag WHERE nama_tag = '$nm'";
			$cek_query = mysqli_query($koneksi, $cek_sql);
			$cek       = mysqli_num_rows($cek_query);

	        if ($cek > 0) {
	        	header('location:../../media.php?module=tag&notif=error');
	        }
	        else{
		        $add = "UPDATE tag SET nama_tag = '$nm',tag_seo = '$tag_seo',pilihan = '$pilihan' WHERE id_tag = '$id'";
		        if (mysqli_query($koneksi, $add)) {
		        	header('location:../../media.php?module=tag&notif=success');
		        }
		        else{
	        		header('location:../../media.php?module=tag&notif=error');
		        }
	        }

	        break;
	    case "delete":
			$id = $_GET['sub'];

	        $del = "DELETE FROM tag WHERE id_tag = '$id'";
	        if (mysqli_query($koneksi, $del)) {
	        	header('location:../../media.php?module=tag&notif=success');
	        }
	        else{
        		header('location:../../media.php?module=tag&notif=error');
	        }
	        break;
	    default:
	        header('location:../../media.php?module=tag&notif=error');
	}
}
?>