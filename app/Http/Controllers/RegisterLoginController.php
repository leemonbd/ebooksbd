<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\Customer;
use App\OrderDetails;
use App\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Hash;
use Storage;
use Image;
use PDF;
use Session;
use Mail;
use DB;
use Respons;


class RegisterLoginController extends Controller
{
    public function registerLogin(){
        $subcategories=Subcategory::where('publicationStatus',1 )->get();
        $categories=Category::where('publicationStatus',1)->get();
        $cartBooks=Cart::content();
        return view('front-end.register-login.register-login',[
            'subcategories'=>$subcategories,
            'categories'=>$categories,
            'cartBooks'=>$cartBooks
        ]);
    }

    protected function registerCustomerValidate($request){
        $this->validate($request,[
            'firstName'=>'required|max:80|min:5',
            'lastName'=>'required|max:80|min:5',
            'email'=>'required|unique:customers,email',
            'password'=>'required',
            'profileImage'=>'required|image',
        ]);
    }

    protected function customerImageUpload($request){
        $profileImage=$request->file('profileImage');
        $profileImageName=$profileImage->getClientOriginalName();
        /*$fileType=$bookImage->getClientOriginalExtension();
        $bookImageName=$request->bookName.'.'.$fileType;*/
        $imageDirectory='admin/assets/profile-images/';
        $imageURL=$imageDirectory.$profileImageName;
        //$profileImage->move($imageDirectory,$profileImageName);
        Image::make($profileImage)->resize(300,300)->save($imageURL);
        return $imageURL;
    }

    protected function saveCustomerBasicInfo($request,$imageURL){

        $customer=new Customer();

        $customer->firstName=$request->firstName;
        $customer->lastName=$request->lastName;
        $customer->email=$request->email;
        $customer->password=$request->password;
        $customer->profileImage=$imageURL;
        $customer->save();

        /*$customerId=$customer->id;
        Session::put('customerId',$customerId);
        Session::put('customerName',$customer->firstName.' '.$customer->lastName);*/

        $data=$customer->toArray();


        Mail::send('front-end.mails.confirmation-mail', $data, function ($message) use ($data) {
            $message->to($data['email']);
            $message->subject('Confirmation Mail');
        } );

    }

    public function registerCustomer(Request $request){
        $this->registerCustomerValidate($request);
        $imageURL=$this->customerImageUpload($request);
        $this->saveCustomerBasicInfo($request,$imageURL);


        return redirect('/register-login')->with('message','Registration Successful, please login your account');
    }

    public function customerLogin(Request $request){
        $customer=Customer::where('email',$request->email)->where('password',$request->password)->first();

        if($customer){
            Session::put('customerId',$customer->id);
            Session::put('customerName',$customer->firstName.' '.$customer->lastName);
            return redirect('/my-account');

        }else{
            return redirect('/register-login')->with('loginErrorMessage','Invalid email address or password');

        }
    }

    public function customerLogout(){
        Session::forget('customerId');
        Session::forget('customerName');

        return redirect('/');
    }


    public function myAccount(){
        $subcategories=Subcategory::where('publicationStatus',1 )->get();
        $categories=Category::where('publicationStatus',1)->get();
        $cartBooks=Cart::content();
        $customer=Customer::find(Session::get('customerId'));
        $customerSessionId=Session::get('customerId');
        $orderDetails=OrderDetails::all()->where('customerId',$customerSessionId);
       /* $date=Carbon::parse($orderDetails->updated_at)->get();
        $expiredDate=$date->addDay(1);
        $todaysDate=$date->isoFormat('MMM Do, YYYY');*/

        return view('front-end.my-account.my-account',[
            'subcategories'=>$subcategories,
            'categories'=>$categories,
            'cartBooks'=>$cartBooks,
            'customer'=>$customer,
            'orderDetails'=>$orderDetails,
           /* 'todaysDate'=>$todaysDate,
            'expiredDate'=>$expiredDate,*/
        ]);
    }

    protected function editCustomerBasicInfo($customer,$request,$imageURL=null){
        $customer->firstName = $request->firstName;
        $customer->lastName = $request->lastName;
        $customer->email = $request->email;
        $customer->password =$request->password;
        if ($imageURL){
            $customer->profileImage = $imageURL;
        }
        $customer->save();
    }

    public function updateCustomerInfo(Request $request){
        $customer=Customer::find($request->id);
        $profileImage=$request->file('profileImage');

        if($profileImage){
            $imageURL=$this->customerImageUpload($request);
            $this->editCustomerBasicInfo($customer,$request,$imageURL);
        }

        else{
            $this->editCustomerBasicInfo($customer,$request);
        }

        Session::forget('customerId');
        Session::forget('customerName');

        return redirect('/');


    }

    public function downloadBook($id){
        $downloadBook=OrderDetails::find($id);
        return response()->download($downloadBook->bookPdf);

    }





}
