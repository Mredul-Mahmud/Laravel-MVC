<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function createProduct(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required|unique:products|max:20',
            'description'=>'required|max:300',
            'Image' =>'nullable|mimes:jpeg,png,jpg',

        ]);

        $imageName = null;
        if(isset($request->Image))
        {
            $imageName = time().'.'.$request->Image->extension();//here i have changed name format for the uploaded picture. for this a new name will be generated for each new image depending on time(second)
            $request->Image->move(public_path('images'), $imageName);

        }
 
        $product = new Product;

        $product->name = $request->name;
        $product->description = $request->description;
        $product->Image = $imageName;

        $product->save();
        flash()->success('The product has been created successfully.');
        return redirect() ->route('home')->with('success', 'The product is successfully added to the store!');;
    }
    public function editProduct($id)
    {
        $product = Product::findorFail($id);

        return view('edit', ['ExProduct'=> $product]);
    }
    public function updateProduct($id, Request $request)
    {
        $validated = $request->validate([
            'name'=>'unique:products|max:20',
            'description'=>'max:300',
            'Image' =>'nullable|mimes:jpeg,png,jpg',

        ]);

        
 
       // $product = new Product;
        $product = Product::findorFail($id);
        $product->name = $request->name;
        $product->description = $request->description;
        if(isset($request->Image))
        {
            $imageName = time().'.'.$request->Image->extension();//here i have changed name format for the uploaded picture. for this a new name will be generated for each new image depending on time(second)
            $request->Image->move(public_path('images'), $imageName);
            $product->Image = $imageName;

        }
      

        $product->save();
        flash()->info('The product has been updated successfully.');
        return redirect() ->route('home');
    }
    public function deleteProduct($id)
    {
        $product = Product::findorfail($id);

        $product->delete();
        flash()->info('The product has been deleted successfully.');
        return redirect() ->route('home');
    }
    public function ProductDetail($id)
    {
        $product = Product::findorFail($id);

        return view('detail', ['ExProduct'=> $product]);
    }
}
