<?php
if(isset($_POST['btnSave'])){
				//hitung jumlah form yang dikirim
					  $jumlah = count($_POST['nama_bagian']);
			//jika hanya akan memproses data yang nim dan namanya tidak kosong
					for($a=0; $a<$jumlah; $a++){
					$urut			= $a+1;
					$nama_bagian   = $_POST['nama_bagian'][$a];
					if(trim($nama_bagian) !=""){
					//jika mau dimasukkan ke databases, silahkan buat query anda disini
					
						// simpan identitas Pemesan
						mysql_query("INSERT INTO bagian(nama_bagian) 
												   VALUES('$nama_bagian')");														  
					}	
					}
					}
?>

<link href="validasi/style_login.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="validasi/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="validasi/jquery-validation.js"></script>

	
	
<div class="row">
<?php
echo"<form id='login' method='post' action='master.php?hal=bagian' class='form-horizontal'>";

$jumlah=1;
for($y=0; $y<$jumlah; $y++){
$nomor = $y + 1;

echo"<div class='col-sm-4'>
  <div class='panel panel-default'>
    <div class='panel-heading'><span class='glyphicon glyphicon-user'></span> <b>Form Input bagian</b></div>
    <div class='panel-body'>

      <div class='form-group'>
        <div class='col-sm-12'>
          <input name='nama_bagian[]' maxlength='64' class='form-control required' placeholder='Nama bagian' type='text' title='Nama bagian harus diisi.'></div>
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
    <div class='panel-heading'><span class='glyphicon glyphicon-user'></span> <b>Data bagian</b></div>
  
      
   <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        <th>#</th>
										<th>Nama bagian</th>
										<th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php                     
$tiket=mysql_query("SELECT * FROM bagian ORDER BY nama_bagian ASC");
		$i=1;	
		while ($p=mysql_fetch_array($tiket)){
		echo"<tr>
              <td>$i</td>
              <td>$p[nama_bagian]</td>";
			  ?>
              <td><a href='<?php echo"master.php?hal=form-ubah-data&kode=bagian_update&id=$p[id_bagian]"; ?>' class='btn btn-success btn-xs'><i class='fa fa-edit '><span>Edit</span></i></a>
				  <a href='<?php echo"proses.php?proses=bagian_delete&id=$p[id_bagian]"; ?>' onclick="return confirm('Apakah Anda akan menghapus data bagian ini ?')" class='btn btn-danger btn-xs'><i class='fa fa-pencil '><span>Hapus</span></i></a></td>
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