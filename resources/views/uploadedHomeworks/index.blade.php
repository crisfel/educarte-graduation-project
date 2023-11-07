@extends('layouts.dashboard')
@section('content')
    @if(Session::has('UpdaUphomeworksSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('UpdaUphomeworksSuccess') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            Tareas de {{$student->name}}
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center" >
                <div style="width: 100%; padding-left: -10px;">
                    <div class="col-auto mt-5">
                        <form method="POST" action="/uploadedHomeworks/changeScores">
                            @csrf
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-hover dt-responsive display nowrap" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="text-align: center; padding:10px;">
                                            <th>Título</th>
                                            <th>Entregable</th>
                                            <th>Calificación</th>
                                            <th>Calificar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($uploaded_homeworks as $uphomework)
                                            <tr style="text-align: center; padding:10px;">
                                                <td>{{$uphomework->homework->title}}</td>
                                                <td>
                                                    @if (! is_null($uphomework->path))
                                                        <a href="https://miel.robotschool.co/{{$uphomework->path}}" target="_blank">
                                                            @if (strpos($uphomework->path, '.pdf'))
                                                                <img style="width:50px" src="https://miel.robotschool.co/storage/fileTypes/pdf.png">
                                                            @elseif (strpos($uphomework->path, '.docx'))
                                                                <img style="width:50px" src="https://miel.robotschool.co/storage/fileTypes/docx.png">
                                                            @elseif (strpos($uphomework->path, '.zip'))
                                                                <img style="width:50px" src="https://miel.robotschool.co/storage/fileTypes/compressed.png">
                                                            @endif
                                                        </a>
                                                    @elseif ($uphomework->homework->requiredFile == 'no')
                                                        No requiere
                                                    @else
                                                        No subido
                                                    @endif
                                                </td>
                                                <td>{{$uphomework->score}}</td>
                                                <td>
                                                    <div class="form-group">
                                                        <input class="form-control" type="number" min="0" max="50" name="score" id="score{{ $uphomework->id }}" style="width:80px; text-align:center; margin:0px auto;"  onclick="scoreChange({{ $uphomework->id }})">
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <input type="hidden" name="scores" id="scores">
                            <input type="hidden" name="ids" id="ids">
                            <input style="color: white; margin-top:20px; float:right;" class="btn btn-primary" type="submit" value="Enviar calificaciones">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var scores = new Array();
        var ids = new Array();

        function scoreChange(uphomeworkID){
            var inputScore = document.getElementById('score'+uphomeworkID);
            var inputScores = document.getElementById('scores');
            var inputIDS = document.getElementById('ids');
            inputScore.addEventListener('blur',function(){
                if (! ids.includes(uphomeworkID))
                {
                    ids.push(uphomeworkID);
                    index = ids.indexOf(uphomeworkID);
                    scores[index] = inputScore.value;
                } else {
                    index = ids.indexOf(uphomeworkID);
                    scores[index] = inputScore.value;
                }
                inputScores.value = scores;
                inputIDS.value = ids;
            });
        }
    </script>
@endsection
