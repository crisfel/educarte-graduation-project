@extends('layouts.dashboard')
@section('content')
    @if(Session::has('upMyHomeworkSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('upMyHomeworkSuccess') }}
        </div>
    @endif
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-1">
                    <div class="card-header pb-0 text-center">
                        <h6>Mis tareas</h6>
                    </div>
                     <div class="card-body container-fluid">
                         <div class="card-body px-0 pt-0 pb-1">
                             <div class="table-responsive p-0">
                                 <table id="datatable" class="table table-striped table-hover dt-responsive display nowrap" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Título</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Entregable</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha de envío</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acción</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($myHomeworks as $myHomework)
                                        <tr class="align-middle text-center text-sm">
                                            <td  class="align-middle text-center text-sm">{{$myHomework->homework->title}}</td>
                                            <td  class="align-middle text-center text-sm">
                                                @if (! is_null($myHomework->path))
                                                    <a href="https://miel.robotschool.co/{{$myHomework->path}}" target="_blank">
                                                        @if (strpos($myHomework->path, '.pdf'))
                                                            <img class="img-fluid img-thumbnail" style="width: 100px; height: auto;" src="https://miel.robotschool.co/storage/fileTypes/pdf.png">
                                                        @elseif (strpos($myHomework->path, '.docx'))
                                                            <img class="img-fluid img-thumbnail" style="width: 100px; height: auto;" src="https://miel.robotschool.co/storage/fileTypes/docx.png">
                                                        @elseif (strpos($myHomework->path, '.zip'))
                                                            <img class="img-fluid img-thumbnail" style="width: 100px; height: auto;" src="https://miel.robotschool.co/storage/fileTypes/compressed.png">
                                                        @endif
                                                    </a>
                                                @endif
                                                    @if ($myHomework->homework->requiredFile == 'no')
                                                        No requiere
                                                    @endif
                                            </td>
                                            <td  class="align-middle text-center text-sm">
                                                @if ($myHomework->status == 'notUploaded')
                                                    No subida
                                                @endif
                                                    @if ($myHomework->status == 'send')
                                                        Enviada
                                                    @endif
                                                    @if ($myHomework->status == 'graded')
                                                        Calificada
                                                    @endif
                                            </td>
                                            <td  class="align-middle text-center text-sm">
                                                @if (isset($myHomework->delivery_at))
                                                    {{$myHomework->delivery_at}}
                                                @endif
                                            </td>
                                            <td  class="align-middle text-center text-sm">
                                                <a style="margin:4px; width:40px; border-radius: 20px;" href="detailMyHomework/{{$myHomework->id}}" class="btn btn-primary" title="Detalle"><i style="margin-left: -8px;" class="fas fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>


        </div>
    </div>
@endsection
