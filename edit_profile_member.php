<?php 
	session_start();
	$cek_id_pengguna=$_SESSION['id_pengguna'];
	$cek_level=$_SESSION['level'];
	
	if (!(isset($cek_id_pengguna)) or $cek_level!=2){
			session_destroy();
?>		<script>
			document.location.href="index.php";
		</script>
<?php 	
		}
	include "koneksi.php";
	include_once "head.php"; 
	include_once "header.php"; 
	include_once "menu_member.php"; 
	
	$id=$_GET['id'];
	$q_user=mysql_query("SELECT * from file_pengguna WHERE id_pengguna='$id'") or die ("ERROR query".mysql_error());
	$user=mysql_fetch_array($q_user);
	
	if($_POST){
				$email=$_POST['email'];
				$jenjang=$_POST['jenjang'];
				$fakultas=$_POST['fakultas'];
				$tempat_lahir=$_POST['tempat_lahir'];
				$tanggal=$_POST['tanggal_lahir'];
				$tanggal_lahir=date('y-m-d', strtotime($_POST['tanggal_lahir']));
				$alamat=$_POST['alamat'];
				$kabupaten=$_POST['kabupaten'];
				$provinsi=$_POST['provinsi'];
				$no_telp=$_POST['no_telp'];
				$no_hp=$_POST['no_hp'];

				$tanggal_masuk=date('y-m-d', strtotime($_POST['tanggal_masuk']));
				$tanggal_lulus=date('y-m-d', strtotime($_POST['tanggal_lulus']));
				$tanggal_mulai_kerja=date('y-m-d', strtotime($_POST['tanggal_mulai_kerja']));
				$posisi=$_POST['posisi'];
				$gaji_pertama=$_POST['gaji_pertama'];
				$nama_instansi=$_POST['nama_instansi'];
				$posisi_sekarang=$_POST['posisi_sekarang'];
				$nama_instansi_sekarang=$_POST['nama_instansi_sekarang'];
				$alamat_instansi_sekarang=$_POST['alamat_instansi_sekarang'];
				if(empty($tanggal)){
					$update = "UPDATE file_pengguna SET email='$email', jenjang='$jenjang', fakultas='$fakultas', tempat_lhr='$tempat_lahir', alamat='$alamat', kabupaten='$kabupaten', provinsi='$provinsi', no_telp='$no_telp', no_hp='$no_hp', posisi='$posisi', gaji_pertama='$gaji_pertama', nama_instansi='$nama_instansi', posisi_sekarang='$posisi_sekarang', nama_instansi_sekarang='$nama_instansi_sekarang', alamat_instansi_sekarang='$alamat_instansi_sekarang'";
				}else{
					$update = "UPDATE file_pengguna SET email='$email', jenjang='$jenjang', fakultas='$fakultas', tempat_lhr='$tempat_lahir', tgl_lhr='$tanggal_lahir', alamat='$alamat', kabupaten='$kabupaten', provinsi='$provinsi', no_telp='$no_telp', no_hp='$no_hp', tgl_masuk='$tanggal_masuk', tgl_lulus='$tanggal_lulus', tgl_mulai_kerja='$tanggal_mulai_kerja',  posisi='$posisi', gaji_pertama='$gaji_pertama', nama_instansi='$nama_instansi', posisi_sekarang='$posisi_sekarang', nama_instansi_sekarang='$nama_instansi_sekarang', alamat_instansi_sekarang='$alamat_instansi_sekarang'";
				}
				if($_FILES['fil']['size'] > 0 && $_FILES['fil']['error'] == 0){
					if ($_FILES["fil"]["size"] > 2000000) {
						//echo "Sorry, your file is too large.";
						?>
						<script>
							alert("Edit profil gagal harap sesuaikan ukuran gambar yang diperbolehkan");
							document.location.href="profile_member.php";
						</script>
						<?php				
					}else{
						$target_dir = "profil_img/";
						$target_file = $target_dir . basename($_FILES["fil"]["name"]);
						$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						// Check if file already exists
						if (file_exists($target_file)) {
							//echo "Sorry, file already exists.";
							$uploadOk = 0;
							?>
							<script>
								alert("Edit profil gagal, foto dengan nama sama telah tersedia / ganti nama file");
								document.location.href="profile_member.php";
							</script>
							<?php
						}else{
						// Allow certain file formats
							if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG") {
								//echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
								?>
								<script>
									alert("Edit profil gagal harap sesuaikan format gambar yang diperbolehkan");
									document.location.href="profile_member.php";
								</script>
								<?php
							}else{
								//echo "Lolos.";
								$path = './profil_img/'.$user['foto'];
								unlink($path);
								$move = move_uploaded_file($_FILES['fil']['tmp_name'], "profil_img/".$_FILES['fil']['name']);
								if($move){
									$update .= ", foto='".$_FILES['fil']['name']."'";
								}
								$update .= " WHERE id_pengguna='$id'";
								mysql_query($update) or die (mysql_error());?>
								<script>
									alert("Edit profil berhasil");
									document.location.href="profile_members.php";
								</script>
							<?php
							}
						}
					} 
				}else{
					$update .= " WHERE id_pengguna='$id'";
					mysql_query($update) or die (mysql_error());
					?>
					<script>
						alert("Edit profil berhasil");
						document.location.href="profile_member.php";
					</script>
					<?php
				}
				exit;
			}
