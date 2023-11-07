<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Miel - ROBOTSchool
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet">
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="/assets/css/nucleo-svg.css" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="/assets/css/argon-dashboard.css?v=2.0.2" rel="stylesheet">
    <!-- Datatable CSS
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css"/>-->

    <!-- BOOTSTRAP TOOGLE -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/assets/Magnific-Popup-master/dist/magnific-popup.css" />
    <!--BOOTSTRAP SELECT CSS-->
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/css/bootstrap-select.min.css">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
    <!--Highcharts-->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <style>
        .checkeable input {
            display: none;
        }
        .checkeable img {
            width: 100px;
            border: 5px solid transparent;
        }
        .checkeable input {
            display: none;
        }
        .checkeable input:checked  + img {
            border-color: blue;
        }
    </style>
</head>
<body class="g-sidenav-show  bg-gray-100" style="font-family: 'Century Gothic';">
<div class="min-height-300 bg-primary position-absolute w-100"></div>

<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="/home">
            <img style="margin-top:5px; margin-left: 10px;" width="150px" height="150px" class="align-middle ps-3" src="{{getenv('LOGO')}}" alt="logo"><span class="logo-text"></span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @hasrole('Administrator')
            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-1"  aria-controls="submenu-1">
                                    <span class="nav-icon">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						        <i style="width:30px" class="fas fa-school"></i>
						         </span>
                    <span class="nav-link-text ms-1">Colegios</span>

                </a><!--//nav-link-->
                <div id="submenu-1" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
                    <ul class="submenu-list list-unstyled">
                        <li class="ms-1 ps-6"><a class="submenu-link text-xs" href="/schools/create">Crear colegio</a></li>
                        <li class="ms-1 ps-6"><a class="submenu-link text-xs" href="/schools">Ver colegios</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-9" aria-expanded="false" aria-controls="submenu-2">
						        <span class="nav-icon">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						        <i style="width:30px" class="fas fa-user-tie"></i>
						         </span>
                    <span class="nav-link-text">Administradores</span>
                </a>
                <div id="submenu-9" class="collapse " data-bs-parent="#menu-accordion">
                    <ul class="submenu-list list-unstyled">
                        <li class="ms-1 ps-6"><a class="submenu-link text-xs" href="/administrators/create">Crear administrador</a></li>
                        <li class="ms-1 ps-6"><a class="submenu-link text-xs" href="/administrators">Ver administradores</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-2" aria-expanded="false" aria-controls="submenu-2">
						        <span class="nav-icon">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						        <i style="width:30px" class="fas fa-user-tie"></i>
						         </span>
                    <span class="nav-link-text">Coordinadores</span>
                </a>
                <div id="submenu-2" class="collapse " data-bs-parent="#menu-accordion">
                    <ul class="submenu-list list-unstyled">
                        <li class="ms-1 ps-6"><a class="submenu-link text-xs" href="/coordinators/create">Crear coordinador</a></li>
                        <li class="ms-1 ps-6"><a class="submenu-link text-xs" href="/coordinators">Ver coordinadores</a></li>
                        <li class="ms-1 ps-6"><a class="submenu-link text-xs" href="/chooseUserList?id=cor">Importar coordinadores</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-3" aria-expanded="false" aria-controls="submenu-3">
						        <span class="nav-icon">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						        <i style="width:30px" class="fas fa-folder"></i>
						         </span>
                    <span class="nav-link-text">Categorías</span>
                    <span class="submenu-arrow">
	                             </span><!--//submenu-arrow-->
                </a><!--//nav-link-->
                <div id="submenu-3" class="collapse submenu submenu-3" data-bs-parent="#menu-accordion">
                    <ul class="submenu-list list-unstyled">
                        <li class="ms-1 ps-6"><a class="submenu-link text-xs" href="/categories/create">Crear categoría</a></li>
                        <li class="ms-1 ps-6"><a class="submenu-link text-xs" href="/categories">Ver categorías</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-4" aria-expanded="false" aria-controls="submenu-4">
						        <span class="nav-icon">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						        <i style="width:30px" class="fas fa-file-alt"></i>
						         </span>
                    <span class="nav-link-text">Temas</span>
                </a><!--//nav-link-->
                <div id="submenu-4" class="collapse submenu submenu-4" data-bs-parent="#menu-accordion">
                    <ul class="submenu-list list-unstyled">
                        <li class="ms-1 ps-6"><a class="submenu-link text-xs" href="/myCategories">Crear tema</a></li>
                        <li class="ms-1 ps-6"><a class="submenu-link text-xs" href="/projects?id=all">Ver temas</a></li>
                        <li class="ms-1 ps-6"><a class="submenu-link text-xs" href="/projects">Mis temas</a></li>
                    </ul>
                </div>
            </li>
            <!--
            <li class="nav-item">
                <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-5" aria-expanded="false" aria-controls="submenu-5">
						        <span class="nav-icon">
						         <i style="width:30px" class="fas fa-file-upload"></i>
						         </span>
                    <span class="nav-link-text">Importar</span>
                </a>
                <div id="submenu-5" class="collapse submenu submenu-5" data-bs-parent="#menu-accordion">
                    <ul class="submenu-list list-unstyled">
                        <li class="ms-1 ps-6"><a class="submenu-link text-xs" href="/chooseUserList">Importar usuarios</a></li>
                    </ul>
                </div>
            </li>
            -->
            @endhasrole
            @hasrole('Coordinator')

            <li class="nav-item">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="false" aria-controls="submenu-1">
					<span class="nav-icon">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					    <i style="width:30px" class="fas fa-chalkboard-teacher"></i>
                    </span>
                    <span class="nav-link-text">Profesores</span>
                </a><!--//nav-link-->
                <div id="submenu-1" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
                    <ul class="submenu-list list-unstyled">
                        <li class="ms-1 ps-6"><a class="submenu-link text-xs" href="/teachers/create">Crear profesor</a></li>
                        <li class="ms-1 ps-6"><a class="submenu-link text-xs" href="/teachers">Ver profesores</a></li>
                        <li class="ms-1 ps-6"><a class="submenu-link text-xs" href="/chooseUserList?id=teach">Importar profesores</a></li>

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-3" aria-expanded="false" aria-controls="submenu-3">
						        <span class="nav-icon">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                    <i style="width:30px" class="fas fa-child"></i>
						         </span>
                    <span class="nav-link-text">Estudiantes</span>
                </a><!--//nav-link-->
                <div id="submenu-3" class="collapse submenu submenu-3" data-bs-parent="#menu-accordion">
                    <ul class="submenu-list list-unstyled">
                        <li class="ms-1 ps-6"><a class="submenu-link text-xs" href="/students/create">Crear estudiante</a></li>
                        <li class="ms-1 ps-6"><a class="submenu-link text-xs" href="/students/all">Ver estudiantes</a></li>
                        <li class="ms-1 ps-6"><a class="submenu-link text-xs" href="/transfers">Traslados de aula</a></li>
                        <li class="ms-1 ps-6"><a class="submenu-link text-xs" href="/chooseUserList?id=stu">Importar estudiantes</a></li>

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-2" aria-expanded="false" aria-controls="submenu-2">
						        <span class="nav-icon">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                    <i style="width:30px" class="fas fa-book-open"></i>
						         </span>
                    <span class="nav-link-text">Cursos</span>
                </a><!--//nav-link-->
                <div id="submenu-2" class="collapse submenu submenu-2" data-bs-parent="#menu-accordion">
                    <ul class="submenu-list list-unstyled">
                        <li class="ms-1 ps-6"><a class="submenu-link text-xs" href="/classrooms/create">Crear curso</a></li>
                        <li class="ms-1 ps-6"><a class="submenu-link text-xs" href="/classrooms">Ver cursos</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-4" aria-expanded="false" aria-controls="submenu-4">
						        <span class="nav-icon">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                    <i style="width:30px" class="fas fa-chart-pie"></i>
						         </span>
                    <span class="nav-link-text">Estadísticas</span>
                </a><!--//nav-link-->
                <div id="submenu-4" class="collapse submenu submenu-4" data-bs-parent="#menu-accordion">
                    <ul class="submenu-list list-unstyled">
                        <li class="ms-1 ps-6"><a class="submenu-link text-xs" href="{{route('statistics.index')}}">Ver estadísticas</a></li>
                    </ul>
                </div>
            </li>
            <!--
            <li class="nav-item">
                <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-5" aria-expanded="false" aria-controls="submenu-5">
						        <span class="nav-icon">
						         <i style="width:30px" class="fas fa-file-upload"></i>
						         </span>
                    <span class="nav-link-text">Importar</span>
                </a>
                <div id="submenu-5" class="collapse submenu submenu-5" data-bs-parent="#menu-accordion">
                    <ul class="submenu-list list-unstyled">
                        <li class="ms-1 ps-6"><a class="submenu-link text-xs" href="/chooseUserList">Importar usuarios</a></li>
                    </ul>
                </div>
            </li>
            -->
            @endhasrole
            @hasrole('Teacher')
            <li class="nav-item ">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <a class="nav-link " href="/classrooms" >
						        <span class="nav-icon">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                    <i style="width:30px" class="fas fa-book-open"></i>
						         </span>
                    <span class="nav-link-text ms-1" >Mis cursos</span>
                </a><!--//nav-link-->

            </li>
            <li class="nav-item ">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <a class="nav-link " href="/students/all" >
						        <span class="nav-icon">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                    <i style="width:30px" class="fas fa-child"></i>
						         </span>
                    <span class="nav-link-text ms-1" >Mis estudiantes</span>
                </a><!--//nav-link-->

            </li>
            <li class="nav-item has-submenu">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <a class="nav-link " href="#" data-bs-toggle="collapse" data-bs-target="#submenu-3" aria-expanded="false" aria-controls="submenu-3">
						        <span class="nav-icon">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						        <i style="width:30px" class="fas fa-file-alt"></i>
						         </span>
                    <span class="nav-link-text">Temas</span>
                </a><!--//nav-link-->
                <div id="submenu-3" class="collapse submenu submenu-3" data-bs-parent="#menu-accordion">
                    <ul class="submenu-list list-unstyled">
                        <li class="ms-1 ps-6"><a class="submenu-link text-xs" href="/myCategories">Crear tema</a></li>
                        <li class="ms-1 ps-6"><a class="submenu-link text-xs" href="/projects">Mis temas</a></li>
                    </ul>
                </div>
            </li>
            <!--
                    <li class="nav-item">

                        <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-2" aria-expanded="false" aria-controls="submenu-2">
						        <span class="nav-icon">

                                    <i style="width:30px" class="fas fa-tasks"></i>
						         </span>
                            <span class="nav-link-text">Tareas</span>
                        </a>
                        <div id="submenu-2" class="collapse submenu submenu-2" data-bs-parent="#menu-accordion">
                            <ul class="submenu-list list-unstyled">
                                <li class="ms-1 ps-6"><a class="submenu-link" href="/homeworks/all">Ver tareas</a></li>
                            </ul>
                        </div>
                    </li>-->
            @endhasrole
            @hasrole('Student')
            <li class="nav-item ">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <a class="nav-link " href="/myHomeworks" >
						        <span class="nav-icon">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                    <i style="width:30px" class="fas fa-book"></i>
						         </span>
                    <span class="nav-link-text ms-1" >Mis tareas</span>
                </a><!--//nav-link-->
            </li>
            <li class="nav-item ">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-2" aria-expanded="false" aria-controls="submenu-2">
						        <span class="nav-icon">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                    <i style="width:30px" class="fas fa-star-half-alt"></i>
						         </span>
                    <span class="nav-link-text">Calificaciones</span>
                </a><!--//nav-link-->
                <div id="submenu-2" class="collapse submenu submenu-2" data-bs-parent="#menu-accordion">
                    <ul class="submenu-list list-unstyled">
                        <li class="ms-1 ps-6"><a class="submenu-link text-xs" href="/scores">Ver mis calificaciones</a></li>
                        <li class="ms-1 ps-6"><a class="submenu-link  text-xs" href="/academicHistories/{{Auth::user()->id}}">Historial académico</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-3" aria-expanded="false" aria-controls="submenu-3">
						        <span class="nav-icon">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						        <i style="width:30px" class="fas fa-file-alt"></i>
						         </span>
                    <span class="nav-link-text">Temas</span>
                </a>
                <div id="submenu-3" class="collapse submenu submenu-3" data-bs-parent="#menu-accordion">
                    <ul class="submenu-list list-unstyled">
                        <li class="ms-1 ps-6"><a class="submenu-link text-xs" href="/myCategories">Crear tema</a></li>
                        <li class="ms-1 ps-6"><a class="submenu-link text-xs" href="/projects?id=syllabus   ">Temas de sillabus</a></li>
                        <li class="ms-1 ps-6"><a class="submenu-link text-xs" href="/projects">Mis temas</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <a class="nav-link " href="/showStudentSyllabus">
						        <span class="nav-icon">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                    <i style="width:30px" class="fas fa-child"></i>
						         </span>
                    <span class="nav-link-text ms-1" >Ver mi plan de estudios</span>
                </a><!--//nav-link-->
            </li>
            <li class="nav-item ">
            @endhasrole
        </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
        <div class="card card-plain shadow-none" id="sidenavCard">
            <!--old logo: /assets/images/robotschool-logo.png"-->
            <!--<img class="w-50 mx-auto" src="{{getenv('LOGO')}}" alt="logo">-->
            <div class="card-body text-center p-3 w-100 pt-0">
                <div class="docs-info">
                    <h6 class="mb-0"></h6>
                    <p class="text-xs font-weight-bold mb-0"></p>
                </div>
            </div>
        </div>
        <a href="/changePassword" target="_blank" class="btn btn-dark btn-sm w-100  mb-3">Cambiar contraseña </a>
        <a class="btn btn-primary btn-sm mb-0 w-100" href="{{ route('logout') }}" type="button" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">Cerrar sesión</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
    <div class="sidenav-footer p-3 text-center">
        <p style="margin-top: 15px;">
            @if(Auth::user()->role == 'Administrator')
                <p class="text-xs text-dack text-center"><i style="width:30px" class="fas fa-user"></i>Administrador</p>
            @endif
            @if(Auth::user()->role == 'Coordinator')
                <p class="text-xs text-dack text-center"><i style="width:30px" class="fas fa-user"></i>Coordinador</p>
            @endif
            @if(Auth::user()->role == 'Teacher')
                <p class="text-xs text-dack text-center"><i style="width:30px" class="fas fa-user"></i>Profesor</p>
            @endif
            @if(Auth::user()->role == 'Student')
                <p class="text-xs text-dack text-center"><i style="width:30px" class="fas fa-user"></i>Estudiante</p>
            @endif
        </p>
        <p class="text-sm text-bold text-dack ps-2" style="margin-top: -15px;"> {{ Auth::user()->name}}</p>
    </div>
