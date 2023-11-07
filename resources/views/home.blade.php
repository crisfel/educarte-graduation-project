@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid py-4">
    @hasrole('Administrator')
        <div class="row">
            <img class="text-center img-responsive img-thumbnail" style="border-radius: 35px;" width="940px" height="300px" src="/assets/images/bannerRS.jpg">
            <div  class="col-12">
                <div class="card mb-1 p-4">
                    <div class="jumbotron jumbotron-fluid">
                      <div class="container">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <div class="card-header mx-4 p-3 text-center">
                                        <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                            <i class="fas fa-landmark opacity-10"></i>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0 p-3 ">
                                        <h6 class="text-center mb-0">Colegios</h6>
                                        <a href="/schools/create" class="text-xs"><i class="fas fa-plus opacity-10 ps-4 mx-lg-2"></i>Nuevo colegio</a>
                                        <br/>
                                        <a href="/schools" class="text-xs"><i class="fas fa-landmark opacity-10 ps-4 mx-lg-2"></i>Mis colegios</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <div class="card">
                                        <div class="card-header mx-4 p-3 text-center">
                                            <div class="icon icon-shape icon-lg bg-gradient-primary shadow rounded-circle">
                                                <img class="text-center" style="margin-left: 8px; margin-top: 8px;" width="40px" height="40px" src="/assets/images/coordi.png">
                                            </div>
                                        </div>
                                        <div class="card-body pt-0 p-3">
                                            <h6 class="text-center mb-0">Coordinadores</h6>
                                            <a href="/coordinators/create" class="text-xs"><i class="fas fa-user-plus opacity-10 ps-3 mx-lg-2"></i>Nuevo coordinador</a>
                                            <br/>
                                            <a href="/coordinators" class="text-xs"><i class="fas fa-user-tie opacity-10 ps-3 mx-lg-2"></i>Ver coordinadores</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <div class="card-header mx-4 p-3 text-center">
                                        <div class="icon icon-shape icon-lg bg-gradient-primary shadow rounded-circle">
                                            <img class="text-center" style=" margin-top: 18px;" width="35px" height="30px" src="/assets/images/category.png">
                                        </div>
                                    </div>
                                    <div class="card-body pt-0 p-3 ">
                                        <h6 class="text-center mb-0">Categorías</h6>
                                        <a href="/categories/create" class="text-xs"><i class="fas fa-folder-plus opacity-10 ps-4 mx-lg-2"></i>Nuevo categoría</a>
                                        <br/>
                                        <a href="/categories" class="text-xs"><i class="fas fa-folder opacity-10 ps-4 mx-lg-2"></i>Mis categorías</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <div class="card-header mx-4 p-3 text-center">
                                        <div class="icon icon-shape icon-lg bg-gradient-primary shadow rounded-circle">
                                            <img class="text-center" style=" margin-top: 14px;" width="30px" height="35px" src="/assets/images/tema.png">
                                        </div>
                                    </div>
                                    <div class="card-body pt-0 p-3 ">
                                        <h6 class="text-center mb-0">Temas</h6>
                                        <a href="/myCategories" class="text-xs"><i class="fas fa-plus opacity-10 ps-4 mx-lg-2"></i>Nuevo tema</a>
                                        <br/>
                                        <a href="/projects?id=all" class="text-xs"><i class="fas fa-file-alt opacity-10 ps-4 mx-lg-2"></i>Ver temas</a>
                                        <br/>
                                        <a href="/projects" class="text-xs"><i class="fas fa-file-alt opacity-10 ps-4 mx-lg-2"></i>Mis temas</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endhasrole
    @hasrole('Coordinator')
        <div class="row">
            <img class="text-center img-responsive img-thumbnail" style="border-radius: 35px;" width="940px" height="300px" src="/assets/images/coordiB.png">
            <div  class="col-12">
                <div class="card mb-1 p-4">
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <div class="card">
                                            <div class="card-header mx-4 p-3 text-center">
                                                <div class="icon icon-shape icon-lg bg-gradient-primary shadow rounded-circle">
                                                    <img class="text-center" style="margin-left: 8px; margin-top: 8px;" width="40px" height="40px" src="/assets/images/coordi.png">
                                                </div>
                                            </div>
                                            <div class="card-body pt-0 p-3">
                                                <h6 class="text-center mb-0">Profesores</h6>
                                                <a href="/teachers/create" class="text-xs"><i class="fas fa-user-plus opacity-10 ps-3 mx-lg-2"></i>Nuevo profesor</a>
                                                <br/>
                                                <a href="/teachers" class="text-xs"><i class="fas fa-chalkboard-teacher opacity-10 ps-3 mx-lg-2"></i>Ver profesores</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <div class="card-header mx-4 p-3 text-center">
                                            <div class="icon icon-shape icon-lg bg-gradient-primary shadow rounded-circle">
                                                <img class="text-center" style=" margin-top: 18px;" width="35px" height="30px" src="/assets/images/category.png">
                                            </div>
                                        </div>
                                        <div class="card-body pt-0 p-3 ">
                                            <h6 class="text-center mb-0">Cursos</h6>
                                            <a href="/classrooms/create" class="text-xs"><i class="fas fa-folder-plus opacity-10 ps-4 mx-lg-2"></i>Nuevo curso</a>
                                            <br/>
                                            <a href="/classrooms" class="text-xs"><i class="fas fa-folder opacity-10 ps-4 mx-lg-2"></i>Ver cursos</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <div class="card-header mx-4 p-3 text-center">
                                            <div class="icon icon-shape icon-lg bg-gradient-primary shadow rounded-circle">
                                                <img class="text-center" style=" margin-top: 14px;" width="28px" height="35px" src="/assets/images/student.png">
                                            </div>
                                        </div>
                                        <div class="card-body pt-0 p-3 ">
                                            <h6 class="text-center mb-0">Estudiantes</h6>
                                            <a href="/students/create" class="text-xs"><i class="fas fa-plus opacity-10 ps-4 mx-lg-2"></i>Nuevo estudiante</a>
                                            <br/>
                                            <a href="/students/all" class="text-xs"><i class="fas fa-child opacity-10 ps-4 mx-lg-2"></i>Ver estudiantes</a>
                                            <br/>
                                            <a href="/transfers" class="text-xs"><i class="ni ni-send opacity-10 ps-4 mx-lg-2"></i>Traslados de aula</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endhasrole
    @hasrole('Student')
        <div class="row">
            <img class="text-center img-responsive img-thumbnail" style="border-radius: 35px;" width="940px" height="300px" src="/assets/images/studentB.png">
            <div  class="col-12">
                <div class="card mb-1 p-4">
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <div class="card">
                                            <div class="card-header mx-4 p-3 text-center">
                                                <div class="icon icon-shape icon-lg bg-gradient-primary shadow rounded-circle">
                                                    <img class="text-center" style="margin-left: 1px; margin-top: 6px;" width="30px" height="43px" src="/assets/images/homew.png">
                                                </div>
                                            </div>
                                            <div class="card-body pt-0 p-3">
                                                <h6 class="text-center mb-0">Tareas</h6>
                                                <a href="/myHomeworks" class="text-xs"><i class="fas fa-book opacity-10 ps-3 mx-lg-2"></i>Mis tareas</a>
                                                <br/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <div class="card">
                                            <div class="card-header mx-4 p-3 text-center">
                                                <div class="icon icon-shape icon-lg bg-gradient-primary shadow rounded-circle">
                                                    <img class="text-center" style="margin-left: 2px; margin-top: 13px;" width="40px" height="35px" src="/assets/images/note.png">
                                                </div>
                                            </div>
                                            <div class="card-body pt-0 p-3">
                                                <h6 class="text-center mb-0">Calificaciones</h6>
                                                <a href="/scores" class="text-xs"><i class="fas fa-user-graduate opacity-10 ps-3 mx-lg-2"></i>Historial académico</a>
                                                <br/>
                                                <a href="/academicHistories/{{Auth::user()->id}}" class="text-xs"><i class="fas fa-heart opacity-10 ps-3 mx-lg-2"></i>Mis calificaciones</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <div class="card-header mx-4 p-3 text-center">
                                            <div class="icon icon-shape icon-lg bg-gradient-primary shadow rounded-circle">
                                                <img class="text-center" style=" margin-top: 18px;" width="35px" height="30px" src="/assets/images/category.png">
                                            </div>
                                        </div>
                                        <div class="card-body pt-0 p-3 ">
                                            <h6 class="text-center mb-0">Temas</h6>
                                            <a href="/myCategories" class="text-xs"><i class="fas fa-folder-plus opacity-10 ps-4 mx-lg-2"></i>Nuevo tema</a>
                                            <br/>
                                            <a href="/projects" class="text-xs"><i class="fas fa-folder opacity-10 ps-4 mx-lg-2"></i>Mis temas</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <div class="card-header mx-4 p-3 text-center">
                                            <div class="icon icon-shape icon-lg bg-gradient-primary shadow rounded-circle">
                                                <img class="text-center" style=" margin-top: 14px;" width="28px" height="35px" src="/assets/images/student.png">
                                            </div>
                                        </div>
                                        <div class="card-body pt-0 p-3 text-center ">
                                            <h6 class="text-center mb-0">Plan de estudios</h6>
                                            <a href="/showStudentSyllabus" class="text-xs"><i class="fas fa-compass opacity-10  mx-lg-2"></i>Mi plan de estudios</a>
                                            <br/>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endhasrole
    @hasrole('Teacher')
        <div class="row">
            <img class="text-center img-responsive img-thumbnail" style="border-radius: 35px;" width="940px" height="300px" src="/assets/images/teacherB.jpg">
            <div  class="col-12">
                <div class="card mb-1 p-4">
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <div class="card">
                                            <div class="card-header mx-4 p-3 text-center">
                                                <div class="icon icon-shape icon-lg bg-gradient-primary shadow rounded-circle">
                                                    <img class="text-center" style="margin-left: 2px; margin-top: 15px;" width="38px" height="33px" src="/assets/images/class.png">
                                                </div>
                                            </div>
                                            <div class="card-body pt-0 p-3">
                                                <h6 class="text-center mb-0">Cursos</h6>
                                                <a href="/classrooms" class="text-xs"><i class="fas fa-folder opacity-10 ps-3 mx-lg-2"></i>Mis cursos</a>
                                                <br/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <div class="card-header mx-4 p-3 text-center">
                                            <div class="icon icon-shape icon-lg bg-gradient-primary shadow rounded-circle">
                                                <img class="text-center" style=" margin-top: 18px;" width="35px" height="30px" src="/assets/images/category.png">
                                            </div>
                                        </div>
                                        <div class="card-body pt-0 p-3 ">
                                            <h6 class="text-center mb-0">Temas</h6>
                                            <a href="/myCategories" class="text-xs"><i class="fas fa-folder-plus opacity-10 ps-4 mx-lg-2"></i>Nuevo temas</a>
                                            <br/>
                                            <a href="/projects" class="text-xs"><i class="fas fa-folder opacity-10 ps-4 mx-lg-2"></i>Mis temas</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <div class="card-header mx-4 p-3 text-center">
                                            <div class="icon icon-shape icon-lg bg-gradient-primary shadow rounded-circle">
                                                <img class="text-center" style=" margin-top: 14px;" width="28px" height="35px" src="/assets/images/student.png">
                                            </div>
                                        </div>
                                        <div class="card-body pt-0 p-3 ">
                                            <h6 class="text-center mb-0">Estudiantes</h6>
                                            <a href="/students/all" class="text-xs"><i class="fas fa-child opacity-10 ps-4 mx-lg-2"></i>Mis estudiantes</a>
                                            <br/>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endhasrole
@endsection
