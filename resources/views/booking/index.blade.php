@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Mis Reservaciones</div>

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Enfermero</th>
                            <th scope="col">hora</th>
                            <th scope="col">Fecha de reservacion</th>
                            <th scope="col">Fecha de creacion</th>
                            <th scope="col">Estado</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse($appointments as $key=>$appointment)
                          <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$appointment->nurse->name}}</td>
                            <td>{{$appointment->time}}</td>
                            <td>{{$appointment->date}}</td>
                            <td>{{$appointment->created_at}}</td>
                            <td>
                                @if($appointment->status==0)
                                <button class="btn btn-primary">No Concretado</button>
                                @else 
                                <button class="btn btn-success">concretado</button>
                                @endif
                            </td>
                        </tr>
                          @empty 
                          <td>No tienes reservaciones</td>
                          @endforelse
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
