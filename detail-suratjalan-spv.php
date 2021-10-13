

<link href="validasi/style_login.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="validasi/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="validasi/jquery-validation.js"></script>

	
	
<div class="row">

<div class="col-sm-12">
 <div class='panel panel-default'>
 <?php
 $a=mysql_fetch_array(mysql_query("SELECT * FROM suratjalan Where id_suratjalan='$_GET[id]'"));
 $tanggal = tgl_indo($a['tgl_suratjalan']);
 ?>
    <div class='panel-heading'><span class=></span> <b>Detail Lembur : <?php echo"$a[id_suratjalan] - $tanggal"; ?></b></div>
  
      
   <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        <th>#</th>
										<th>NIK karyawan</th>
										<th>Nama karyawan</th>
										<th>Start Time</th>
										<th>End Time</th>
										<th>Jam Bersih</th>
										<th>Keterangan</th>
										<th>Action</th>
										
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php                     
		$suratjalan=mysql_query("SELECT * FROM suratjalan ORDER BY id_suratjalan ASC");
		$i=1;	
		while ($p=mysql_fetch_array($suratjalan)){
		
		// $selisih=$p['end_time']-$p['start_time'];
		$akhir = strtotime($p['end_time']);
		$awal = strtotime($p['start_time']);
		$selisih_t= $akhir - $awal;
		$jam   = floor($selisih_t / (60 * 60));
		$menit = $selisih_t - $jam * (60 * 60);
		$b=mysql_fetch_array(mysql_query("SELECT * FROM karyawan Where nik_karyawan='$p[nik_karyawan]'"));
		echo"<tr>
              <td>$i</td>
              <td>$b[nik_karyawan]</td>
              <td>$b[nama_karyawan]</td>
              <td>$p[start_time]</td>
              <td>$p[end_time]</td>
              <td>$jam jam $menit menit</td>
              <td>$p[keterangan]</td>
           
              <td>";?> <a href='<?php echo"master.php?hal=form-ubah-data&kode=suratjalan_update&inc=$p[inc]"; ?>' class='btn btn-success btn-xs'><i class='fa fa-edit '><span>Edit</span></i></a>
					   <a href='<?php echo"proses.php?proses=suratjalan_item_delete&inc=$p[inc]&sj=$p[id_suratjalan]"; ?>' onclick="return confirm('Apakah Anda akan menghapus data suratjalan ini ?')" class='btn btn-danger btn-xs'><i class='fa fa-pencil '><span>Hapus</span></i></a>
						<?php echo"</td>
              
			   </tr>";
			$i++;
			}
			
			
?>                                  
								   </tbody>
                                </table>
								
								
                            </div>
    </div>
</div>

</div>	