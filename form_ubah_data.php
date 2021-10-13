<div class="row">
<script type="text/javascript">
function hitung() {
	var qty = document.formUbahData.qty.value;
	var subtotal = document.formUbahData.subtotal.value;
	var harga = document.formUbahData.harga.value;
	subtotal = (harga) * qty;
	document.formUbahData.subtotal.value = Math.floor(subtotal);
}

</script>

<?php
require_once "config/koneksi.php";

	echo "
	<form class='form-horizontal' id=formUbahData name=formUbahData method=post action=proses.php>
	<input type=hidden name=proses id=proses value=$_GET[kode] />";
	
if($_GET['kode']=="karyawan_update"){
		$e=mysql_fetch_array(mysql_query("select * from karyawan where inc ='$_GET[id]'"));
echo"<div class='col-sm-8'>
 <div class='panel panel-default'>
    <div class='panel-heading'><span class='glyphicon glyphicon-user'></span> <b>Form Ubah karyawan</b></div>
    <div class='panel-body'>
 <input name='inc' value='".$e[inc]."' type='hidden'>
<div class='form-group'>
        <div class='col-sm-12'>
          <input name='nik_karyawan' maxlength='64' class='form-control required' value='".$e[nik_karyawan]."' type='text' title='NIK karyawan harus diisi.'></div>
      </div>
	  
      <div class='form-group'>
        <div class='col-sm-12'>
          <input name='nama_karyawan' maxlength='64' class='form-control required' value='".$e[nama_karyawan]."' type='text' title='Nama karyawan harus diisi.'></div>
      </div>
	  
	  
	  ";
	  var_dump($e);
	  var_dump($e[departement]);
	  echo"
	  <div class='form-group'>
        <div class='col-sm-12'>
		<select name='departement' maxlength='64' class='form-control required' title='Nama departement harus diisi.'>";
					$tampil=mysql_query("SELECT * FROM bagian ORDER BY id_bagian");

						if ($e[departement]==0){
					echo "<option value=0 selected>Nama departement</option>";}   

					while($w=mysql_fetch_array($tampil)){
						var_dump($w);
						echo'<br>';
					if ($e[departement]==$w[id_bagian]){
						echo $e[departement].' == '.$w[id_bagian];
              echo "<option value=$w[id_bagian] selected>$w[nama_bagian]</option>";}
            else{
              echo "<option value=$w[id_bagian]>$w[nama_bagian]</option>";
            }
          }
									
								  echo"</select>
		
		  </div>
      </div>
	  
	  <div class='form-group'>
        <div class='col-sm-12'>
          <input name='bagian' maxlength='64' class='form-control required' value='".$e[bagian]."' type='text' title='Bagian karyawan harus diisi.'></div>
      </div>
	  
      <div class='form-group'>
        <div class='col-sm-12 btn-group'>
            <input name='btnSave' value='abc' class='btn btn-danger' type='submit'>
        </div>
      </div>
    </div>
    </div>
</div>";
var_dump($tampil);
	}
	
	elseif($_GET['kode']=="bagian_update"){
		$e=mysql_fetch_array(mysql_query("select * from bagian where id_bagian ='$_GET[id]'"));
echo"<div class='col-sm-8'>
 <div class='panel panel-default'>
    <div class='panel-heading'><span class='glyphicon glyphicon-user'></span> <b>Form Ubah bagian</b></div>
    <div class='panel-body'>
 <input name='id_bagian' value='".$e[id_bagian]."' type='hidden'>

      <div class='form-group'>
        <div class='col-sm-12'>
          <input name='nama_bagian' maxlength='64' class='form-control required' value='".$e[nama_bagian]."' type='text' title='Nama bagian harus diisi.'></div>
      </div>
	  
      <div class='form-group'>
        <div class='col-sm-12 btn-group'>
            <input name='btnSave' value='Update' class='btn btn-danger' type='submit'>
        </div>
      </div>
    </div>
    </div>
</div>";
	}
	
	
	elseif($_GET['kode']=="suratjalan_update"){
	$e=mysql_fetch_array(mysql_query("select * from suratjalan where inc ='$_GET[inc]'"));
	echo"<div class='col-sm-8'>
  <div class='panel panel-default'>
    <div class='panel-heading'><span class='glyphicon glyphicon-user'></span> <b>Form Ubah Data Lembur</b></div>
    <div class='panel-body'>
<input name='inc' value='$_GET[inc]' type='hidden'>
<input name='id' value='$e[id_suratjalan]' type='hidden'>
	
	  
	  	  <div class='form-group'>
        <div class='col-sm-12'>
		<label>Nama karyawan</label>";
$result = mysql_query("select * from karyawan ORDER BY nik_karyawan");
if ($e[nik_karyawan]==0){
					echo "<option value=0 selected></option>";}     
echo '<select name="karyawan" class="form-control required">';  
echo '<option value=0>-</option>';  
while ($row = mysql_fetch_array($result)) {
if ($e[nik_karyawan]==$row[nik_karyawan]){
  echo "<option value=$row[nik_karyawan] selected>$row[nama_karyawan]</option>";    	

} 
else {
echo '<option value="' . $row['nik_karyawan'] . '">' . $row['nama_karyawan'] . '</option>'; 	  	
}
     	
}
echo "</select></div></div>";
	 
	  echo"<div class='form-group'>
        <div class='col-sm-12'>
		<label>Tanggal</label>
          <input name='tanggal' maxlength='64' id='dp' class='form-control required' value='$e[tgl_suratjalan]' type='text' title='tgl_suratjalan Lembur harus diisi.'></div>
      </div>
	  
	  <div class='form-group'>
        <div class='col-sm-12'>
		<label>Start Time</label>
          <input name='start_time' maxlength='64' class='form-control required' value='$e[start_time]' type='datetime-local' title='start_time Lembur harus diisi.'></div>
      </div>
	  
	  <div class='form-group'>
        <div class='col-sm-12'>
		<label>End Time</label>
          <input name='end_time' maxlength='64' class='form-control required' value='$e[end_time]' type='datetime-local' title='end_time Lembur harus diisi.'></div>
      </div>
	  

	  <div class='form-group'>
        <div class='col-sm-12'>
		<label>Keterangan</label>
          <input name='keterangan' maxlength='64' class='form-control required' value='$e[keterangan]' type='text' title='Keterangan Lembur harus diisi.'></div>
      </div>

	  
	 
	  
      <div class='form-group'>
        <div class='col-sm-12 btn-group'>
            <input name='btnSave' value='Save' class='btn btn-danger' type='submit'>
        </div> </div>
      </div>
    </div>
    </div>
</div> ";
	}
