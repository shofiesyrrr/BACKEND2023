//analogi awal/ pertama
const persiapan = () => {
  console.log("Persiapan ...");
};

//dilanjut dengan analogi proses memulai
const rebusAir = () => {
  console.log("Merebus Air ...");
};

//kemudian proses akhir
const masak = () => {
  console.log("Mendidih dan Menguap ...");
  console.log("Selesai Merebus Air.");
};


//penjelasan keseluruhan dari analogi-analogi tersebut
const main = () => {
  setTimeout(() => {
    persiapan();

    setTimeout(() => {
      rebusAir();

      setTimeout(() => {
        masak();
      }, 5000);
    }, 7000);
  }, 3000);
};

main();