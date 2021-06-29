<!-- Modal -->


<div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content"> 
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Informacion Enfermero</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <p>
             <img src="{{asset('images')}}/{{$user->image}}" width="200">
             <p class="badge badge-pill badge badge-dark"><b>Role:</b>  {{$user->role->name}}</p>
             <p> <b>Nombre:</b> {{$user->name}}</p>
             <p> <b>Direccion:</b> {{$user->address}}</p>
             <p> <b>Telefono/Celular:</b> {{$user->phone_number}}</p>
             <p> <b>Area:</b> {{$user->department}}</p>
             <p> <b>Educacion:</b> {{$user->education}}</p>
             <p> <b>Descripcion:</b> {{$user->description}}</p>
         </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>

