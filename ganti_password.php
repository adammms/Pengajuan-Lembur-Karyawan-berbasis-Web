<?php
include "config/koneksi.php";
session_start();
include "config/koneksi.php";
$r=mysql_fetch_array(mysql_query("SELECT * FROM admins where username='$_SESSION[namauser]'"));
echo"
<form id='login' method='post' action='aksi_password.php' class='form-horizontal'>
<div class='col-sm-8'>
  <div class='panel panel-default'>
    <div class='panel-heading'><span class='glyphicon glyphicon-user'></span> <b>Form Ubah password</b></div>
    <div class='panel-body'>
	<div class='form-group'>
        <div class='col-sm-12'>
          <input name='username' placeholder='Username' class='form-control required'  value='$r[username]' type='text'>
		  </div>
      </div>
	  
      <div class='form-group'>
        <div class='col-sm-12'>
          <input name='pass_lama' placeholder='password Lama' class='form-control required'  type='text'>
		  </div>
      </div>
	  
	  <div class='form-group'>
        <div class='col-sm-12'>
          <input name='pass_baru' placeholder='password Baru' class='form-control required'  type='text'>
		  </div>
      </div>
	  
	  <div class='form-group'>
        <div class='col-sm-12'>
          <input name='pass_ulangi' placeholder='Ulangi password Baru' class='form-control required'  type='text'>
		  </div>
      </div>
	  
      <div class='form-group'>
        <div class='col-sm-12 btn-group'>
            <input name='btnSave' value='Save' class='btn btn-danger' type='submit'>
        </div>
      </div>
    </div>
    </div>
</div>
</form>";
?>	
