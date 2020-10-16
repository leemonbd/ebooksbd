<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\Comment;
use App\Contact;
use App\Customer;
use App\OrderDetails;
use App\Subcategory;
use Illuminate\Http\Request;
use DB;
use mysql_xdevapi\Table;
use function GuzzleHttp\Promise\all;
use Cart;
use Session;
use Mail;

class IslamicBookBdController extends Controller
{
    public function index(){
        $categories=Category::where('publicationStatus',1)->get();
        $subcategories=Subcategory::where('publicationStatus',1)->get();
        $books=Book::where('publicationStatus',1)
            ->orderBy('id', 'DESC')
            ->take(7)
            ->get();
       $orderedBooks=DB::table('books')
           ->where('publicationStatus',1)
           ->join('order_details', 'order_details.bookId', '=', 'books.id')
           ->select('books.*','order_details.bookId')
           ->orderBy('id')
           ->take(7)
           ->get();

       $olderBooks=Book::where('publicationStatus',1)
           ->orderBy('id','DESC')
           ->skip(7)
           ->take(7)
           ->get();


        $cartBooks=Cart::content();
        return view('front-end.home.home',[
            'categories'=>$categories,
            'books'=>$books,
            'cartBooks'=>$cartBooks,
            'orderedBooks'=>$orderedBooks,
            'olderBooks'=>$olderBooks,
            'subcategories'=>$subcategories,
        ]);
    }


    public function allBooks(){
        $categories=Category::where('publicationStatus',1)->get();
        $books=Book::where('publicationStatus',1)
            ->orderBy('id', 'DESC')
            ->take(12)
            ->paginate(12);
        $cartBooks=Cart::content();

        return view('front-end.books.all-books',[
            'books'=>$books,
            'categories'=>$categories,
            'cartBooks'=>$cartBooks,

        ]);
    }

    public function subcategoryPage($id){
        $subcategories=Subcategory::where('publicationStatus',1)->get();
        $categories=Category::where('publicationStatus',1)->get();
        $books=Book::where('subcategoryId',$id)
            ->orderBy('id', 'DESC')
            ->get();
        $cartBooks=Cart::content();
        return view('front-end.subcategorypage.subcategory-page',[
            'subcategories'=>$subcategories,
            'categories'=>$categories,
            'books'=>$books,
            'cartBooks'=>$cartBooks,
            ]);
    }




    public function detailsPage($id,$categoryId){
        $subcategories=Subcategory::where('publicationStatus',1 )->get();
        $categories=Category::where('publicationStatus',1)->get();
        $books=DB::table('books')
            ->join('subcategories', 'books.subcategoryId','subcategories.id')
            ->select('books.*','subcategories.subcategoryName')
            ->where('books.id',$id)
            ->first();

        $relatedBooks=Book::where('categoryId',$categoryId)
            ->take(8)
            ->get();
        $cartBooks=Cart::content();
        $wishlistBooks=Cart::instance('wishlist')->content();
        $commentShow=Comment::where('book_id',$id)->get();

       /* $customer=new Customer();
        $customerId=$customer->id;


        Session::put('customerId',$customerId);*/

        return view('front-end.detailspage.details-page',[
            'subcategories'=>$subcategories,
            'categories'=>$categories,
            'books'=>$books,
            'relatedBooks'=>$relatedBooks,
            'cartBooks'=>$cartBooks,
            'wishlistBooks'=>$wishlistBooks,
            'commentShow'=>$commentShow,
        ]);
    }

    public function customerComment(Request $request){

        $this->validate($request, [
            'customer_comment' => 'required'
        ]);

        $comments = new Comment();
        $comments->customer_id = $request->customer_id;
        $comments->book_id = $request->book_id;
        $comments->customer_name = $request->customer_name;
        $comments->customer_email = $request->customer_email;
        $comments->customer_comment = $request->customer_comment;
        $comments->customer_profileImage = $request->customer_profileImage;
        $comments->save();

        return redirect()->back();

    }
public function commentShow($id,$categoryId){
    $subcategories=Subcategory::where('publicationStatus',1 )->get();
    $categories=Category::where('publicationStatus',1)->get();
    $books=DB::table('books')
        ->join('subcategories', 'books.subcategoryId','subcategories.id')
        ->select('books.*','subcategories.subcategoryName')
        ->where('books.id',$id)
        ->first();

    $relatedBooks=Book::where('categoryId',$categoryId)
        ->take(8)
        ->get();
    $cartBooks=Cart::content();


    return view('front-end.detailspage.details-page',[
        'subcategories'=>$subcategories,
        'categories'=>$categories,
        'books'=>$books,
        'relatedBooks'=>$relatedBooks,
        'cartBooks'=>$cartBooks,
    ]);

}

    public function authorPage($authorName){
        $subcategories=Subcategory::where('publicationStatus',1 )->get();
        $categories=Category::where('publicationStatus',1)->get();
        $books=Book::where('authorName',$authorName)
            ->orderBy('id', 'DESC')
            ->get();
        $cartBooks=Cart::content();
        return view('front-end.authorpage.author-page',[
            'subcategories'=>$subcategories,
            'categories'=>$categories,
            'books'=>$books,
            'cartBooks'=>$cartBooks,
        ]);
    }


    public function contact(){
        $categories=Category::where('publicationStatus',1)->get();
        $books=Book::where('publicationStatus',1)
            ->orderBy('id', 'DESC')
            ->get();
        $cartBooks=Cart::content();
        return view('front-end.contact.contact',[
            'books'=>$books,
            'categories'=>$categories,
            'cartBooks'=>$cartBooks,
        ]);
    }
     public function contactMessage(Request $request){

            $contacts=new Contact();
            $contacts->con_name = $request->con_name;
            $contacts->con_email = $request->con_email;
            $contacts->con_phone = $request->con_phone;
            $contacts->con_message = $request->con_message;
            $contacts->save();

            return redirect('/contact')->with('contactMessage', 'Thanks for the message');
        }

    public function searchPage(Request $request){

        $this->validate($request,[
            'search'=>'required'
        ]);

        $searchText=$request->search;

        $categories=Category::where('publicationStatus',1)->get();
        $books=Book::orderBy('id', 'DESC')
            ->where('bookName','like','%'.$searchText.'%')
            ->orWhere('authorName','like','%'.$searchText.'%')
            ->paginate(12);
        $cartBooks=Cart::content();
        return view('front-end.search.serach',[
            'books'=>$books,
            'categories'=>$categories,
            'cartBooks'=>$cartBooks,
        ]);
    }



    public function getSubcat($id){
        $subcategory=DB::table('subcategories')->where('categoryId',$id)->get();
        return response()->json($subcategory);
    }



    /*public function ajaxSortPageCheck($sortShowPage){
        $categories=Category::where('publicationStatus',1);
        $books=Book::All()->take($sortShowPage);
        $cartBooks=Cart::content();

        return view('front-end.books.all-books',[
            'books'=>$books,
            'categories'=>$categories,
            'cartBooks'=>$cartBooks,

        ]);

    }*/


}
