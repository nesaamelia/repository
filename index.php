<?php 
include("header.php"); // memanggil file header.php
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<!-- Start container -->
	<div class="container">
		<div class="content">
			<div class="jumbotron">
				<h1>Nesa Company</h1>
				<p>Selamat datang di Menu Input data karyawan.</p>
				<a href="data.php" data-toggle="tooltip" title="Lihat Data Karyawan" class="btn btn-info" role="button"><span class="glyphicon glyphicon-list"></span> Lihat Data Karyawan</a>
				<a href="tambah.php" data-toggle="tooltip" title="Tambah Data Karyawan" class="btn btn-success" role="button"><span class="glyphicon glyphicon-user"></span> Tambah Data</a>
				<a href="logout.php" data-toggle="tooltip" title="logout" class="btn btn-danger" role="button"><span class="glyphicon glyphicon-user"></span> logout</a>
			</div> <!-- /.jumbotron -->
		</div> <!-- /.content -->
	</div>
	<!-- End container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>