?>
<div class="row" id="content_about">
	<div class="container">
		<h1><center> EDIT PROFILE </center></h1><br>
		<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
		<div class="col-md-8" style="text-align:left;">
			<div class="form-group">
				<label for="nim" class="col-sm-2 control-label" style="text-align:left;"> NIM </label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="nim" id="nim" value="<?php echo $user['nim'];?>" disabled>
				</div>
			</div>
			<div class="form-group">
				<label for="nama" class="col-sm-2 control-label" style="text-align:left;"> Nama Lengkap </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nama" id="nama" value="<?php echo $user['nama'];?>" disabled>
				</div>
			</div>
			<div class="form-group">
				<label for="jenjang" class="col-sm-2 control-label" style="text-align:left;"> Jenjang </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="jenjang" id="jenjang" value="<?php echo $user['jenjang'];?>" required>
				</div>
			</div>
			<div class="form-group">
				<label for="fakultas" class="col-sm-2 control-label" style="text-align:left;"> Fakultas </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="fakultas" id="fakultas" value="<?php echo $user['fakultas'];?>" required>
				</div>
			</div>
			<div class="form-group">
				<label for="departemen" class="col-sm-2 control-label" style="text-align:left;"> Departemen </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="departemen" id="departemen" value="<?php echo $user['departemen'];?>" disabled>
				</div>
			</div>
			<div class="form-group">
				<label for="email" class="col-sm-2 control-label" style="text-align:left;"> Email </label>
				<div class="col-sm-10">
					<input type="email" class="form-control" name="email" id="email" value="<?php echo $user['email'];?>" required>
				</div>
			</div>
			<div class="form-group">
				<label for="tempat_lahir" class="col-sm-2 control-label" style="text-align:left;"> Tempat Lahir </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?php echo $user['tempat_lhr'];?>" required>
				</div>
			</div>
			<div class="form-group">
				<label for="dateofbirth" class="col-sm-2 control-label" style="text-align:left;"> Tanggal Lahir</label>
				<div class="col-sm-10" id="tanggal_lahir">
					<div class="input-group date">
						<input type="text" class="form-control" name="tanggal" id="date_coba" value="<?php echo $user['tgl_lhr'];?>" onchange="return validate_add_lahir()" disabled required><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
						<input type="hidden" class="form-control" name="tanggal_lahir" id="dateofbirth" value="">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="alamat" class="col-sm-2 control-label" style="text-align:left;"> Alamat </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $user['alamat'];?>" >
				</div>
			</div> 
			<div class="form-group">
				<label for="kabupaten" class="col-sm-2 control-label" style="text-align:left;"> Kabupaten/ Kota </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="kabupaten" id="kabupaten" value="<?php echo $user['kabupaten'];?>" required>
				</div>
			</div> 
			<div class="form-group">
				<label for="provinsi" class="col-sm-2 control-label" style="text-align:left;"> Provinsi </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="provinsi" id="Provinsi" value="<?php echo $user['provinsi'];?>" required>
				</div>
			</div>
			<div class="form-group">
				<label for="no_telp" class="col-sm-2 control-label" style="text-align:left;"> Nomor Telepon</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="no_telp" id="no_telp" value="<?php echo $user['no_telp'];?>" >
				</div>
			</div>
			<div class="form-group">
				<label for="no_hp" class="col-sm-2 control-label" style="text-align:left;"> Nomor HP </label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="no_hp" id="no_hp" value="<?php echo $user['no_hp'];?>" required>
				</div>
			</div>
			<div class="form-group">
				<label for="dateofbirth" class="col-sm-2 control-label" style="text-align:left;"> Tanggal Masuk</label>
				<div class="col-sm-10" id="tanggal_masuk">
					<div class="input-group date">
						<input type="text" class="form-control" name="tanggal" id="date_coba" value="<?php echo $user['tgl_masuk'];?>" onchange="return validate_add_lahir()" disabled required><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
						<input type="hidden" class="form-control" name="tanggal_masuk" id="dateofbirth" value="">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="dateofbirth" class="col-sm-2 control-label" style="text-align:left;"> Tanggal Lulus</label>
				<div class="col-sm-10" id="tanggal_lulus">
					<div class="input-group date">
						<input type="text" class="form-control" name="tanggal" id="date_coba" value="<?php echo $user['tgl_lulus'];?>" onchange="return validate_add_lahir()" disabled required><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
						<input type="hidden" class="form-control" name="tanggal_lulus" id="dateofbirth" value="">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="uploadphoto" class="col-sm-2 control-label" style="text-align:left;"> Upload Photo </label>
				<div class="col-sm-10">
					<input type="file" class="filestyle primary" name="fil" id="upload-photo" accept="image/*">
					<p class="help-block">Silahkan foto profil Anda ke dalam sistem.</br>
						(Format file : jpg, jpeg, png | ukuran max 1024 x 768 pixel | max file_size : 2 MB)</br>
					</p>
				</div>
			</div>

			<h1><center> KARIER</center></h1><br>
			<div class="form-group">
				<label for="dateofbirth" class="col-sm-2 control-label" style="text-align:left;"> Tanggal Mulai Bekerja</label>
				<div class="col-sm-10" id="tanggal_mulai_kerja">
					<div class="input-group date">
						<input type="text" class="form-control" name="tanggal" id="date_coba" value="<?php echo $user['tgl_mulai_kerja'];?>" onchange="return validate_add_lahir()" disabled required><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
						<input type="hidden" class="form-control" name="tanggal_mulai_kerja" id="dateofbirth" value="">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="posisi" class="col-sm-2 control-label" style="text-align:left;"> Posisi </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="posisi" id="posisi" value="<?php echo $user['posisi'];?>" >
				</div>
			</div>
			<div class="form-group">
				<label for="gaji_pertama" class="col-sm-2 control-label" style="text-align:left;"> gaji Pertama </label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="gaji_pertama" id="gaji_pertama" value="<?php echo $user['gaji_pertama'];?>" required>
				</div>
			</div>
			<div class="form-group">
				<label for="nama_instansi" class="col-sm-2 control-label" style="text-align:left;"> Nama Instansi </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nama_instansi" id="nama_instansi" value="<?php echo $user['nama_instansi'];?>" >
				</div>
			</div>
			<div class="form-group">
				<label for="posisi_sekarang" class="col-sm-2 control-label" style="text-align:left;"> Posisi Sekarang</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="posisi_sekarang" id="posisi_sekarang" value="<?php echo $user['posisi_sekarang'];?>" >
				</div>
			</div>
			<div class="form-group">
				<label for="nama_instansi_sekarang" class="col-sm-2 control-label" style="text-align:left;"> Nama Instansi Sekarang</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nama_instansi_sekarang" id="nama_instansi_sekarang" value="<?php echo $user['nama_instansi_sekarang'];?>" >
				</div>
			</div>
			<div class="form-group">
				<label for="alamat_instansi_sekarang" class="col-sm-2 control-label" style="text-align:left;"> Alamat Instansi Sekarang </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="alamat_instansi_sekarang" id="alamat_instansi_sekarang" value="<?php echo $user['alamat_instansi_sekarang'];?>" >
				</div>
			</div>
			<div class="form-group">
					<center>
						<button type="submit" class="btn btn-default btn-md">Save</button></a>
						<a href="profile_member.php"> <button type="button" class="btn btn-default btn-md">Cancel</button></a>
					</center>
			</div>
		</div>
		<div class="col-md-4" style="text-align:center;">
			<img id="image-profile" src="<?php if(empty($user['foto'])){
				echo 'assets/img/default.png';
			}else{
				echo 'profil_img/'.$user['foto'];
			}?>" alt="no_image" /><br>
		</div>

		</form>
	</div>

</div>
<?php include_once "footer.php"?>