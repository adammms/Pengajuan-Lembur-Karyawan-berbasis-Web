<?php
session_start();

include "config/koneksi.php";

$r=mysql_fetch_array(mysql_query("SELECT * FROM admins where username='$_SESSION[namauser]'"));

$pass_lama=md5($_POST[pass_lama]);
$pass_baru=md5($_POST[pass_baru]);

if (empty($_POST[pass_baru]) OR empty($_POST[pass_lama]) OR empty($_POST[pass_ulangi])){
  echo "<p align=center>Anda harus mengisikan semua data pada form Ganti Password.<br />"; 
  echo "<a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a></p>";
}
else{ 
// Apabila password lama cocok dengan password admin di database
if ($pass_lama==$r[password]){
  // Pastikan bahwa password baru yang dimasukkan sebanyak dua kali sudah cocok
  if ($_POST[pass_baru]==$_POST[pass_ulangi]){
    mysql_query("UPDATE admins SET username = '$_POST[username]',
								   password = '$pass_baru'");
	  echo "<script>alert('Update Password Berhasil'); window.location = 'index.php'</script>";
  }
  else{
	echo "<script>alert('Password baru yang anda masukkan tidak sama'); window.location = 'master.php?hal=ganti-password'</script>";
  }
}
else{
echo "<script>alert('Password Lama anda salah'); window.location = 'master.php?hal=ganti-password'</script>";
}
}

?>
