@extends('layouts.dashboard')
@section('content')
    @if(Session::has('updaclasssuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('updaclasssuccess') }}
        </div>
    @endif
    @if(Session::has('deleclasssuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('deleclasssuccess') }}
        </div>
    @endif
    @if(Session::has('storeclasssuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('storeclasssuccess') }}
        </div>
    @endif
    @if(Session::has('RefreshSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('RefreshSuccess') }}
        </div>
    @endif
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-1">
                    <div class="card-header pb-0 text-center">
                        <h6>Cursos</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-1">
                        <div class="table-responsive p-0">
                            <table id="datatable" class="table align-items-center mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Código</th>
                                        @hasrole('Coordinator')
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Profesor</th>
                                        @endhasrole
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($classrooms as $classroom)
                                        <tr class="align-middle text-center text-sm">
                                            <td class="align-middle text-center text-sm">{{$classroom->name}}</td>
                                            <td class="align-middle text-center text-sm">{{$classroom->code}}</td>
                                            @hasrole('Coordinator')
                                            <td class="align-middle text-center text-sm">
                                                @if (isset($classroom->user->name))
                                                    {{$classroom->user->name}}
                                                @endif
                                            </td>
                                            @endhasrole
                                            <td class="align-middle text-center text-sm">
                                                <div class="justify-content-center btn-group" role="group">
                                                        <!--
                                                        <div style="display: inline-block" >
                                                            <a href="/coordinators/edit/{{$classroom->id}}" style="margin:3px; width:40px;" title="Intercambiar estudiantes" class="btn btn-block btn-primary form-control"><i class="fas fa-exchange-alt"></i></a>
                                                        </div>
                                                        -->
                                                        <div style="display: inline-block" >
                                                            <a href="/students/{{$classroom->id}}" style="margin:4px; width:40px; border-radius: 20px;"  title="Estudiantes" class="btn btn-block btn-primary form-control"><i style="margin-left: -8px;"  class="fas fa-users"></i></a>
                                                        </div>
                                                       @hasrole('Teacher')
                                                        <div style="display: inline-block" >
                                                            <a href="/syllabus?classroom_id={{$classroom->id}}" style="margin:4px; width:40px; border-radius: 20px;" title="Syllabus" class="btn btn-block btn-dark form-control"><i style="margin-left: -6px;"  class="fas fa-atlas"></i></a>
                                                        </div>
                                                        <div style="display: inline-block" >
                                                            <a href="/homeworks/{{$classroom->id}}" style="margin:4px; width:40px; border-radius: 20px;" title="Tareas" class="btn btn-block btn-success form-control"><i style="margin-left: -6px;" class="fas fa-thumbtack"></i></a>
                                                        </div>
                                                       @endhasrole
                                                       @hasrole('Coordinator')
                                                        <div style="display: inline-block" >
                                                            <a href="/classrooms/edit/{{$classroom->id}}" style="margin:4px; width:40px; border-radius: 20px;" title="Editar" class="btn btn-block btn-warning form-control"><i style="margin-left: -6px;" class="far fa-edit"></i></a>
                                                        </div>
                                                        <div style="display: inline-block" >
                                                            <a href="/classrooms/refresh/{{$classroom->id}}" style="margin:4px; width:40px; border-radius: 20px;" title="Resetear" class="btn btn-block btn-success form-control" onclick="return confirm('¿Está seguro que quiere reiniciar este curso? Si lo hace todos los estudiantes pertenecientes a este quedaran sin curso');"><i style="margin-left: -6px;" class="fas fa-sync"></i></a>
                                                        </div>
                                                        <div style="display: inline-block">
                                                            <form method="POST" action="/classrooms/delete">
                                                                @csrf
                                                                <input type="hidden" name="classroom_id" value={{$classroom->id }}>
                                                                <!--<button style="margin:4px; width:40px; border-radius: 20px;" class="btn btn-block btn-danger" title="Borrar" type="submit" onclick="return confirm('¿Está seguro que quiere eliminar este curso?');"><i style="margin-left: -6px;" class="fas fa-trash"></i></button>-->
                                                            </form>
                                                        </div>
                                                       @endhasrole
                                                </div>
                                            </td>
                                        </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
