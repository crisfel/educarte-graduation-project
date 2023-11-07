@extends('layouts.dashboard')
@section('content')
    @if(Session::has('StoreProjectSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('StoreProjectSuccess') }}
        </div>
    @endif
    @if(Session::has('UpdaProjectSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('UpdaProjectSuccess') }}
        </div>
    @endif
    @if(Session::has('DeleProjectSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('DeleProjectSuccess') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header pb-0 text-center">
            <h6>
                @if (isset($id))
                    Temas
                @else
                    Mis temas
                @endif
            </h6>
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center">
                <div class="row">
                    @foreach($projects as $project)
                    <div class="col-md-4">
                        <div class="card card-profile">
                           <a href="detailProject/{{$project->id}}"><img src="/assets/images/bannerT.jpg" alt="Image placeholder" class="card-img-top"></a>
                            <div class="row justify-content-center">
                                <div class="col-4 col-lg-4 order-lg-2">
                                    <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                        <a href="detailProject/{{$project->id}}"><img src="https://miel.robotschool.co/{{$project->icon_url}}" onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';" class="rounded-circle img-fluid border border-2 border-white"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                                <div class="d-flex justify-content-center">
                                    <div style="display: inline-block" class="btn-group" role="group">
                                    @if (isset($id))
                                        @if ($id == 'all')
                                            <div style="display:block !important; margin-bottom: 3px;" class="row checkbox">
                                                @if ($project->is_enable == 1)
                                                    <p style="margin-bottom: -3px;" class="align-middle text-center text-xxs font-weight-bolder opacity-7">ON</p>
                                                    <input style="border: gray solid 1px; border-radius: 15px; width: 25px; height: 25px;" data-toggle="toggle"
                                                           id="togglestatus{{$project->id}}" class="form-check-input" type="checkbox" checked onchange="getStatus({{$project->id}})">
                                                @else
                                                    <p style="margin-bottom: -3px;" class="align-middle text-center text-xxs font-weight-bolder opacity-7">OFF</p>
                                                    <input style="border: gray solid 1px; border-radius: 15px; width: 25px; height: 25px;" data-toggle="toggle"
                                                           id="togglestatus{{$project->id}}"  class="form-check-input" type="checkbox" onchange="getStatus({{$project->id}})">
                                                @endif
                                            </div>
                                            @endif
                                    @endif
                                    </div>
                                    <div style="display: inline-block" class="btn-group ps-2 mt-2 mx-2" role="group">
                                        <div style="display: inline-block">
                                            <a href="detailProject/{{$project->id}}" style="margin:4px; width:40px; border-radius: 20px;" title="Detalles" class="btn btn-block btn-primary form-control"><i style="margin-left: -7px;" class="fas fa-eye"></i></a>
                                        </div>
                                        @if (! isset($id))
                                        <div style="display: inline-block">
                                            <a href="/project/edit/{{$project->id}}" style="margin:4px; width:40px; border-radius: 20px;" alt="Editar" title="Editar" class="btn btn-block btn-warning form-control"><i style="margin-left: -6px;" class="far fa-edit"></i></a>
                                        </div>
                                        <div style="display: inline-block">
                                            <form method="POST" action="/project/delete">
                                                @csrf
                                                <input type="hidden" name="category_id" value={{ $project->id }}>
                                                <!--<button style="margin:4px; width:40px; border-radius: 20px;" class="btn btn-block btn-danger" title="Borrar" type="submit" onclick="return confirm('¿Está seguro que quiere eliminar este tema?');"><i style="margin-left: -6px;" class="fas fa-trash"></i></button>-->
                                            </form>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-1">
                                <h5>
                                    {{$project->name}}<span class="font-weight-light"></span>
                                </h5>
                            </div>
                            <div class="card-body mt-2 pt-0">
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex justify-content-center">
                                            <div class="d-grid text-center">
                                                @if ($project->is_enable == 1)
                                                    Habilitado
                                                @else
                                                    Deshabilitado
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                        <form id="form-status" name="form-status" method="POST" action="/changeStatusProject">
                            @csrf
                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="status" id="status">
                        </form>
                </div>
            </div>
        </div>
        <script>
            function getStatus(id)
            {
                var toggle = document.getElementById("togglestatus"+id);
                var status = document.getElementById("status");
                var form = document.getElementById("form-status");
                var project_id = document.getElementById("id");
                if (toggle.checked == true) {
                status.value = 1;
                } else {
                status.value = 0;
                }
                project_id.value = id;
                form.submit();
            }
        </script>
    </div>

@endsection
