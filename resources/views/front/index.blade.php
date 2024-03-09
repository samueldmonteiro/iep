@extends('front.master')


@section('content')
        <!-- Home -->

        <div class="home">

            <!-- Hero Slider -->
            <div class="hero_slider_container">
                <div class="hero_slider owl-carousel">

                    <!-- Hero Slide -->
                    <div class="hero_slide">
                        <div class="hero_slide_background" style="background-image:url({{Vite::asset('resources/images/slider_background.jpg')}})">
                        </div>
                        <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                            <div class="hero_slide_content text-center">
                                <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">O Melhor
                                    <span>Ensino</span> da Região!</h1>
                            </div>
                        </div>
                    </div>

                    <!-- Hero Slide -->
                    <div class="hero_slide">
                        <div class="hero_slide_background" style="background-image:url({{Vite::asset('resources/images/slider_background.jpg')}})">
                        </div>
                        <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                            <div class="hero_slide_content text-center">
                                <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Seu 
                                    <span>Futuro</span> garantido com a IEP!</h1>
                            </div>
                        </div>
                    </div>

                </div>

              
            </div>

        </div>

        <div class="hero_boxes">
            <div class="hero_boxes_inner">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-4 hero_box_col">
                            <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                                <img src="{{Vite::asset('resources/images/earth-globe.svg')}}" class="svg" alt="">
                                <div class="hero_box_content">
                                    <h2 class="hero_box_title">Melhores Cursos</h2>
                                    <a href="{{route('courses.index')}}" class="hero_box_link">Ver Todos</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 hero_box_col">
                            <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                                <img src="{{Vite::asset('resources/images/books.svg')}}" class="svg" alt="">
                                <div class="hero_box_content">
                                    <h2 class="hero_box_title">Certificado de Conclusão</h2>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 hero_box_col">
                            <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                                <img src="{{Vite::asset('resources/images/professor.svg')}}" class="svg" alt="">
                                <div class="hero_box_content">
                                    <h2 class="hero_box_title">Professors Capacitados</h2>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Popular -->

        <div class="popular page_section">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section_title text-center">
                            <h1>Cursos Populares</h1>
                        </div>
                    </div>
                </div>

                <div class="row course_boxes">

                @foreach($courses as $course)
                    <!-- Popular Course Item -->
                  <x-course-item :course="$course"/>
                @endforeach    
                   
                </div>
            </div>
        </div>

        <!-- Register -->

        <div class="register">

            <div class="container-fluid">

                <div class="row row-eq-height">
                    <div class="col-lg-6 nopadding">

                        <!-- Register -->

                        <div class="register_section d-flex flex-column align-items-center justify-content-center">
                            <div class="register_content text-center">
                                <h1 class="register_title">Faça parte do maior Instituto Profissionaliante da Baixada Maranhense! </h1>
                                <p class="register_text">Descubra seu potencial aqui, onde a excelência acadêmica se encontra com uma didática inovadora. Oferecemos cursos técnicos, graduados e pós-graduados, proporcionando uma experiência educacional de qualidade. Venha moldar seu futuro conosco e trilhe o caminho para o sucesso profissional na IEP.
                                <div class="button button_1 register_button mx-auto trans_200"><a
                                        href="{{route('courses.index')}}">Ver Cursos</a></div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6 nopadding">

                        <!-- Search -->

                        <div class="search_section d-flex flex-column align-items-center justify-content-center">
                            <div class="search_background"
                                style="background-image:url({{Vite::asset('resources/images/search_background.jpg')}});"></div>
                            <div class="search_content text-center">
                                <h1 class="search_title">Buscar por um Curso</h1>


                                <form action="{{route('courses.index')}}" id="search_form" class="search_form" action="post">
                                    <select name="polo" class="input_field search_form_category">
                                        @foreach($polos as $polo)
                                    <option value="{{$polo->name}}">{{$polo->name}}</option>
                                        @endforeach
                                    </select>
                                   
                                    <button id="search_submit_button" type="submit"
                                        class="search_submit_button trans_200" value="Submit">Pesquisar</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="educa-mais">
            <img src="{{Vite::asset('resources/images/9c9bb65a-f171-4dac-abe7-c2736e104eda.jpg')}}" alt="">
        </div>
        <div class="educa-mais-pc">
            <img src="{{Vite::asset('resources/images/4db1b421-85c9-4e20-84c4-6909039eb97a.jpg')}}" alt="">
        </div>
        <!-- Services -->

        <div class="services page_section">

            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section_title text-center">
                            <h1>Formações</h1>
                        </div>
                    </div>
                </div>

                <div class="row services_row">

                    <div
                        class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
                        <div class="icon_container d-flex flex-column justify-content-end">
                            <img src="{{Vite::asset('resources/images/earth-globe.svg')}}" alt="">
                        </div>
                        <h3>Técnico</h3>
                        <p>Cursos Técnicos que proporcionam uma sólida formação prática e teórica. Nossos programas são desenvolvidos para preparar os estudantes para o mercado de trabalho.</p>
                    </div>

                    <div
                        class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
                        <div class="icon_container d-flex flex-column justify-content-end">
                            <img src="{{Vite::asset('resources/images/exam.svg')}}" alt="">
                        </div>
                        <h3>Graduação</h3>
                        <p>Nossos cursos de graduação oferecem uma experiência acadêmica enriquecedora. Com um corpo docente qualificado e uma abordagem educacional inovadora.</p>
                    </div>

                    <div
                        class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
                        <div class="icon_container d-flex flex-column justify-content-end">
                            <img src="{{Vite::asset('resources/images/books.svg')}}" alt="">
                        </div>
                        <h3>Pós-Graduação</h3>
                        <p>Para aqueles que buscam aprimorar suas habilidades e se destacar ainda mais, nossos programas de pós-graduação oferecem oportunidades excepcionais, onde os alunos podem aprofundar seus conhecimentos e se destacar em seus campos de atuação.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="testimonials page_section slide_images" style="background:white;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="testimonials_slider_container">
                            <div class="owl-carousel owl-theme testimonials_slider">
                                <div class="owl-item">
                                    <img src="{{Vite::asset('resources/images/db7af19a-6e64-4f26-9fa5-21022ebabc4d.jpg')}}" alt="">
                                </div>
                                <div class="owl-item">
                                    <img src="{{Vite::asset('resources/images/7699c613-30f3-4adf-842b-ad30a54b5d30.jpg')}}" alt="">
                                </div>

                                <div class="owl-item">
                                    <img src="{{Vite::asset('resources/images/a3eee415-571b-4708-9ff1-7b1c225c848b.jpg')}}" alt="">
                                </div>

                                
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="testimonials page_section">
            <!-- <div class="testimonials_background" style="background-image:url(images/testimonials_background.jpg)"></div> -->
            <div class="testimonials_background_container prlx_parent">
                <div class="testimonials_background prlx"
                    style="background-image:url({{Vite::asset('resources/images/testimonials_background.jpg')}})"></div>
            </div>
            <div class="container">

                <div class="row">
                    <div class="col">
                        <div class="section_title text-center">
                            <h1>Depoimentos de Alunos</h1>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-10 offset-lg-1">

                        <div class="testimonials_slider_container">

                            <!-- Testimonials Slider -->
                            <div class="owl-carousel owl-theme testimonials_slider">

                                <!-- Testimonials Item -->
                                <div class="owl-item">
                                    <div class="testimonials_item text-center">
                                        <div class="quote">“</div>
                                        <p class="testimonials_text">É com imensa satisfação que compartilho meu depoimento sobre a Instituição de Ensino IEP, uma verdadeira fonte de inspiração e crescimento acadêmico. Desde que ingressei nesta instituição, tenho vivenciado uma jornada educacional enriquecedora que ultrapassou todas as minhas expectativas.</p>
                                        <div class="testimonial_user">
                                            <div class="testimonial_image mx-auto">
                                                <img src="{{Vite::asset('resources/images/testimonials_user.jpg')}}" alt="">
                                            </div>
                                            <div class="testimonial_name">Ana Vitória</div>
                                            <div class="testimonial_title">Estudante</div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Events -->
        

        <div class="events page_section">
            <div class="container">

                <div class="row">
                    <div class="col">
                        <div class="section_title text-center">
                            <h1>Nossos Polos</h1>
                        </div>
                    </div>
                </div>

                <div class="event_items">

                @foreach($polos as $polo)
                    <div class="row event_item">
                        <div class="col">
                            <div class="row d-flex flex-row align-items-end">

                                <div class="col-lg-2 order-lg-1 order-2">
                                    <div
                                        class="event_date d-flex flex-column align-items-center justify-content-center">
                                        <div class="event_day">{{$polo->acronym}}</div>
                                        <div class="event_month">MA</div>
                                    </div>
                                </div>

                                <div class="col-lg-6 order-lg-2 order-3">
                                    <div class="event_content">
                                        <div class="event_name"><a class="trans_200" href="#">Polo IEP {{$polo->name}}</a></div>
                                        <div class="event_location"></div>
                                        <p>{{$polo->address}}</p>
                                    </div>
                                </div>

                                <div class="col-lg-4 order-lg-3 order-1">
                                    <div class="event_image">
                                        <img src="{{Storage::url($polo->image)}}" alt="https://unsplash.com/@theunsteady5">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
                    <!-- Event Item -->
                </div>

            </div>
        </div>

        <!-- Footer -->
                @endsection