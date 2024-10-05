// Nomor 1
function countEvenNumbers(start, end) {
  let genap = [];
  if (typeof start !== "number" || typeof end !== "number") {
    console.log("Input harus berupa angka.");
    return genap;
  }

  if (start > end) {
    console.log("Start harus kurang dari atau sama dengan end.");
    return genap;
  }

  for (let index = start; index <= end; index++) {
    if (index % 2 === 0) {
      genap.push(index);
    }
  }
  return genap;
}

let genap = countEvenNumbers(-1, 0);
if (genap.length === 0) {
  console.log(genap.length);
} else {
  let result = genap.length + " (" + genap.join(", ") + ")";
  console.log(result);
}

// Nomor 2
const hargaBarang = Number(prompt("Masukkan Harga Barang"));
if (isNaN(hargaBarang) || hargaBarang < 0) {
  console.log("Harga barang tidak valid.");
} else {
  let jenisBarang = prompt(
    "Masukkan Jenis Barang (Elektronik, Pakaian, Makanan, Lainnya)"
  ).toLowerCase();

  let hargaBarangUpdate = hargaBarang;
  let diskon = 0;

  switch (jenisBarang) {
    case "elektronik":
      diskon = 10;
      hargaBarangUpdate *= 0.9;
      break;
    case "pakaian":
      diskon = 20;
      hargaBarangUpdate *= 0.8;
      break;
    case "makanan":
      diskon = 5;
      hargaBarangUpdate *= 0.95;
      break;
    case "lainnya":
      diskon = 0; // Tidak ada diskon untuk jenis lain
      break;
  }

  console.log("Harga Awal: Rp" + hargaBarang);
  console.log("Diskon: " + diskon + "%");
  console.log("Harga Setelah Diskon: Rp" + hargaBarangUpdate);
}

// Nomor 3
let arrayHari = [
  "senin",
  "selasa",
  "rabu",
  "kamis",
  "jumat",
  "sabtu",
  "minggu",
];

const hariSekarang = prompt("Hari ini adalah hari?").toLowerCase();
const jumlahHari = Number(prompt("Masukkan Jumlah Hari"));

if (!arrayHari.includes(hariSekarang)) {
  console.log("Hari tidak dikenali.");
} else if (isNaN(jumlahHari) || jumlahHari < 0) {
  console.log("Jumlah hari tidak valid.");
} else {
  let indexHariIni = arrayHari.indexOf(hariSekarang);
  let sisaHari = jumlahHari % 7;
  let hariAkanDatang = (indexHariIni + sisaHari) % arrayHari.length;
  console.log(arrayHari[hariAkanDatang]);
}

// Nomor 4
const readline = require("readline");

const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout,
});

let angkAcak = Math.floor(Math.random() * 100) + 1;
let count = 0;

const tanyaTebakan = () => {
  rl.question("Masukkan angka tebakan: ", (jawaban) => {
    let tebakan = Number(jawaban);
    count++;

    if (isNaN(tebakan)) {
      console.log("Input harus berupa angka. Coba lagi.");
      count--; // Tidak menghitung tebakan ini
      tanyaTebakan();
    } else if (tebakan > angkAcak) {
      console.log("Terlalu Tinggi. Coba lagi.");
      tanyaTebakan();
    } else if (tebakan < angkAcak) {
      console.log("Terlalu Rendah. Coba lagi.");
      tanyaTebakan();
    } else {
      console.log(`Tebakan benar! Kamu menebak dalam ${count} kali.`);
      rl.close();
    }
  });
};

tanyaTebakan();
