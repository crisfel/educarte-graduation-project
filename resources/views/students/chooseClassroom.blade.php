@extends('layouts.dashboard')
@section('content')

    <div class="card">
        <div class="card-header">
            Selección de aula
        </div>
        <div class="card-body">
            <div class="form-group">
                <form method="POST" action="/students/finalSave">
                    @csrf
                    <label for="classroom_id">Elija un aula para el estudiante:</label>
                    <select class="form-control" name="classroom_id">
                        @foreach ($classrooms as $classroom)
                            <option value="{{$classroom->id}}">{{$classroom->name}}</option>
                        @endforeach
                    </select>

                    <input type="hidden" name="name" value="{{$name}}">
                    <input type="hidden" name="email" value="{{$email}}">
                    <input type="hidden" name="phone" value="{{$phone}}">
                    <input type="hidden" name="password" value="{{$password}}">
                    <input type="hidden" name="school_id" value="{{$school_id}}">
                    <input style="width:160px; color: white; margin-top:20px; float:right;" type="submit" class="btn btn-primary" value="Crear">
                </form>

            </div>
        </div>
    </div>

@endsection
