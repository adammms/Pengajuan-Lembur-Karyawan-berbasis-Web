<html>
<head>
<title></title>
</head>
<body>
<link href="assets/css/style_DO.css" rel="stylesheet" type="text/css" />
<?php	
error_reporting(0);
  include "config/koneksi.php";
  include "config/fungsi_indotgl.php";
  include "config/fungsi_combobox.php";
  include "config/library.php";
  include "config/fungsi_autolink.php";
  include "config/fungsi_rupiah.php";
  
?>




      <?php	
	  $s=mysql_fetch_array(mysql_query("SELECT * FROM suratjalan Where id_suratjalan='$_GET[id]'"));
	  $tanggal = tgl_indo($s[tgl_suratjalan]);
	  
	  $date = $s['tgl_suratjalan'];
	  $day = date('l', strtotime($date)); // konversi ke hari 
	  if ($day == "Sunday") $day = "Minggu"; 
	  else if ($day == "Monday") $day = "Senin"; 
      else if ($day == "Tuesday") $day = "Selasa"; 
      else if ($day == "Wednesday") $day = "Rabu"; 
	  else if ($day == "Thursday") $day = "Kamis"; 
	  else if ($day == "Friday") $day = "Jumat"; 
	  else if ($day == "Saturday") $day = "Sabtu";
	  $h=mysql_fetch_array(mysql_query("SELECT * FROM karyawan Where nik_karyawan='$s[nik_karyawan]'"));
	  echo"<table width='80%' border='0'>
  <tr>
    <td><b>Divisi HR</b></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width='179'><b>Arya Medic Group</b></td>
    <td width='9'>&nbsp;</td>
    <td width='736'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan='3' align=center><b><h3>FORMULIR PERINTAH LEMBUR</h3></b></td>
  </tr>
  <tr>
    <td>Departement / Bagian</td>
    <td>:</td>
    <td><u>$h[departement] / $h[bagian]</u></td>
  </tr>
  <tr>
    <td>Hari / Tanggal</td>
    <td>:</td>
    <td><u>$day, $tanggal</u></td>
  </tr>
</table>
<br/>
<table width='80%' border='1'>
  <tr>
    <th width='33' rowspan='2' scope='col'>No</th>
    <th width='219' rowspan='2' scope='col'>Nama</th>
    <th width='126' rowspan='2' scope='col'>NIK</th>
    <th colspan='2' scope='col'>Waktu Lembur</th>
    <th width='264' rowspan='2' scope='col'>Jam Bersih</th>
    <th width='264' rowspan='2' scope='col'>Keterangan Lembur</th>
  </tr>
  <tr>
    <td width='126' align=center>Dari</td>
    <td width='126' align=center>Sampai</td>
  </tr>";
			 
?>

<?php
$suratjalan=mysql_query("SELECT * FROM suratjalan Where id_suratjalan='$_GET[id]' ORDER BY id_suratjalan ASC");
		$i=1;	
		while ($data=mysql_fetch_array($suratjalan)){
		$qty=format_rupiah($p['qty']);
		 $expired_date = tgl_indo($data[expired_date]);
     $akhir = strtotime($data['end_time']);
    $awal = strtotime($data['start_time']);
    $selisih_t= $akhir - $awal;
    $jam   = floor($selisih_t / (60 * 60));
    $menit = $selisih_t - $jam * (60 * 60);
    $menit1 = floor($menit/60);
		 
		$b=mysql_fetch_array(mysql_query("SELECT * FROM karyawan Where nik_karyawan='$data[nik_karyawan]'"));			 
			echo "<tr>
    <td align=center>$i</td>
              <td align=center>$b[nama_karyawan]</td>
			  <td align=center>$data[nik_karyawan]</td>
			  <td align=center>$data[start_time]</td>
			  <td align=center>$data[end_time]</td>
        <td align=center>$jam jam $menit1 menit</td>
			  <td align=center>$data[keterangan]
  </tr>";
			$i++;
			}
			
			
echo"<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<table width='80%' border='1'>
  <tr>
    <th colspan='2' rowspan='3' scope='col'>&nbsp;</th>
    <th width='265' rowspan='2' scope='col'>Departemen yang bersangkutan</th>
    <th colspan='2' scope='col'>Diterima HR</th>
  </tr>
  <tr>
    <td width='307' align=center>PersEr</td>
    <td width='276' align=center>Entry Akses</td>
  </tr>
  <tr>
    <td height='100'>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width='93'>Nama</td>
    <td width='4'>:</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Tgl.</td>
    <td>:</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Jbtn.</td>
    <td>:</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>";
?>
<label><h5>FRM/GP/MM-05/002/A</h5></label>
</body>
</div>
</html>