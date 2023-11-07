@extends('layouts.dashboard')
@section('content')
    @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    @if ($error == 'name es requerido')
                        <li>EL nombre es requerido</li>
                    @endif
                    @if ($error == 'code es requerido')
                        <li>El código es requerido</li>
                    @endif
                    @if ($error == 'user id es requerido')
                        <li>El profesor es requerido</li>
                    @endif
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-1">
                    <div class="card-header pb-0">
                        <h6 class="text-center">Editar Curso</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-1">
                        <div class="table-responsive p-0">
                            <div class="card-body">
                                <form method="POST" action="/classrooms/update">
                                   @csrf
                                   <div class="row">
                                       <div class="col-md-3">
                                           <div class="form-group">
                                               <label for="name">Nombre</label>
                                               <input class="form-control" type="text" name="name" id="name" value="{{$classroom->name}}">
                                           </div>
                                       </div>
                                       <div class="col-md-3">
                                           <div class="form-group">
                                               <label for="name">Código</label>
                                               <input class="form-control" type="text" name="code" id="code" value="{{$classroom->code}}">
                                           </div>
                                       </div>
                                       <div class="col-md-3">
                                           <div class="form-group">
                                               <label for="user_id">Profesor a cargo</label>
                                               <select class="form-control" name="user_id">
                                                   @foreach ($teachers as $teacher)
                                                       @if ($teacher->teacher->school_id == $coordinator->coordinator->school_id)
                                                           @if ($classroom->user_id == $teacher->id)
                                                               <option value="{{$teacher->id}}" selected>{{$teacher->name}}</option>
                                                           @else
                                                               <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                           @endif
                                                       @endif
                                                   @endforeach
                                               </select>
                                           </div>
                                       </div>
                                       <div style="margin-top: 30px;" class="col-md-3 ps-6">
                                        <input type="hidden" name="classroom_id" value="{{$id}}">
                                        <input style="width:100px; color: white;" class="btn btn-primary rounded-circle" type="submit" value="Modificar">
                                       </div>

                                   </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
