<!-- Prerequisites: jQuery and jQuery UI Stylesheet -->



    <script type="text/javascript">
        $(document).ready(function(){
            // find the input fields and apply the time select to them.
            $('#sample1 input').ptTimeSelect();
        });
    </script>
<?php
$jumlah = count($_POST['cek']); 
if(($jumlah) !="0"){
?>
<link href="validasi/style_login.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="validasi/jquery-validation.js"></script>

<form id='login' method='POST' action='master.php?hal=simpan-suratjalan' autocomplete='off' class='form-horizontal' name='pesanan'>
<div class="col-sm-16">
 <div class='panel panel-default'>
    <div class='panel-heading'><span class='glyphicon glyphicon-print'></span>Tanggal : </b><input class='form-horizontal required' title='Tanggal harus diisi.' id='dp' name='tanggal' type='text'>
	</div>
  
      
   <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
										<th>Kode karyawan</th>
										<th>Nama karyawan</th>
										<th>Start Date</th>
										<th>End Date</th>
										<th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
 <?php 
for($i=0;$i<$jumlah;$i++){
$cek	= $_POST['cek'][$i]; 
$urut	= $i+1;
$s=mysql_fetch_array(mysql_query("SELECT * FROM karyawan WHERE nik_karyawan='$cek'"));
echo"
<tr>
              <td>$cek</td>
              <td>$s[nama_karyawan]</td><input name='karyawan[]' value='$cek' type='hidden'>
              <td>
			  <div id='sample1'>
			  <input name='start_time[]' maxlength='64' class='form-control required' placeholder='Start Date' type='datetime-local' title='Start Date harus diisi.'>
			  </div>
			  </td>
			  <td>
			  <div id='sample1'>
			  <input name='end_time[]' maxlength='64' class='form-control required' placeholder='End Date' type='datetime-local' title='End Date harus diisi.'>
			  </div>
			  </td>
			  <td><input name='keterangan[]' maxlength='64' class='form-control required' placeholder='Keterangan' type='text' title='Keterangan harus diisi.'></td>
			  </tr>";
  }
  
  

			
			
?>  
                                    </tbody>
                                </table>
                            </div>
    </div>
</div>

		  
 <div class='form-group'>
        <div class='col-sm-12 btn-group'>
            <input name='btnSave' value='Save' class='btn btn-danger' type='submit'>
        </div>
      </div>
</form>
<?php
}
else{
echo "<script>window.alert('Anda belum memilih data karyawan, Silahkan pilih karyawan yang lembur terlebih dahulu')</script>";
echo "<meta http-equiv='refresh' content='0; url=master.php?hal=surat-jalan'>";
}
?>