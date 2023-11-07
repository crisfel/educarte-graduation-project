  @extends('layouts.dashboard')
@section('content')
    @if(Session::has('StoreSyllabusSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('StoreSyllabusSuccess') }}
        </div>
    @endif
    @if(Session::has('DeleteSyllabusSuccess'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('DeleteSyllabusSuccess') }}
        </div>
    @endif
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-1">
                    <div class="card-header pb-0 text-center">
                        <h6>Mi plan de estudios</h6>
                        @hasrole('Teacher')
                        @if (is_null($syllabus))
                            <a style="margin-bottom:5px; width:150px; border-radius: 25px;" class="btn btn-primary" href="/syllabus/create?classroom_id={{$classroom_id}}">Crear syllabus</a>
                        @endif
                        @endhasrole
                    </div>
                    <div class="card-body px-0 pt-0 pb-1">
                        <div class="table-responsive p-0">
                            <table id="datatable" class="table align-items-center mb-0">
                                <thead class="thead-light">
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Plan de estudios</th>
                                    @hasrole('Teacher')
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acción</th>
                                    @endhasrole
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="align-middle text-center text-sm">
                                        <td class="align-middle text-center text-sm">
                                            @if (! is_null($syllabus))
                                                <a href="/syllabus/show/{{$classroom_id}}" target="_blank">
                                                    <img class="img-fluid img-thumbnail" style="width:7%; height: auto;" src="https://miel.robotschool.co/assets/images/fileTypes/pdf.png">
                                                </a>
                                            @endif
                                        </td>
                                        @hasrole('Teacher')
                                        <td class="align-middle text-center text-sm">
                                            @if (! is_null($syllabus))
                                                <div style="display: inline-block">
                                                    <form method="POST" action="/syllabus/delete">
                                                        @csrf
                                                        <input type="hidden" name="classroom_id" value={{$classroom_id }}>
                                                        <button style="margin:4px; width:40px; border-radius: 20px;" class="btn btn-block btn-danger form-control" title="Borrar" type="submit" onclick="return confirm('¿Está seguro que quiere eliminar este plan de estudios?');"><i style="margin-left: -5px;" class="fas fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            @endif
                                        </td>
                                        @endhasrole
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
