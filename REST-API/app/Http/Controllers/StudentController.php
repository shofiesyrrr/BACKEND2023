<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


// praktikum 5
class StudentController extends Controller
{
    // method get (get all)
    public function index()
    {
        $students = Student::all();
        $statusCode = 200;

        //jika data kosong maka kirim status kode 204
        if ($students->isEmpty()){
            $data = [
                'message' => "Resource is empty"
            ];

            $statusCode = 404;
        }

        $data = [
            'message' => "Get all Resources!",
            'data' => $students
        ];

        return response()->json($data, $statusCode);
    }



    // method post (insert/add)
    public function store(Request $request)
    {
        $statusCode = 201;

        //validasi data request
        $rules = [
            "nama" => "required",
            "nim" => "required",
            "email" => "required|email",
            "jurusan" => "required"
        ];

        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        $messages = [
            "nama" => "Nama Harus Diisi",
            "nim" => "NIM Harus Diisi",
            "email" => "Email Harus Diisi",
            "jurusan" => "Jurusan Harus Diisi"
        ];

        $validator = Validator::make($input,$rules,$messages);
        if ($validator->fails()){
            $data = [
                'message' => 'Validasi Error',
                'data' => $validator->errors()
            ];

            $statusCode = 400;
        } else {
            $student = Student::create($validator->validate());

            $data = [
                'message' => 'Student berhasil dibuat!',
                'data' => $student
            ];

        }

        return response()->json($data, $statusCode);
    }


    // method put (edit)
    public function update(Request $request, string $id)
    {

        $student = Student::find($id);

        $statusCode = 201;

        if(!$student){
            $data = [
                "message" => "Data not Found"
            ];

            $statusCode = 404;
        }

        $student->update([
            'nama' => $request->nama ?? $student->nama,
            'nim' => $request->nim ?? $student->nim,
            'email' => $request->email ?? $student->email,
            'jurusan' => $request->jurusan ?? $student->jurusan
        ]);

        $data = [
            'message' => 'Data is Updated',
            'data' => $student
        ];

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

        return response()->json($data, $statusCode);
    }

    // method delete (remove)
    public function destroy(string $id)
    {

        $student = Student::find($id);
        $statusCode = 200;
        
        
        if ($student) {
            $student->delete();

            $data = [
                'message' => 'Berhasil Menghapus Data ' . $id
            ];
        } else {
            $data = [
                'message' => 'id: ' . $id . ' not Found! ',
            ];

            $statusCode = 404;
        }

        return response()->json($data, $statusCode);
    }
    
    //method untuk melihat atau show
    public function show($id)
    {
        //guna mencari id student yang diinginkan
        $student = Student::find($id);

        $statusCode = 200;

        if ($student) {
            $data= [
                'message' => 'Get id Student',
                'data' => $student,
            ];

            
        } else {
            $data= [
                'message' => 'Student not Found',
            ];
            $statusCode = 404;
        }
        //mengembalikan data json dan kode 200
        return response()-> json($data, $statusCode);
    }
}