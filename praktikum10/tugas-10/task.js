/**
 * Fungsi untuk menampilkan hasil download
 * @param {string} result - Nama file yang didownload
 */
const showDownload = (result) => {
  return new Promise((resolve) => {
    setTimeout(() => {
      resolve(`Download selesai \nHasil Download : ${result}`);
    }, 3000);
  });
};

/**
 * Fungsi untuk download file
 * @param {function} callback - Function callback show
 */
const download = (callShowDownload) => {
  return new Promise ((resolve) => {
    setTimeout(function ()
    {
      resolve(callShowDownload("Macbook-pro.dmg"));
    }, 2000);
  });
};

download(showDownload)
.then((result) => {
  console.log(result);
})
.catch((error) => {
  console.log(error);
})

/**
 * TODO:
 * - Refactor callback ke Promise atau Async Await
 * - Refactor function ke ES6 Arrow Function
 * - Refactor string ke ES6 Template Literals
 */
