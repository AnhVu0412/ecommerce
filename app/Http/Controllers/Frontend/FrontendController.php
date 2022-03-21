<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $featured_products = Product::where('trending','1')->take(15)->get();
        $category = Category::all();
        return view('frontend.index',compact('featured_products','category'));
    }
    public function category(){
        $category = Category::all();
        return view('frontend.category',compact('category'));
    }
    public function viewcategory($slug){
        if(Category::where('slug', $slug)->exists()){
            $category = Category::where('slug',$slug)->first();
            $product = Product::where('cate_id',$category->id)->get();
            return view('frontend.product.index',compact('category','product'));
        }
        else{
            return redirect('/')->with( 'status',"Slug is not existed");
        }
    }
    public function productdetail($cate_slug,$prd_slug){
        if(Category::where('slug',$cate_slug)->exists()){
            if(Product::where('slug',$prd_slug)->exists()){
                $products = Product::where('slug',$prd_slug)->first();
                return view('frontend.product.productdetail',compact('products'));
            }
            else{
                return redirect('/')->with('status',"No such product found");
            }
        }
        else{
            return redirect('/')->with('status',"No such category found");
        }
    }
}
