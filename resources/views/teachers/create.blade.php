@extends('layouts.dashboard')
@section('content')
    @if(Session::has('existingEmail'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('existingEmail') }}
        </div>
    @endif
    @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    @if ($error == 'name es requerido')
                        <li>El nombre es requerido</li>
                    @endif
                    @if ($error == 'email es requerido')
                        <li>El email es requerido</li>
                    @endif
                    @if ($error == 'phone es requerido')
                        <li>El teléfono es requerido</li>
                    @endif
                    @if ($error == 'password es requerido')
                        <li>La contraseña es requerida</li>
                    @endif
                    @if ($error == 'The email must be a valid email address.')
                        <li>Email inválido</li>
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
                        <h6 class="text-center">Nuevo profesor</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-1">
                        <div class="table-responsive p-0">
                            <div class="card-body">
                                <form action="/teachers/store" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        {{csrf_field()}}
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name">Nombre</label>
                                                <input class="form-control" type="text" name="name" id="name">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input class="form-control" type="email" name="email" id="email">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="phone">Teléfono</label>
                                                <input class="form-control" type="text" name="phone" id="phone">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="password">Contraseña</label>
                                                <input class="form-control" type="password" name="password" id="password">
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