</aside>
<main class="main-content position-relative border-radius-lg ">
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="#sidenav-main;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                        </div>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer pt-2">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
              <div class="col-12">
                  <div class="card mb-1 text-center">
                      <div class="jumbotron jumbotron-fluid">
                          <div class="container">
                              <!--old logo: /assets/images/robotschool-logo.png-->
                              <img class="text-center img-responsive img-thumbnail" src="{{getenv('LOGO')}}">
                          </div>
                      </div>
                  </div>
              </div>
            </div>
        </div>
    </footer>
</main>



<!-- Javascript -->
<script src="/assets/js/core/popper.min.js"></script>
<script src="/assets/js/core/bootstrap.min.js"></script>
<script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="/assets/js/plugins/chartjs.min.js"></script>
<script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
        type: "line",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Mobile apps",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "#5e72e4",
                backgroundColor: gradientStroke1,
                borderWidth: 3,
                fill: true,
                data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                maxBarThickness: 6

            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        padding: 10,
                        color: '#fbfbfb',
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#ccc',
                        padding: 20,
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });
</script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="/assets/js/argon-dashboard.min.js?v=2.0.2"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!--Datatables

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable( {
            "language": {
                "lengthMenu": " Mostar _MENU_ registros por página",
                "zeroRecords": "Nada encontrado - disculpa  ",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search" : "Buscar:",
                "paginate" : {
                    "next" : "Siguiente",
                    "previous": "Anterior"

                }
            },
            "bDestroy": true,
            responsive: true,
            "aaSorting": []
        } );
    } );
</script>-->
<script src="/assets/Magnific-Popup-master/dist/jquery.magnific-popup.js"></script>
<script>
    $('.magnific').magnificPopup({
        type: 'image'
    });
</script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
    $(function() {
        $('#toggle-two').bootstrapToggle({
            on: 'Habilitado',
            off: 'Deshabilitado'
        });
    })
</script>
<script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'projectDesc' );
</script>
<!--BOOTSTRAP SELECT JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.5/cjs/enums.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
<script>
    $(document).ready(function() {
        $('.my-select').selectpicker();
    });
</script>

</body>
</html>

