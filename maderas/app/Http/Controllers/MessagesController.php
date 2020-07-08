<?php

namespace App\Http\Controllers;

use App\Mail\MessageRecieved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessagesController extends Controller
{
    public function store(){
       $message = request()->validate([
           'nombre' =>'required',
           'telefono' =>'required',
           'email' =>'required|email',
           'mensaje' =>'required',
       ]);
        
       Mail::to('angelvalencia9811@gmail.com')->send(new MessageRecieved($message));

        // return new MessageRecieved($message);
       return 'Mensaje enviado';
    }
}
