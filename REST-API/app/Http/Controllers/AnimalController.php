<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    //property animals
    public $animals = ["Kucing", "Burung", "Katak"];

    //method untuk menampilkan semua hewan
    public function index()
    {
        echo "Menampilkan data animals <br>";

        //loop property animals
        foreach ($this->animals as $animals) {
            echo "- $animals <br>";
        }
    }

    //method untuk menambahkan data hewan
    public function store(Request $request)
    {
        echo "Menambahkan hewan baru <br>";

        //menambahkan data ke property animals
        array_push($this->animals, $request->name);

        //memanggil kembali method index
        $this->index();
    }

    //method untuk edit
    public function update($id, Request $request)
    {
        echo "Mengubah data hewan id $id. <br";

        //method untuk mengupdate
        $this->animals[$id] = $request->name;

        //panggil method index
        $this->index();
    }

    //method untuk delete atau menghapus
    public function destroy($id)
    {
        echo "Menghapus data hewan id $id. <br>";

        unset($this->animals[$id]);

        //panggil method index
        $this->index();
    }
}
