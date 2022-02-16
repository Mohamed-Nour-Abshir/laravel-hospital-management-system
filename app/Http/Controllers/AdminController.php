<?php

namespace App\Http\Controllers;

use App\Models\appoitment;
use App\Models\doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendMailNotification;
class AdminController extends Controller
{
    //
    public function add_doctors(){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
                return view('admin.add_doctors');
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }
        
    }

    public function add_doctor(Request $req){
        $doctor = new doctor;

        $image = $req->image;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $req->image->move('Doctors',$imageName);

        $doctor->image = $imageName;
        $doctor->name = $req->name;
        $doctor->phone = $req->phone;
        $doctor->specialist = $req->specialist;
        $doctor->room = $req->room;

        $doctor->save();
        return redirect()->back()->with('message', 'One Doctor Added Successfully');

    }

    public function showAppointments(){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
                $data = appoitment::all();
                return view('admin.showAppointments', compact('data'));
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }
        
    }

    public function approved($id){
        $data = appoitment::find($id);

        $data->status = 'approved';

        $data->save();

        return redirect()->back();
    }

    public function Cancled($id){
        $data = appoitment::find($id);

        $data->status = 'Cancled';

        $data->save();

        return redirect()->back();
    }

    public function showAllDoctors(){
        if(Auth::id()){
            if(Auth::user()->usertype=1){
                $data = doctor::all();
                return view('admin.showAllDoctors',compact('data'));
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect('login');
        }
        
    }

    public function deleteDoctor($id){
        $data = doctor::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function updateDoctor($id){
        $data = doctor::find($id);
        return view('admin.EditDoctor',compact('data'));
    }

    public function EditDoctor(Request $req, $id){
        $data = doctor::find($id);
        $data->name = $req->name;
        $data->phone = $req->phone;
        $data->specialist = $req->specialist;
        $data->room = $req->room;

            $image = $req->image;
            if($image){
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $req->image->move('Doctors',$imageName);

        $data->image = $imageName;
        }
        $data->save();

        return redirect()->back()->with('message','One Doctor has been updated Successfully');

    }
    public function SendMail($id){
        $data = appoitment::find($id);
        return view('admin.SendMail', compact('data'));
    }

    public function SendEmail(Request $req, $id){
        $data = appoitment::find($id);

        $details=[
            'greeting' => $req->greeting,
            'body' => $req->body,
            'actiontext' => $req->actiontext,
            'actionurl' => $req->actionurl,
            'endpart' => $req->endpart
            
        ];
        Notification::send($data, new SendMailNotification($details));

        return redirect()->back()->with('message', 'You sent email to a user successfully');


    }
}
