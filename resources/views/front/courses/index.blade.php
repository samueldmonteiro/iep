@extends('front.master')

@push('styles')
    @vite('resources/styles/courses_styles.css')
    @vite('resources/styles/courses_responsive.css')
@endpush


@section('content')
<!-- Home -->

<div class="home">
    <div class="home_background_container prlx_parent">
        <div class="home_background prlx" style="background-image:url({{Vite::asset('resources/images/courses_background.jpg')}})"></div>
    </div>
    <div class="home_content">
        <h1>Cursos</h1>
    </div>
</div>

<!-- Popular -->

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
        @foreach($courses as $c)
            <div class="col-lg-4 course_box">

                <a class="card" href='{{route('courses.show', ['course'=>$c->slug])}}'>
                    <img class="card-img-top" src="{{Storage::url($c->image)}}" alt="https://unsplash.com/@kellybrito">
                    <div class="card-body text-center">
                        <div class="card-title"><a href="{{route('courses.show', ['course'=>$c->slug])}}">{{$c->title}}</a></div>
                        <div class="card-text">{{$c->mini_description}}</div>
                    </div>
                    <div class="price_box d-flex flex-row align-items-center">
                        <div class="course_author_image">
                            <img src="{{Vite::asset('resources/images/author.jpg')}}" alt="https://unsplash.com/@mehdizadeh">
                        </div>
                        <div class="course_author_name">Michael Smith, <span>Author</span></div>
                        <div class="course_price d-flex flex-column align-items-center justify-content-center">
                            <span>$29</span></div>
                    </div>
                </a>
            </div>
        @endforeach
           

           
        </div>
    </div>
</div>

@endsection