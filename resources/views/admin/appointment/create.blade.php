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
    @if (Session::has('message'))
       <div class="alert alert-success">
           {{Session::get('message')}}
        </div> 
    @endif
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
            </div>
        @endforeach

    <form action="{{route('appointment.store')}}" method="post">
        @csrf

    <div class ="card">
        <div class="card-header">
            escoger fecha
        </div>
        <div class="card-body">

              {{-- <input type="text" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" name="date">    --}}
              <input type="date" class="form control" id="date" name="date">

                {{-- <script type="text/javascript">
                    $("#datepicker").datetimepicker({
                        format: 'yyyy-mm-dd',
                        autoclose: true
                    });
                </script> --}}
            
        </div>
        
    </div>

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
                  <tr>
                      <th scope="row">1</th>
                    <td><input type="checkbox" name="time[]"  value="6am">6:00</td>
                      <td><input type="checkbox" name="time[]"  value="6.20am">6:20</td>
                     <td><input type="checkbox" name="time[]"  value="6.40am">6:40</td>
                  </tr>

                  <tr>
                    <th scope="row">2</th>
                    <td><input type="checkbox" name="time[]"  value="7am">7:00</td>
                      <td><input type="checkbox" name="time[]"  value="7.20am">7:20</td>
                     <td><input type="checkbox" name="time[]"  value="7.40am">7:40</td>
                  </tr>

                  <tr>
                    <th scope="row">3</th>
                    <td><input type="checkbox" name="time[]"  value="8am">8:00</td>
                      <td><input type="checkbox" name="time[]"  value="8.20am">8:20</td>
                     <td><input type="checkbox" name="time[]"  value="8.40am">8:40</td>
                  </tr>
                  
                  <tr>
                    <th scope="row">4</th>
                    <td><input type="checkbox" name="time[]"  value="9am">9:00</td>
                      <td><input type="checkbox" name="time[]"  value="9.20am">9:20</td>
                     <td><input type="checkbox" name="time[]"  value="9.40am">9:40</td>
                  </tr>

                  <tr>
                    <th scope="row">5</th>
                    <td><input type="checkbox" name="time[]"  value="10am">10:00</td>
                      <td><input type="checkbox" name="time[]"  value="10.20am">10:20</td>
                     <td><input type="checkbox" name="time[]"  value="10.40am">10:40</td>
                  </tr>

                  <tr>
                    <th scope="row">6</th>
                    <td><input type="checkbox" name="time[]"  value="11am">11:00</td>
                      <td><input type="checkbox" name="time[]"  value="11.20am">11:20</td>
                     <td><input type="checkbox" name="time[]"  value="11.40am">11:40</td>
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
                    <td><input type="checkbox" name="time[]"  value="12pm">12:00</td>
                      <td><input type="checkbox" name="time[]"  value="12.20pm">12:20</td>
                     <td><input type="checkbox" name="time[]"  value="12.40pm">12:40</td>
                  </tr>

                  <tr>
                    <th scope="row">8</th>
                  <td><input type="checkbox" name="time[]"  value="1pm">1:00</td>
                    <td><input type="checkbox" name="time[]"  value="1.20pm">1:20</td>
                   <td><input type="checkbox" name="time[]"  value="1.40pm">1:40</td>
                </tr>

                <tr>
                    <th scope="row">9</th>
                  <td><input type="checkbox" name="time[]"  value="2pm">2:00</td>
                    <td><input type="checkbox" name="time[]"  value="2.20pm">2:20</td>
                   <td><input type="checkbox" name="time[]"  value="2.40pm">2:40</td>
                </tr>

                <tr>
                    <th scope="row">10</th>
                  <td><input type="checkbox" name="time[]"  value="3pm">3:00</td>
                    <td><input type="checkbox" name="time[]"  value="3.20pm">3:20</td>
                   <td><input type="checkbox" name="time[]"  value="3.40pm">3:40</td>
                </tr>

                <tr>
                    <th scope="row">11</th>
                  <td><input type="checkbox" name="time[]"  value="4pm">4:00</td>
                    <td><input type="checkbox" name="time[]"  value="4.20pm">4:20</td>
                   <td><input type="checkbox" name="time[]"  value="4.40pm">4:40</td>
                </tr>

                <tr>
                    <th scope="row">12</th>
                  <td><input type="checkbox" name="time[]"  value="5pm">5:00</td>
                    <td><input type="checkbox" name="time[]"  value="5.20pm">5:20</td>
                   <td><input type="checkbox" name="time[]"  value="5.40pm">5:40</td>
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
                    <td><input type="checkbox" name="time[]"  value="6pm">6:00</td>
                      <td><input type="checkbox" name="time[]"  value="6.20pm">6:20</td>
                     <td><input type="checkbox" name="time[]"  value="6.40pm">6:40</td>
                  </tr>

                  <tr>
                    <th scope="row">14</th>
                  <td><input type="checkbox" name="time[]"  value="7pm">7:00</td>
                    <td><input type="checkbox" name="time[]"  value="7.20pm">7:20</td>
                   <td><input type="checkbox" name="time[]"  value="7.40pm">7:40</td>
                </tr>

                <tr>
                    <th scope="row">15</th>
                  <td><input type="checkbox" name="time[]"  value="8pm">8:00</td>
                    <td><input type="checkbox" name="time[]"  value="8.20pm">8:20</td>
                   <td><input type="checkbox" name="time[]"  value="8.40pm">8:40</td>
                </tr>

                <tr>
                    <th scope="row">16</th>
                  <td><input type="checkbox" name="time[]"  value="9pm">9:00</td>
                    <td><input type="checkbox" name="time[]"  value="9.20pm">9:20</td>
                   <td><input type="checkbox" name="time[]"  value="9.40pm">9:40</td>
                </tr>

                

                  
                   
                </tbody>
              </table>

        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <button type="submit" class="btn btn-primary">guardar</button>
        </div>
    </div>
    </form>
</div>

<style type="text/css">
input[type="checkbox"]{
    zoom:1.5;
}
body{
    font-size: 20px;
}
</style>

@endsection 