<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends ApiController
{
    //Add CATEGORY
    public function addCategory(Request $request)
    {
       $user = auth()->user();
       if($user->tokenCan('Admin')){

       $category = Category::create([
           'name' => $request->name,
       ]);
       $message = 'Category added successfully';
           return $this->sendResponse(new CategoryResource($category), $message);
       }
           return response()->json(['success'=>false]);
    } 
    //Update CATEGORY
    public function updateCategory(Request $request ,$id){
        $user = auth()->user();
        if($user->tokenCan('Admin')){
            try {
            $update_category = Category::where('id', $id)->update([
                'name' => $request->name,
            ]);
            $message = 'Category updated successfully.';
            return $this->sendResponse($update_category, $message);
        } catch (\Exception $e) {
            $message = 'Category could not be updated.';
            return $this->sendError($e->getMessage());
        }
        }
        return response()->json(['success'=>false]);
    }
    //Delete CATEGORY
    public function deleteCategory($id){
        $user = auth()->user();
        if($user->tokenCan('Admin')){
            try {
            $category_find = Category::find($id);
            $delete_category = $category_find->delete();
            $message = "Category Deleted.";
            return $this->sendResponse($delete_category, $message);
        } catch (\Exception $e) {
            $message = "Something went wrong.";
            return $this->sendError($message);
        }
        }
        return response()->json(['success'=>false]);
    }
    //Get Category
    public function getCategory(){
        $get_category=Category::select('id','name')->get();
        $message ='list Category';
        return $this->sendResponse($get_category,$message);
    }
}
