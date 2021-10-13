<?php
include "config/koneksi.php";
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}

$username = antiinjection($_POST['username']);
$pass     = antiinjection(md5($_POST['password']));

$login=mysql_query("SELECT * FROM admins WHERE username='$username' AND password='$pass' AND blokir='N'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
 // session_register("namauser");
  //session_register("namalengkap");
 // session_register("passuser");
  //session_register("leveluser");

  $_SESSION[namauser]     = $r[username];
  $_SESSION[namalengkap]  = $r[nama_lengkap];
  $_SESSION[passuser]     = $r[password];
  $_SESSION[leveluser]    = $r[level];
  $_SESSION[deparment]    = $r[bagian];
  
  header('location:master.php?hal=surat-jalan');
}
if ($_SESSION['leveluser'] == "admin") {
  header('location:master.php?hal=cetak-laporan');
}
if ($_SESSION['leveluser'] == "supervisor") {
  header('location:master.php?hal=approval-lembur-spv');
}
if ($_SESSION['leveluser'] == "operator") {
  header('location:master.php?hal=data-lembur-operator');
}
if ($_SESSION['leveluser'] == ""){
  header('location:index.php');
}
?>
