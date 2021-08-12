<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Food;
use App\Models\Chef;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
    //
    function index(){

        if (Auth::id()) {
            return redirect('redirects');
        }
        else
    	$foods = Food::all();
        $chefs = Chef::all(); 
    	return view('home',compact('foods','chefs'));
    }

    function redirects(){
    	$foods = Food::all();
        $chefs = Chef::all();
    	$usertype = Auth::user()->usertype;
    	if ($usertype == '1') {
    		return  view('admin.adminhome');
    	}else{
            $user_id = Auth::id();
            $count = Cart::where('user_id',$user_id)->count();
    		return view('home',compact('foods','chefs','count'));
    	}
    }

    function addCart(Request $req, $id){
        if (Auth::id()) {
            $user_id = Auth::id();
            //dd($user_id);
            $cart = new Cart;
            $cart->user_id = $user_id;
            $cart->food_id = $id;
            $cart->quantity = $req->quantity;
            $cart->save();
            return redirect()->back();
        }else{
            return redirect('/login');
        }
    }

    function showCart($id){
        $count = Cart::where('user_id', $id)->count();
        //$cartid = Cart::select('*')->where('user_id',  $id)->get();
        //$cartdata = Cart::where('user_id', $id)->join('foods', 'carts.food_id', '=', 'foods.id')->get();
        if (Auth::id() == $id) {
            $cartdata = Cart::where('user_id', $id)
            ->join('foods', 'carts.food_id', '=', 'foods.id')
            ->select('foods.*','carts.id as cart_id','carts.quantity as quantity')->get();
            /*$cartdata = DB::table('carts')
            ->join('foods', 'carts.food_id', '=', 'foods.id')
            ->where('carts.user_id', $id)
            ->select('foods.*','carts.id as cart_id')->get();*/
            return view('showcart',compact('count','cartdata'));
        }else{
            return redirect()->back();
        }
        
    }

    function deleteCart($id){
        Cart::find($id)->delete();
        return redirect()->back();
    }

    function orderConfirm(Request $req){

        foreach ($req->foodname as $key => $foodname) {
            $order = new Order;
            $order->foodname = $foodname;
            $order->price = $req->price[$key];
            $order->quantity = $req->quantity[$key];
            $order->name = $req->name;
            $order->phone = $req->phone;
            $order->address = $req->address;
            $order->save();
        }
        $user_id = Auth::id();
        Cart::where('user_id', $user_id)->delete();
        return redirect()->back();
    }
}
