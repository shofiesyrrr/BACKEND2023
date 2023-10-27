<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;


// praktikum 5
class StudentController extends Controller
{
    // method get (get all)
    public function index()
    {
        $students = Student::all();

        $data = [
            'message' => 'Menampilkan semua students!',
            'data' => $students
        ];

        return response()->json($data, 200);
    }

    // method post (insert/add)
    public function store(Request $request)
    {

        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        $student = Student::create($input);

        $data = [
            'message' => 'Student berhasil dibuat!',
            'data' => $student
        ];

        return response()->json($data, 201);
    }


    // method put (edit)
    public function update(Request $request, string $id)
    {

        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        $student = Student::find($id);
        $student->update($input);

        $data = [
            'message' => 'Student berhasil di update/edit!',
            'data' => $student
        ];

        return response()->json($data, 200);
    }

    // method delete (remove)
    public function destroy(string $id)
    {

        $student = Student::find($id);
        $student->delete();

        $data = [
            'message' => 'berhasil! menghapus student ID: ' . $id,
        ];

        return response()->json($data, 200);
    }
}
