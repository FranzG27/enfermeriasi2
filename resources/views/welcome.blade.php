@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="/banner/vector-set-of-doctor-cartoon-characters-medical-staff-team-concept.jpg" class="img-fluid" style="border: 1px solid rgb(149, 217, 243)">
        </div>
        <div class="col-md-6">
            <h2>crear cuenta o reservar una cita</h2>
            <p></p>

            <div class="mt-5">
                <a href="{{url('/register')}}"><button class="btn btn-success">registrarse</button></a>
                <a href="{{url('/login')}}"><button class="btn btn-secondary">Login</button></a>
            </div>
        </div>
    </div>
    <hr>
    {{-- encontrar enfermeros y calendariito --}}
    <form action="{{url('/')}}" method="GET">
    <div class="card">
        <div class="card-body">
            <div class="card-header"></div>
            <div class="card-body">
               <div class="row">
                   <div class="col-md-8">
                    <input type="text" name="date" class="form-control" id="datepicker">
                   </div>
                   <div class="col-md-4">
                       <button class="btn btn-primary" type="submit">Encontrar Enfermeros</button>
                   </div>
               </div>
            </div>

           
        </div>
    </div>
    </form>

    {{-- mostrar enfermeros  --}}
    <div class="card">
        <div class="card-body">
            <div class="card-header">Enfermeros</div>
            <div class="card-body">
              <table class="table table-striped">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>photo</th>
                          <th>Nombre</th>
                          <th>Especialidad</th>
                          <th>reservar</th>
                      </tr>
                  </thead>
                  <tbody>
                      @forelse($nurses as $nurse)
                      <tr>
                          <th scope="row">1</th>
                          <td>
                              <img src="{{asset('images')}}/{{$nurse->nurse->image}}" width="50px" style="border-radius: 50%;">
                          </td>
                          <td>
                            {{$nurse->nurse->name}}
                          </td>
                          <td>
                            {{$nurse->nurse->department}}
                          </td>
                          <td>
                              <a href="{{route('create.appointment',[$nurse->user_id,$nurse->date])}}"><button class="btn btn-success"> Reservar cita</button></a>
                          </td>
                      </tr>
                      @empty 
                      <td> No hay enfermeros Disponibles</td>
                      @endforelse
                  </tbody>
              </table>
            </div>
        </div>
    </div>

    {{-- mision vision etc --}}
    <div class="card">
        <div class="card-body">
            <div class="card-header"></div>
            <div class="card-body">
                <div class="card-header"> </div>
                <div class="card-body">
    
                    <div class="row">
                        <div class="col-md-6">
                            <p align="center"><b>MISION</b> <br> </p>
                            <p align="center">Ser una empresa líder en la prestación de servicios de salud, reconocida en el mercado y la comunidad por su desempeño integral, eficaz, eficiente y su trato humanitario, adaptándose a los cambios tecnológicos y sociales.</p>
                            
                        </div>
                        <div class="col-md-6">
                            <p align="center"><b>VISION</b> <br> </p>
                            <p align="center">
                                Brindar atención y cuidados de enfermería especializada de manera personalizada, oportuna y eficiente, a personas enfermas o con algún grado de dependencia física y/o psicológica, a través de un personal idóneo y capacitado técnicamente, que con  buen trato y respeto, proporcionan seguridad y protección a éstas; con el fin de favorecer su calidad de vida y potenciar sus habilidades, asegurando así la satisfacción de nuestros usuarios y sus familias.
                            </p>
                            
                        </div>
                    </div>
    
                   
                </div>
                
                {{-- <div class="card-header">
                    <p align="center"><b>¿QUIENES SOMOS?</b></p> 
                </div> --}}
                <div class="card-body">
                    <p align="center"><b>¿QUIENES SOMOS?</b> <br> </p>

                    <p align="center">Somos una empresa que presta servicios integrales de enfermería y asistencia de enfermos a personas  con algún grado de dependencia física  que requieran de cuidados básicos y/o de mayor complejidad en domicilios, clínicas, hospitales, establecimientos de larga estadía, hogares de adultos mayores, entre otros.
    
                        Prestamos servicios a usuarios adultos en general
                        
                        Nuestra labor se encuentra validada por un grupo de profesionales de la salud, como Médicos, Enfermeras, Nutricionistas, Kinesiólogos; que en un trabajo en equipo con Paramédicos y Asistentes de enfermos, entregamos un servicio de calidad y confiable, comprometiéndonos con los usuarios y sus familias.
                     </p>
                    
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
