@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('message'))
        <div class="aler alert-success">{{Session::get('message')}}</div>
        @endif
    <div class="row">
        
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">PERFIL USUARIO</div>

                <div class="card-body">
                    <p><b>Nombre:</b> {{auth()->user()->name}}</p>
                    <p><b>Email:</b> {{auth()->user()->email}}</p>
                    <p><b>Direccion:</b> {{auth()->user()->address}}</p>
                    <p><b>Telefono:</b> {{auth()->user()->phone_number}}</p>
                    <p><b>Genero:</b> {{auth()->user()->gender}}</p>
                    <p><b>Descripcion:</b> {{auth()->user()->description}}</p>
                </div>
            </div>
        </div>

        <div class="col-md-6" >
            <div class="card">
                <div class="card-header">Actualizar perfil</div>

                <div class="card-body">
                    
                    <form action="{{route('profile.store')}}" method="post">@csrf 
                        <div class="form-group">
                            <label> Nombre</label>
                            <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror"  value="{{auth()->user()->name}}">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror

                        </div>

                        <div class="form-group">
                            <label> Direccion</label>
                            <input type="text" name="address" class="form-control" value="{{auth()->user()->address}}">
                        </div>

                        <div class="form-group">
                            <label> Telefono</label>
                            <input type="text" name="phone_number" class="form-control" value="{{auth()->user()->phone_number}}">
                        </div>

                        <div class="form-group">
                            <label>Genero </label>
                            <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                <option value="">seleccionar</option>
                                <option value="Hombre">Hombre</option>
                                <option value="Mujer">Mujer</option>
                                <option value="NoBinario">NoBinario</option>
                            </select>

                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror

                        </div>

                        <div class="form-group">
                            <label> Descripcion</label>
                            
                            <div class="form-group">
                                <textarea name="description" class="form-control">
                                    {{auth()->user()->description}}
                                </textarea>

                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Actualizar Imagen</div>

                <form action="{{route('profile.pic')}}" method="post" enctype="multipart/form-data">@csrf

                <div class="card-body">
                    @if(!auth()->user()->image)
                    <img src="/images/user-1699635_640.png" width="220">
                    @else 
                    <img src="/images/{{auth()->user()->image}}" width="220">
                    @endif
                    <br>
                    
                    <input type="file" name="file" class="form-control" required="">
                    <br>
                    @error('file')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror

                    <button type="submit" class="btn btn-success">actualizar</button>
                </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
