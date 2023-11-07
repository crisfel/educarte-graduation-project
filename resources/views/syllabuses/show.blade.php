<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<div style="display:block; width: 85%; margin: 0px auto;">
    <p style="text-align:center; font-size:40px; font-weight:bold; font-style: italic; color: #449CD5;">Plan de estudios para {{$classroom->name}}</p>
    <br>
    <br>
    @foreach ($subcategories as $subcategory)
        <div>
            <p style="font-size:30px; font-weight:bold; font-style: italic; color: red;">Subcategoría: {{$subcategory->name}}</p>
            @foreach ($syllabus as $value)
                @if ($value->project->subcategory_id == $subcategory->id && $value->project->theme_type == 'theme')
                    <p style="font-size:25px; font-weight:bold; font-style: italic; color: darkgreen;">Temas:</p>
                    @break
                @endif
            @endforeach
            <ul>
                @foreach ($syllabus as $value)
                    @if ($value->project->subcategory_id == $subcategory->id && $value->project->theme_type == 'theme')
                        <li><p style="font-size:20px; font-weight:bold; font-style: italic;">{{$value->project->name}}</p></li>
                    @endif
                @endforeach
            </ul>
            @foreach ($syllabus as $value)
                @if ($value->project->subcategory_id == $subcategory->id && $value->project->theme_type == 'project')
                    <p style="font-size:25px; font-weight:bold; font-style: italic; color: darkgreen;">Proyectos:</p>
                    @break
                @endif
            @endforeach
            <ul>
                @foreach ($syllabus as $value)
                    @if ($value->project->subcategory_id == $subcategory->id && $value->project->theme_type == 'project')
                        <li><p style="font-size:20px; font-weight:bold; font-style: italic;">{{$value->project->name}}</p></li>
                    @endif
                @endforeach
            </ul>


        </div>
    @endforeach


</div>
</body>
</html>
