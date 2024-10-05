function cekHari(mulaiHari, hariKeberapa) {
    let arr = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
    let panjangHari = arr.length;
    let mulai = arr.indexOf(mulaiHari);
    console.log(mulai);
    if (mulai != -1){
        mulai += hariKeberapa;
        mulai %= panjangHari;

        console.log("Hari nya adalah : " + arr[mulai]);
    }
}

cekHari("Jumat", 1000);