<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Sendoffer;

class EmailController extends Controller
{
    public function index()
    {
        return view('emails.index',[
            'users'=>User::latest()->get()
        ]);
    }

    public function emailsend($id)
    {
            // $users = User::find($id)->email;
            //dd($users);
         Mail::to(User::find($id)->email)->send(new Sendoffer());
         return back();
    } 
}
