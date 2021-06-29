@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-header"> 
                  
                </div>
                

                <div class="card-body">
                    <p><b>Fecha:</b>{{$prescription->date}}</p>
                    <p><b>Patient:</b>{{$prescription->user->name}}</p>
                    <p><b>Enfermero:</b>{{$prescription->nurse->name}}</p>
                    <p><b>Sintomas:</b>{{$prescription->symptoms}}</p>
                    <p><b>Enfermedad:</b>{{$prescription->name_of_disease}}</p>
                    <p><b>Medicina:</b>{{$prescription->medicine}}</p>
                    <p><b>Metodo de uso:</b>{{$prescription->procedure_to_use}}</p>
                    <p><b>Detalles:</b>{{$prescription->feedback}}</p>
                    <p><b>firma Enfermero:</b>{{$prescription->signature}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
