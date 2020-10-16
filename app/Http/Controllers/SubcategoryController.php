<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;
use DB;

class SubcategoryController extends Controller
{
    public function addSubcategory(){
        $categories=Category::where('publicationStatus',1)->get();
        return view('admin.subcategory.add-subcategory',['categories'=>$categories]);
    }

    public function saveSubcategory(Request $request){
        $this->validate($request, [
            'subcategoryName'=>'required|regex:/^[\pL\s-]+$/u|max:80|min:1',
            'subcategoryDescription'=>'required',
            'publicationStatus'=>'required'
        ]);

        $subcategory=new Subcategory();
        $subcategory->categoryId=$request->categoryId;
        $subcategory->subcategoryName=$request->subcategoryName;
        $subcategory->subcategoryDescription=$request->subcategoryDescription;
        $subcategory->publicationStatus=$request->publicationStatus;
        $subcategory->save();
        return redirect('/subcategory/add')->with('message', 'Subcategory Info Saved Successfully');
    }

    public function manageSubcategory(){
        $subcategories=DB::table('subcategories')
            ->join('categories', 'subcategories.categoryId','=','categories.id')
            ->select('subcategories.*','categories.categoryName')
            ->get();
        return view('admin.subcategory.manage-subcategory', ['subcategories'=>$subcategories]);
    }

    public function unpublishedSubcategory($id){
        $subcategory=Subcategory::find($id);
        $subcategory->publicationStatus=0;
        $subcategory->save();
        return redirect('/subcategory/manage')->with('message','Sub-Category Info Unpublished Successfully');
    }
    public function publishedSubcategory($id){
        $subcategory=Subcategory::find($id);
        $subcategory->publicationStatus=1;
        $subcategory->save();
        return redirect('/subcategory/manage')->with('message','Sub-Category Info Published Successfully');
    }

    public function editSubcategory($id){
        $categories=Category::where('publicationStatus',1)->get();
        $subcategory=Subcategory::find($id);
        return view('admin.subcategory.edit-subcategory',[
            'subcategory'=>$subcategory,
            'categories'=>$categories
        ]);
    }

    public function updateSubcategory(Request $request){
        $subcategory=Subcategory::find($request->subcategoryId);
        $subcategory->categoryId=$request->categoryId;
        $subcategory->subcategoryName=$request->subcategoryName;
        $subcategory->subcategoryDescription=$request->subcategoryDescription;
        $subcategory->publicationStatus=$request->publicationStatus;
        $subcategory->save();
        return redirect('/subcategory/manage')->with('message', 'Subcategory Info Update Successfully');
    }

    public function removeSubCategoryInfo($id){
        $subcategory=Subcategory::find($id);
        $subcategory->delete();
        return redirect('/subcategory/manage')->with('message', 'Sub-Category info delete successfully');
    }
}
