
<div class="row">

  <div class="col-sm-4">
  <div class="panel panel-default">
    <div class="panel-heading"><span class=></span> <b>About Us</b></div>
    <div class="panel-body">
        <div class="alert alert-warning">
          <h4>Welcome!</h4>
          <p>Selamat datang administrator</p>
        </div>
		
       
		
		
		</div>
</div>
  </div>
  
  <div class="col-sm-8">
   <?php
  $banner=mysql_query("SELECT * FROM banner ORDER BY id_banner ASC LIMIT 2");
  while($b=mysql_fetch_array($banner)){
    echo "<a href='$b[url]' title='$b[judul]'>
						<img class='img-rounded' width='100%' src='foto_banner/$b[gambar]' alt='$b[judul]'>
						</a><br/><br/>";}?>
      
    </div>

</div>