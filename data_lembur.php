<?php if ($_SESSION['leveluser'] == "user"){ ?>
<form id='login' action="master.php?hal=cek-suratjalan" method="POST">

</form>

<br/>
<br/>
<br/>

<div class="col-sm-16">
 <div class='panel panel-default'>
    <div class='panel-heading'>
	<span class=''></span> <b>Data Lembur</b>
	</div>

                                            
                                            
                                       
      
   <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        <th>#</th>
										<th>No Form Lembur</th>
										<th>Tanggal Lembur</th>
                    <th>Status</th>
										<th><center>Aksi</center></th>
                                        </tr>
                                  </thead>
                                    <tbody>
                                    
                                      <?php                  
$lembur=mysql_query("SELECT * FROM suratjalan ");
		$i=1;	
		while ($p=mysql_fetch_array($lembur)){
		 $tanggal = tgl_indo($p[tgl_suratjalan]);
		 $date = $p['tgl_suratjalan'];
	  $day = date('l', strtotime($date)); // konversi ke hari 
	  if ($day == "Sunday") $day = "Minggu"; 
	  else if ($day == "Monday") $day = "Senin"; 
      else if ($day == "Tuesday") $day = "Selasa"; 
      else if ($day == "Wednesday") $day = "Rabu"; 
	  else if ($day == "Thursday") $day = "Kamis"; 
	  else if ($day == "Friday") $day = "Jumat"; 
	  else if ($day == "Saturday") $day = "Sabtu";
	

		echo"<tr>
              <td>$i</td>
              <td>$p[id_suratjalan]</td>
              <td>$day, $tanggal</td>";
			  ?>
              <td><center><a href='<?php echo"master.php?hal=detail-suratjalan-operator&id=$p[id_suratjalan]&inc=$p[inc]"; ?>' class='btn btn-success btn-xs'><i class='fa fa-edit '><span>Lihat</span></i></a>
				  <a href='<?php echo"proses.php?proses=suratjalan_delete&id=$p[id_suratjalan]"; ?>' onclick="return confirm('Apakah Anda akan menghapus data suratjalan ini ?')" class='btn btn-danger btn-xs'><i class='fa fa-pencil '><span>Hapus</span></i></a></center></td>
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
<?php
				}
				else
					{
					?>

<div class="col-sm-16">
 <div class='panel panel-default'>
    <div class='panel-heading'>
	<span class='glyphicon glyphicon-user'></span> <b>Data Status Lembur</b>
	</div>

                                            
                                            
                                       
      
   <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        <th>#</th>
										<th>No Form Lembur</th>
										<th>Tanggal Lembur</th>
                    <th>Status</th>
                                        </tr>
                                  </thead>
                                    <tbody>
                                    
                                      <?php                  
$lembur=mysql_query("SELECT * FROM suratjalan ORDER BY inc DESC");
		$i=1;	
		while ($p=mysql_fetch_array($lembur)){
		 $tanggal = tgl_indo($p[tgl_suratjalan]);
		 $date = $p['tgl_suratjalan'];
	  $day = date('l', strtotime($date)); // konversi ke hari 
	  if ($day == "Sunday") $day = "Minggu"; 
	  else if ($day == "Monday") $day = "Senin"; 
      else if ($day == "Tuesday") $day = "Selasa"; 
      else if ($day == "Wednesday") $day = "Rabu"; 
	  else if ($day == "Thursday") $day = "Kamis"; 
	  else if ($day == "Friday") $day = "Jumat"; 
	  else if ($day == "Saturday") $day = "Sabtu";
	 $status = $p['status'];
   if ($status == 0) $status = "Belum dikonfirmasi";
   else if ($status == 1) $status = "Pengajuan Lembur di Terima";
   else if ($status == 2) $status = "Pengajuan Lembur di Tolak";

  

		echo"<tr>
              <td>$i</td>
              <td>$p[id_suratjalan]</td>
              <td>$day, $tanggal</td>
              <td>$status</td>
              ";
            
			  ?>
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
					<?php
					}
				?>
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