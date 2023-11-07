@extends('layouts.dashboard')
@section('content')
    @if(Session::has('transfersError'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('transfersError') }}
        </div>
    @endif
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-1">
                    <div class="card-header pb-0 text-center">
                        <h6>Transferencias de estudiantes</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-1">
                        <div class="table-responsive p-0">
                            <form method="POST" action="/studentsClassroomUpdate">
                                @csrf
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-hover dt-responsive display nowrap" width="100%" cellspacing="0">
                                        <thead class="thead-light">
                                        <tr>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Selección</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aula</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($students as $student)
                                            <tr class="align-middle text-center text-sm">
                                                <td class="align-middle text-center text-sm">
                                                    <input style="border: gray solid 1px; border-radius: 15px; width: 15px; height: 15px;" class="form-check-input" type="checkbox" name="studentCheck[]" id="studentCheck{{$student->id}}" value="{{$student->id}}" onclick="getIDS({{$student->id}})">
                                                </td>
                                                <td class="align-middle text-center text-sm">{{$student->name}}</td>
                                                @if (isset($student->student->classroom))
                                                    <td>{{$student->student->classroom->name}}</td>
                                                @else
                                                    <td></td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <input type="hidden" name="cart" id="cart">
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="classroom_id"><strong>Seleccione un curso:</strong></label>
                                        <select class="form-control" name="classroom_id">
                                            @foreach ($classrooms as $classroom)
                                                <option value="{{$classroom->id}}">{{$classroom->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5 text-center">
                                    <input type="submit" style="width:100px; color: white; margin-top:30px;" class="btn btn-primary" value="Transferir">
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var ids = new Array();
        function getIDS(studentID)
        {
            var box = document.getElementById("studentCheck" + studentID);
            var cart = document.getElementById("cart");
            if (box.checked == true) {
                ids.push(studentID)
            } else {
                var i = ids.indexOf(studentID);
                if ( i !== -1 ) {
                    ids.splice( i, 1 );
                }
            }
            cart.value = ids;
        }
    </script>
@endsection
