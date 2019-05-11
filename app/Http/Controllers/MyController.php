<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use Hash;
use Auth;

class MyController extends Controller
{

  function __construct(){
    $slide=Slide::all();
    $type_products=ProductType::all();
    view()->share('slide',$slide);  //truyen du lieu chung
    view()->share('type_products',$type_products);
  }
  public function getIndex(){
    $new=Product::where('new',1)->paginate(12);
    return view('pages.trangchu',compact('new'));
  }
  public function getSanpham($id_type){
    $name_type=ProductType::find($id_type);
    $type=Product::where('id_type',$id_type)->get();
    return view('pages.sanpham',compact('name_type','type'));
  }
  public function getChitiet($id){
    $details=Product::find($id);
    return view('pages.chitiet',compact('details'));
  }
  public function getAddCart(Request $req,$id){
    $product = Product::find($id);
    $oldCart = Session('cart')?Session::get('cart'):null;
    $cart = new Cart($oldCart);
    $cart->add($product, $id);
    $req->session()->put('cart',$cart);
    return redirect()->back();
  }
  public function getDelItemCart($id){
      $oldCart = Session::has('cart')?Session::get('cart'):null;
      $cart = new Cart($oldCart);
      $cart->removeItem($id);
      if(count($cart->items)>0){
          Session::put('cart',$cart);
      }
      else{
          Session::forget('cart');
      }
      return redirect()->back();
  }
  public function getGiohang(){
    return view('pages.giohang');
  }
  public function getCheckout(){
      return view('pages.dathang');
  }

  public function postCheckout(Request $req){

      $cart = Session::get('cart');
      $customer = new Customer;
      $customer->name = $req->name;
      $customer->gender = $req->gender;
      $customer->email = $req->email;
      $customer->address = $req->address;
      $customer->phone_number = $req->phone;
      if($req->notes=='') $req->notes='no';
      $customer->note = $req->notes;
      $customer->save();

      if($cart!=null)
      {
        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');
      }
      else {
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng không thành công');
      }
  }
  public function getSearch(Request $req){
    $product=Product::where('name','like','%'.$req->tukhoa.'%')
                      ->orwhere('unit_price',$req->tukhoa)
                      ->get();
    return view('pages.timkiem',compact('product'));
  }
  public function getLienhe(){
    return view('pages.lienhe');
  }
  public function getDangki(){
      return view('pages.dangki');
  }

  public function postDangki(Request $req){
      $this->validate($req,
          [
              'email'=>'required|email|unique:users,email',
              'password'=>'required|min:6|max:20',
              'fullname'=>'required',
              're_password'=>'required|same:password'
          ],
          [
              'email.required'=>'Vui lòng nhập email',
              'email.email'=>'Không đúng định dạng email',
              'email.unique'=>'Email đã có người sử dụng',
              'password.required'=>'Vui lòng nhập mật khẩu',
              're_password.same'=>'Mật khẩu không giống nhau',
              'password.min'=>'Mật khẩu ít nhất 6 kí tự'
          ]);
      $user = new User();
      $user->full_name = $req->fullname;
      $user->email = $req->email;
      $user->password = Hash::make($req->password);
      $user->phone = $req->phone;
      $user->address = $req->address;
      $user->save();
      return redirect()->back()->with('thongbao','Tạo tài khoản thành công');
  }
  public function getDangnhap(){
    return view('pages.dangnhap');
  }
  public function postDangnhap(Request $req)
  {
    $this->validate($req,[
      'email_in'=>'required',
      'password_in'=>'required|min:3|max:32'
      ],[
      'email_in.required'=>'Bạn chưa nhập email',
      'password_in.required'=>'Bạn chưa nhập mật khẩu',
      'password_in.min'=>'Mật khẩu phải nhiều hơn 3 ký tự',
      'password_in.max'=>'Mật khẩu không được lớn hơn 32 ký tự'
    ]);
    $temp= array('email'=>$req->email_in,'password'=>$req->password_in);
    if(Auth::attempt($temp)){
       return redirect('/');
    }
    else {
      return redirect()->back()->with('thongbao','Đăng nhập không thành công');
    }
  }
  public function getDangxuat(){
    Auth::logout();
    return redirect('/');
  }
}
