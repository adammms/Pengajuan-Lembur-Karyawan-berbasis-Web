<?php
if ($_GET['hal']=='home')
{ include "home.php";}
else
if  ($_GET['hal']=='produk')
{ include "produk.php";}
else
if  ($_GET['hal']=='karyawan')
{ include "karyawan.php";}
else
if  ($_GET['hal']=='bagian')
{ include "bagian.php";}
else
if  ($_GET['hal']=='form-ubah-data')
{ include "form_ubah_data.php";}
else
if  ($_GET['hal']=='ganti-password')
{ include "ganti_password.php";}
else
if  ($_GET['hal']=='surat-jalan')
{ include "surat_jalan.php";}
else
if  ($_GET['hal']=='cek-suratjalan')
{ include "cek_suratjalan.php";}
else
if  ($_GET['hal']=='simpan-suratjalan')
{ include "simpan_suratjalan.php";}
else
if  ($_GET['hal']=='detail-suratjalan')
{ include "detail-suratjalan.php";}
else
if  ($_GET['hal']=='data-akun')
{ include "data_akun.php";}
else
if  ($_GET['hal']=='tambah-akun')
{ include "tambah_akun.php";}
else
if ($_GET['hal']=='cetak-laporan')
{ include "cetak_laporan.php";}
else
if ($_GET['hal']=='approval-lembur')
{ include "approval_lembur.php";}
else
if  ($_GET['hal']=='detail-suratjalan-operator')
{ include "detail-suratjalan-operator.php";}
else
if  ($_GET['hal']=='approval-lembur-spv')
{ include "approval_lembur_spv.php";}
else
if  ($_GET['hal']=='data-lembur')
{ include "data_lembur.php";}
else
if  ($_GET['hal']=='data-lembur-operator')
{ include "data_lembur_operator.php";}
else
if  ($_GET['hal']=='detail-suratjalan-spv')
{ include "detail-suratjalan-spv.php";}
?>