<?php
include "../config/connection.php";

//fungsi untuk menghindari injeksi dari user yang jahil
function anti_injection($data){
	$filter = stripcslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
	return $filter;
}

$username = anti_injection($_POST['username']);
$password = anti_injection(md5($_POST['password']));

//menghindari sql injection
$injeksi_username = mysqli_real_escape_string($koneksi, $username);
$injeksi_password = mysqli_real_escape_string($koneksi, $password);

//pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($injeksi_username) OR !ctype_alnum($injeksi_password)){
	echo "<script type=\"text/javascript\">alert('Sekarang loginnya tidak bisa di injeksi lho'); window.location = 'index.php'</script>";
}
else{
	$query = "SELECT * FROM users WHERE username='$username' AND password='$password' AND blokir='N'";
	$login = mysqli_query($koneksi, $query);
	$ketemu = mysqli_num_rows($login);
	$r = mysqli_fetch_array($login);

	//Apabila username dan password ditemukan (benar)
	if ($ketemu > 0){
		session_start();

	//bikin variabel session
	$_SESSION['namauser'] = $r['username'];
	$_SESSION['passuser'] = $r['password'];
	$_SESSION['namalengkap'] = $r['nama_lengkap'];
	$_SESSION['leveluser'] = $r['level'];

	// bikin id_session yang unik dan mengupdatenya agar selalu berubah
	// agar user biasa sulit untuk mengganti password Administrator
	$sid_lama = session_id();
	session_regenerate_id();
	$sid_baru = session_id();
	mysqli_query($koneksi, "UPDATE users SET id_session="." '$sid_baru' WHERE username='$username'");

header("location:media.php?module=beranda");
		}
		else{
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
				<p><span><label>O</label>hh.....</span>Your Password is Wrong Or Your Account Has been Blokir</p>
				<a href=\"index.php\">Back To Home</a>
				<div class=\"copy-right\">
					<p>&copy; 2018 All Rights Reserved</p>
				</div>
   			</div>
			<!--End-Cotent------>
		</div>
		<!--End-wrap--->";
			echo "<a href=\"index.php\">
			Ulangi Lagi</a>";
		}
}
?>
