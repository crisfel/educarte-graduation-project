@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-1">
                    <div class="card-header pb-0 text-center">
                        <h6>Historial académico de {{$user->name}}</h6>
                    </div>
                    <div class="card-body container-fluid">
                        <div class="card-body px-0 pt-0 pb-1">
                            <div class="table-responsive p-0">
                                <table id="datatable" class="table table-striped table-hover dt-responsive display nowrap" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre del curso</th>
                                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Definitiva</th>
                                    </tr>
                                  </thead>
                                <tbody>
                                @foreach ($academicHistories as $academicHistory)
                                    <tr class="align-middle text-center text-sm">
                                        <td class="align-middle text-center text-sm">{{$academicHistory->classroom->name}}</td>
                                        <td class="align-middle text-center text-sm">{{$academicHistory->totalScore}}</td>
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
@endsection
