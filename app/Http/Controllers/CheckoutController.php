<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use App\OrderDetails;
use App\Subcategory;
use Illuminate\Http\Request;
use Cart;
use Image;
use Session;
use Mail;

class CheckoutController extends Controller
{
    public function checkout(){
        $subcategories=Subcategory::where('publicationStatus',1 )->get();
        $categories=Category::where('publicationStatus',1)->get();
        $cartBooks=Cart::content();
        return view('front-end.checkout.checkout-content',[
            'subcategories'=>$subcategories,
            'categories'=>$categories,
            'cartBooks'=>$cartBooks
        ]);

    }

    public function completeOrder(Request $request){
        $subcategories=Subcategory::where('publicationStatus',1 )->get();
        $categories=Category::where('publicationStatus',1)->get();
        $cartBooks=Cart::content();

        foreach ($cartBooks as $cartBook){
            $orderDetails= new OrderDetails();
            $orderDetails->customerId=Session::get('customerId');
            $orderDetails->orderNumber= $cartBook->options->orderNumber;
            $orderDetails->bookId=$cartBook->id;
            $orderDetails->bookName=$cartBook->name;
            $orderDetails->authorName=$cartBook->options->authorName;
            $orderDetails->bookPrice=$cartBook->price;
            $orderDetails->bookQuantity=$cartBook->qty;
            $orderDetails->bookImage=$cartBook->options->image;
            $orderDetails->bookPdf=$cartBook->options->pdf;
            $orderDetails->save();
        }
        Cart::destroy();



        return view('front-end.complete-order.complete-order',[
            'subcategories'=>$subcategories,
            'categories'=>$categories,
            'cartBooks'=>$cartBooks,
        ]);
    }

    public function showOrder(){
        $subcategories=Subcategory::where('publicationStatus',1 )->get();
        $categories=Category::where('publicationStatus',1)->get();
        $cartBooks=Cart::content();
        $orderDetails=OrderDetails::all();



        return view('front-end.complete-order.complete-order',[
            'subcategories'=>$subcategories,
            'categories'=>$categories,
            'cartBooks'=>$cartBooks,
            'orderDetails'=>$orderDetails,
        ]);
    }


}
