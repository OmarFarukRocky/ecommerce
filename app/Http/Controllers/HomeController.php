<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function showUserList() 
    {
        return view('backend.users.index',[
            'users'=>User::latest()->paginate(10)
        ]);
    }

    public function usersdestroy($id)
    {
        User::find($id)->delete();
        return back();
    }

    public function deleteMarkall(Request $request)
    {
      // dd($request->check);
       foreach($request->check as $id){
            User::find($id)->delete();
       }

       return back();
    }

}
