@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-1">
                    <div class="card-header pb-0">
                        <h6 class="text-center">Nuevo tema</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-1">
                        <div class="table-responsive p-0">
                            <div class="card-body">
                                <form method="POST" action="/project/store" enctype="multipart/form-data">
                                    @csrf
                                  <div class="row">
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label for="name">Nombre</label>
                                              <input class="form-control" type="text" name="name" id="name" required>
                                          </div>
                                      </div>
                                      @if (Auth::user()->role == 'Administrator' || Auth::user()->role == 'Teacher')
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label for="theme_type">Tipo</label>
                                              <select class="form-control" name="theme_type" required>
                                                  <option value="theme" selected>Tema</option>
                                                  <option value="project">Proyecto</option>
                                              </select>
                                          </div>
                                      </div>
                                      @endif
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label for="image">Seleccione una imagen (En formato jpg, jpeg o png)</label>
                                              <input class="form-control" type="file" name="image" id="image" required>
                                          </div>
                                      </div>
                                      @if ($creationType == 'text')
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <label for="description">Descripción</label>
                                              <textarea class="form-control" name="description" id="projectDesc" required>
                                        </textarea>
                                          </div>
                                      </div>
                                      @endif
                                      @if ($creationType == 'import')
                                          <div class="col-md-12">
                                              <div class="form-group">
                                                  <p style="text-align:justify">Por favor seleccione un archivo PDF:</p>
                                                  <input class="form-control" type="file" name="themeFile" required>
                                              </div>
                                          </div>
                                      @endif
                                      <div style="margin-top: 15px;" class="col-md-12 text-center">
                                        <input type="hidden" name="subcategory_id" value="{{$id}}">
                                        <input type="submit" style="width:100px; color: white;;" class="btn btn-primary rounded-circle" value="Crear">
                                      </div>
                                  </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
