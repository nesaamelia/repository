<?php 
include("header.php"); // memanggil file header.php
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Data Karyawan</h2>
			<hr />
			
			<?php
			if(isset($_GET['aksi']) == 'delete'){ // mengkonfirmasi jika 'aksi' bernilai 'delete' merujuk pada baris 90 dibawah
				$nik = $_GET['nik']; // ambil nilai nik
				$cek = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nik='$nik'"); // query untuk memilih entri dengan nik yang dipilih
				if(mysqli_num_rows($cek) == 0){ // mengecek jika tidak ada entri nik yang dipilih
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>'; // maka tampilkan 'Data tidak ditemukan.'
				}else{ // mengecek jika terdapat entri nik yang dipilih
					$delete = mysqli_query($koneksi, "DELETE FROM karyawan WHERE nik='$nik'"); // query untuk menghapus
					if($delete){ // jika query delete berhasil dieksekusi
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>'; // maka tampilkan 'Data berhasil dihapus.'
					}else{ // jika query delete gagal dieksekusi
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>'; // maka tampilkan 'Data gagal dihapus.'
					}
				}
			}
			?>
			<!-- bagian ini untuk memfilter data berdasarkan status -->
			<form class="form-inline" method="get">
				<div class="form-group">
					<select name="filter" class="form-control" onchange="form.submit()">
						<option value="0">Filter Data Karyawan</option>
						<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
						<option value="Tetap" <?php if($filter == 'Tetap'){ echo 'selected'; } ?>>Tetap</option>
						<option value="Kontrak" <?php if($filter == 'Kontrak'){ echo 'selected'; } ?>>Kontrak</option>
                        <option value="Outsourcing" <?php if($filter == 'Outsourcing'){ echo 'selected'; } ?>>Outsourcing</option>
					</select>
				</div>
			</form> <!-- end filter -->
			<br />
			<!-- memulai tabel responsive -->
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<tr>
						<th>No</th>
						<th>Nik</th>
						<th>Nama</th>
						<th>Jenis Kelamin</th>
						<th>Tempat Lahir</th>
						<th>Tanggal Lahir</th>
						<th>No Telepon</th>
						<th>Jabatan</th>
						<th>Status</th>
						<th>Tools</th>
					</tr>
					<?php
					if($filter){
						$sql = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE status='$filter' ORDER BY nik ASC"); // query jika filter dipilih
					}else{
						$sql = mysqli_query($koneksi, "SELECT * FROM karyawan ORDER BY nik ASC"); // jika tidak ada filter maka tampilkan semua entri
					}
					if(mysqli_num_rows($sql) == 0){ 
						echo '<tr><td colspan="8">Data Tidak Ada.</td></tr>'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'
					}else{ // jika terdapat entri maka tampilkan datanya
						$no = 1; // mewakili data dari nomor 1
						while($row = mysqli_fetch_assoc($sql)){ // fetch query yang sesuai ke dalam array
							echo '
							<tr>
								<td>'.$no.'</td>
								<td>'.$row['nik'].'</td>
								<td><a href="profile.php?nik='.$row['nik'].'">'.$row['nama'].'</a></td>
								<td>'.$row['jenis_kelamin'].'</td>
								<td>'.$row['tempat_lahir'].'</td>
								<td>'.$row['tanggal_lahir'].'</td>
								<td>'.$row['no_telepon'].'</td>
								<td>'.$row['jabatan'].'</td>
								<td>';
								if($row['status'] == 'Tetap'){
									echo '<span class="label label-success">Tetap</span>';
								}
								else if ($row['status'] == 'Kontrak' ){
									echo '<span class="label label-info">Kontrak</span>';
								}
								else if ($row['status'] == 'Outsourcing' ){
									echo '<span class="label label-warning">Outsourcing</span>';
								}
							echo '
								</td>
								<td>
									
									<a href="edit.php?nik='.$row['nik'].'" title="Edit Data" data-toggle="tooltip" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
									<a href="password.php?nik='.$row['nik'].'" title="Ganti Password" data-toggle="tooltip" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></a>
								</td>
							</tr>
							';
							$no++; // mewakili data kedua dan seterusnya
						}
					}
					?>
				</table>
			</div> <!-- /.table-responsive -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?><?php 
include("header.php"); // memanggil file header.php
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	
<?php 
include("footer.php"); // memanggil file footer.php
?>