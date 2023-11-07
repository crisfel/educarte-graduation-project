@extends('layouts.dashboard')
@section('content')
    @if(Session::has('updateachsuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('updateachsuccess') }}
        </div>
    @endif
    @if(Session::has('deleteteachersuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('deleteteachersuccess') }}
        </div>
    @endif
    @if(Session::has('storeteachersuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('storeteachersuccess') }}
        </div>
    @endif
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-1">
                    <div class="card-header pb-0 text-center">
                        <h6>Profesores</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-1">
                        <div class="table-responsive p-0">
                            <table id="datatable" class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Teléfono</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bloq/Desbl</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($teachers as $teacher)
                                    <tr class="align-middle text-center text-sm">
                                        <td class="align-middle text-center text-sm">{{$teacher->name}}</td>
                                        <td class="align-middle text-center text-sm">{{$teacher->email}}</td>
                                        <td class="align-middle text-center text-sm">{{$teacher->phone}}</td>
                                        <td class="align-middle text-center text-sm">
                                            @if($teacher->is_enable == 1)
                                                Habilitado
                                            @else
                                                Deshabilitado
                                            @endif
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <div>
                                                @if($teacher->is_enable == 1)
                                                    <p style="margin-bottom: -3px;" class="align-middle text-center text-xxs font-weight-bolder opacity-7">ON</p>
                                                    <input style="border: gray solid 1px; border-radius: 15px; width: 25px; height: 25px;" data-toggle="toggle"
                                                           id="togglestatus{{$teacher->id}}" class="form-check-input" type="checkbox" checked onchange="getStatus({{$teacher->id}})">
                                                @else
                                                    <p style="margin-bottom: -3px;" class="align-middle text-center text-xxs font-weight-bolder opacity-7">OFF</p>
                                                    <input style="border: gray solid 1px; border-radius: 15px; width: 25px; height: 25px;" data-toggle="toggle"
                                                           id="togglestatus{{$teacher->id}}"  class="form-check-input" type="checkbox" onchange="getStatus({{$teacher->id}})">
                                                @endif
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <div style="display: inline-block" class="justify-content-center btn-group" role="group">
                                                <a href="/teachers/edit/{{$teacher->id}}" style="margin:4px; width:40px; border-radius: 20px;" title="Editar" alt="Editar" class="btn btn-block btn-warning form-control"><i style="margin-left: -6px;" class="far fa-edit"></i></a>
                                                <form method="POST" action="/teachers/delete">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value={{ $teacher->id }}>
                                                    <!--<button style="margin:4px; width:40px; border-radius: 20px;" class="btn btn-block btn-danger form-control" title="Borrar" type="submit" onclick="return confirm('¿Está seguro que quiere eliminar este profesor?');"><i style="margin-left: -6px;" class="fas fa-trash"></i></button>-->
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <form id="form-status" name="form-status" method="POST" action="/changeStatusTeacher">
                                @csrf
                                <input type="hidden" name="id" id="id">
                                <input type="hidden" name="status" id="status">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <script>
            function getStatus(id)
            {
                var toggle = document.getElementById("togglestatus"+id);
                var status = document.getElementById("status");
                var form = document.getElementById("form-status");
                var teacher_id = document.getElementById("id");

                if (toggle.checked == true) {
                    status.value = 1;
                } else {
                    status.value = 0;
                }
                teacher_id.value = id;
                form.submit();
            }
        </script>
    </div>
@endsection
