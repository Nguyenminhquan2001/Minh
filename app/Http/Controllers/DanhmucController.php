<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\danhmuc;
class DanhmucController extends Controller
{
    //
    public function index(){

   $danh_muc = danhmuc::paginate(3);
   return view('danhmuc.index',compact('danh_muc'));

 }
 public function adddm(){

  return view('danhmuc.adddm');

}
public function createdm(Request $req){
  

  danhmuc::create([
   'Ten'=>$req->name


 ]);
  return redirect()->route('danhmuc')->withSuccess('Thêm mới thành công');

}
    // sua danh muc
public function editdm($id){
 $danh_muc = danhmuc::find($id);
 return view('danhmuc.editdm',compact('danh_muc'));

}
public function post_editdm(Request $req , $id){
 $danh_muc = danhmuc::find($id);
 danhmuc::find($id)->update(
  [
    'Ten'=>$req->name
    
  ]);

 return redirect()->route('danhmuc')->withSuccess('Cập nhập thành công'); 
}
public function deletedm($id){
 $danh_muc = danhmuc::where('id',$id)->delete();
 return redirect()->route('danhmuc')->withSuccess(' xóa thành công');       
}
}
