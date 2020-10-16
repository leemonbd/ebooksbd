<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\Subcategory;
use Image;
use Illuminate\Http\Request;
use ZipArchive;
use DB;
use File;

class BookController extends Controller
{
   public function addBook(){
       $categories=Category::where('publicationStatus',1)->get();
       return view('admin.book.add-book',[
           'categories'=>$categories,

       ]);
   }

   protected function bookInfoValidate($request){
       $this->validate($request,[
           'categoryId'=>'required',
           'subcategoryId'=>'required',
           'bookName'=>'required|max:80|min:5',
           'authorName'=>'required|max:80|min:5',
           'bookPrice'=>'required|numeric',
           'bookQuantity'=>'required|numeric',
           'bookDescription'=>'required',
           'bookImage'=>'required|image',
           /*'bookPdf'=>'required|file|mimes:zip|size:3072',*/
           'publicationStatus'=>'required'
       ]);
   }

   protected function bookImageUpload($request){
       $bookImage=$request->file('bookImage');
       $bookImageName=$bookImage->getClientOriginalName();
       /*$fileType=$bookImage->getClientOriginalExtension();
       $bookImageName=$request->bookName.'.'.$fileType;*/
       $imageDirectory='admin/assets/book-images/';
       $imageURL=$imageDirectory.$bookImageName;
       //$bookImage->move($imageDirectory,$bookImageName);
       Image::make($bookImage)->resize(300,463)->save($imageURL);
       return $imageURL;
   }
   protected function bookPdfUpload($request){
       $bookPdf=$request->file('bookPdf');
       $bookPdfName=$bookPdf->getClientOriginalName();
       $pdfDirectory='admin/assets/book-pdf/';
       $pdfURL=$pdfDirectory.$bookPdfName;
       $bookPdf->move($pdfDirectory,$bookPdfName);
       return $pdfURL;
   }


   protected function saveBookBasicInfo($request,$imageURL,$pdfURL){
       $book=new Book();
       $book->categoryId=$request->categoryId;
       $book->subcategoryId=$request->subcategoryId;
       $book->bookName=$request->bookName;
       $book->authorName=$request->authorName;
       $book->bookPrice=$request->bookPrice;
       $book->bookQuantity=$request->bookQuantity;
       $book->bookDescription=$request->bookDescription;
       $book->bookImage=$imageURL;
       $book->bookPdf=$pdfURL;
       $book->publicationStatus=$request->publicationStatus;
       $book->save();
   }

   public function saveBook(Request $request){

       $this->bookInfoValidate($request);
       $imageURL=$this->bookImageUpload($request);
       $pdfURL=$this->bookPdfUpload($request);
       $this->saveBookBasicInfo($request,$imageURL,$pdfURL);
       return redirect('/book/add')->with('message','Book Info Saved Successfully');
   }

   public function manageBook(){
       $books=DB::table('books')
           ->join('categories', 'books.categoryId','=','categories.id')
           ->join('subcategories', 'books.subcategoryId','=','subcategories.id')
           ->select('books.*','categories.categoryName','subcategories.subcategoryName')
           ->get();

       return view('admin.book.manage-book',['books'=>$books]);
   }
   public function viewBooks($id){
       //$books=Book::find($id);
       $book=DB::table('books')
           ->join('categories', 'books.categoryId','categories.id')
           ->join('subcategories', 'books.subcategoryId','subcategories.id')
           ->select('books.*','categories.categoryName','subcategories.subcategoryName')
           ->where('books.id',$id)
           ->first();
       return view('admin.book.view-book',['book'=>$book]);
   }

   public function unpublishedBook($id){
       $book=Book::find($id);
       $book->publicationStatus=0;
       $book->save();
       return redirect('/book/manage')->with('message','Book Info Unpublished Successfully');
   }

    public function publishedBook($id){
        $book=Book::find($id);
        $book->publicationStatus=1;
        $book->save();
        return redirect('/book/manage')->with('message','Book Info Published Successfully');
    }

    public function editBook($id){
        $categories=Category::where('publicationStatus',1)->get();
        $subcategories=Subcategory::where('publicationStatus',1)->get();
        $book=Book::find($id);
        return view('admin.book.edit-book',[
            'book'=>$book,
            'categories'=>$categories,
            'subcategories'=>$subcategories
            ]);
   }

    protected function updateBookBasicInfoAndPdf($book,$request,$pdfURL=null){
        $book->bookName=$request->bookName;
        $book->authorName=$request->authorName;
        $book->bookPrice=$request->bookPrice;
        $book->bookQuantity=$request->bookQuantity;
        $book->bookDescription=$request->bookDescription;
        if($pdfURL){
            $book->bookPdf=$pdfURL;
        }
        $book->publicationStatus=$request->publicationStatus;
        $book->save();
    }

    protected function updateBookBasicInfoAndImage($book,$request,$imageURL=null){
        $book->bookName=$request->bookName;
        $book->authorName=$request->authorName;
        $book->bookPrice=$request->bookPrice;
        $book->bookQuantity=$request->bookQuantity;
        $book->bookDescription=$request->bookDescription;
        if($imageURL){
            $book->bookImage=$imageURL;
        }
        $book->publicationStatus=$request->publicationStatus;
        $book->save();
    }

   public function updateBook(Request $request){
       $bookImage=$request->file('bookImage');
       $bookPdf=$request->file('bookPdf');
       $book=Book::find($request->bookId);

       if($bookImage){
           $imageURL=$this->bookImageUpload($request);
           $this->updateBookBasicInfoAndImage($book,$request,$imageURL);
       }

       else{
           $this->updateBookBasicInfoAndImage($book,$request);
       }

       if($bookPdf){
           $pdfURL=$this->bookPdfUpload($request);
           $this->updateBookBasicInfoAndPdf($book,$request,$pdfURL);
       }
       else{
           $this->updateBookBasicInfoAndPdf($book,$request);
       }

       return redirect('/book/manage')->with('message','Book Info Update Successfully');
   }

   public function deleteBook($id){
       $book=Book::find($id);
       $book->delete();
       return redirect('/book/manage')->with('message','Book Info Delete Successfully');
   }

   public function getSubcat($id){
       $subcategory=DB::table('subcategories')->where('categoryId',$id)->get();
       return response()->json($subcategory);
   }
}
