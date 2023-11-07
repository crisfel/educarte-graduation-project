@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body container-fluid">
            <div class="justify-content-center">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header pb-0 px-3 text-center">
                                <h6 class="mb-0">{{$category->name}}</h6>
                            </div>
                            <div class="card-body pt-4 p-3">
                                <ul class="list-group">
                                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-3 text-sm">Detalle de la categotía</h6>
                                            <span class="mb-2 text-xs">Descripción:<span class="text-dark ms-sm-2 font-weight-bold">{{$category->description}}</span></span>
                                        </div>
                                        <div class="ms-auto text-end">
                                            <img class="img-fluid" style="width: 50%; height: auto;" src="https://miel.robotschool.co/{{$category->icon_url}}" onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';">
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
