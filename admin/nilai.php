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
			<li class="breadcrumb-item active">Penilaian</li>
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

		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$query = mysqli_query($koneksi,"SELECT * FROM jatah WHERE guru = '$username' AND id = '$id'");
			$result = mysqli_fetch_assoc($query);
		}
		?>

		<form action="penilaian.php" class="form-horizontal" method="POST">
			<div class="form-group">
				<label for="namaku">Nama Murid :</label>
				<input name="nama" style="color: black; border-bottom: 1px solid;" id="namaku" type="text" value="<?php echo $result['namalengkap'] ?>">
			</div>
			<div class="form-group">
				<label for="tgl">Tanggal :</label>
				<input name="tgl" id="tgl" type="date" style="color: black; border-bottom: 1px solid;" required>
			</div>
			<div class="form-group">
				<label for="pertemuan">Pertemuan :</label>
				<input name="pertemuan" id="pertemuan" style="color: black; border-bottom: 1px solid;" type="text">
			</div>
			<div class="form-group">
				<label for="materi">Materi :</label>
				<input name="materi" id="materi" style="color: black; border-bottom: 1px solid;" type="text">
			</div>
			<div class="form-group">
				<label for="pencapaian">Pencapaian Jamaah :</label>
				<textarea name="pencapaian" id="pencapaian" cols="30" rows="20" style="color: black; border: 1px solid;"></textarea>
			</div>
			<div class="form-group">
				<label for="kendala">Kendala :</label>
				<textarea name="kendala" id="kendala" cols="30" rows="20" style="color: black; border: 1px solid;"></textarea>
			</div>
			<div class="form-group">
				<label for="solusi">Solusi :</label>
				<textarea name="solusi" id="solusi" cols="30" rows="20" style="color: black; border: 1px solid;"></textarea>
			</div>
			<div class="form-group">
				<label for="keterangan">Keterangan :</label>
				<textarea name="keterangan" id="keterangan" cols="30" rows="20" style="color: black; border: 1px solid;"></textarea>
			</div>
			<input type="submit" class="btn chocolate" value="Submit">
		</form>

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