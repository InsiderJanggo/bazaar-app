
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>APP</title>
<<<<<<< HEAD
	<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
=======
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="styles/form.css">
>>>>>>> 6ac39212b69edaadd3c7c6de75e85a4d3d8b8ac5
</head>
<body>
	<h1>Bazar App</h1>
	<hr>

	<div class="container">
<<<<<<< HEAD
		<form method="POST" action="post.php">
			<table border="0" cellspacing="0" id="form-table">
				<tr>
					<th style="font-size: 30px;">Tambah pesanan</th>
				</tr>
				<tr>
					<td colspan="2"><hr></td>
				</tr>
				<tr>
					<td><label for="inputnama">Nama: </label></td>
		    		<td><input type="text" id="inputnama" class="input-default" name="Nama" placeholder="Masukan Nama.."></td>
				</tr>
				<tr>
					<td><label>Kelas: </label></td>
					<td>
						
						<span>
							<input type="radio" name="kelas" value="10" id="10_x"><label for="10_x">X</label>
						</span>
						<span>
							<input type="radio" name="kelas" value="11_ipa" id="11_ipa"><label for="11_ipa">XI IPA</label>
						</span>
						<span>
							<input type="radio" name="kelas" value="11_ips" id="11_ips"><label for="11_ips">XI IPS</label>
						</span>
						<span>
							<input type="radio" name="kelas" value="12_ipa" id="12_ipa"><label for="12_ipa">XII IPA</label>
						</span>
						<span>
							<input type="radio" name="kelas" value="12_ips" id="12_ips"><label for="12_ips">XII IPS</label>
						</span>
						<span>
							<input type="radio" name="kelas" value="guru" id="guru"><label for="guru">Guru</label>
						</span>
						<span>
							<input type="radio" name="kelas" value="orang" id="orang"><label for="orang">Orang</label>
						</span>
					</td>
				</tr>
				<tr>
				
					<td><label>Menu: </label></td>
					<td id="td-menu">
					<?php 
					include_once('connect.php'); 
					$stmt = $db->prepare("SELECT * FROM makanan");
					$stmt->execute();
					$makanan = $stmt->fetchAll();
					foreach($makanan as $food) {
					?>
						<span>
							<input type="checkbox" name=<?php echo $food['nama'] ?> id=<?php echo $food['id'] ?> value=<?php echo $food['harga'] ?>>
							<label for=<?php echo $food['id'] ?>>
								<img src=<?php echo $food['gambar'] ?> width="150opx" height="150px">
							</label>
						</span>
					<?php } ?>
					</td>
				</tr>
				
				<tr>
					<td><label>QTY: </label></td>
					<td id="td-qty">
						<input type="number" name="qty-1" max="99" min="0" value="0" disabled>
						<input type="number" name="qty-2" max="99" min="0" value="0" disabled>
						<input type="number" name="qty-3" max="99" min="0" value="0" disabled>
						<input type="number" name="qty-4" max="99" min="0" value="0" disabled>
					</td>
				</tr>
				<tr>
					<td><label>Total: </label></td>
					<td style="font-weight: bold;" id="harga-total">
						Rp0,00
					</td>
				</tr>
				<tr>
					<td><p style="visibility: hidden;"></p></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<button type="submit" name="buat-pesanan" style="width: 20%;">buat pesanan</button>
					</td>
				</tr>
			</table>
=======
		<form>
			<label for="inputnama">Nama </label>
    		<input type="text" id="inputnama" name="Nama" placeholder="Masukan Nama..">
>>>>>>> 6ac39212b69edaadd3c7c6de75e85a4d3d8b8ac5
		</form>
	</div>

	<div class="order">

		<hr>
		<!-- <button>help</button> -->
		<!-- <button>edit</button> -->

		<div class="find" style="display: inline;">
			<label for="find" style="margin: 0 10px 0 0;">Cari: </label>
			<input type="text" name="find" id="find" placeholder="Cari..." class="input-default input-find">
		</div>
		<hr>

		<table cellpadding="10" cellspacing="0" border="1" id="main-table">
			<tr>
				<th>No</th>
				<th>nama</th>
				<th>kelas</th>
				<th>daftar makanan</th>
				<th>total harga</th>
				<th>bayar</th>
				<th>diterima</th>
				<th>waktu pemesanan</th>
				<th>waktu diterima</th>
			</tr>
			<?php for($j=1; $j<=5; $j++) : ?>
				<tr>
					<td><?= $j ?></td>
					<td>lorem</td>
					<td>XI IPA</td>
					<td class="bold">lorem, lorem, lorem, lorem</td>
					<td class="bold">Rp24.000</td>
					<td>
						<button class="bayar-toggle">bayar pesanan</button>
					</td>
					<td>
						<button class="terima-toggle">terima pesanan</button>
					</td>
					<td>10:09:16</td>
					<td class="waktu-diterima"></td>
				</tr>
			<?php endfor; ?>
		</table>
	</div>

	<footer id="main-footer">
		&copy; Dibuat Oleh XI IPA
	</footer>

<script><?php require_once("script.js");?></script>
</body>
</html>