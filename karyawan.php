<?php
if(isset($_POST['btnSave'])){
				//hitung jumlah form yang dikirim
					  $jumlah = count($_POST['nama_karyawan']);
			//jika hanya akan memproses data yang nim dan namanya tidak kosong
					for($a=0; $a<$jumlah; $a++){
					$urut			= $a+1;
					$nama_karyawan   = $_POST['nama_karyawan'][$a];
					$nik	= $_POST['nik'][$a];
					$departement	= $_POST['departement'][$a];
					$bagian	= $_POST['bagian'][$a];
					if(trim($nama_karyawan) !=""){
					//jika mau dimasukkan ke databases, silahkan buat query anda disini
					
						// simpan identitas Pemesan
						mysql_query("INSERT INTO karyawan(nik_karyawan,
														  nama_karyawan,
														  departement,
														  bagian) 
												   VALUES('$nik',
														  '$nama_karyawan',
														  '$departement',
														  '$bagian')");														  
					}	
					}
					}
?>

<link href="validasi/style_login.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="validasi/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="validasi/jquery-validation.js"></script>

	
	
<div class="row">
<?php
echo"<form id='login' method='post' action='master.php?hal=karyawan' class='form-horizontal'>";

$jumlah=1;
for($y=0; $y<$jumlah; $y++){
$nomor = $y + 1;

echo"<div class='col-sm-4'>
  <div class='panel panel-default'>
    <div class='panel-heading'><span class=></span> <b>Form Input karyawan</b></div>
    <div class='panel-body'>
	
	<div class='form-group'>
        <div class='col-sm-12'>
          <input name='nik[]' class='form-control required' placeholder='NIK karyawan' type='number' title='nik karyawan harus diisi.' required minlength='3' min='100' max='99999'></div>
      </div>
 
      <div class='form-group'>
        <div class='col-sm-12'>
          <input name='nama_karyawan[]' maxlength='64' class='form-control required' placeholder='Nama karyawan' type='text' title='Nama karyawan harus diisi.' required></div>
      </div>
	  <div class='form-group'>
        <div class='col-sm-12'>
          <select name='departement[]' maxlength='64' class='form-control required' title='Nama Department harus diisi.' required>
                              <option value='' selected>Nama Department</option>";
                              
                              $tampil=mysql_query("SELECT * FROM bagian ORDER BY id_bagian");
                              while($r=mysql_fetch_array($tampil)){
                                 echo "<option value=$r[id_bagian]>$r[nama_bagian]</option>";
                              }
							  
                          echo"</select>  
		  </div>
      </div>
	  
	  <div class='form-group'>
        <div class='col-sm-12'>
          <select name='bagian[]' maxlength='64' class='form-control required' title='Jabatan harus diisi.' required>
            <option value='' selected>Jabatan</option>
            <option value=admin>Admin</option>
            <option value=supervisor>Supervisor</option>
            <option value=operator>Operator</option>

          </div>
      </div>
	  
      <div class='form-group'>
        <div class='col-sm-12 btn-group'>
            <input name='btnSave' value='Save' class='btn btn-danger' type='submit'>
        </div>
      </div>
    </div>
    </div>
</div>";

}
?>
</form>

<div class="col-sm-8">
 <div class='panel panel-default'>
    <div class='panel-heading'><span class=></span> <b>Data karyawan</b></div>
  
      
   <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        <th>#</th>
										<th>NIK karyawan</th>
										<th>Nama karyawan</th>
										<th>Departement</th>
										<th>Bagian</th>
										<th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php                     
$tiket=mysql_query("SELECT * FROM karyawan ORDER BY nik_karyawan ASC");
		$i=1;	
		while ($p=mysql_fetch_array($tiket)){
$b=mysql_fetch_array(mysql_query("SELECT * FROM bagian WHERE id_bagian='$p[departement]'"));
		echo"<tr>
              <td>$i</td>
              <td>$p[nik_karyawan]</td>
              <td>$p[nama_karyawan]</td>
			  <td>$b[nama_bagian]</td>
			  <td>$p[bagian]</td>";
			  ?>
              <td><a href='<?php echo"master.php?hal=form-ubah-data&kode=karyawan_update&id=$p[inc]"; ?>' class='btn btn-success btn-xs'><i class='fa fa-edit '><span>Edit</span></i></a>
				  <a href='<?php echo"proses.php?proses=karyawan_delete&id=$p[nik_karyawan]"; ?>' onclick="return confirm('Apakah Anda akan menghapus data karyawan ini ?')" class='btn btn-danger btn-xs'><i class='fa fa-pencil '><span>Hapus</span></i></a></td>
            <?php
			echo"</tr>";
			$i++;
			}
			
			
?>  
                                    </tbody>
                                </table>
                            </div>
    </div>
</div>

</div>

<script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>	