@extends('layouts.dashboard')
@section('content')
    @if(Session::has('invalidFormat'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('invalidFormat') }}
        </div>
    @endif
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h6 class="text-center">Tipo de creación</h6>
                    </div>
                    <div class="card-body">
                    <form method="POST" action="/project/create">
                        @csrf
                        <div class="form-group">
                            <label for="name"><p style="font-weight:bold">Por favor seleccione el tipo de creación:</p></label>
                            <select class="form-control" name="creation_type">
                                <option value="text" selected>Crear tema desde formato de texto enriquecido</option>
                                <option value="import">Importar tema desde PDF</option>
                            </select>
                            <input type="hidden" name="subcategory_id" value="{{$id}}">
                        </div>
                        <input type="submit" style="width:160px; color: white; margin-top:20px; float:right;" class="btn btn-primary" value="Continuar">
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
