<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// class HomeController extends Controller
// {
//     public function index()
//     {
//         echo "Halo pertemuan 8 dari home contriller";
//     }
//     public function perkalian($angka1, $angka2)
//     {
//         echo "$angka1 x $angka2 <br>";
//         echo $angka1 * $angka2;
//     }

//     public function namaHewan ($nama = "Manusia"){

//         $animals = ['cicak' , 'buaya' , 'kucing' ,'apel'];
//         return view('pertemuan8',[
//         'nama' => $nama,
//         'animals' => $animals
//        ]);
//     }

//     public function Home (){
//         return view ('home');
//     }
// }

class HomeController extends Controller
{
    public function home(){
        return view('home');
    }
    public function about(){
        return view('about');
    }
    public function contact(){
        return view('contact');
    }
}

