<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request){
        // $product = new Product();
        // $product->name = 'Laptop';
        // $product->description = '"A powerful and sleek laptop with a 15.6-inch Full HD display, powered by an Intel Core i7 processor and 16GB of RAM,
        //  ideal for both work and entertainment."';
        //  $product->price = 22934;

        //  $product->save();

        //  return response()->json(['message' => 'Product create successfully']);

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ]);
        return response()->json(['message' => 'product created by create method' , 'product' => $product] ,201);
    }

    public function index(){
        $product = Product::all();

        return response()->json($product);
    }

    public function show( $id){
        $product = Product::find($id);

        return response()->json($product);
    }

    public function update(Request $request , $id){
        $product = Product::findorFail($id);

            $product->name = $request->name;
            $product->price = $request->price;
            $product->description = $request->description;
        

        $product->save();

        return response()->json(['message' => 'product update successfully!' , 'product' =>$product],200);
    }

    public function destroy($id){
        $product = Product::findorFail($id);

        $product->delete();

        return response()->json(['message' => "Product ID {$id} deleted successfully!"],200);
    }
}
