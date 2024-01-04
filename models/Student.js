// import database
const db = require("../config/database");

// membuat class Model Student
class Student {
  /**
   * Membuat method static all.
   */
  static all() {
    // return Promise sebagai solusi Asynchronous
    return new Promise((resolve, reject) => {
      const sql = "SELECT * from students";
      /**
       * Melakukan query menggunakan method query.
       * Menerima 2 params: query dan callback
       */
      db.query(sql, (err, results) => {
        resolve(results);
      });
    });
  }

  
  static async create(data) {
    // insert ke dalam database
    const insertToDatabase = await new Promise((resolve, reject) => {
      const query = "INSERT INTO students SET ?";

      // set created_at dan updated_at ke waktu saat ini.
      data.created_at = new Date();
      data.updated_at = new Date();

      db.query(query, data, (err, results) => {
        if (err) reject(err);
        resolve(results);
      });
    });

    // get data student yang baru diinsert
    return await Student.find(insertToDatabase.insertId);
  }

  static async update(id, data) {
    // update to database
    const updateToDatabase = await new Promise((resolve, reject) => {
      const query = "UPDATE students SET ? WHERE id = ?";

      // set updated_at ke waktu sekarang
      data.updated_at = new Date();

      db.query(query, [data, id], (err, results) => {
        if (err) reject(err);
        resolve(results);
      });
    });
    // get data student yang baru diupdate
    return await Student.find(id);
  }

  static async destroy(id) {
    // delete to database
    const deleteToDatabase = await new Promise((resolve, reject) => {
      const query = "DELETE FROM students WHERE id = ?";

      db.query(query, id, (err, results) => {
        if (err) reject(err);
        resolve(results);
      });
    });

    // get data student yang baru diupdate
    return await Student.find(id);
  }
}

// export class Student
module.exports = Student;
