<?php 
	include "koneksi.php";
	include_once "head.php"; 
	include_once "header.php"; 
	include_once "menu.php"; 
	include_once "pagination.php";
	
	if($_POST){	
				$nim=$_POST['nim'];
				$nama=$_POST['nama'];
				$departemen=$_POST['departemen'];
				$email=$_POST['email'];
				$password=md5($_POST['password']);
				$repassword=md5($_POST['repassword']);
				// $tempat_lahir=$_POST['tempat_lahir'];
				// $tanggal_lahir=date('y-m-d', strtotime($_POST['tanggal_lahir']));
					if($password==$repassword){
								// Check if file already exists
							
								// Allow certain file formats
							
										echo "Lolos.";
										
											$insert = "INSERT INTO file_pengguna(
																			nim,
																			nama,
																			departemen,
																			email,
																			password,
																			-- tempat_lhr,
																			-- tgl_lhr,
																			foto,
																			level
																		) VALUES(
																				'$nim',
																				'$nama',
																				'$departemen',
																				'$email',
																				'$password',
																				-- '$tempat_lahir',
																				-- '$tanggal_lahir',
																				'".$_FILES['file_foto']['name']."',
																				'0')";
										
										mysql_query($insert) or die (mysql_error());?>
										<script>
											alert("Pendaftaran berhasil, Silahkan login dengan Email dan password anda, setelah di konfirmasi !!!");
											document.location.href="index.php";
										</script>
									<?php				
					}else{
					?>
						<script>
							alert("Password tidak sama");
							document.location.href="sign_up.php";
						</script>
					<?php
					}
					
	}
?>
<div class="row" id="content_sign_up">
	<div class="container">
		<h1><center>Pendaftaran Alumni Tracer</center></h1></br>
		<form class="form-horizontal" role="form" method="POST" id="defaultForm" data-toggle="validator" action="" enctype="multipart/form-data" onsubmit="return validate_sign_up()">
			<div class="row">
				<div class="col-xs-12 col-md-8">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="nim" class="control-label"> NIM </label>
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<input type="number" class="form-control" name="nim" size="90" placeholder="Nomor Induk Mahasiswa" required autofocus/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="nama" class="control-label"> Nama Lengkap </label>
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<input type="text" class="form-control" name="nama" id="nama" size="90" placeholder="Nama Lengkap" required />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="jenjang" class="control-label"> Jenjang </label>
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<input type="text" class="form-control" name="jenjang" id="jenjang" size="90" placeholder="Jenjang Kuliah" required />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="fakultas" class="control-label"> Fakultas </label>
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<input type="text" class="form-control" name="fakultas" id="fakultas" size="90" placeholder="Fakultas" required />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="departemen" class="control-label"> Departemen </label>
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<input type="text" class="form-control" name="departemen" id="departemen" size="90" placeholder="Departemen/ Jurusan" required />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="email" class="control-label"> Email </label>
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<input type="email" class="form-control" name="email" size="90" placeholder="Email" required />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="password" class="control-label"> Password </label>
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<input type="password" class="form-control" name="password" size="90" placeholder="Password" required />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="repassword" class="control-label"> Repeat Password </label>
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<input type="password" class="form-control" name="repassword" size="90" placeholder="Re-type Password" required />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-8 col-md-10">
							<div class="form-group">
								<!-- <img id="image-preview" src="assets/img/default.png" alt="no_image" /> -->
							</div>
							<div class="form-group">
								<center><button type="submit" class="btn btn-primary"> DAFTAR </button></center>
							</div>
						</div>
					</div>
				</div>

			</div>
		</form>
	</div>
</div>
<?php include_once "footer.php"?>