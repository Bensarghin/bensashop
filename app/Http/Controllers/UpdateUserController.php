<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateUserController extends Controller
{
    public function edit()
    {
        return view('backoffice.user.edit');
    }

    public function update()
    {
        return view('backoffice.user.edit');
    }
}
