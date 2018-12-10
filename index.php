<!DOCTYPE html>
<html>
<head>
	<title>Tar Q</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body style="background: url('https://wallpapercave.com/wp/bSbW3PB.jpg') no-repeat center center fixed;">
	<div class="container" style="background-color: white;">
		<img align="center" src="http://tar-q.com/wp-content/uploads/2018/08/LOGO-TARQ.png" alt="Logo Tar Q" height="100%" width="100%">
		<h2 align="center" class="choco" style="padding-top: 80px; font-family: Arial;">Web Input Nilai untuk Guru Tar Q</h2>
		<!-- cek pesan notifikasi -->
		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "gagal"){
			echo "<script>alert('Gagal Login, username atau password salah');
					window.location.href='index.php';</script>";
			}else if($_GET['pesan'] == "logout"){
				echo "<script>alert('Anda Telah Logout');
					window.location.href='index.php';</script>";
			}else if($_GET['pesan'] == "belum_login"){
				echo "<script>alert('Anda harus login terlebih dahulu');
					window.location.href='index.php';</script>";
			}
		}
		?>

		<!-- Button to Open the Modal -->
		<div align="center">
			<button type="button" class="btn chocolate" data-toggle="modal" data-target="#myModal">Login</button>
		</div>

		<!-- The Modal -->
		<div class="modal fade" id="myModal">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="chocolate form-white">
						<div class="card-body">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<form action="cek_login.php" method="POST">
								<table width="100%">
									<tr>
										<td align="center" colspan="2"><h2 class="txt_white">Login Form</h2></td>
									</tr>
									<tr>
										<td>
											<i class="fa fa-inverse fa-user fa-lg"></i>
										</td>
										<td>
											<input type="text" placeholder="Your Username" name="username" required>
										</td>
									</tr>
									<tr>
										<td>
											<i class="fa fa-inverse fa-lock fa-lg"></i>
										</td>
										<td>
											<input type="password" placeholder="Password" name="password" required>
										</td>
									</tr>
									<tr>
										<td colspan="2" align="center" style="padding-top: 15px;">
											<input type="submit" name="submit" value="Sign In" class="btn latte">
										</td>
									</tr>
								</table>
							</form>
						</div>
						<!-- end card-body -->
					</div>
					<!-- end chocolate -->	
				</div>
				<!-- end modal-content -->
			</div>
			<!-- end modal-dialog -->
		</div>
		<!-- end modal -->
		<div style="padding-bottom: 220px;"></div>
		<footer>
		  <div class="container">
		    <div class="copyright text-center" style="padding-bottom: 23px;">
		      <span style="font-family: Arial;">Copyright © Tar Q 2018</span>
		    </div>
		  </div>
		</footer>
	</div>
	<!-- end container -->
</body>
</html>