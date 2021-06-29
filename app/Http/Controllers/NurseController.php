<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
class NurseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //dd(\Auth::user()->role->name); 
        $users = User::where('role_id','!=',3)->get();
        return view('admin.nurse.index',compact('users'));
        //con el compact estamos mandando la informacion 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.nurse.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validateStore($request);
       $data = $request->all();
       $name = (new User)->userAvatar($request);
       $data['image']=$name;
       $data['password']= bcrypt($request->password);

       User::create($data);
        return redirect()->back()->with('message','enfermero añadido correctamente');

        //dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.nurse.delete',compact('user'));
        //dd($id);
        //cuando el metodo tiene parametro como en este caso, al llamar en la url ponemos el parametro y lugo el metodo ej: nurse/1/show 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
       // dd($user);
        return view('admin.nurse.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validateUpdate($request,$id);
        $data = $request->all();
        $user = User::find($id);
        $imageName = $user->image;
        $userPassword = $user->password;
        if($request->hasFile('image')){
            $imageName = $name = (new User)->userAvatar($request);
            unlink(public_path('images/').$user->image);
        }
        $data['image']=$imageName;
        if($request->password){
            $data['password']=bcrypt($request->password);
        }else{
            $data['password']=$userPassword;
        }
        $user->update($data);
        return redirect()->route('nurse.index')->with('message','Informacion del enfermero actualizada correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       //dd($id);
       if(auth()->user()->id==$id){
           abort(401);
       }
       $user = User::find($id);
       $userDelete = $user->delete();
       if($userDelete){
           unlink(public_path('images/'.$user->image));
       }
       return redirect()->route('nurse.index')->with('message','Enfermero eliminado correctamente correctamente');
    }

    public function validateStore($request){
      return  $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:6|max:25',
            'gender'=>'required',
            'education'=>'required',
            'address'=>'required',
            'department'=>'required',
            'phone_number'=>'required|numeric',
            'image'=>'required|mimes:jpeg,jpg,png',
            'role_id'=>'required',
            'description'=>'required',
        ]);
    }

    public function validateUpdate($request,$id){
        return  $this->validate($request,[
              'name'=>'required',
              'email'=>'required|unique:users,email,'.$id, //this in order to say that the email is not repeated but can be the same it had before 
              //'password'=>'required|min:6|max:25',
              'gender'=>'required',
              'education'=>'required',
              'address'=>'required',
              'department'=>'required',
              'phone_number'=>'required|numeric',
              'image'=>'mimes:jpeg,jpg,png',
              'role_id'=>'required',
              'description'=>'required',
          ]);
      }
}
