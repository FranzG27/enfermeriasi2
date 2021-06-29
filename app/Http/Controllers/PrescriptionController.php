<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Prescription;
class PrescriptionController extends Controller
{
    // 
    public function index(){

        date_default_timezone_set('America/Caracas');
        $bookings= Booking::where('date',date('Y-m-d'))->where('status',1)->where('nurse_id',auth()->user()->id)->get();
        return view('prescription.index',compact('bookings'));

    }
    public function store(Request $request){
        $data =$request->all();
       // dd($data);
       $data['medicine']= implode(',',$request->medicine);
       Prescription::create($data);
       return redirect()->back()->with('message','prescripcion creada');
    }

    public function show($userId,$date){
        $prescription = Prescription::where('user_id',$userId)->where('date',$date)->first();
        return view('prescription.show',compact('prescription'));
    }

    //get all the patients from prescription table
     public function patientsFromPrescription(){
         $patients= Prescription::get();
         return view('prescription.all',compact('patients'));
     }
}
