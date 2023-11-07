@extends('layouts.dashboard')
@section('content')
    @if(Session::has('storesubcasuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('storesubcasuccess') }}
        </div>
    @endif
    @if(Session::has('updasubcasuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('updasubcasuccess') }}
        </div>
    @endif
    @if(Session::has('delesubcasuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('delesubcasuccess') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header pb-0 text-center">
            <h6>Subcategorías de {{$category->name}}</h6>
        </div>
        <div class="card-body container-fluid">
            <div class="justify-content-center">
                <div class="row">
                      <div class="col-md-12 text-center">
                        <a style="margin-bottom:30px" class="btn btn-primary rounded-circle" href="/subcategories/create/{{$id}}">Crear subcategoría</a>
                      </div>
                    <div class="row">
                        @foreach($subcategories as $subcategory)
                            <div class="col-md-4">
                                <div class="card card-profile">
                                    <img src="/assets/images/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
                                    <div class="row justify-content-center">
                                        <div class="col-4 col-lg-4 order-lg-2">
                                            <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                               <img src="https://miel.robotschool.co/{{$subcategory->icon_url}}" onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';" class="rounded-circle img-fluid border border-2 border-white">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                                        <div class="d-flex justify-content-center">
                                            <div style="display: inline-block" class="btn-group" role="group">
                                                <div style="display: inline-block">
                                                    <a href="/subcategories/description/{{$subcategory->id}}" style="margin:4px; width:40px; border-radius: 20px;" title="Descripción" class="btn btn-block btn-primary form-control"><i style="margin-left: -6px;" class="fas fa-plus"></i></a>
                                                </div>
                                                <div style="display: inline-block">
                                                    <a href="/projects?id={{$subcategory->id}}" style="margin:4px; width:40px; border-radius: 20px; background-color: #1FADD6 !important" alt="Temas" title="Temas" class="btn btn-block btn-success form-control"><i style="margin-left: -6px;" class="fab fa-tumblr"></i></a>
                                                </div>
                                                <div style="display: inline-block">
                                                    <a href="/subcategories/edit/{{$subcategory->id}}" style="margin:4px; width:40px; border-radius: 20px;" alt="Editar" title="Editar" class="btn btn-block btn-warning form-control"><i style="margin-left: -6px;" class="far fa-edit"></i></a>
                                                </div>
                                                <div style="display: inline-block">
                                                    <form method="POST" action="/subcategories/delete">
                                                        @csrf
                                                        <input type="hidden" name="subcategory_id" value={{ $subcategory->id }}>
                                                        <!--<button style="margin:4px; width:40px; border-radius: 20px;" class="btn btn-block btn-danger" title="Borrar" type="submit" onclick="return confirm('¿Está seguro que quiere eliminar esta subcategoría?');"><i style="margin-left: -6px;" class="fas fa-trash"></i></button>-->
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mt-1">
                                        <h5>
                                            {{$subcategory->name}}<span class="font-weight-light"></span>
                                        </h5>
                                    </div>
                                    <div class="card-body mt-2 pt-0">
                                        <div class="row">
                                            <div class="col">
                                                <div class="d-flex justify-content-center">
                                                    <div class="d-grid text-center">
                                                        <span class="text-lg font-weight-bolder">Descripción</span>
                                                        <span class="text-sm opacity-8">{{$subcategory->description}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
