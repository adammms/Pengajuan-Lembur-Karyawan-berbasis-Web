
<form class='form-floating' method='POST' action='proses.php'>
		<input type='hidden' name='proses' value='simpan_akun'>
<div class='col-sm-8'>
  <div class='panel panel-default'>
    <div class='panel-heading'><span class=></span> <b>Form Ubah password</b></div>
    <div class='panel-body'>
	 <fieldset>

		  <div class='form-group'>
              <label class='control-label'>nama_lengkap</label>
              <input type='text' name='nama_lengkap' class='form-control required'>
            </div>
           
			
            <div class='form-group'>
              <label class='control-label'>username</label>
              <input type='text' name='username' class='form-control required'>
            </div>
            <div class='form-group'>
              <label class='control-label'>password</label>
              <input type='text' name='password' class='form-control required'>
            </div>
            
            <div class='form-group'>
              <label class='control-label'>email</label>
              <input type='text' name='email' class='form-control required'>
            </div>
			
			<div class='form-group'>
              <label class='control-label'>no_telp</label>
              <input type='text' name='no_telp' class='form-control required'>
            </div>
			
		<?php
		echo" <div class='form-group'>
		<label class='control-label'>Department</label>
        
          <select name='bagian' maxlength='64' class='form-control required' title='Nama Department harus diisi.'>
                              <option value=0 selected>Nama Department</option>";
                              
                              $tampil=mysql_query("SELECT * FROM bagian ORDER BY id_bagian");
                              while($r=mysql_fetch_array($tampil)){
                                 echo "<option value=$r[id_bagian]>$r[nama_bagian]</option>";
                              }
							  
                          echo"</select>  
		 
      </div>";
		?>
			<div class='form-group'>
              <label class='control-label'>level</label>
			  <select name='level' class='form-control required'>
            <option value='admin'> Admin</option>
            <option value='user'> User</option>
            <option value='user'> Supervisor</option>
              </select>
            </div>
			
          </fieldset>
	  
      <div class='form-group'>
        <div class='col-sm-12 btn-group'>
            <input name='btnSave' value='Save' class='btn btn-danger' type='submit'>
        </div>
      </div>
    </div>
    </div>
</div>
</form>
