<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\GroceryCrud;

class Buku extends BaseController
{
    public function index()
    {
        $crud = new GroceryCrud();
        $crud->setTable('bukus');
        $crud->setSubject('Buku');
        $crud->columns(['judul', 'penulis', 'penerbit', 'sinopsis', 'jml_halaman', 'created_at']);
        $crud->fields(['judul', 'penulis', 'penerbit', 'sinopsis', 'jml_halaman']);
        $crud->displayAs('jml_halaman', 'Jumlah Halaman');
        $crud->displayAs('created_at', 'Tanggal Terdaftar');
        $output = $crud->render();
        $output->nav = "buku";
        $output->nama = session()->get('username');
        return view('buku', (array)$output);
        //
    }
}
