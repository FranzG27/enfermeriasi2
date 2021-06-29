@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
                @endif
                <div class="card-header"> 
                  Reservaciones ({{$bookings->count()}})
                </div>
                

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">User</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Genero</th>

                            <th scope="col">Hora</th>
                            <th scope="col">Enfermero</th>
                            <th scope="col">Estado</th>
                            <th scope="col">prescripcion</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse($bookings as $key=>$booking)
                          <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td><img src="/images/{{$booking->user->image}}" width="80" style="border-radius: 50%;"></td>
                            <td>{{$booking->date}}</td>
                            <td>{{$booking->user->name}}</td>
                            <td>{{$booking->user->email}}</td>
                            <td>{{$booking->user->phone_number}}</td>
                            <td>{{$booking->user->gender}}</td>
                            <td>{{$booking->time}}</td>
                            <td>{{$booking->nurse->name}}</td>
                             
                             <td>
                                 @if($booking->status == 1)
                                 <button class="btn btn-success">atendido</button>
                                 @endif
                            </td>
                            <td>
                                <!-- Button trigger modal -->
                                @if(!App\Models\Prescription::where('date',date('Y-m-d'))->where('nurse_id',auth()->user()->id)->where('user_id',$booking->user->id)->exists())

                                <button type="button" class="btn btn-primary"data-toggle="modal" data-target="#exampleModal{{$booking->user_id}}">
                                 Escribir prescripcion
                                 </button>
                                 @include('prescription.form')

                                 @else 
                                 <a href="{{route('prescription.show',[$booking->user_id,$booking->date])}}" class="btn btn-secondary"> ver prescripcion</a>
                                 @endif
                            </td>
                        </tr>
                          @empty 
                          <td>No Hay reservas para esta fecha </td>
                          @endforelse
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
