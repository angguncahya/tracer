<?php 
	session_start();
	$cek_id_pengguna=$_SESSION['id_pengguna'];
	$cek_level=$_SESSION['level'];

	
	if (!(isset($cek_id_pengguna)) or $cek_level!=1){
			session_destroy();
?>		<script>
			document.location.href="index.php";
		</script>
<?php 	
		}
	include "koneksi.php";
	include_once "head.php"; 
	include_once "header.php"; 
	include_once "menu_admin.php"; 
	include_once "pagination.php";
?>
<div class="row" id="content_home">
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="container-fluid" id="greeting" style="text-align: center;">

				<h1 class="text-center">Selamat Datang di Alumni Tracer</h1>	
				<h4>Anda masuk sebagai: <?php echo $_SESSION['nama'] ?></h4>
				<!-- Carousel ================================================== -->
							<!-- <h1><center> INFORMASI KOMUNITAS </center></h1> -->
				<p class="lead text-justify" style="text-align: center;"><br>
					Sistem Informasi Alumni Universitas Diponegoro ini diperuntukkan untuk alumni yang sudah lulus dari universitas diponegoro
				</p><br></br>
			
			</div>
		</div>
		<div class="col-md-">
			<div class="">
				<canvas id=""></canvas>
			</div>
		</div>
		
	</div>
</div>
<?php include_once "footer.php"?>