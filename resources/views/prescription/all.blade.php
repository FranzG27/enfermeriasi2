@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              
                <div class="card-header"> 
                  Reservaciones ({{$patients->count()}})
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
                            @forelse($patients as $key=>$patient)
                          <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td><img src="/images/{{$patient->user->image}}" width="80" style="border-radius: 50%;"></td>

                            <td>{{$patient->date}}</td>
                            <td>{{$patient->user->name}}</td>
                            <td>{{$patient->user->email}}</td>
                            <td>{{$patient->user->phone_number}}</td>
                            <td>{{$patient->user->gender}}</td>
                            <td>{{$patient->time}}</td>
                            <td>{{$patient->nurse->name}}</td>
                             
                             <td>
                                 @if($patient->status == 1)
                                 <button class="btn btn-success">atendido</button>
                                 @endif
                            </td>
                            <td>
                                <!-- Button trigger modal -->
                                
                                 <a href="{{route('prescription.show',[$patient->user_id,$patient->date])}}" class="btn btn-secondary"> ver prescripcion</a>
                                
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
