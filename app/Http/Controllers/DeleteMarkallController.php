<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DeleteMarkallController extends Controller
{
    //
    public function deleteMarkall(Request $request)
    {
       //dd($request->check);
       foreach($request->check as $id){
            User::find($id)->delete();
       }

       return back();
    }
}
