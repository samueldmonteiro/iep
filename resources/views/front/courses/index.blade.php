@extends('front.master')

@push('styles')
    @vite('resources/styles/courses_styles.css')
    @vite('resources/styles/courses_responsive.css')
@endpush


@section('content')
<!-- Home -->
<style>
    @media (min-width:700px){
    .popular {
        margin-top: -10px;
    }
}

</style>
<div class="home">
    <div class="home_background_container prlx_parent">
        <div class="home_background prlx" style="background-image:url({{Vite::asset('resources/images/courses_background.jpg')}})"></div>
    </div>
    <div class="home_content">
        <h1>Cursos</h1>
    </div>
</div>

<!-- Popular -->

<div class="search_container">
    <form action="{{route('courses.index')}}" method="GET">
        <span>Polo:</span>
        <select name="polo">
            @foreach($polos as $polo)
                <option <?php echo ($polo->name == $p_value) ? 'selected' : ''; ?> value="{{$polo->name}}">{{$polo->name}}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-success">Filtrar</button>
    </form>
</div>
<div class="popular page_section">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h1>Nossos Cursos</h1>
                </div>
            </div>
        </div>

        <div class="row course_boxes">

            <!-- Popular Course Item -->
        @foreach($courses as $course)
           <x-course-item :course="$course"/>
        @endforeach
           

           
        </div>
    </div>
</div>

@endsection