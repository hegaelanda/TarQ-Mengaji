<?php 
session_start();
if($_SESSION['status']!="login"){
	header("location:../index.php?pesan=belum_login");
}
include '../koneksi.php';
$username = $_SESSION['username'] ;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tar Q</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="../style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body style="background: url('https://wallpapercave.com/wp/bSbW3PB.jpg') no-repeat center center fixed;">
	<div class="container" style="background-color: white; padding-top: 50px;">
		<!-- Grey with black text -->
		<nav class="navbar navbar-expand navbar-dark chocolate sstatic-top">
			<a class="navbar-brand mr-1" href="index.php" style="font-family: Arial;">Tar Q</a>

			<!-- Navbar -->
			<ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
				<li class="nav-item dropdown no-arrow">
					<a class="nav-link" style="cursor: default;">
						<?php echo $username; ?>
					</a>
				</li>
				<li class="nav-item dropdown no-arrow">
					<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-user-circle fa-fw"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
						<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
					</div>
				</li>
			</ul>

		</nav>
		<!-- Breadcrumbs-->
		<ol class="breadcrumb" style="margin-top: 20px;">
			<li class="breadcrumb-item">
				<a href="index.php">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">List Kelas</li>
			<li class="breadcrumb-item active">List Murid</li>
		</ol>
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

		<!-- Modal Penilaian-->
		<div class="modal fade" id="penilaian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Penilaian</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<form action=""></form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-sm chocolate">Kirim</button>
					</div>
				</div>
			</div>
		</div>

		<!-- The Modal -->
		<div class="modal fade" id="myModal">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="chocolate form-white">
						<div class="card-body">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<form method="GET">
								<table width="100%">
									<tr>
										<td align="center" colspan="2"><h2 class="txt_white">Filter Form</h2></td>
									</tr>
									<tr>
										<td>
											<i class="fa fa-inverse fa-calendar fa-lg"></i>
										</td>
										<td>
											<select name="bulan" id="bulan" class="select-this">
												<option value="null">Pilih Bulan</option>
												<option value="Januari">Januari</option>
												<option value="Februari">Februari</option>
												<option value="Maret">Maret</option>
												<option value="April">April</option>
												<option value="Mei">Mei</option>
												<option value="Juni">Juni</option>
												<option value="Juli">Juli</option>
												<option value="Agusutus">Agustus</option>
												<option value="September">September</option>
												<option value="Oktober">Oktober</option>
												<option value="November">November</option>
												<option value="Desember">Desember</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>
											<i class="fa fa-inverse fa-calendar fa-lg"></i>
										</td>
										<td>
											<input type="text" placeholder="Tahun" name="tahun" required>
										</td>
									</tr>
									<tr>
										<td colspan="2" align="center" style="padding-top: 15px;">
											<input type="submit" name="submit" value="Next" class="btn latte">
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
		<?php
		if(isset($_GET['nomor_kelas'])){
			$nomor_kelas = $_GET['nomor_kelas'];
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			
			$query = mysqli_query($koneksi,"SELECT * FROM jatah WHERE guru = '$username' AND nomor_kelas = '$nomor_kelas' AND bulan = '$bulan' AND tahun = '$tahun'");
		}
		?>
		<div class="card mb-3">
			<div class="card-header">
				<div align="left" style="float: left;">
					<i class="fa fa-table"></i>
					List Murid
				</div>
				<div align="right" style="float: right;">
					<button type="button" class="btn btn-sm chocolate" data-toggle="modal" data-target="#myModal">Filter</button>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped" id="example" width="100%" cellspacing="0">
						<thead>
							<th>NO</th>
							<th>ID</th>
							<th>NAMA</th>
							<th>NOMOR KELAS</th>
							<th>BULAN</th>
							<th>TAHUN</th>
							<th><div align="center">ACTION</div></th>
						</thead>
						<tbody>
							<?php
							$no = 1;
							while($result = mysqli_fetch_array($query)){
								?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo $result['id']?></td>
									<td><?php echo $result['namalengkap']?></td>
									<td><?php echo $result['nomor_kelas']?></td>
									<td><?php echo $result['bulan']?></td>
									<td><?php echo $result['tahun']?></td>
									<td align="center"><a class="btn btn-warning btn-sm" href="nilai.php?id=<?php echo $result['id']?>"><i class="fa fa-arrow-right"></i></a></td>
								<?php 
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

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
	<!-- The Modal -->
	<div class="modal fade txt_white" id="logoutModal">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="chocolate form-white">
					<div class="card-body">
						<a href="logout.php"  style="margin-left: 10px;" class="close""><i class="fa fa-check"></i></a>
						<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
						Anda Yakin untuk Keluar?
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
</body>
</html>