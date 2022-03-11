<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\checkout_order;
use App\Models\sanpham;
use App\Models\danhmuc;
use App\Models\Cart;
use App\Models\Bill;
use Session;
use Auth;
class CheckoutController extends Controller
{
    //
    public function addcheckout(Request $req){

        $carts = Session()->get('cart');
       return view('cart.checkoutcart', compact('carts'));

    }
     public function viewCheckout(){
        $Checkout = Checkout::all();
        $checkout_order = checkout_order::all();
        $Bill = Bill::all();
      return view('Checkout.ViewCheckOut' ,compact('Checkout','checkout_order','Bill'));

        }
        public function viewbill(Request $req){
        $Checkout = Checkout::all();
        $checkout_order = checkout_order::all();
        
      return view('Checkout.viewbill' ,compact('Checkout','checkout_order'));

        }
         public function deletebill($id){
     $bill = Bill::where('id',$id)->delete();
     return redirect()->route('viewCheckout')->withSuccess(' xóa thành công');       
    }
    public function createcheckout(Request $req){
       $cart = Session()->get('cart');   
       //dd($cart);
        $checkout = new Checkout;
        $checkout->Ho             =$req->ho;
        $checkout->Ten            =$req->ten;
        $checkout->Email          =$req->email1;
        $checkout->SDT            =$req->sdt;
        $checkout->province_name =$req->tinh;
        $checkout->district_name =$req->huyen;          
        $checkout->ward_name    =$req->phuong;
        $checkout->Diachi        =$req->diachi;
        $checkout->Note          =$req->note;

                   $checkout->save();
        $bill = new Bill;
        $bill->usename_buy_product      =$req->ten;
        $bill->checkout_id              =$checkout->id;
        $bill->customer_id              =Auth::user()->id;
        $bill->date_order               =date('Y-m-d ');
        $bill->product_qty              =$cart->totalQty;
        $bill->product_totalprice       =$cart->totalPrice;
        $bill->payment                  =$req->payment_method;
        $bill->note                     =$req->note;
                   $bill->save();
                   
         foreach ($cart as $key => $value) {
                foreach ($value as $key => $items) {
                  
         $checkout_order = new checkout_order;
         $checkout_order->id_checkout   =$checkout->id;
         $checkout_order->bill_id       =$bill->id;    
         $checkout_order->product_id    =$key;       
         $checkout_order->product_name  =$items['ten_san_pham']->Tensanpham;
         $checkout_order->soluong       =$items['qty'];
         $checkout_order->toltal_price  =$items['price'];
         $checkout_order->payment       =$bill->payment;
          $checkout_order->save();
                }break;
             }
            Session::forget('cart');   
            return redirect()->back()->with('thongbao', 'Thanh toán thành công');

    }
}
