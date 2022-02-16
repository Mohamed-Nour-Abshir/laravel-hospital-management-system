<?php

namespace App\Http\Controllers;

use App\Models\appoitment;
use App\Models\doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function redirects(){
        if(Auth::id()){
           if(Auth::user()->userType == 0){
            $doctor = doctor::all();
               return view('user.home', compact('doctor'));
           }
           else{
               return view('admin.home');
           }
        }
        else{
            return redirect()->back();
        }
    }

    public function index(){
        if(Auth::id()){
            return redirect('home');
        }
        else{
            $doctor = doctor::all();
            return view('user.home', compact('doctor'));
        }
        
    }
    public function appoitment(Request $req){
        $appoitment = new appoitment();

        $appoitment->name = $req->name;
        $appoitment->email = $req->email;
        $appoitment->phone = $req->phone;
        $appoitment->date = $req->date;
        $appoitment->doctor = $req->doctor;
        $appoitment->message = $req->message;
        $appoitment->status = 'in progress';

        if(Auth::id()){
            $appoitment->user_id = Auth::user()->id;
        }

        $appoitment->save();
        return redirect()->back()->with('message','Your Appoitment has been submited successfully');
        
    }

    public function my_appointments(){
        if(Auth::id()){
            if(Auth::user()->usertype==0){
                $userid = Auth::user()->id;
                $appoint = Appoitment::where('user_id',$userid)->get();
                return view('user.my_appointments',compact('appoint'));
            }
            else{
                return redirect()->back();
            }
            
        }
        else{
            return redirect('login');
        }
            
        
    
        }
        public function cancel_appointment($id){
            $appoint = appoitment::find($id);
            $appoint->delete();
    
            return redirect()->back();
        }
}
