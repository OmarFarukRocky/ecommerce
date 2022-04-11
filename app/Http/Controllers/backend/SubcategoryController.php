<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Image;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::latest()->with('category')->get();
        return view('backend.subcategory.index',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.subcategory.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //dd($request->all());
      $request->validate([
          'category_id'=>'required',
          'sub_category_name'=>'required',
          'sub_category_photo'=>'required|image'
      ]);

      if(Subcategory::where('category_id',$request->category_id)->where('subcategory_name',$request->sub_category_name)->exists()){
          return back()->with('successfull','Sub category must be uniqid');
      }

   
     $image_path = time().uniqid().'.'.$request->sub_category_photo->extension();
     //dd($image_path);
     $img = Image::make($request->sub_category_photo)->resize(100,100);
     $img->save(public_path('uploads/subcategory_photos/'.$image_path));

      Subcategory::create([
          'category_id'=>$request->category_id,
          'subcategory_name'=>$request->sub_category_name,
          'image_path'=>$image_path
          

      ]);
      return back()->with('successfull','Sub category create successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
