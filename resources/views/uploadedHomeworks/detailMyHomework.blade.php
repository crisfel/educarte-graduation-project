@extends('layouts.dashboard')
@section('content')
    @if(Session::has('upMyHomeworkSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('upMyHomeworkSuccess') }}
        </div>
    @endif
    @if(Session::has('extensionError'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('extensionError') }}
        </div>
    @endif
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-0">
                    <div class="card-header pb-0 text-center">
                        <h6>Detalle de tarea</h6>
                    </div>
                    <div class="card-body container-fluid">
                        <div class="card-body px-0 pt-0 pb-1">
                            <div class="col-auto">
                                <div style="display:block; width: 80%; margin: 0px auto;">
                                    <h4 class="text-center mb-5">{{$homework->title}}</h4>
                                  <div class="row">
                                      <div class="col-sm-3">
                                          @if (isset($homework->due_date) && isset($homework->due_time))
                                              <h6 class="text-sm mt-6">Fecha límite de entrega</h6>
                                              <p class="text-danger text-bold text-sm">{{$homework->due_date.' - '.$homework->due_time}}</p>
                                          @endif
                                      </div>
                                      <div class="col-sm-9">
                                          <h6 class="text-center">Descripción</h6>
                                          <p style="text-align:justify" class="border-start ps-4 text-dark">{{$homework->description}}</p>
                                      </div>
                                      <div class="col-sm-2"></div>
                                      <div class="col-sm-8">
                                          @if ($homework->requiredFile == 'yes' && $value == false)
                                              <form method="POST" action="/uploadMyHomework" enctype="multipart/form-data">
                                                  @csrf
                                                  <h6 class="text-center mt-3">Añadir entrega</h6>
                                                  <input class="form-control" type="file" name="homeworkFile" required>
                                                  <input type="hidden" name="uploadedHomework_id" value="{{$uploadedHomework->id}}">
                                                  <p style="text-align:justify" class="text-xs mt-1">Por favor seleccione un archivo (las extensiones permitidas son .pdf, .docx y .zip):</p>
                                                  <div class="text-center">
                                                    <input style="width:120px;" class="btn btn-primary mt-2 rounded-circle" type="submit" value="Subir entrega">
                                                  </div>
                                              </form>
                                          @endif
                                      </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
