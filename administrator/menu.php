<?php
include "../config/connection.php";

if ($_SESSION['leveluser']=='admin'){
  $query = "SELECT * FROM modul WHERE aktif='Y' ORDER BY urutan";
  $hasil = mysqli_query($koneksi, $query);
  while ($m=mysqli_fetch_array($hasil)){  
    echo "<li><a href=\"$m[link]\"><i
                                    class=\"fa fa-laptop\"></i><span> $m[nama_modul] </span></a></li>";
  }
}
elseif ($_SESSION['leveluser']=='user'){
  $query = "SELECT * FROM modul WHERE status='user' and aktif='Y' ORDER BY urutan";
  $hasil = mysqli_query($koneksi, $query);
  while ($m=mysqli_fetch_array($hasil)){  
    echo "<li><a href=\"$m[link]\"><i
                                    class=\"fa fa-laptop\"></i><span> $m[nama_modul] </span></a></li>";
  }
} 
?>
