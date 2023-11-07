@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-1">
                    <div class="card-header pb-0 text-center">
                        <h6>Mis calificaciones</h6>
                        <h5>Nota acumulada: {{$acum}}</h5>
                    </div>
                    <div class="card-body container-fluid">
                        <div class="card-body px-0 pt-0 pb-1">
                            <div class="table-responsive p-0">
                                <table id="datatable" class="table table-striped table-hover dt-responsive display nowrap" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Título</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Porcentaje</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Calificación</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($upHomeworks as $upHomework)
                                        <tr class="align-middle text-center text-sm">
                                            <td class="align-middle text-center text-sm">{{$upHomework->homework->title}}</td>
                                            <td class="align-middle text-center text-sm">{{$upHomework->homework->percent}}%</td>
                                            <td class="align-middle text-center text-sm">{{$upHomework->score}}</td>
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
