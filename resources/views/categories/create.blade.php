@extends('layouts.dashboard')
@section('content')
    @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    @if ($error == 'name es requerido')
                        <li>EL nombre es requerido</li>
                    @endif
                    @if ($error == 'icon url es requerido')
                        <li>La imagen es requerida</li>
                    @endif
                        @if ($error == 'description es requerido')
                            <li>La descripción es requerida</li>
                        @endif
                    @if ($error == 'The icon url must be a file of type: jpg, jpeg, png.')
                        <li>El formato de imagen debe ser jpg, jpeg o png</li>
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
                        <h6 class="text-center">Nueva categoría</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-1">
                        <div class="table-responsive p-0">
                            <div class="card-body">
                            <form method="POST" action="/categories/store" enctype="multipart/form-data">
                                @csrf
                              <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input class="form-control" type="text" name="name" id="name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="icon_url">Ícono</label>
                                        <input class="form-control" type="file" name="icon_url" id="icon_url">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="description">Descripción</label>
                                        <textarea style="height: 38px;" class="form-control" name="description" id="description"></textarea>
                                    </div>
                                </div>
                                  <div style="margin-top: 15px;" class="col-md-12 text-center">
                                      <input type="submit" style="width:100px; color: white;" class="btn btn-primary rounded-circle" value="Crear">
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
