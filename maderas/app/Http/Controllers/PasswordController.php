<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function edit($id)
    {

    }

  
    public function update(Request $request)
    {
        // if (!$request->ajax()) return redirect('/administrador');
    

        $request->user()->fill([
            'password' => Hash::make($request->password)
        ])->save();
    }
}
