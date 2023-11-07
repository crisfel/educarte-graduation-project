@extends('layouts.dashboard')
@section('content')
    @if(Session::has('stocategosuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('stocategosuccess') }}
        </div>
    @endif
    @if(Session::has('updacategosuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('updacategosuccess') }}
        </div>
    @endif
    @if(Session::has('delecategosuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('delecategosuccess') }}
        </div>
    @endif

<div class="card">
    <div class="card-header pb-0 text-center">
        <h6>Categorías</h6>
    </div>
    <div class="card-body container-fluid">
        <div class="justify-content-center">
            <div class="row">
                   @foreach($categories as $category)
                        <div class="col-md-4">
                            <div class="card card-profile">
                                <a href="/categories/description/{{$category->id}}"><img src="/assets/images/bannerC.jpg" alt="Image placeholder" class="card-img-top"></a>
                                <div class="row justify-content-center">
                                    <div class="col-4 col-lg-4 order-lg-2">
                                        <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                            <a href="/categories/description/{{$category->id}}"><img src="https://miel.robotschool.co/{{$category->icon_url}}" onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';" class="rounded-circle img-fluid border border-2 border-white"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                                    <div class="d-flex justify-content-center">
                                        <div style="display: inline-block" class="btn-group" role="group">
                                            <div style="display: inline-block">
                                                <a href="/categories/description/{{$category->id}}" style="margin:4px; width:40px; border-radius: 20px;" title="Descripción" class="btn btn-block btn-primary form-control"><i style="margin-left: -7px;" class="fas fa-eye"></i></a>
                                            </div>
                                            <div style="display: inline-block">
                                                <a href="/subcategories/{{$category->id}}" style="margin:4px; width:40px; border-radius: 20px;" alt="Subcategorías" title="Subcategorías" class="btn btn-block btn-success form-control"><i style="margin-left: -6px;" class="fab fa-stripe-s"></i></a>
                                            </div>
                                            <div style="display: inline-block">
                                                <a href="/categories/edit/{{$category->id}}" style="margin:4px; width:40px; border-radius: 20px;" alt="Editar" title="Editar" class="btn btn-block btn-warning form-control"><i style="margin-left: -6px;" class="far fa-edit"></i></a>
                                            </div>
                                            <div style="display: inline-block">
                                                <form method="POST" action="/categories/delete">
                                                    @csrf
                                                    <input type="hidden" name="category_id" value={{ $category->id }}>
                                                    <!--<button style="margin:4px; width:40px; border-radius: 20px;" class="btn btn-block btn-danger" title="Borrar" title="Borrar" type="submit" onclick="return confirm('¿Está seguro que quiere eliminar esta categoría?');"><i style="margin-left: -6px;" class="fas fa-trash"></i></button>-->
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-1">
                                    <h5>
                                        {{$category->name}}<span class="font-weight-light"></span>
                                    </h5>
                                </div>
                                <div class="card-body mt-2 pt-0">
                                    <div class="row">
                                        <div class="col">
                                            <div class="d-flex justify-content-center">
                                                <div class="d-grid text-center">
                                                    <span class="text-lg font-weight-bolder">Descripción</span>
                                                    <span class="text-sm opacity-8">{{$category->description}}</span>
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
@endsection
