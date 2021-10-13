<?php
require_once "config/koneksi.php";
$proses=$_POST['proses'];
$hapus=$_GET['proses'];
$url="";
//fungsi insert
	function insert($nama_tabel,$values)
	{
		$sql="INSERT INTO ".$nama_tabel." VALUES(".$values.")";
		mysql_query($sql);	
	}
//fungsi update
	function update($nama_tabel,$values,$kondisi)
	{
		$sql="UPDATE ".$nama_tabel." SET ".$values." WHERE ".$kondisi;
		mysql_query($sql);
	}
//fungsi delete
	function delete($nama_tabel,$kondisi)
	{
		$sql="DELETE FROM ".$nama_tabel." WHERE ".$kondisi;
		mysql_query($sql);
	}

//pilih fungsi
	switch($proses){
		//pemilihan fungsi insert
		
		
		//pemilihan fungsi update
		
		case "karyawan_update":
			{
				$nama_tabel="karyawan";
				$values="nik_karyawan='$_POST[nik_karyawan]',
						 nama_karyawan='$_POST[nama_karyawan]',
						 departement='$_POST[departement]',
						 bagian='$_POST[bagian]'";
				$kondisi="inc='$_POST[inc]'";
				update($nama_tabel,$values,$kondisi);
				header("Location:master.php?hal=karyawan");
				break;
			}
        case "bagian_update":
			{
				$nama_tabel="bagian";
				$values="nama_bagian='$_POST[nama_bagian]'";
				$kondisi="id_bagian='$_POST[id_bagian]'";
				update($nama_tabel,$values,$kondisi);
				header("Location:master.php?hal=bagian");
				break;
			}
		case "suratjalan_update":
			{	$nama_tabel="suratjalan";
				$values="nik_karyawan='$_POST[karyawan]',
						 tgl_suratjalan='$_POST[tanggal]',
						 start_time='$_POST[start_time]',
						 end_time='$_POST[end_time]',
						 keterangan='$_POST[keterangan]'";
				$kondisi="inc='$_POST[inc]'";
				update($nama_tabel,$values,$kondisi);
				header("Location:master.php?hal=surat-jalan&id=$_POST[id]&inc=$_POST[inc]");
				break;
			}
		
		//halaman Akun Baru
		case "simpan_akun":
			 { 	 $password=md5($_POST["password"]);
				 $sql="INSERT INTO admins(username,password,nama_lengkap,email,no_telp,level,bagian) 
				    VALUES('$_POST[username]','$password','$_POST[nama_lengkap]','$_POST[email]','$_POST[no_telp]','$_POST[level]','$_POST[bagian]')";
			  mysql_query($sql);
			
			  echo "<script>window.alert('Data berhasil disimpan')</script>";
			  echo "<meta http-equiv='refresh' content='0; url=master.php?hal=data-akun'>";
			  
	    break; }	
		
		case "akun_update":
			 {
			  if($_POST[password]!=''){
			 $password=md5($_POST[password]);
			  $sql="UPDATE admins SET username='$_POST[username]',
									  password='$password',
									  nama_lengkap='$_POST[nama_lengkap]',
									  email='$_POST[email]',
									  no_telp='$_POST[no_telp]',
									  level='$_POST[level]',
									  bagian='$_POST[bagian]'
									  WHERE username='$_POST[username]'";
			  mysql_query($sql);
			  }
			  else {
			   $sql="UPDATE admins SET username='$_POST[username]',
									  nama_lengkap='$_POST[nama_lengkap]',
									  email='$_POST[email]',
									  no_telp='$_POST[no_telp]',
									  level='$_POST[level]',
									  bagian='$_POST[bagian]'
									  WHERE username='$_POST[username]'";
			  mysql_query($sql);
			  }
			  echo "<script>window.alert('Data berhasil diupdate')</script>";
			  echo "<meta http-equiv='refresh' content='0; url=master.php?hal=data-akun'>";
			  
	    break; }
		
		case "ubah_akun":
		{
			$sql="UPDATE account SET password='$_POST[password]', nama='$_POST[nama]', level='$_POST[level]' WHERE username='$_POST[username]'";
			mysql_query($sql);
			$hal="data_akun";
			break;
		}

		
	}//end switch
	
switch($hapus){
	//pemilihan fungsi delete
	case "acc":
			{	$nama_tabel="suratjalan";
				$kondisi="inc='$_GET[inc]'";
				mysql_query("UPDATE suratjalan SET status = 1 WHERE inc='$_GET[inc]'");
				header("Location:master.php?hal=approval-lembur-spv");
				break;
			}
		case "reject":
			{	$nama_tabel="suratjalan";
				$values="nik_karyawan='$_POST[karyawan]',
						 tgl_suratjalan='$_POST[tanggal]',
						 start_time='$_POST[start_time]',
						 end_time='$_POST[end_time]',
						 keterangan='$_POST[keterangan]',
						 status ='$_POST[2]'";
				$kondisi="inc='$_POST[inc]'";
				update($nama_tabel,$values,$kondisi);
				header("Location:master.php?hal=detail-suratjalan&id=$_POST[id]&inc=$_POST[inc]");
				break;
			}
	
    case "karyawan_delete":
			{
				$nama_tabel="karyawan";
				$kondisi="nik_karyawan='$_GET[id]'";
				delete($nama_tabel,$kondisi);
				mysql_query("DELETE FROM suratjalan WHERE nik_karyawan='$_GET[id]'");
				header("Location:master.php?hal=karyawan");
				break;
			}	
	case "bagian_delete":
			{
				$nama_tabel="bagian";
				$kondisi="id_bagian='$_GET[id]'";
				delete($nama_tabel,$kondisi);
				header("Location:master.php?hal=bagian");
				break;
			}	
    
    case "suratjalan_delete":
			{
				$nama_tabel="suratjalan";
				$kondisi="id_suratjalan='$_GET[id]'";
				delete($nama_tabel,$kondisi);
				header("Location:master.php?hal=surat-jalan");
				break;
			}			
	
	 case "suratjalan_item_delete":
			{
			
			$nama_tabel="suratjalan";
				$kondisi="inc='$_GET[inc]'";
				delete($nama_tabel,$kondisi);
				
				//$sql="DELETE FROM suratjalan WHERE int='$_GET[in]'";
				//mysql_query($sql);
				header("location:master.php?hal=detail-suratjalan&id=$_GET[sj]");
				break;
			}
	case "akun_delete":
			{
			$sql="DELETE FROM admins WHERE username='$_GET[id]'";
			mysql_query($sql);
			echo "<script>window.alert('Data berhasil dihapus')</script>";
			echo "<meta http-equiv='refresh' content='0; url=master.php?hal=data-akun'>";
		break;}
}
	
?>