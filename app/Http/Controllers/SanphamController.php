<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sanpham;
use App\Models\danhmuc;
use App\Models\Checkout;
use App\Models\Cart;
use App\Models\Bill;
use App\Models\checkout_order;
use Auth;
use Session;

class SanphamController extends Controller
{
        //
    public function listcart(Request $req){
       return view('listcart');

   }
    public function loai_sp($Ten){
        $loai_sp = sanpham::where('Danhmuc',$Ten)->get();
       return view('Sanpham.loai_sp',compact('loai_sp'));

   }

    public function dashboard(Request $req ){
          $te=Auth::user()->role->name;
          $id=Auth::user()->id;
          $checkout = checkout::all();
          $bills=Bill::where('customer_id',$id)->paginate(4); 
          $san_pham = sanpham::paginate(5);
        if($te == 'admin') {
           
            return view('dashboard',compact('san_pham','te','bills','id'));
       }
        return view('dashboarduser',compact('san_pham','te','bills','id'));

   
            
     
   }
   public function dashboarduser(Request $req ){
         $id=Auth::user()->id;
         $bills=Bill::where('customer_id',$id)->paginate(4);     
         $san_pham = sanpham::paginate(5);
            return view('dashboarduser',compact('san_pham','bills','id'));
   }

   public function hienthi(Request $req){


      // $san_pham = sanpham::where('Status',1)->paginate(4);
      // $san_pham=sanpham::where('Status',1)->paginate(4, ['*'], 'pag');
         $san_pham=sanpham::paginate(8, ['*'], 'pag');

        //$san_pham = sanpham::paginate(4);
         $khuyen_mai=sanpham::where('GiaKM','<>',0)->paginate(4);
         //$khuyen_mai=sanpham::where('GiaKM',1)->paginate(4, ['*'], 'pag');
         $carts = session()->get('cart');
            return view('welcome',compact('san_pham','khuyen_mai','carts'));

     }
     public function hienthiuser(Request $req){


      // $san_pham = sanpham::where('Status',1)->paginate(4);
      // $san_pham=sanpham::where('Status',1)->paginate(4, ['*'], 'pag');
         $san_pham=sanpham::paginate(8, ['*'], 'pag');

        //$san_pham = sanpham::paginate(4);
         $khuyen_mai=sanpham::where('GiaKM','<>',0)->paginate(4);
         //$khuyen_mai=sanpham::where('GiaKM',1)->paginate(4, ['*'], 'pag');
         $carts = session()->get('cart');
             return view('welcomeuser',compact('san_pham','khuyen_mai','carts'));

     }
     public function index(Request $req){

          $san_pham = sanpham::paginate(3);

              return view('Sanpham.index',compact('san_pham'));

    }
    public function add(){
          $danh_muc = danhmuc::all();
              return view('Sanpham.add' ,compact('danh_muc'));

        }
    public function create(Request $req){
       if($req->has('file')){
          $file=$req->file;
         $file_name=$file->getClientOriginalName();
         $file->move(public_path('Uploads'),$file_name);
          }
  
           sanpham::create([
                   'Tensanpham'=>$req->name,
                   'Masp'=>$req->ma,
                   'Danhmuc'=>$req->danhmuc,
                   'Giasp'=>$req->gia,
                   'GiaKM'=>$req->giakm,
                   'Mota'=>$req->mota,
                   'image'=>$file_name,
                   'Status'=>$req->status

        ]);
                    return redirect()->route('dashboard')->withSuccess('Thêm mới thành công');

    }
        // sua san pham
    public function edit($id){
         $san_pham = sanpham::find($id);
         $danh_muc = danhmuc::all();
              return view('Sanpham.edit',compact('san_pham'),compact('danh_muc'));

    }
    public function post_edit(Request $req ,$id){
         $san_pham = sanpham::find($id);
         $danh_muc = danhmuc:: all();
         if($req->has('file')){
            $file=$req->file;
            $file_name=$file->getClientOriginalName();
            $file->move(public_path('Uploads'),$file_name);
    }
         else{
         $file_name=$san_pham->image;
    }
    sanpham::find($id)->update(
      [
        'Tensanpham'=>$req->name,
        'Masp'=>$req->ma,
        'Danhmuc'=>$req->danhmuc,
        'Giasp'=>$req->gia,
        'GiaKM'=>$req->giakm,
        'Mota'=>$req->mota,
        'image'=>$file_name,
        'Status'=>$req->status
    ]);

    return redirect()->route('dashboard')->withSuccess('Cập nhập thành công'); 
    }
    public function delete($id){
     $san_pham = sanpham::where('id',$id)->delete();
     return redirect()->route('dashboard')->withSuccess(' xóa thành công');       
    }
    public function lienhe(Request $req){
       return view('lienhe');

    } 
    public function addcart(Request $req,$id){
        $san_pham = sanpham::where('id',$id)->first();
        if ($san_pham != null) {
           $oldCart=Session('cart')?Session::get('cart'):null;
           $newCart= new Cart($oldCart);
           $newCart->addcart($san_pham,$id);
            
           $req->session()->put('cart',$newCart);


       } 
    
    return view('cart');
    }
     public function deleteCart(Request $req,$id){
       $oldCart=Session('cart')?Session::get('cart'):null;
           $newCart= new Cart($oldCart);
           $newCart->deleteCart($id);
          if (Count($newCart->items)>0) {   
           $req->session()->put('cart',$newCart);
       } else{
        $req->session()->forget('cart');
       }
    
    return view('cart',compact('newCart'));
    }
    public function deleteListCart(Request $req,$id){
           $oldCart= Session('cart')?Session::get('cart'):null;
           $newCart= new Cart($oldCart);
           $newCart->deleteCart($id);
          if (Count($newCart->items)>0) {   
           $req->session()->put('cart',$newCart);
       } else{
        $req->session()->forget('cart');
       }
    
    return view('list-cart-one',compact('newCart'));
    }
    public function saveListCart(Request $req ,$id,$qty){
             $oldCart= Session('cart')?Session::get('cart'):null;
           $newCart= new Cart($oldCart);
           $newCart->saveCart($id,$qty);            
           $req->session()->put('cart',$newCart);    
    return view('list-cart-one',compact('newCart'));
    }

     public function timkiem(Request $req){
        $san_pham=sanpham::where('Tensanpham','like','%'.$req->timkiem.'%')->orWhere('Giasp',$req->timmkiem)->get();
       return view('Sanpham.timkiem', compact('san_pham'));

    }
    public function chitietsp(Request $req){ 
        $khuyen_mai=sanpham::where('GiaKM','<>',0)->paginate(4);
   
        $carts = session()->get('cart');
        $san_pham = sanpham::where('id',$req->id)->first();

    
       return view('chitietsp', compact('san_pham','khuyen_mai','carts'));

    } 
public function test(Request $req){ 
        
       return view('test');

    } 
}

