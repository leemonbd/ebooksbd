<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
   public function addCategory(){
       return view('admin.category.add-category');
   }

   public function saveCategory(Request $request){
       /*Eloquent ORM*/
       $category =new Category();
       $category->categoryName = $request->categoryName;
       $category->categoryDescription = $request->categoryDescription;
       $category->publicationStatus = $request->publicationStatus;
       $category->save();
       return redirect('/category/add')->with('message', 'Category info saved successfully');

       /*Category::create($request->all());*/

       /*Query Builder */
        /*DB::table('categories')->insert([
           'categoryName'=> $request->categoryName,
           'categoryDescription'=> $request->categoryDescription,
           'publicationStatus'=> $request->publicationStatus
       ]);*/
   }

   public function manageCategory(){
       $categories=Category::all();
       /*return $categories;*/
       return view('admin.category.manage-category',['categories'=>$categories]);
   }

   public function unpublishedCategoryInfo($id){
       $category= Category::find($id);
       /*return $category;*/
       $category->publicationStatus=0;
       $category->save();

       return redirect('/category/manage')->with('message','Category Info Unpublished Successfully');
   }

   public function publishedCategoryInfo($id){
       $category=Category::find($id);
       $category->publicationStatus=1;
       $category->save();

       return redirect('/category/manage')->with('message','Category Info Published Successfully');
   }

   public function editCategoryInfo($id){
       $category=Category::find($id);
       return view('admin.category.edit-category',['category'=>$category]);
   }

   public function updateCategory(Request $request){
       /*return $request->all();*/
       $category=Category::find($request->categoryId);
       $category->categoryName = $request->categoryName;
       $category->categoryDescription = $request->categoryDescription;
       $category->publicationStatus = $request->publicationStatus;
       $category->save();
       return redirect('/category/manage')->with('message', 'Category info update successfully');
   }

   public function removeCategoryInfo($id){
       $category=Category::find($id);
       $category->delete();
       return redirect('/category/manage')->with('message', 'Category info delete successfully');

   }
}


