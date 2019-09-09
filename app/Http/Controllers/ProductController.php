<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function addproductview()
    {
      $products=Product::paginate(6);
      return view('product.view',compact('products'));
    }
    public function addproductinsert(Request $request)
    {
    //   print_r($request->all());
    //   echo "<br>";
    // echo  $request->product_name;
     $request->validate([
        'product_name' => 'required',
        'product_description' => 'required',
        'product_price' => 'required|numeric',
        'product_quantity' => 'required|numeric',
        'alert_quantity' => 'required|numeric',

     ]);
     Product::insert([
       'product_name' => $request->product_name,
       'product_description' => $request->product_description,
       'product_price' => $request->product_price,
       'product_quantity' => $request->product_quantity,
       'alert_quantity' => $request->alert_quantity,

     ]);
     return back()->with('status', 'Product Inserted Successfully!!');
     // $_Session['status'] ="Product Inserted Successfully!!";
    }
    public function deleteproduct($product_id)
    {
      echo $product_id;
      // Delete From Products Where id=$product_id
      // Product::where('id', '$product_id')->delete();
      Product::find($product_id)->delete();//Primary key hole id
      return back()->with('deletestatus', 'Product Deleted Successfully!!');
    }
    public function editproduct($product_id)
    {
      // echo $product_id;
      $single_product_info=Product::findOrFail($product_id);
      return view('product.edit',compact('single_product_info'));
    }
    public function editproductinsert(Request $request)
    {
      // print_r($request->all());
      echo $request->product_name;
        Product::find($request->product_id)->update([
          'product_name' => $request->product_name,
          'product_description' => $request->product_description,
          'product_price' => $request->product_price,
          'product_quantity' => $request->product_quantity,
          'alert_quantity' => $request->alert_quantity,
        ]);
        return back()->with('status', 'Product Updated Successfully!!');
    }
}
