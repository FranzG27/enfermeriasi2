@extends('admin.layouts.master')

@section('content')
     
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-edit bg-blue"></i>
                <div class="d-inline">
                    <h5> enfermero</h5>
                    <span>horario citas</span>
                </div>
            </div>
        </div>
<div class="col-lg-4">
    <nav class="breadcrumb-container" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="../index.html"><i class="ik ik-home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="#">Enfermero</a></li>
            <li class="breadcrumb-item active" aria-current="page">Citas</li>
        </ol>
    </nav>
</div>
</div>
</div>

<div class="container">
    @if (Session::has('errmessage'))
       <div class="alert  bg-danger alert-success">
           {{Session::get('errmessage')}}
        </div> 
    @endif
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
            </div>
        @endforeach

    <form action="{{route('appointment.check')}}" method="post">
        @csrf

    <div class ="card">
        <div class="card-header">
            escoger fecha
            <br>
            
            @if(isset($date))
                your timetable for: 
                {{$date}}
            @endif
        </div>
        <div class="card-body">

              <input type="date" class="form control" id="date" name="date">
                <br>
                <button type="submit" class="btn btn-primary">check</button>
                
            
        </div>
        
    </div>
    </form>

    @if(Route::is('appointment.check'))
    <form action="{{route('update')}}" method="post">@csrf
    <div class ="card">
        <div class="card-header">
            escoger horas por la mañana
            <span style="margin-left: 700px ">seleccionar todos 
                <input type="checkbox" onclick=" for(c in document.getElementsByName('time[]')) document.getElementsByName('time[]').item(c).checked=this.checked ">
            </span>
        </div>

        
        <div class="card-body">
            
            <table class="table table-striped">
              
                
                <tbody>
                    <input type="hidden" name="apppointmentId" value="{{$appointmentId}}">
                  <tr>
                      <th scope="row">1</th>
                    <td><input type="checkbox" name="time[]"  value="6am" @if(isset($times)){{$times->contains('time','6am')?'checked':''}}@endif>6:00</td>
                      <td><input type="checkbox" name="time[]"  value="6.20am" @if(isset($times)){{$times->contains('time','6.20am')?'checked':''}}@endif>6:20</td>
                     <td><input type="checkbox" name="time[]"  value="6.40am" @if(isset($times)){{$times->contains('time','6.40am')?'checked':''}}@endif>6:40</td>
                  </tr>

                  <tr>
                    <th scope="row">2</th>
                    <td><input type="checkbox" name="time[]"  value="7am" @if(isset($times)){{$times->contains('time','7am')?'checked':''}}@endif>7:00</td>
                      <td><input type="checkbox" name="time[]"  value="7.20am" @if(isset($times)){{$times->contains('time','7.20am')?'checked':''}}@endif>7:20</td>
                     <td><input type="checkbox" name="time[]"  value="7.40am" @if(isset($times)){{$times->contains('time','7.40am')?'checked':''}}@endif>7:40</td>
                  </tr>

                  <tr>
                    <th scope="row">3</th>
                    <td><input type="checkbox" name="time[]"  value="8am" @if(isset($times)){{$times->contains('time','8am')?'checked':''}}@endif>8:00</td>
                      <td><input type="checkbox" name="time[]"  value="8.20am" @if(isset($times)){{$times->contains('time','8.20am')?'checked':''}}@endif>8:20</td>
                     <td><input type="checkbox" name="time[]"  value="8.40am" @if(isset($times)){{$times->contains('time','8.40am')?'checked':''}}@endif>8:40</td>
                  </tr>
                  
                  <tr>
                    <th scope="row">4</th>
                    <td><input type="checkbox" name="time[]"  value="9am" @if(isset($times)){{$times->contains('time','9am')?'checked':''}}@endif>9:00</td>
                      <td><input type="checkbox" name="time[]"  value="9.20am" @if(isset($times)){{$times->contains('time','9.20am')?'checked':''}}@endif>9:20</td>
                     <td><input type="checkbox" name="time[]"  value="9.40am" @if(isset($times)){{$times->contains('time','9.40am')?'checked':''}}@endif>9:40</td>
                  </tr>

                  <tr>
                    <th scope="row">5</th>
                    <td><input type="checkbox" name="time[]"  value="10am" @if(isset($times)){{$times->contains('time','10am')?'checked':''}}@endif>10:00</td>
                      <td><input type="checkbox" name="time[]"  value="10.20am" @if(isset($times)){{$times->contains('time','10.20am')?'checked':''}}@endif>10:20</td>
                     <td><input type="checkbox" name="time[]"  value="10.40am" @if(isset($times)){{$times->contains('time','10.40am')?'checked':''}}@endif>10:40</td>
                  </tr>

                  <tr>
                    <th scope="row">6</th>
                    <td><input type="checkbox" name="time[]"  value="11am" @if(isset($times)){{$times->contains('time','11am')?'checked':''}}@endif>11:00</td>
                      <td><input type="checkbox" name="time[]"  value="11.20am" @if(isset($times)){{$times->contains('time','11.20am')?'checked':''}}@endif>11:20</td>
                     <td><input type="checkbox" name="time[]"  value="11.40am" @if(isset($times)){{$times->contains('time','11.40am')?'checked':''}}@endif>11:40</td>
                  </tr>
                   
                </tbody>
              </table>

        </div>
    </div>

    <div class ="card">
        <div class="card-header">
            escoger horas por la Tarde
        </div>
        <div class="card-body">
            
            <table class="table table-striped">
              

                <tbody>
                  <tr>
                      <th scope="row">7</th>
                    <td><input type="checkbox" name="time[]"  value="12pm" @if(isset($times)){{$times->contains('time','12pm')?'checked':''}}@endif>12:00</td>
                      <td><input type="checkbox" name="time[]"  value="12.20pm" @if(isset($times)){{$times->contains('time','12.20pm')?'checked':''}}@endif>12:20</td>
                     <td><input type="checkbox" name="time[]"  value="12.40pm" @if(isset($times)){{$times->contains('time','12.40pm')?'checked':''}}@endif>12:40</td>
                  </tr>

                  <tr>
                    <th scope="row">8</th>
                  <td><input type="checkbox" name="time[]"  value="1pm" @if(isset($times)){{$times->contains('time','1pm')?'checked':''}}@endif>1:00</td>
                    <td><input type="checkbox" name="time[]"  value="1.20pm" @if(isset($times)){{$times->contains('time','1.20pm')?'checked':''}}@endif>1:20</td>
                   <td><input type="checkbox" name="time[]"  value="1.40pm" @if(isset($times)){{$times->contains('time','1.40pm')?'checked':''}}@endif>1:40</td>
                </tr>

                <tr>
                    <th scope="row">9</th>
                  <td><input type="checkbox" name="time[]"  value="2pm" @if(isset($times)){{$times->contains('time','2pm')?'checked':''}}@endif>2:00</td>
                    <td><input type="checkbox" name="time[]"  value="2.20pm" @if(isset($times)){{$times->contains('time','2.20pm')?'checked':''}}@endif>2:20</td>
                   <td><input type="checkbox" name="time[]"  value="2.40pm" @if(isset($times)){{$times->contains('time','2.40pm')?'checked':''}}@endif>2:40</td>
                </tr>

                <tr>
                    <th scope="row">10</th>
                  <td><input type="checkbox" name="time[]"  value="3pm" @if(isset($times)){{$times->contains('time','3pm')?'checked':''}}@endif>3:00</td>
                    <td><input type="checkbox" name="time[]"  value="3.20pm" @if(isset($times)){{$times->contains('time','3.20pm')?'checked':''}}@endif>3:20</td>
                   <td><input type="checkbox" name="time[]"  value="3.40pm" @if(isset($times)){{$times->contains('time','3.40pm')?'checked':''}}@endif>3:40</td>
                </tr>

                <tr>
                    <th scope="row">11</th>
                  <td><input type="checkbox" name="time[]"  value="4pm" @if(isset($times)){{$times->contains('time','4pm')?'checked':''}}@endif>4:00</td>
                    <td><input type="checkbox" name="time[]"  value="4.20pm" @if(isset($times)){{$times->contains('time','4.20pm')?'checked':''}}@endif>4:20</td>
                   <td><input type="checkbox" name="time[]"  value="4.40pm" @if(isset($times)){{$times->contains('time','4.40pm')?'checked':''}}@endif>4:40</td>
                </tr>

                <tr>
                    <th scope="row">12</th>
                  <td><input type="checkbox" name="time[]"  value="5pm" @if(isset($times)){{$times->contains('time','5pm')?'checked':''}}@endif>5:00</td>
                    <td><input type="checkbox" name="time[]"  value="5.20pm" @if(isset($times)){{$times->contains('time','5.20pm')?'checked':''}}@endif>5:20</td>
                   <td><input type="checkbox" name="time[]"  value="5.40pm" @if(isset($times)){{$times->contains('time','5.40pm')?'checked':''}}@endif>5:40</td>
                </tr>

                  
                   
                </tbody>
              </table>

        </div>
    </div>

    <div class ="card">
        <div class="card-header">
            escoger horas por la Noche
        </div>
        <div class="card-body">
            
            <table class="table table-striped">
              

                <tbody>
                  <tr>
                      <th scope="row">13</th>
                    <td><input type="checkbox" name="time[]"  value="6pm" @if(isset($times)){{$times->contains('time','6pm')?'checked':''}}@endif>6:00</td>
                      <td><input type="checkbox" name="time[]"  value="6.20pm" @if(isset($times)){{$times->contains('time','6.20pm')?'checked':''}}@endif>6:20</td>
                     <td><input type="checkbox" name="time[]"  value="6.40pm" @if(isset($times)){{$times->contains('time','6.40pm')?'checked':''}}@endif>6:40</td>
                  </tr>

                  <tr>
                    <th scope="row">14</th>
                  <td><input type="checkbox" name="time[]"  value="7pm" @if(isset($times)){{$times->contains('time','7pm')?'checked':''}}@endif>7:00</td>
                    <td><input type="checkbox" name="time[]"  value="7.20pm" @if(isset($times)){{$times->contains('time','7.20pm')?'checked':''}}@endif>7:20</td>
                   <td><input type="checkbox" name="time[]"  value="7.40pm" @if(isset($times)){{$times->contains('time','7.40pm')?'checked':''}}@endif>7:40</td>
                </tr>

                <tr>
                    <th scope="row">15</th>
                  <td><input type="checkbox" name="time[]"  value="8pm" @if(isset($times)){{$times->contains('time','8pm')?'checked':''}}@endif>8:00</td>
                    <td><input type="checkbox" name="time[]"  value="8.20pm" @if(isset($times)){{$times->contains('time','8.20pm')?'checked':''}}@endif>8:20</td>
                   <td><input type="checkbox" name="time[]"  value="8.40pm" @if(isset($times)){{$times->contains('time','8.40pm')?'checked':''}}@endif>8:40</td>
                </tr>

                <tr>
                    <th scope="row">16</th>
                  <td><input type="checkbox" name="time[]"  value="9pm" @if(isset($times)){{$times->contains('time','9pm')?'checked':''}}@endif>9:00</td>
                    <td><input type="checkbox" name="time[]"  value="9.20pm" @if(isset($times)){{$times->contains('time','9.20pm')?'checked':''}}@endif>9:20</td>
                   <td><input type="checkbox" name="time[]"  value="9.40pm" @if(isset($times)){{$times->contains('time','9.40pm')?'checked':''}}@endif>9:40</td>
                </tr>

                

                  
                   
                </tbody>
              </table>

        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <button type="submit" class="btn btn-primary">guardar cambios</button>
        </div>
    </div>
    
</div>
</form>
{{-- el if empieza y muetra la tabla de reservaciones que marco el enfermero pero si el enfermero no apreta el check here we are gonna show all the times the nurse said he would work  --}}
@else 
<h3> lista de Horas de reservaciones {{$myappointments->count()}}</h3>

            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Enfermero</th>
                    <th scope="col">fecha</th>
                    <th scope="col">ver/actualizar</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($myappointments as $appointment)
                    <tr>
                        <th scope="row"></th>
                        <td>{{$appointment->nurse->name}}</td>
                        <td>{{$appointment->date}}</td>
                        <td>
                            <form action="{{route('appointment.check')}}" method="post">
                                @csrf
                                <input type="hidden" name="date" value="{{$appointment->date}}">
                                <button type="submit" class="btn btn-primary">Ver/Editar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>

@endif 

{{-- this if is to modify what we can see when we are checking the appointments
we cannot see the hours or times while we are just in apointment, but if we press check, then we can see all the appointments that are full or empty --}}

<style type="text/css">
input[type="checkbox"]{
    zoom:1.5;
}
body{
    font-size: 20px;
}
</style>

@endsection 