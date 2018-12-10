<?php 
session_start();
include '../koneksi.php';
if (isset($_POST['tgl'])) {
	$nama = $_POST['nama'];
	$guru = $_SESSION['username'];
	$tgl = $_POST['tgl'];
	$pertemuan = $_POST['pertemuan'];
	$materi = $_POST['materi'];
	$pencapaian = $_POST['pencapaian'];
	$kendala = $_POST['kendala'];
	$solusi = $_POST['solusi'];
	$keterangan = $_POST['keterangan'];

	$query = mysqli_query($koneksi,
		"INSERT INTO tahsin_pyk VALUES ('','$guru','$nama','$tgl','$pertemuan','$materi','$pencapaian','$kendala','$solusi','$keterangan');"
	);
	if ($query) {
		echo "<script>alert('Berhasil Memasukan Data');
				window.location.href='index.php';</script>";
	} else {
		echo '<script type="text/javascript">alert("Data gagal ditambahkan");</script>';
	}
}
 ?>