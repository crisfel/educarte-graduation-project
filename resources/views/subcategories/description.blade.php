@extends('layouts.dashboard')
@section('content')

    <div class="card">
        <div class="card-header">
            Detalle de la subcategoría
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center" >
                <div style="width: 100%; padding-left: -10px;">
                    <div class="col-auto mt-5">
                        <div style="display:block; width: 80%; margin: 0px auto;">
                            <p style="font-size: 40px; font-weight: bold;" class="text-center">{{$subcategory->name}}</p>
                            <img style="width:30%; display:block; margin-left:auto; margin-top:40px; margin-right:auto; border-radius: 10px;" src="https://miel.robotschool.co/{{$subcategory->icon_url}}" onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';">
                            <h4><p style="margin-top:40px">Descripción:</p></h4>
                            <p style="text-align:justify">{{$subcategory->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
