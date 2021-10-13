<div class="xs">
  	       <h3>Data Akses akun</h3>
  	         <div class="col-md-12 email-list1">
             <div class="well1 white">
			 <div class="alert alert-info">
                           <a href='master.php?hal=tambah-akun' class='btn btn-primary' >Tambah Data</a>
                        </div>
						
	
       <div class="Compose-Message">               
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tabel Daftar User
                    </div>
                    <div class="panel-body">
                     
                        <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th><h6>#</h6></th>
            <th><h6>username</h6></th>
            <th><h6>nama_lengkap </h6></th>
            <th><h6>email</h6></th>
            <th><h6>no_telp</h6></th>
            <th><h6>level</h6></th>
            <th><h6>Department</h6></th>
            <th colspan='2'><center><h6>AKSI</h6></center></th>
          </tr>
        </thead>
        <tbody>
		<?php
		$data=mysql_query("SELECT * FROM admins ORDER BY nama_lengkap ASC");
		$i=1;	
		while ($p=mysql_fetch_array($data)){
		$b=mysql_fetch_array(mysql_query("SELECT * FROM bagian WHERE id_bagian='$p[bagian]'"));
		echo"<tr>
              <td>$i</td>
              <td>$p[username]</td>
              <td>$p[nama_lengkap]</td>
              <td>$p[email]</td>
              <td>$p[no_telp]</td>
			  <td>$p[level]</td>
			  <td>$b[nama_bagian]</td>";
			  ?>
			 
              <td><h6><a href='<?php echo"master.php?hal=form-ubah-data&kode=akun_update&id=$p[username]"; ?>' class='label label-success'><span>Edit</span></a></td>
              <td><h6><a href='<?php echo"proses.php?proses=akun_delete&id=$p[username]"; ?>' onclick="return confirm('Apakah Anda akan menghapus data akun ini ?')" class='label label-danger'><span>Hapus</span></a></h6></td>
            <?php
			echo"</tr>";
			$i++;
			}	?>  
          
        </tbody>
      </table>
    </div><!-- /.table-responsive -->
                        <hr>
                    </div>
                 </div>
              </div>
      </div>
        </div>
