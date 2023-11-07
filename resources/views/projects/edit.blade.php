@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-1">
                    <div class="card-header pb-0">
                        <h5 class="text-center">Editar tema</h5>
                    </div>
                    <div class="card-body px-0 pt-0 pb-1">
                        <div class="table-responsive p-0">
                            <div class="card-body">
                                 <form method="POST" action="/project/update" enctype="multipart/form-data">
                                      <div class="row">
                                        @csrf
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Nombre</label>
                                                <input class="form-control" type="text" name="name" id="name" value="{{$project->name}}" required>
                                            </div>
                                        </div>
                                        @if (Auth::user()->role == 'Administrator')
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="theme_type">Tipo</label>
                                                <select class="form-control" name="theme_type">
                                                    @if ($project->theme_type == 'theme')
                                                        <option value="theme" selected>Tema</option>
                                                    @else
                                                        <option value="project" selected>Proyecto</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="image">Seleccione una imagen</label>
                                                <input class="form-control" type="file" name="image" id="image">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">Descripción</label>
                                                <textarea class="form-control" name="description" id="projectDesc" required>
                                                    {{$project->description}}
                                                </textarea>
                                            </div>
                                        </div>
                                          <div style="margin-top: 15px;" class="col-md-12 text-center">
                                            <input type="hidden" name="project_id" value="{{$project->id}}">
                                            <input type="submit" style="width:100px; color: white;" class="btn btn-primary rounded-circle" value="Modificar">
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
