@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Mis Prescripciones</div>

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            
                            <th scope="col">Fecha</th>
                            <th scope="col">Enfermero</th>
                            <th scope="col">Enfermedad</th>
                            <th scope="col">Sintomas</th>
                            <th scope="col">Medicina</th>
                            <th scope="col">Metodo de uso</th>
                            <th scope="col">Detalle</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse($prescriptions as $prescription)
                          <tr>
                            
                            <td>{{$prescription->date}}</td>
                            <td>{{$prescription->nurse->name}}</td>
                            <td>{{$prescription->name_of_disease}}</td>
                            <td>{{$prescription->symptoms}}</td>
                            <td>{{$prescription->medicine}}</td>
                            <td>{{$prescription->procedure_to_use}}</td>
                            <td>{{$prescription->feedback}}</td>
                            
                          </tr>
                          @empty 
                          <td>No tienes Prescripciones</td>
                          @endforelse
                        </tbody>
                      </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
