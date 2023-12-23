// import Model Student
const Student = require("../models/Student");

class StudentController {
  // menambahkan keyword async
  async index(req, res) {
    try {
      const students = await Student.all();
      const data = {
        message: students,
      };

      res.json(data);
    } catch (error) {
      console.log(error);
      res.json({
        message: error.sqlMessage,
      });
    }
  }

  async store(req, res) {
    /**
     * TODO 2: memanggil method create.
     * Method create mengembalikan data yang baru diinsert.
     * Mengembalikan response dalam bentuk json.
     */
    const { nama, nim, email, jurusan } = req.body;
    const reqData = {
      nama : nama,
      nim : nim,
      email : email,
      jurusan : jurusan
    };

    try {
      await Student.create(reqData);
      const data = {
        message: "Menambahkan data student baru",
        students: [reqData]
      };

      res.json(reqData);
    } catch(error) {
      console.log(error);
      res.json({
        message: error.sqlMessage,
      });
    }
  }

  update(req, res) {
    const { id } = req.params;
    const { nama } = req.body;

    const data = {
      message: `Mengedit student id ${id}, nama ${nama}`,
      data: [],
    };

    res.json(data);
  }

  destroy(req, res) {
    const { id } = req.params;

    const data = {
      message: `Menghapus student id ${id}`,
      data: [],
    };

    res.json(data);
  }
}

// Membuat object StudentController
const object = new StudentController();

// Export object StudentController
module.exports = object;