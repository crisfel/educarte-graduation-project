@extends('layouts.dashboard')
@section('content')

    @if(Session::has('updaschoolsuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('updaschoolsuccess') }}
        </div>
    @endif
    @if(Session::has('storeschoolsuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('storeschoolsuccess') }}
        </div>
    @endif
    @if(Session::has('deleschoolsuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('deleschoolsuccess') }}
        </div>
    @endif
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-1">
                    <div class="card-header pb-0 text-center">
                        <h6>Colegios</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-1">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Logo</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dirección</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ciudad</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">País</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bloq/Desbl</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($schools as $school)
                                        <tr class="align-middle text-center text-sm">
                                            <td class="align-middle text-center text-sm">
                                                <a class="magnific" href="https://miel.robotschool.co/{{$school->icon_url}}">
                                                    <img class="img-fluid"  style="width: 75%; height: 75px" src="https://miel.robotschool.co/{{$school->icon_url}}" onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';">
                                                </a>
                                            </td>
                                            <td class="align-middle text-center text-xs px-sm-5">{{$school->name}}</td>
                                            <td class="align-middle text-center text-xs">{{$school->address}}</td>
                                            <td class="align-middle text-center text-xs">{{$school->city}}</td>
                                            <td class="align-middle text-center text-xs">{{$school->country}}</td>

                                            <td class="align-middle text-center text-xs">
                                                @if($school->is_enable == 1)
                                                    Habilitado
                                                @else
                                                    Deshabilitado
                                                @endif
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <div >
                                                    @if($school->is_enable == 1)
                                                        <p style="margin-bottom: -3px;" class="align-middle text-center text-xxs font-weight-bolder opacity-7">ON</p>
                                                        <input style="border: gray solid 1px; border-radius: 15px; width: 25px; height: 25px;" data-toggle="toggle"
                                                               id="togglestatus{{$school->id}}" class="form-check-input bg-black" type="checkbox" checked onchange="getStatus({{$school->id}})" >
                                                    @else
                                                        <p style="margin-bottom: -3px;" class="align-middle text-center text-xxs font-weight-bolder opacity-7">OFF</p>
                                                        <input style="border: gray solid 1px; border-radius: 15px; width: 25px; height: 25px;" data-toggle="toggle"
                                                               id="togglestatus{{$school->id}}"  class="form-check-input" type="checkbox" onchange="getStatus({{$school->id}})">
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex">
                                                    <div class="d-inline">
                                                        <a href="/schools/edit/{{$school->id}}" style="margin:4px; width:40px; border-radius: 20px;" title="Editar" alt="Editar" class="btn btn-warning"><i style="color:white; margin-left: -6px" class="text-right far fa-edit"></i></a>
                                                    </div>
                                                    <div class="d-inline">
                                                        <form method="POST" action="/schools/delete">
                                                            @csrf
                                                            <input type="hidden" name="school_id" value={{ $school->id }}>
                                                            <button style="margin:4px; width:40px; border-radius: 20px;" class="btn btn-danger " title="Borrar" type="submit" onclick="return confirm('¿Está seguro que quiere eliminar este colegio?');"><i style="margin-left: -6px;" class="fas fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                </tbody>

                            </table>
                            <form id="form-status" name="form-status" method="POST" action="/changeStatusSchool">
                                @csrf
                                <input type="hidden" name="id" id="id">
                                <input type="hidden" name="status" id="status">
                            </form>
                        </div>
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
            var school_id = document.getElementById("id");

            if (toggle.checked == true) {
                status.value = 1;
            } else {
                status.value = 0;
            }
            school_id.value = id;
            form.submit();
        }
    </script>
@endsection
