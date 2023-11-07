@extends('layouts.dashboard')
@section('content')
    @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    @if ($error == 'title es requerido')
                        <li>El título es requerido</li>
                    @endif
                    @if ($error == 'percent es requerido')
                        <li>El porcentaje es requerido</li>
                    @endif
                    @if ($error == 'description es requerido')
                        <li>La descripción es requerida</li>
                    @endif
                    @if ($error == 'required file es requerido')
                        <li>No selecciono si requiere archivo</li>
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
                        <h6 class="text-center">Editar tarea</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-1">
                        <div class="table-responsive p-0">
                            <div class="card-body">
                                <form method="POST" action="/homeworks/update" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="title">Título:</label>
                                                <input class="form-control" type="text" name="title" id="title" value="{{$homework->title}}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="percent">Porcentaje(%):</label>
                                                <input class="form-control" type="number" name="percent" id="percent" value="{{$homework->percent}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="requiredFile">¿Requiere subir un archivo?</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="requiredFile" id="requiredFileYes" value="yes" onChange="showDatetime()">
                                                    <label class="form-check-label" for="requiredFile1">
                                                        Si
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="requiredFile" id="requiredFileNo" value="no" checked onChange="showDatetime()">
                                                    <label class="form-check-label" for="requiredFile2">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">Descripción:</label>
                                                <textarea style="height: 100px;" class="form-control" name="description" id="description">{{ $homework->description }}</textarea>
                                            </div>
                                        </div>
                                        <div id="datetime" class="col-md-3" style="display: none;">
                                            <div class="form-group">
                                                <label for="due_date"><p style="font-weight:bold">Fecha de entrega:</p></label>
                                                <input class="form-control" type="date" name="due_date" id="due_date" value="{{$homework->due_date}}" disabled required>
                                            </div>
                                            <div class="form-group">
                                                <label for="due_time"><p style="font-weight:bold">Hora limite de entrega:</p></label>
                                                <input class="form-control" type="time" name="due_time" id="due_time" value="{{$homework->due_time}}" disabled  required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center" style=" margin-top: 15px;">
                                            <input type="hidden" name="homework_id" value="{{$homework->id}}">
                                            <input type="hidden" name="classroom_id" value="{{$classroom_id}}">
                                            <input type="submit" style="width:120px;" class="btn btn-primary rounded-circle" value="Modificar">
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
    <script>
        function showDatetime()
        {
            var radioYES = document.getElementById('requiredFileYes');
            var radioNO = document.getElementById('requiredFileNo');
            var divDatetime = document.getElementById('datetime');
            var dueDate = document.getElementById('due_date');
            var dueTime = document.getElementById('due_time');
            if (radioYES.checked) {
                divDatetime.style.display = "block";
                dueDate.disabled = false;
                dueTime.disabled = false;
            }
            if (radioNO.checked) {
                divDatetime.style.display = "none";
                dueDate.disabled = true;
                dueTime.disabled = true;
            }
        }
    </script>
@endsection
