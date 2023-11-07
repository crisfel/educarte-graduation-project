@extends('layouts.dashboard')
@section('content')
    @if(Session::has('StoreAdministratorsSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('StoreAdministratorsSuccess') }}
        </div>
    @endif
@if(Session::has('UpdateAdministratorsSuccess'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('UpdateAdministratorsSuccess') }}
    </div>
@endif
    @if(Session::has('DeleteStudentSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('DeleteStudentSuccess') }}
        </div>
    @endif
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-1">
                <div class="card-header pb-0 text-center">
                    <h6>Administradores</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-1">
                    <div class="table-responsive p-0">
                        <table id="datatable" class="table align-items-center mb-0">
                            <!-- <table id="datatable" class="table table-striped table-hover dt-responsive display nowrap" width="100%" cellspacing="0">-->
                            <thead class="">
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Teléfono</th>
                                <!--<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>-->
                                <!--<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bloq/Desbl</th>-->
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($administrators as $administrator)
                                <tr class="align-middle text-center text-sm">
                                    <td class="align-middle text-center text-sm">{{$administrator->name}}</td>
                                    <td class="align-middle text-center text-sm">{{$administrator->email}}</td>
                                    <td class="align-middle text-center text-sm">{{$administrator->phone}}</td>
                                    <!--
                                    <td class="align-middle text-center text-sm">
                                        @if($administrator->is_enable == 1)
                                            Habilitado
                                        @else
                                            Deshabilitado
                                        @endif
                                    </td>
                                    -->
                                    <!--
                                    <td class="align-middle text-center text-sm">
                                        <div style="display:block !important; margin-bottom: 3px;" class="row checkbox">
                                            @if($administrator->is_enable == 1)
                                                <p style="margin-bottom: -3px;" class="align-middle text-center text-xxs font-weight-bolder opacity-7">ON</p>
                                                <input style="border: gray solid 1px; border-radius: 15px; width: 25px; height: 25px;" data-toggle="toggle"
                                                       id="togglestatus{{$administrator->id}}" class="form-check-input" type="checkbox" checked onchange="getStatus({{$administrator->id}})">
                                            @else
                                                <p style="margin-bottom: -3px;" class="align-middle text-center text-xxs font-weight-bolder opacity-7">OFF</p>
                                                <input style="border: gray solid 1px; border-radius: 15px; width: 25px; height: 25px;" data-toggle="toggle"
                                                       id="togglestatus{{$administrator->id}}"  class="form-check-input" type="checkbox" onchange="getStatus({{$administrator->id}})">
                                            @endif
                                        </div>
                                    </td>
                                    -->
                                    <td class="align-middle text-center ps-0">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <a href="/administrators/edit/{{$administrator->id}}" style="margin:4px; width:40px; border-radius: 20px;" alt="Editar" title="Editar" class="btn btn-block btn-warning form-control"><i style="margin-left: -6px;" class="far fa-edit"></i></a>
                                            </div>
                                            <div class="col-sm-4">
                                                <form method="POST" action="/administrators/delete">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value={{ $administrator->id }}>
                                                    <!--<button style="margin:4px; width:40px; border-radius: 20px;" class="btn btn-block btn-danger" title="Borrar" type="submit" onclick="return confirm('¿Está seguro que quiere eliminar este administrador?');"><i style="margin-left: -6px;" class="fas fa-trash"></i></button>-->
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <form id="form-status" name="form-status" method="POST" action="/changeStatusCoordinator">
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
            var admin_id = document.getElementById("id");

            if (toggle.checked == true) {
                status.value = 1;
            } else {
                status.value = 0;
            }
            admin_id.value = id;
            form.submit();
        }
    </script>
</div>

@endsection
