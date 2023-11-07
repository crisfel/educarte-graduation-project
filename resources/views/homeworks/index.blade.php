@extends('layouts.dashboard')
@section('content')
    @if(Session::has('StoreHomeworkSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('StoreHomeworkSuccess') }}
        </div>
    @endif
    @if(Session::has('UpdaHomeworkSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('UpdaHomeworkSuccess') }}
        </div>
    @endif
    @if(Session::has('DeleHomeworkSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('DeleHomeworkSuccess') }}
        </div>
    @endif
    @if(Session::has('PercentHomeworkError'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('PercentHomeworkError') }}
        </div>
    @endif
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-1">
                    <div class="card-header pb-0 text-center">
                        <h6>Tareas para {{$classroom->name}}</h6> <a style="margin-bottom:5px; width:120px; border-radius: 25px;" class="btn btn-primary" href="/homeworks/create/{{$id}}">Crear tarea</a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-1">
                        <div class="table-responsive p-0">
                            <table id="datatable" class="table align-items-center mb-0">
                                <thead class="thead-light">
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Título</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Porcentaje</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hora</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($homeworks as $homework)
                                    <tr class="align-middle text-center text-sm">
                                        <td class="align-middle text-center text-sm">{{$homework->title}}</td>
                                        <td class="align-middle text-center text-sm">{{$homework->percent}}%</td>
                                        <td class="align-middle text-center text-sm">
                                            @if (! is_null($homework->due_date))
                                                {{$homework->due_date}}
                                            @endif
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if (! is_null($homework->due_time))
                                                {{$homework->due_time}}
                                            @endif
                                        </td>
                                        <td>
                                            <div class="justify-content-center" class="btn-group" role="group">
                                                <div style="display: inline-block">
                                                    <a href="/homeworks/edit/{{$homework->id}}/{{$classroom->id}}" style="margin:4px; width:40px; border-radius: 20px;" title="Editar" alt="Editar" class="btn btn-warning form-control"><i style="margin-left: -6px;" class="far fa-edit"></i></a>
                                                </div>
                                                <div style="display: inline-block">
                                                    <form method="POST" action="/homeworks/delete">
                                                        @csrf
                                                        <input type="hidden" name="homework_id" value={{ $homework->id }}>
                                                        <!--<button style="margin:4px; width:40px; border-radius: 20px;" class="btn btn-block btn-danger form-control" title="Borrar" type="submit" onclick="return confirm('¿Está seguro que quiere eliminar esta tarea?');"><i style="margin-left: -5px;" class="fas fa-trash"></i></button>-->
                                                    </form>
                                                </div>
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
