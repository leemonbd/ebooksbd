<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\Customer;
use App\Subcategory;
use Illuminate\Http\Request;
use Cart;
use Session;
use Mail;

class CartController extends Controller
{
    public function addToCart(Request $request){
        $orderNumber=mt_rand(1,1000);
        $books=Book::find($request->id);
        Cart::add([
            'id'=>$request->id,
            'name'=>$books->bookName,
            'qty' =>$books->bookQuantity,
            'price'=>$books->bookPrice,
            'weight'=>$books->bookPrice,
            'options'=>[
                'image'=>$books->bookImage,
                'pdf'=>$books->bookPdf,
                'authorName'=>$books->authorName,
                'orderNumber'=>$orderNumber
            ],
        ]);
        return redirect('/cart/show');
    }

    public function addCart($id){
        $orderNumber=mt_rand(1,1000);
        $books=Book::find($id);
        Cart::add([
            'id'=>$books->id,
            'name'=>$books->bookName,
            'qty' =>$books->bookQuantity,
            'price'=>$books->bookPrice,
            'weight'=>$books->bookPrice,
            'options'=>[
                'image'=>$books->bookImage,
                'pdf'=>$books->bookPdf,
                'authorName'=>$books->authorName,
                'orderNumber'=>$orderNumber
            ],
        ]);
        return redirect('/cart/show');
    }


    public function showCart(){
        $subcategories=Subcategory::where('publicationStatus',1 )->get();
        $categories=Category::where('publicationStatus',1)->get();
        $cartBooks=Cart::content();

        return view('front-end.cart.show-cart',[
            'subcategories'=>$subcategories,
            'categories'=>$categories,
            'cartBooks'=>$cartBooks,
        ]);
    }

    public function deleteCartItem($rowId){
        Cart::remove($rowId);
        return redirect('/cart/show');
    }

    public function addWishlist($id){
        $books=Book::find($id);
        Cart::instance('wishlist')->add([
            'id'=>$books->id,
            'name'=>$books->bookName,
            'qty' =>$books->bookQuantity,
            'price'=>$books->bookPrice,
            'weight'=>$books->bookPrice,
            'options'=>[
                'image'=>$books->bookImage,
                'pdf'=>$books->bookPdf,
                'authorName'=>$books->authorName
            ],
        ]);
        return redirect('/wishlist/show');
    }

    public function showWishlist(){
        $subcategories=Subcategory::where('publicationStatus',1 )->get();
        $categories=Category::where('publicationStatus',1)->get();
        $wishlistBooks=Cart::instance('wishlist')->content();
        return view('front-end.cart.wishlist',[
            'subcategories'=>$subcategories,
            'categories'=>$categories,
            'wishlistBooks'=>$wishlistBooks,
        ]);
    }

    public function deleteWishlistItem($rowId){
        Cart::instance('wishlist')->remove($rowId);
        return redirect('/wishlist/show');
    }

}
