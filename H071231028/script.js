// Nomor 1
function countEvenNumbers(start, end) {
    let hasil = 0;
    let angka = [];
    for (let i = start; i <= end; i++) {
        if (i % 2 === 0) {
            hasil++;
            angka.push(i);
        } else {
            return "Tidak ada bilangan genap di antara " + start + " dan " + end;
        }
    }
    return hasil + " (" + angka + ")";
}

let start = 1;
let end = 10;

console.log("Nomor 1");
console.log(countEvenNumbers(start, end));

document.write("<h2>Nomor 1</h2>");
document.write("<p" + countEvenNumbers(1, 10) + "</p>");


// Nomor 2
console.log("Nomor 2");
let hargaBarang = prompt("Masukkan harga barang: ");
let jenisBarang = prompt("Masukkan jenis barang: ");

let diskon = 0;
switch (jenisBarang.toLowerCase()) {
    case 'elektronik':
        diskon = 0.10;
        break;
    case 'pakaian':
        diskon = 0.20;
        break;
    case 'makanan':
        diskon = 0.05;
        break;
    default:
        diskon = 0;
    }

let hargaAkhir = hargaBarang - (hargaBarang * diskon);

console.log("Harga awal: " + hargaBarang);
console.log("Diskon: " + diskon * 100 + "%");
console.log("Harga setelah diskon: Rp." + hargaAkhir);

document.write("<h2>Nomor 2</h2>")
document.write("<p>Masukkan harga barang: " + hargaBarang + 
                "<br>Masukkan jenis barang (Elektronik, Pakaian, Makanan, Lainnya): " + jenisBarang + "</p>");
document.write("<Diskon:>Harga awal: " + hargaBarang + 
                "<br>Diskon: " + diskon * 100 + "%<br>Harga setelah diskon: Rp." + hargaAkhir + "</p>");


// Nomor 3
console.log("Nomor 3");
document.write("<h2>Nomor 3</h2>");

let hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];

let hariIni = "Jumat";
let jumlahHariKedepan = 1000;

let indexHari = hari.indexOf(hariIni);
if (indexHari === -1) {
    console.log("Hari yang dimasukkan tidak valid.");

    document.write("<p>Hari yang dimasukkan tidak valid.</p>");
} else {
    let newIndex = (indexHari + jumlahHariKedepan) % 7;
    let futureDay = hari[newIndex];

    console.log("Hari ini adalah: " + hariIni);
    console.log(jumlahHariKedepan + " hari yang akan datang adalah: " + futureDay);

    document.write("<p>Hari ini adalah: " + hariIni + 
                    "<br>" + jumlahHariKedepan + " hari yang akan datang adalah: " + futureDay + "</p>");
}


// Nomor 4
document.write("<h2>Nomor 4</h2>");

let targetNumber = Math.floor(Math.random() * 100) + 1;
let guess = null;
let attempts = 0;

while (guess !== targetNumber) {
    guess = parseInt(prompt("Masukkan salah satu dari angka 1 sampai 100: "));
    attempts++;
    
    if (guess < targetNumber) {
        alert("Terlalu rendah!");
        document.write("<p>Masukkan salah satu dari angka 1 sampai 100: " + guess + "<br>Terlalu rendah! Coba lagi</p>");
    } else if (guess > targetNumber) {
        alert("Terlalu tinggi!");
        document.write("<p>Masukkan salah satu dari angka 1 sampai 100: " + guess + "<br>Terlalu tinggi! Coba lagi</p>");
    } else if (guess === targetNumber) {
        alert("Selamat! Anda menebak angka yang benar.");
        document.write("<p>Selamat! kamu berhasil menebak angka " + guess + " dengan benar." +
                        "<br>Sebanyak " + attempts + "x percobaan.</p>");
    }
}