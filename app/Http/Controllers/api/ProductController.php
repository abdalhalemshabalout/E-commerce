<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends ApiController
{
    //Add Product
    public function addProduct(Request $request)
    {
       $user = auth()->user();
       if($user->tokenCan('Admin') || $user->tokenCan('Employee')){

        if (!empty($request->img)) {
            $file =$request->file('img');
            $extension = $file->getClientOriginalExtension();
            $img = time().'.' . $extension;
            $file->move(public_path('images/product/'), $img);
            $data['img']= 'images/product/'.$img;
            $img = 'images/product/' . $img ;
        }
       $product = Product::create([
            'category_id' => $request->categoryId,
            'name' => $request->name,
            'img' => $img,
            'size' => $request->size,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,

       ]);
       $productId = Product::find($product->id);
       CategoryProduct::create([
           'product_id'=> $productId->id,
           'category_id'=>$productId->category_id,
       ]);
       $message = 'Product added successfully';
           return $this->sendResponse(new ProductResource($product), $message);
       }
           return response()->json(['success'=>false]);
    } 
    
    //Delete Product
    public function deleteProduct($id){
        $user = auth()->user();
        if($user->tokenCan('Admin') || $user->tokenCan('Employee')){
            try {
            $product_find = Product::find($id);
            $delete_product = $product_find->delete();
            $message = "Product Deleted.";
            return $this->sendResponse($delete_product, $message);
        } catch (\Exception $e) {
            $message = "Something went wrong.";
            return $this->sendError($message);
        }
        }
        return response()->json(['success'=>false]);
    }
    
}