else if($_GET['kode']=="akun_update"){
		$d=mysql_fetch_array(mysql_query("select * from admins where username ='$_GET[id]'"));
		 echo"<div class='col-sm-8'>
 <div class='panel panel-default'>
    <div class='panel-heading'><span class='glyphicon glyphicon-user'></span> <b> Form Ubah Akun</b></div>
    <div class='panel-body'>
 <input type='hidden' name='proses' value='$_GET[kode]'>
<div class='form-group'>
        <div class='col-sm-12'>
          <input type='text' name='nama_lengkap' class='form-control required' value='$d[nama_lengkap]'>
		  </div>
		  </div>
	  
      <div class='form-group'>
        <div class='col-sm-12'>
         <input type='text' name='username' class='form-control required' value='$d[username]'>
		 </div>
		 </div>
	  
	  <div class='form-group'> 
        <div class='col-sm-12'>
          <input type='text' name='password' class='form-control required'></div></div>
	  
	  <div class='form-group'>
        <div class='col-sm-12'>
           <input type='text' name='email' class='form-control required' value='$d[email]'>
		   </div>
		   </div>
		   
		   <div class='form-group'>
        <div class='col-sm-12'>
          <input type='text' name='no_telp' class='form-control required' value='$d[no_telp]'>
		   </div>
		   </div>
		   
		   <div class='form-group'>
        <div class='col-sm-12'> 
		<select name='bagian' maxlength='64' class='form-control required' title='Nama bagian harus diisi.'>";
					$tampil=mysql_query("SELECT * FROM bagian ORDER BY id_bagian");
						if ($d[bagian]==0){
					echo "<option value=0 selected>--Nama bagian--</option>";}   

					while($w=mysql_fetch_array($tampil)){
					if ($d[bagian]==$w[id_bagian]){
              echo "<option value=$w[id_bagian] selected>$w[nama_bagian]</option>";}
            else{
              echo "<option value=$w[id_bagian]>$w[nama_bagian]</option>";
            }
          }
									
								  echo"</select>
		
		  </div>
      </div>
	  
		   <div class='form-group'>
        <div class='col-sm-12'>
          <select name='level' class='form-control required'>
            <option value='admin'> Admin</option>
            <option value='user'> User</option>
              </select>
		   </div>
		   </div>
	  
      <div class='form-group'>
        <div class='col-sm-12 btn-group'>
            <input name='btnSave' value='ABC' class='btn btn-danger' type='submit'>
        </div>
      </div>
    </div>
    </div>
</div>";
		  }	
	echo "</form>";
?>

</div>