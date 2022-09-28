// variabel tombol bayar dan terima
let allTombolBayar = document.querySelectorAll('.bayar-toggle');
let allTombolTerima = document.querySelectorAll('.terima-toggle');

// waktu
let containerWaktuDiterima = document.querySelectorAll('.waktu-diterima');

// tombol bayar
allTombolBayar.forEach((tombolBayar, index) => {
	tombolBayar.addEventListener('click', () => {
		aksiHijau(tombolBayar);
		tombolBayar.parentNode.innerHTML = "LUNAS";
	});
});

// tombol terima
allTombolTerima.forEach((tombolTerima, index) => {
	tombolTerima.addEventListener('click', () => {
		if (tombolTerima.parentNode.previousSibling['previousSibling'].style['background-color'] == 'rgb(119, 255, 51)') {
			aksiHijau(tombolTerima);
			tombolTerima.parentNode.innerHTML = 'DITERIMA';
			containerWaktuDiterima[index].innerHTML = waktuSekarang();
		}
	});
});

// aksi jika sudah bayar atau terima
function aksiHijau(tombol) {
	// mengubah warna background dari parent-nya tombol
	tombol.parentNode.style['background-color'] = '#77FF33';
}

// mengambil waktu sekarang
function waktuSekarang() {
	let waktu = new Date();
	let jam = waktu.getHours();
	let menit = waktu.getMinutes();
	let detik = waktu.getSeconds();

	if (jam < 10 || menit < 10 || detik < 10) {
		if (jam < 10) {
			var jam2 = '0' + jam;
		}
		if (menit < 10) {
			var menit2 = '0' + menit;
		} 
		if (detik < 10) {
			var detik2 = '0' + detik;
		}
		
		let formatWaktu2 = (jam2 ? jam2 : jam) + ':' + (menit2 ? menit2 : menit) + ':' + (detik2 ? detik2 : detik);
		return formatWaktu2;
	}

	let formatWaktu = jam.toString() + ':' + menit.toString() + ':' + detik.toString();

	return formatWaktu;
}

// efek image checkbox
let checkbox = document.querySelectorAll('input[type=checkbox]');
let harga = document.querySelector('#harga-total');

// quantity
let qty = document.querySelectorAll('#td-qty input[type=number]');

// quantity awal
let qtyAwal = [0, 0, 0, 0];

checkbox.forEach((check, index) => {
	check.addEventListener('click', function() {
		// ambil total harga sekarang
		let totalHargaFormatString = harga.innerText;
		let totalHargaSekarang = parseInt(totalHargaFormatString.slice(2, -3));

		// jika belum dipilih
		if (check.nextSibling.nextSibling.firstChild.nextSibling.style.opacity != '0.5') {
			// ubah opacity menjadi 0.5
			check.nextSibling.nextSibling.firstChild.nextSibling.style.opacity = '0.5';
			// enable quantity
			qty[index].removeAttribute('disabled');
			// ubah quantity menjadi 1
			qty[index].value = 1;
			/* tambah harga menu ke harga total */
			totalHargaSekarang += parseInt(check.value);
			// update total harga sekarang
			harga.innerText = `Rp${totalHargaSekarang},00`;
			// ubah global scope quantity awal menjadi 1;
			qtyAwal[index] = 1;
		} else { // jika sudah dipilih
			// ubah opacity menjadi 1
			check.nextSibling.nextSibling.firstChild.nextSibling.style.opacity = '1';
			// disable quantity
			qty[index].setAttribute('disabled', '');
			/* kurang harga menu ke harga total */
			// harga menu
			let hargaMenu = parseInt(check.value);
			// quantity menu
			let quantity = qty[index].value;
			totalHargaSekarang -= hargaMenu * quantity;
			// ubah quantity menjadi 0
			qty[index].value = 0;
			// update total harga sekarang
			harga.innerText = `Rp${totalHargaSekarang},00`;
			// ubah global scope quantity awal menjadi 0
			qtyAwal[index] = 0;
		}
	});
});

qty.forEach((qtyMenu, index) => {
	qtyMenu.addEventListener('input', function() {
		if (qtyMenu.value == 0) {
			// ubah opacity menjadi 1
			checkbox[index].nextSibling.nextSibling.firstChild.nextSibling.style.opacity = '1';
			// disable quantity
			qtyMenu.setAttribute('disabled', '');
		}
		// harga menu
		let hargaMenu = checkbox[index].value;
		// perubahan quantity menu
		let quantity = qtyMenu.value - qtyAwal[index];
		// total harga
		let total = hargaMenu * quantity;

		// console.log(`qty awal = ${qtyAwal}`)
		// console.log(`qty menu.value = ${qtyMenu.value}`)
		// console.log(`perubahan quantity = ${quantity}`)

		// ambil total harga sekarang
		let totalHargaFormatString = harga.innerText;
		// harga total sekarang
		let totalHargaSekarang = parseInt(totalHargaFormatString.slice(2, -3));

		// tambah atau kurang harga menu ke harga total
		totalHargaSekarang += parseInt(total);
		// update total harga sekarang
		harga.innerText = `Rp${totalHargaSekarang},00`;

		// ubah global scope quantity menjadi quantity menu yang di input
		qtyAwal[index] = qtyMenu.value;
	});
});

// tambah titik setiap 3 angka
function formatCurrency(nilai) {
	// ubah ke dalam bentuk string
	let harga = nilai.toString();
	// regular expresion
	let hargaAkhir = harga.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");

	return hargaAkhir;
}