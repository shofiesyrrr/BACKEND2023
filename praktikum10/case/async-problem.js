//analogi awal
const persiapan = () => {
  setTimeout(() => {
    console.log("Mempersiapan Bahan ....");
  }, 3000);
};


//analogi yang akan mulai
const rebusAir = () => {
  setTimeout(() => {
    console.log("Merebus Air ...");
  }, 7000);
};

//proses yang akan terjalan
const masak = () => {
  setTimeout(() => {
    console.log("dan Memasak Mie ...");
    console.log("Selesai");
  }, 5000);
};

//relisasikan dari analogi-analogi tersebut.
const main = () => {
  persiapan();
  rebusAir();
  masak();
};

main();
