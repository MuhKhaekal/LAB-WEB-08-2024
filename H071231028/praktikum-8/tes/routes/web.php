<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//  route get

// Route::get('/tes',function() {
//     echo "Halo Nugrah";

// });
// lc 2 binding parameter
// Route::get('/tes/{nama}',function($nama) {
//     echo "Halo $nama";

// });

// lc 3 default parameter

// Route::get('/tes/{nama?}',function($nama ="Manusia") {
//     echo "Halo $nama";

// });
 //lc 4 return view using blade.php

//  Route::get('/tes',function() {
//    return view("pertemuan8");

//  });

// lc 5 parsing data to view

// Route::get('/tes/{nama?}',function($nama ="Manusia") {
//     return view('pertemuan8') ->with ('nama' , $nama);
    // return view('pertemuan8',[
    //     'nama' => $nama
    // ]);
    
    // });

// lc 6 = parsing array to view

// Route::get('/tes/{nama?}',function($nama ="Manusia") {  

//    $animals = ['cicak' , 'buaya' , 'kucing' ,'apel'];
//     return view('pertemuan8',[
//         'nama' => $nama,
//         'animals' => $animals
//        ]);
    
//     });


// lc 7 = using controller

// Route::get('/pertemuan8-Controller}', [HomeController::class, 'index']);

// lc 8 = using controller with parameter
Route::get('/pertemuan8-Controller/kali/{angka1}&{angka2}', [HomeController::class, 'perkalian']);

// lc 9
Route::get('/pertemuan8-Controller/data{nama?}', [HomeController::class, 'namaHewan']);

// lc 10 ; blade component
Route::get('/home', [HomeController::class, 'home']);

Route::get('/',[HomeController::class, 'home']);
Route::get('/about',[HomeController::class, 'about']);
Route::get('/contact',[HomeController::class, 'contact']);














