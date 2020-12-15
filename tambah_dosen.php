<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$NIP			= $_POST['NIP'];
			$Nama_Dosen		= $_POST['Nama_Dosen'];
			$Jabatan		= $_POST['Jabatan'];
			$Jenis_Kelamin	= $_POST['Jenis_Kelamin'];

			$cek = mysqli_query($koneksi, "SELECT * FROM dosen WHERE NIP='$NIP'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO dosen (NIP, Nama_Dosen, Jabatan, Jenis_Kelamin) VALUES('$NIP', '$Nama_Dosen', '$Jabatan', '$Jenis_Kelamin')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_dsn";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, NIP sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah_dsn" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">NIP</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="NIP" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Dosen</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nama_Dosen" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jabatan</label>
				<div class="col-md-6 col-sm-6">
					<select name="Jabatan" class="form-control" required>
						<option value="">Pilih Jabatan</option>
						<option value="Lektor Kepala">Lektor Kepala</option>
						<option value="Lektor">Letor</option>
						<option value="Dosen">Dosen</option>
						<option value="Asisten Ahli">Asisten Ahli</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Jenis_Kelamin" value="Laki-Laki" required>Laki-Laki
						</label>
						<label class="btn btn-primary " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Jenis_Kelamin" value="Perempuan" required>Perempuan
						</label>
					</div>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
