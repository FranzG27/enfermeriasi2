<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
class ProfileController extends Controller
{
    public function index(){
        return view('profile.index');
    }

    public function store(Request $request){
        //dd($request->all());
        $this->validate($request,[
            'name'=>'required',
            'gender'=>'required',
        ]);
        User::where('id',auth()->user()->id)->update($request->except('_token'));
            return redirect()->back()->with('message','perfil actualizado correctamente');
    }

    public function profilePic(Request $request){
        $this->validate($request,['file'=>'required|image|mimes:jpeg,png,jpg']);
        if($request->hasFile('file')){
            $image = $request->file('file');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destination = public_path('/images');
            $image->move($destination,$name);
            $user = User::where('id',auth()->user()->id)->update(['image'=>$name]);
           // $user->save();
            return redirect()->back()->with('message','Imagen actualizada correctamente');
        }
    }
}
