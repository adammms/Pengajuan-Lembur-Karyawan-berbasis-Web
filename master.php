<?php 
  error_reporting(0);
  session_start();	
  include "config/koneksi.php";
  include "config/fungsi_indotgl.php";
  include "config/library.php";
  include "config/fungsi_rupiah.php";
 
  ?> 

    <title>FORM LEMBUR</title>

   <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
   
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
  
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
	
	<!-- RESPONSIVE MENU-->
	<script src="assets/js/bootstrap.js"></script>
	
	<!-- DATESPICKERAWESOME STYLES-->
    <link type="text/css" rel="stylesheet" href="assets/css/datepicker.css">
	<script src="assets/js/terbaru.js"></script>
    <script src="assets/js/tabel.js"></script>
    <script src="assets/js/plug.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-datepicker_002.js"></script>

    <style type="text/css">
      body {
        padding-top: 65px;
        /*background-color: #c0c0c0;*/
      }
    </style>
 </head>  
  <body>

    <div class="container">
		<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
		  <div class="container">
		    <div class="navbar-header">
				
		    <img src="foto_logo/hjs.jpeg" width='120' height='60'/>

		    </div>
			<!---<img src="foto_logo/logo.jpg" class="user-image img-responsive"/>-->
		    <div class="navbar-collapse collapse">
		      <ul class="nav navbar-nav">
		      <?php if ($_SESSION['leveluser'] == "admin"){ ?>
		        <li><a href='master.php?hal=karyawan'><span class=></span>&nbsp;Karyawan</a></li>
		        <li><a href='master.php?hal=bagian'><span class=></span>&nbsp;Bagian</a></li>
		        <li><a href='master.php?hal=data-akun'><span class=></span>&nbsp;Admin</a></li>
		         <li><a href='master.php?hal=cetak-laporan'><span class=></span>&nbsp;Cetak Laporan Lembur</a></li>
		        <li><a href='logout.php'><span class=></span>&nbsp;Logout</a></li>
				<?php

				}if ($_SESSION['leveluser'] == "supervisor"){

					?>
					
					<li><a href='master.php?hal=approval-lembur-spv'><span class='glyphicon glyphicon-pushpin'></span>&nbsp;Approval Lembur</a></li>

					<li><a href='master.php?hal=data-lembur'><span class='glyphicon glyphicon-pushpin'></span>&nbsp;Data Status Lembur</a></li>
					 <li><a href='logout.php'><span class='glyphicon glyphicon-pushpin'></span>&nbsp;Logout</a></li>

					<?php
					}if ($_SESSION['leveluser'] == "operator"){

					?>
					
					<li><a href='master.php?hal=surat-jalan'><span class='glyphicon glyphicon-pushpin'></span>&nbsp;Form Lembur</a></li>

					<li><a href='master.php?hal=data-lembur-operator'><span class='glyphicon glyphicon-pushpin'></span>&nbsp;Data Status Lembur</a></li>
					 <li><a href='logout.php'><span class='glyphicon glyphicon-pushpin'></span>&nbsp;Logout</a></li>
					<?php
					}
				?>
		      </ul>
<p style="color: white;text-align: right">Hi, <?=$_SESSION['namauser']; ?></p>	
		    </div>
		  </div>
		</div>
		<div class="panel panel-default">
		  <div class="panel-body">
	    	
  


<?php include "konten.php"; ?>


</div>
	     <div class="panel-footer">
		 </div>
	    </div>
    </div>
	
   </body>
   </html>