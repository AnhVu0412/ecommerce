<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('admin.categories.index',compact('category'));
    }
    public function add(){

        return view('admin.categories.add');
    }
    public  function insert(Request $request){

        $category = new Category();

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('public/assets/uploads/category',$filename);
            $category->image = $filename;
        }
        $category->name = $request ->input('name');
        $category->slug = $request ->input('slug');
        $category->description = $request ->input('description');
        $category->status = $request ->input('status')==true? '1': '0';
        $category->popular = $request ->input('popular')==true? '1': '0';
        $category->meta_title = $request ->input('meta_title');
        $category->meta_description = $request ->input('meta_description');
        $category->meta_keyword = $request ->input('meta_keyword');
        $category->save();
        return redirect('/categories')->with('status',"categories added successfully");
    }
}
