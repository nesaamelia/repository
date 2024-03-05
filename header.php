<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Input Karyawan</title>
	<link rel="shortcut icon" href="img/logobaru.jpg" type="image/x-icon" />
    <!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/tooltip.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
    <link href="style.css" rel="stylesheet">
	<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});
	</script>
	
  </head>
<body>
	<!-- Start navbar -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand visible-xs-block visible-sm-block" href="index.php" target="">Input Karyawan </a>
		  <a class="navbar-brand hidden-xs hidden-sm" href="index.php" target="">Nesa Company</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
		  <ul class="nav navbar-nav">
			<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
			<li><a href="data.php" data-toggle="tooltip" data-placement="bottom" title="Lihat Data Karyawan"><span class="glyphicon glyphicon-list"></span> Lihat Data</a></li>
			<li><a href="tambah.php" data-toggle="tooltip" data-placement="bottom" title="Tambah Data Karyawan" ><span class="glyphicon glyphicon-user"> Tambah Data</a></li>
		  </ul>
			<form name="cari" method="post" action="cari.php" role="search" class="navbar-form navbar-left">
				<div class="form-group">
					<input type="text" name="carinik" placeholder="Cari NIK karyawan" class="form-control">
				</div>
				<button type="submit" name="submit" id="submit" value="search" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Cari Data Karyawan">Cari</button>
			</form>
		</div>
	  </div>
	</nav>
	<!-- End navbar -->