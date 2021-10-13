<?php
$day =date(d);
$month =date(M);
$mo =date(m);
$year =date(Y);
$y =date(y);

//buat kode otomatis
	$query_oto = mysql_query("select max(id_suratjalan)
								as maksi from suratjalan");
	$data_oto = mysql_fetch_array($query_oto);
	$data_potong = substr($data_oto['maksi'],6,5);
	$data_potong++;
	$kode="";
	for ($i=strlen($data_potong); $i<=4; $i++)
		$kode = $kode."0";
	   $data['suratjalan'] = "JV15-$kode$data_potong";

//hitung jumlah form yang dikirim
$jumlah = count($_POST['karyawan']);

	
	for($i=0; $i<$jumlah; $i++){
	$urut	= $i+1;
					$karyawan 		= $_POST['karyawan'] [$i];
					$start_time 		= $_POST['start_time'] [$i];
					$end_time   	    = $_POST['end_time'] [$i];
					$keterangan   	    = $_POST['keterangan'] [$i];
					$status   	    = $_POST['status'] [$i];
				
	//jika mau dimasukkan ke databases, silahkan buat query anda disini
	//Khusus intime dan outtime yang tidak kosong
	if(trim($start_time) !=""){
					mysql_query("INSERT INTO suratjalan(id_suratjalan,
														tgl_suratjalan,
														 nik_karyawan,
														 start_time,
														 end_time,
														 keterangan,
														 status) 
												   VALUES('$data[suratjalan]',
														  '$_POST[tanggal]',
														  '$karyawan',
														  '$start_time',
														  '$end_time',
														  '$keterangan',
														  '0')");
echo "<meta http-equiv='refresh' content='0; url=master.php?hal=surat-jalan'>";
	}											   

	}

				  														  
 
?>
