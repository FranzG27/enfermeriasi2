@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"> 
                  Reservaciones ({{$bookings->count()}})
                </div>
                <form action="{{route('patient')}}" method="GET">
                <div class="card-header">
                 
                  Filtrar:
                  <div class="row">
                  <div class="col-md-10">
                    <input type="date" class="form control" id="date" name="date">
                  </div>
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                  </div>
                </div>
                
                </div>
              </form>

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
                                @if($booking->status == 0)
                             <a href="{{route('update.status',[$booking->id])}}"><button class="btn btn-primary">Pendiente</button></a> 
                             @else 
                             <a href="{{route('update.status',[$booking->id])}}"><button class="btn btn-success">Completada</button></a> 
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
