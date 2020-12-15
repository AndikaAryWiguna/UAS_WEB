<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$Nama_Pegawai	= $_POST['Nama_Pegawai'];
			$Jabatan		= $_POST['Jabatan'];
			$Jenis_Kelamin	= $_POST['Jenis_Kelamin'];
			$Pangkat		= $_POST['Pangkat'];

			$cek = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE ID='$ID'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO pegawai (ID, Nama_Pegawai, Jabatan, Jenis_Kelamin, Pangkat) VALUES('ID','$Nama_Pegawai', '$Jabatan', '$Jenis_Kelamin', '$Pangkat')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_pgw";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah_pgw" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Pegawai</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="Nama_Pegawai" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jabatan</label>
				<div class="col-md-6 col-sm-6">
					<select name="Jabatan" class="form-control" required>
						<option value="">Pilih Jabatan</option>
						<option value="Kepala Bagian TU">Kepala Bagian TU</option>
						<option value="Kepala Sub Bagian Kemahasiswaan dan Alumni">Kepala Sub Bagian Kemahasiswaan dan Alumni</option>
						<option value="	Staf Kemahasiswaan dan Alumni">	Staf Kemahasiswaan dan Alumni</option>
						<option value="Kepala Sub Bagian Akademik">Kepala Sub Bagian Akademik</option>
						<option value="Staf Akademik">Staf Akademik</option>
						<option value="Kepala Sub Bagian Umum dan Keuangan">Kepala Sub Bagian Umum dan Keuangan</option>
						<option value="Staf Keuangan/BPP">Staf Keuangan/BPP</option>
						<option value="Staf Umum dan Keuangan">Staf Umum dan Keuangan</option>
						<option value="	PLP Muda">	PLP Muda</option>
						<option value="	PLP Pertama">	PLP Pertama</option>
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
				<label class="col-form-label col-md-3 col-sm-3 label-align">Pangkat</label>
				<div class="col-md-6 col-sm-6">
					<select name="Pangkat" class="form-control" required>
						<option value="">Pilih Pangkat</option>
						<option value="Pembina Tingkat I">Pembina Tingkat I</option>
						<option value="Penata Tingkat I">Penata Tingkat I</option>
						<option value="Penata Muda Tingkat I">Penata Muda Tingkat I</option>
						<option value="Penata">Penata</option>
						<option value="Penata Muda">Penata Muda</option>
						<option value="Pengatur Tingkat I">Pengatur Tingkat I</option>

					</select>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
