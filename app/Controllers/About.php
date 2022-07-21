<?php

namespace App\Controllers;

use App\Controllers\BaseControllers;

class About extends BaseController
{
    public function index()
    {
        $data['nav'] = 'about';
        $data['nama'] = 'boboiboy';
        return view('about', $data);
    }
}
