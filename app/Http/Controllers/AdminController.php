<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Chef;
use App\Models\Order;

class AdminController extends Controller
{
    //
    function user(){
        if (Auth::id()) {
        	$users = User::all();
        	return view('admin.users',compact('users'));
        	//return view('admin.users',['users'=>$users]);
        }else{
            return redirect('login');
        }
    }

    function deleteUser($id){
    	User::find($id)->delete();
    	//return redirect('users');
    	return redirect()->back();
    }

    function userSearch(Request $req){

        $search = $req->search;
        $users = User::where('name','Like','%'.$search.'%')
        ->orwhere('email','Like','%'.$search.'%')->get();
        return view('admin.users',compact('users'));
    }

    function foodMenu(){
        if (Auth::id()) {
        	$foods = Food::all();
        	//return view('admin.foodmenu',['foods'=>$foods]);
        	return view('admin.foodmenu',compact('foods'));
        }else{
            return redirect('login');
        }
    }

    function uploadFood(Request $req){
    	$food = new Food;

    	$image = $req->image;
    	$imagename = time().".".$image->getClientOriginalExtension();
    	$req->image->move('foodimages', $imagename);

    	$food->image = $imagename;
    	$food->title = $req->title;
    	$food->price = $req->price;
    	$food->description = $req->description;
    	$food->save();
    	return redirect()->back();
    }

    function deleteFood($id){
    	Food::find($id)->delete();
    	return redirect()->back();
    }

    function updateView($id){
        if (Auth::id()) {
        	$food = Food::find($id);
        	return view('admin.updateview',compact('food'));
        }else{
            return redirect('login');
        }
    }
 
    function updateFood(Request $req, $id){
    	//$food = Food::find($req->id);
    	$food = Food::find($id);


    	$image = $req->image;
    	
    	if ($image == NULL) {
    		$imagename = $req->oldimage;
    	}else{
    		$imagename = time().".".$image->getClientOriginalExtension();
    		$req->image->move('foodimages', $imagename);
    	}
    	$food->image = $imagename;
    	$food->title = $req->title;
    	$food->price = $req->price;
    	$food->description = $req->description;
    	$food->save();
    	return redirect('foodmenu');
    }

    function foodSearch(Request $req){

        $search = $req->search;
        $foods = Food::where('title','Like','%'.$search.'%')
        ->orwhere('price','Like','%'.$search.'%')
        ->orwhere('description','Like','%'.$search.'%')->get();
        return view('admin.foodmenu',compact('foods'));
    }

    function reservation(Request $req){
    	$reservation = new Reservation;
    	$reservation->name = $req->name;
    	$reservation->email = $req->email;
    	$reservation->phone = $req->phone;
    	$reservation->guest = $req->guest;
    	$reservation->date = $req->date;
    	$reservation->time = $req->time;
    	$reservation->message = $req->message;
    	$reservation->save();
    	return redirect('/');
    }

    function viewReservation(){
        if (Auth::id()) {
        	$reservations = Reservation::all();
        	return view('admin.adminreservation', compact('reservations'));
        }else{
            return redirect('login');
        }
    }

    function reservationSearch(Request $req){

        $search = $req->search;
        $reservations = Reservation::where('name','Like','%'.$search.'%')
        ->orwhere('email','Like','%'.$search.'%')
        ->orwhere('guest','Like','%'.$search.'%')
        ->orwhere('phone','Like','%'.$search.'%')
        ->orwhere('time','Like','%'.$search.'%')
        ->orwhere('message','Like','%'.$search.'%')
        ->orwhere('date','Like','%'.$search.'%')->get();
        return view('admin.adminreservation',compact('reservations'));
    }

    function viewChef(){
        if (Auth::id()) {
        	$chefs = Chef::all();
        	return view('admin.adminchef',compact('chefs'));
        }else{
            return redirect('login');
        }
    }

    function uploadChef(Request $req){
    	$chef = new Chef;

    	$image = $req->image;
    	$imagename = time().".".$image->getClientOriginalExtension();
    	$req->image->move('chefimages', $imagename);

    	$chef->image = $imagename; 
    	$chef->name = $req->name;
    	$chef->speciality = $req->speciality;
    	$chef->save();
    	return redirect()->back();
    }

    function updateChef($id){
        if (Auth::id()) {
            $chef = Chef::find($id);
            return view('admin.updatechef', compact('chef'));
        }else{
            return redirect('login');
        }
    }
    
    function updateFoodChef(Request $req, $id){
        $chef = Chef::find($id);

        $image = $req->image;
        
        if ($image == NULL) {
            $imagename = $req->oldimage;
        }else{
            $imagename = time().".".$image->getClientOriginalExtension();
            $req->image->move('chefimages', $imagename);
        }
        $chef->image = $imagename;
        $chef->name = $req->name;
        $chef->speciality = $req->speciality;
        $chef->save();
        return redirect()->back();
    }	

    function deleteChef($id){
        Chef::find($id)->delete();
        return redirect()->back();
    }

    function chefSearch(Request $req){

        $search = $req->search;
        $chefs = Chef::where('name','Like','%'.$search.'%')
        ->orwhere('speciality','Like','%'.$search.'%')->get();
        return view('admin.adminchef',compact('chefs'));
    }

    function orders(){
        if (Auth::id()) {
            $orders = Order::all();
            return view('admin.orders',compact('orders'));
        }else{
            return redirect('login');
        }
    }

    function orderSearch(Request $req){

        $search = $req->search;
        $orders = Order::where('name','Like','%'.$search.'%')
        ->orwhere('foodname','Like','%'.$search.'%')
        ->orwhere('price','Like','%'.$search.'%')
        ->orwhere('phone','Like','%'.$search.'%')
        ->orwhere('address','Like','%'.$search.'%')->get();
        return view('admin.orders',compact('orders'));
    }
    	
}
