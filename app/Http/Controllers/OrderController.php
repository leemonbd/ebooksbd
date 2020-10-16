<?php

namespace App\Http\Controllers;

use App\OrderDetails;
use Carbon\Carbon;
use PDF;
use Illuminate\Http\Request;
use DB;


class OrderController extends Controller
{
    public function manageOrder(){
        $orderDetails=DB::table('order_details')
            ->join('customers', 'order_details.customerId','=','customers.id')
            ->select('order_details.*','customers.firstName' ,'customers.lastName')
            ->get();
        return view('admin.order.manage-order',[
            'orderDetails'=>$orderDetails
        ]);
    }

    public function orderDetails($id){
        $orderDetails=DB::table('order_details')
            ->join('customers', 'order_details.customerId','=','customers.id')
            ->select('order_details.*','customers.firstName' ,'customers.lastName')
            ->where('order_details.id',$id)
            ->first();



        return view('admin.order.order-details',[
            'orderDetails'=>$orderDetails
        ]);
    }
     public function viewInvoice($id){
         $orderDetails=DB::table('order_details')
             ->join('customers', 'order_details.customerId','=','customers.id')
             ->select('order_details.*','customers.firstName' ,'customers.lastName')
             ->where('order_details.customerId',$id)
             ->get();
         $orderDetailss=DB::table('order_details')
             ->join('customers', 'order_details.customerId','=','customers.id')
             ->select('order_details.*','customers.firstName' ,'customers.lastName', 'customers.email')
             ->where('order_details.customerId',$id)
             ->first();
         return view('admin.order.view-invoice',[
             'orderDetails'=>$orderDetails,
             'orderDetailss'=>$orderDetailss
         ]);
        }

        public function downloadInvoice($id){
            $orderDetails=DB::table('order_details')
                ->join('customers', 'order_details.customerId','=','customers.id')
                ->select('order_details.*','customers.firstName' ,'customers.lastName')
                ->where('order_details.customerId',$id)
                ->get();
            $orderDetailss=DB::table('order_details')
                ->join('customers', 'order_details.customerId','=','customers.id')
                ->select('order_details.*','customers.firstName' ,'customers.lastName', 'customers.email')
                ->where('order_details.customerId',$id)
                ->first();

            $pdf = PDF::loadView('admin.order.download-invoice',[
                'orderDetails'=>$orderDetails,
                'orderDetailss'=>$orderDetailss,
            ]);
            //return $pdf->download('itsolutionstuff.pdf');
            return $pdf->stream('invoice.pdf');

        }

    public function statusUpdate(Request $request){
        $orderDetails=OrderDetails::find($request->id);
        $orderDetails->status=$request->statusUpdate;
        $orderDetails->save();

        return redirect('/order/manage-order');
    }


    public function orderRemove($id){
        $orderDetails=OrderDetails::find($id);
        $orderDetails->delete();
        return redirect('/order/manage-order')->with('message','Order Info Delete Successfully');
    }
}
