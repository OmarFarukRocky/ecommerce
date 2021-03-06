<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class CategoryController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $categories = Category::get();
       return view('backend.category.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
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
           'category_name'=>'required',
           'category_photo'=>'required|image',
       ]);
       
       $image_path = time().'-'.Auth::id().'.'.$request->category_photo->extension();
       $img = Image::make($request->category_photo)->resize(100,100);
       $img->save(public_path('uploads/category_photos/'.$image_path));

       Category::create([
            'category_name'=>$request->category_name,
            'image_path'=>$image_path
       ]);

       return back()->with('successfull','Category created successfully');
      
      
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::find($id);
       return view('backend.category.show',compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::find($id);
       return view('backend.category.edit',compact('categories'));
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
        $request->validate([
            'category_name'=>'required',
            'new_category_photo'=>'image'
        ]);

            Category::find($id)->update([
                'category_name'=>$request->category_name,
            ]);

        if($request->hasFile('new_category_photo')){
            $new_image_path = time().'-'.Auth::id().'.'.$request->new_category_photo->extension();
            //delete old photo
            unlink(public_path('uploads/category_photos/'.Category::find($id)->image_path));
            //new photo upload
            $img = Image::make($request->new_category_photo)->resize(100,100);
            $img->save(public_path('uploads/category_photos/'.$new_image_path));

            Category::find($id)->update([
                'image_path'=>$new_image_path
            ]);
        }
        return back()->with('successfull','Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $category = Category::find($id);
       unlink(public_path('uploads/category_photos/'.$category->image_path));
       $category->delete();

       return back()->with('successfull','Category deleted successfully');
      
    }
}
