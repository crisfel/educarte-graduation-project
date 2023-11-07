@extends('layouts.dashboard')
@section('content')
    @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    @if ($error == 'name es requerido')
                        <li>EL nombre es requerido</li>
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
    <div class="card">
        <div class="card-header">
            Editar subcategoría
        </div>
        <div class="card-body">
            <form method="POST" action="/subcategories/update" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name"><p style="font-weight:bold">Nombre:</p></label>
                    <input class="form-control" type="text" name="name" id="name" value="{{$subcategory->name}}" >
                </div>
                <div style="margin-top:20px" class="form-group"><label for="description"><p style="font-weight:bold">Descripción:</p></label><textarea style="height: 100px;" class="form-control" name="description" id="description">{{$subcategory->description}}</textarea></div>
                <div style="margin-top:20px" class="form-group">
                    <label for="icon_url"><p style="font-weight:bold">Ícono:</p></label>
                    <input class="form-control" type="file" name="icon_url" id="icon_url">
                </div>
                <input type="hidden" name="subcategory_id" value="{{$id}}">
                <input type="submit" style="width:160px; color: white; margin-top:20px; float:right;" class="btn btn-primary" value="Modificar">
            </form>
        </div>
    </div>
@endsection
