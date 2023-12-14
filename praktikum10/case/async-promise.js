//analogi persiapan
const persiapan = () => {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      resolve("Mempersiapan Bahan-bahan ....");
    }, 3000);
  });
};

//analogi dimana sudah memulai merebus air
const rebusAir = () => {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      resolve("Memulai Merebus Air ...");
    }, 7000);
  });
};


//analogi saat mulai memasak mie
const masak = () => {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      resolve("Kemudian Memasak Mie ... Selesai.");
    }, 5000);
  });
};

//kumpulan analogi yang akan dijalankan secara bersamaan
const main = () => {
  persiapan()
    .then((res) => {
      console.log(res);
      return rebusAir();
    })
    .then((res) => {
      console.log(res);
      return masak();
    })
    .then((res) => {
      console.log(res);
    });
};

main();
