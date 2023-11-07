@extends('layouts.dashboard')
@section('content')
    @if(Session::has('StoreSyllabusError'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('StoreSyllabusError') }}
        </div>
    @endif
    @if(Session::has('SyllabusExists'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('SyllabusExists') }}
        </div>
    @endif
    <div class="card">
        <div class="accordion-1">
        <div class="container">
            <div class="row my-5">
                <div class="col-md-6 mx-auto text-center">
                    <h6>Crear plan de estudios</h6>
                </div>
            </div>
          <form method="POST" action="/syllabus/store" id="form-store">
            @csrf
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="accordion" id="accordionRental">
                        @foreach ($categories as $category)
                        <div class="accordion-item mb-3">
                            <h5 class="accordion-header" id="headingOne">
                                <button class="accordion-button border-bottom font-weight-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCat{{$category->id}}" aria-expanded="false" aria-controls="collapseCat{{$category->id}}">
                                    {{$category->name}}
                                    <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                    <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                </button>
                            </h5>
                            <div id="collapseCat{{$category->id}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionSyllabuses" style="">
                                <div class="accordion-body text-sm opacity-8">
                                    @foreach ($subcategories as $subcategory)
                                        @if ($subcategory->category_id == $category->id)
                                            <div >
                                                <a href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#collapseSub{{$subcategory->id}}" aria-expanded="true" aria-controls="collapseSub{{$subcategory->id}}" id="accordionSub">
                                                    <p class="text-black text-bold">{{$subcategory->name}}</p>
                                                <!--<img class="img-responsive" style="width:200px; height:150px; border-radius: 20px; box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;"  src="https://miel.robotschool.co/{{$subcategory->icon_url}}" onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';">-->
                                                </a>
                                            </div>
                                            <div id="collapseSub{{$subcategory->id}}" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionSub">
                                               <div class="row">
                                                <div class="col-md-2 accordion-body"></div>
                                                <div class="col-md-4 accordion-body">
                                                    <p class="text-center text-black text-bold">Temas:</p>
                                                    @foreach ($projects as $project)
                                                        @if ($project->subcategory_id == $subcategory->id && $project->theme_type == 'theme' && $project->is_enable == 1)
                                                            <div>
                                                                <a href="/detailProject/{{$project->id}}" target="_blank"><p class="text-center text-black">{{$project->name}}</p></a>
                                                                <label class="checkeable">
                                                                    <input type="checkbox" name="projectCheck[]" id="projectCheck{{$project->id}}" value="{{$project->id}}" onclick="getIDS({{$project->id}})">
                                                                    <img class="img-fluid img-thumbnail" style="height: auto; width: 100%;" src="https://miel.robotschool.co/{{$project->icon_url}}" onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';">
                                                                </label>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div style="" class="col-md-4 accordion-body">
                                                    <p class="text-center text-black text-bold">Proyectos:</p>
                                                    @foreach ($projects as $project)
                                                        @if ($project->subcategory_id == $subcategory->id && $project->theme_type == 'project' && $project->is_enable == 1)
                                                            <div>
                                                                <a href="/detailProject/{{$project->id}}" target="_blank"><p class="text-center text-black">{{$project->name}}</p></a>
                                                                <label class="checkeable">
                                                                    <input type="checkbox" name="projectCheck[]" id="projectCheck{{$project->id}}" value="{{$project->id}}" onclick="getIDS({{$project->id}})">
                                                                    <img class="img-fluid img-thumbnail" style="height: auto; width: 100%;"  src="https://miel.robotschool.co/{{$project->icon_url}}" onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';">
                                                                </label>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                               </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
          <div class="text-center">
              <input type="hidden" name="classroom_id" value="{{$classroom_id}}">
              <input type="submit" style="width:120px;" class="btn btn-primary  rounded-circle" value="Crear">
          </div>
          </form>
        </div>
    </div>
    </div>
    <script type="text/javascript">
    </script>
@endsection
