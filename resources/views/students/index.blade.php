@extends('layouts.dashboard')
@section('content')
    @if(Session::has('UpdaStudentSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('UpdaStudentSuccess') }}
        </div>
    @endif
    @if(Session::has('DeleteStudentSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('DeleteStudentSuccess') }}
        </div>
    @endif
    @if(Session::has('StoreStudentSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('StoreStudentSuccess') }}
        </div>
    @endif
    @if(Session::has('transfersSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('transfersSuccess') }}
        </div>
    @endif
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-1">
                    <div class="card-header pb-0 text-center">
                        <h6>Estudiantes</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-1">
                        <div class="table-responsive p-0">
                            <table id="datatable" class="table align-items-center mb-0">
                                <thead class="thead-light">
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                                    @hasrole('Coordinator')
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Curso</th>
                                    @endhasrole
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Teléfono</th>
                                    @hasrole('Coordinator')
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bloq/Desblo</th>
                                    @endhasrole
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($students as $student)
                                    <tr class="align-middle text-center text-sm">
                                        <td class="align-middle text-center text-sm">{{$student->name}}</td>
                                        <!--
                                        <td>{{$student->student->school->name}}</td>
                                        -->
                                        @hasrole('Coordinator')
                                        @if (isset($student->student->classroom))
                                            <td class="align-middle text-center text-sm">{{$student->student->classroom->name}}</td>
                                        @else
                                            <td class="align-middle text-center text-sm"></td>
                                        @endif
                                        @endhasrole
                                        <td class="align-middle text-center text-sm">{{$student->email}}</td>
                                        <td class="align-middle text-center text-sm">{{$student->phone}}</td>
                                        @hasrole('Coordinator')
                                        <td class="align-middle text-center text-sm">
                                            @if($student->is_enable == 1)
                                                Habilitado
                                            @else
                                                Deshabilitado
                                            @endif
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <div style="display:block !important; margin-bottom: 3px;" class="row checkbox">
                                                @if($student->is_enable == 1)
                                                    <p style="margin-bottom: -3px;" class="align-middle text-center text-xxs font-weight-bolder opacity-7">ON</p>
                                                    <input style="border: gray solid 1px; border-radius: 15px; width: 25px; height: 25px;" data-toggle="toggle"
                                                           id="togglestatus{{$student->id}}" class="form-check-input" type="checkbox" checked onchange="getStatus({{$student->id}})">
                                                    @else
                                                        <p style="margin-bottom: -3px;" class="align-middle text-center text-xxs font-weight-bolder opacity-7">OFF</p>
                                                        <input style="border: gray solid 1px; border-radius: 15px; width: 25px; height: 25px;" data-toggle="toggle"
                                                               id="togglestatus{{$student->id}}"  class="form-check-input" type="checkbox" onchange="getStatus({{$student->id}})">
                                                @endif
                                            </div>
                                        </td>
                                        @endhasrole
                                        <td class="align-middle text-center text-sm">
                                            <div class="row">
                                            @hasrole('Coordinator')
                                                <div style="display: inline-block" class="justify-content-center btn-group" role="group">
                                                    <div style="display: inline-block" >
                                                        <a href="/academicHistories/{{$student->id}}" style="margin:4px; width:40px; border-radius: 20px;" title="Historial académico" class="btn btn-block btn-success form-control"><i style="margin-left: -6px;" class='fas fa-history'></i></a>
                                                    </div>
                                                    <div style="display: inline-block" >
                                                        <a href="/students/edit/{{$student->id}}" style="margin:4px; width:40px; border-radius: 20px;" title="Editar" class="btn btn-block btn-warning form-control"><i style="margin-left: -6px;" class="far fa-edit"></i></a>
                                                    </div>
                                                    <div style="display: inline-block">
                                                        <form method="POST" action="/students/delete">
                                                            @csrf
                                                            <input type="hidden" name="user_id" value={{ $student->id }}>
                                                            <!--<button style="margin:4px; width:40px; border-radius: 20px;" class="btn btn-block btn-danger" title="Borrar" type="submit" onclick="return confirm('¿Está seguro que quiere eliminar este estudiante?');"><i style="margin-left: -6px;" class="fas fa-trash"></i></button>-->
                                                        </form>
                                                    </div>
                                                </div>
                                            @endhasrole
                                            @hasrole('Teacher')
                                                <div style="display: inline-block" class="row justify-content-center" class="btn-group" role="group">
                                                    <a href="/uploadedHomeworks/{{$student->id}}" style="margin:4px; width:40px; border-radius: 20px;" title="Tareas" class="btn btn-block btn-success form-control"><i style="margin-left: -6px;" class="fas fa-tasks"></i></a>
                                                </div>
                                            @endhasrole
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
                var student_id = document.getElementById("id");

                if (toggle.checked == true) {
                    status.value = 1;
                } else {
                    status.value = 0;
                }
                student_id.value = id;
                form.submit();
            }
        </script>
    </div>
@endsection
