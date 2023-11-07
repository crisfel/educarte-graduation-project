@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header pb-0 text-center">
            <h6>Selección de categorías</h6>
            <p class="text-center text-sm" >Selecciona una categoría para continuar</p>
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center">
                <div class="row">
                    <div class="card card-profile p-4">
                        <div class="text-center ">
                            <div class="row">
                                @foreach ($categories as $category)
                                    <div class="col-md-3 card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                                        <p class="text-uppercase text-secondary text-xxs font-weight-bolder" >{{$category->name}}</p>
                                        <a  href="/mySubcategories/{{$category->id}}">
                                            <img class="rounded-circle bg-gray-200" style="width:100px; height:100px; box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;"  src="https://miel.robotschool.co/{{$category->icon_url}}" onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
