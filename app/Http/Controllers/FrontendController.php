<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Appointment;
use App\Models\Time;
use App\Models\User;
use App\Models\Booking;
use App\Models\Prescription;
use App\Mail\AppointmentMail;



class FrontendController extends Controller
{
    //
    public function index() {
        
        date_default_timezone_set('America/Caracas');
       // dd (date('y-m-d'));
       if(request('date')){
           $nurses = $this->findNursesBasedOnDate(request('date'));//here we are askig if the user selected one date from the calendar
           return view ('welcome', compact('nurses'));
       }
        $nurses = Appointment::where('date',date('Y-m-d'))->get();
        
        return view ('welcome', compact('nurses'));
    }

    public function show($nurseId,$date){
        $appointment = Appointment::where('user_id',$nurseId)->where('date',$date)->first();
        $times =Time::where('appointment_id',$appointment->id)->where('status',0)->get();
        $user = User::where('id',$nurseId)->first();
        $nurse_id = $nurseId;
        return view('appointment',compact('times','date','user','nurse_id'));

    }
    public function findNursesBasedOnDate($date){
        $nurses = Appointment::where('date',$date)->get(); //here we are getting all the doctors that have made appointments for the specific date that is coming as data
        return $nurses;

    }

    public function store(Request $request){
        $request->validate(['time'=>'required']);
        Booking::create([
            'user_id'=>auth()->user()->id,
            'nurse_id'=>$request->nurseId,
            'time'=>$request->time,
            'date'=>$request->date,
            'status'=>0,
        ]);
        Time::where('appointment_id',$request->appointmentId)->where('time',$request->time)->update(['status'=>1]);

          //send email notification
          $nurseName= User::where('id',$request->nurseId)->first();

          $mailData=[
              'name'=>auth()->user()->name,
              'time'=>$request->time,
              'date'=>$request->date,
              'nurseName'=>$nurseName->name,
          ];
        try{
          Mail::to(auth()->user()->email)->send(new AppointmentMail($mailData));
         }catch(\Exception $e){

        }
        return redirect()->back()->with('message','reservacion realizada correctamente');
    }

    public function myBookings(){
        $appointments = Booking::latest()->where('user_id',auth()->user()->id)->get();
        return view('booking.index',compact('appointments'));
    }

    public function myPrescription(){
        $prescriptions =Prescription::where('user_id',auth()->user()->id)->get();
        return view('my-prescription',compact('prescriptions'));
    }
}
