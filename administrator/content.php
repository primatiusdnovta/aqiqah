<?php 
	if(empty($_SESSION['leveluser']) AND empty($_SESSION['passuser'])){
		echo "<link href=\"css/style.css\" rel=\"stylesheet\" type=\"text/css\"  media=\"all\" />
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
		include "../config/connection.php";
		
		if($_GET['module']=='beranda'){
			if($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
				include "modul/mod_beranda/beranda.php";
			}
		}
		
		elseif($_GET['module']=='modul'){
			if($_SESSION['leveluser']=='admin'){
				include "modul/mod_modul/modul.php";
			}
		}
		
		elseif($_GET['module']=='user'){
			if($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
				include "modul/mod_user/user.php";
			}
		}
		
		
		elseif($_GET['module']=='produk'){
			if($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
				include "modul/mod_produk/produk.php";		
			}
		}
		
		elseif($_GET['module']=='kategori'){
			if($_SESSION['leveluser']=='admin'){
				include "modul/mod_kategori/kategori.php";
			}
		}
		elseif($_GET['module']=='tag'){
			if($_SESSION['leveluser']=='admin'){
				include "modul/mod_tag/tag.php";
			}
		}
		
		
		
	}
?>