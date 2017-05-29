<?php 
	include "koneksi.php";
	include_once "head.php"; 
	include_once "header.php"; 
	include_once "menu.php"; 
	include_once "pagination.php";
?>
<div class="isi" id='isi'></div>
<div class="row" id="content_home">
	<div class="container-fluid">
		<div class="col-md-7">
			<div class="container-fluid" id="greeting">
				<h2 class="text-center"> Selamat datang di Sistem Informasi Alumni <br>Universitas Diponegoro </h2><br>	
				<!-- Carousel ================================================== -->
								</div>
		</div>
		<div class="col-md-1">
			<div class="batas">
				<canvas id="batas"></canvas>
			</div>
		</div>
		<div class="col-md-4">
			<div class="container-fluid" id="login_home">
				<div class="login">
					<form class="form-signin" role="form" method="POST" action="login.php">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="inputemail">Email</label>
								</div>
							</div>
							<div class="col-md-9">
								<div class="form-group">
									<input type="email" name="email" id="inputemail" class="form-control" placeholder="Email" required autofocus>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="inputPassword">Password</label>
								</div>
							</div>
							<div class="col-md-9">
								<div class="form-group">
									<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<center><button type="submit" class="btn btn-md btn-primary"> Login </button></center>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
<?php include_once "footer.php"?>