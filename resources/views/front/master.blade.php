<!DOCTYPE html>
<html lang="en">

<head>
    <title>Course</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Course Project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @vite('resources/styles/app.scss')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite('resources/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')
    @vite('resources/plugins/OwlCarousel2-2.2.1/owl.carousel.css')
    @vite('resources/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')
    @vite('resources/plugins/OwlCarousel2-2.2.1/animate.css')
    @vite('resources/styles/main_styles.css')
    @vite('resources/styles/responsive.css')
    @stack('styles')
</head>

<body>

    <div class="super_container">

        <!-- Header -->

        <header class="header d-flex flex-row">
            <div class="header_content d-flex flex-row align-items-center">
                <!-- Logo -->
                <div class="logo_container">
                    <a class="logo" href="{{route('front.index')}}">
                        <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="">
                    </a>
                </div>

                <!-- Main Navigation -->
                <nav class="main_nav_container">
                    <div class="main_nav">
                        <ul class="main_nav_list">
                            <li class="main_nav_item"><a href="#">home</a></li>
                            <li class="main_nav_item"><a href="{{route('courses.index')}}">Cursos</a></li>
                            <li class="main_nav_item"><a href="#">Sobre Nós</a></li>
                            <!-- Example single danger button -->
                            {{-- <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                </ul>
                            </div> --}}
                            <li class="main_nav_item"><a href="#">Contato</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="header_side d-flex flex-row justify-content-center align-items-center">
                <a href="https://wa.me//5598981282556?text=Ol%C3%A1%2C%20Estou%20interessado%20em%20ser%20um%20Aluno%28a%29%20%20IEP">
                <img src="{{ Vite::asset('resources/images/phone-call.svg') }}" alt="">
                <span>+5598981282556</span>
                </a>
            </div>

            <!-- Hamburger -->
            <div class="hamburger_container">
                <i class="fas fa-bars trans_200"></i>
            </div>

        </header>

        <!-- Menu -->
        <div class="menu_container menu_mm">

            <!-- Menu Close Button -->
            <div class="menu_close_container">
                <div class="menu_close"></div>
            </div>

            <!-- Menu Items -->
            <div class="menu_inner menu_mm">
                <div class="menu menu_mm">
                    <ul class="menu_list menu_mm">
                        <li class="menu_item menu_mm"><a href="#">Home</a></li>
                        <li class="menu_item menu_mm"><a href="#">Sobre Nós</a></li>
                        <li class="menu_item menu_mm"><a href="{{route('courses.index')}}">Cursos</a></li>
                        <li class="menu_item menu_mm"><a href="contact.html">Contato</a></li>
                    </ul>

                    <!-- Menu Social -->

                    <div class="menu_social_container menu_mm">
                        <ul class="menu_social menu_mm">
                            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a>
                            </li>
                            <li class="menu_social_item menu_mm"><a href="#"><i
                                        class="fab fa-linkedin-in"></i></a></li>
                            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>

        </div>

        @yield('content')
        <!-- Footer -->

        <footer class="footer">
            <div class="container">
                <!-- Footer Content -->

                <div class="footer_content">
                    <div class="row">

                        <!-- Footer Column - About -->
                        <div class="col-lg-3 footer_col">

                            <!-- Logo -->
                            <div class="logo_container">
                                <div class="logo">
                                    <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="">
                                </div>
                            </div>
                        </div>

                        <!-- Footer Column - Menu -->

                        <div class="col-lg-3 footer_col">
                            <div class="footer_column_title">Menu</div>
                            <div class="footer_column_content">
                                <ul>
                                    <li class="footer_list_item"><a href="#">Home</a></li>
                                    <li class="footer_list_item"><a href="#">About Us</a></li>
                                    <li class="footer_list_item"><a href="courses.html">Courses</a></li>
                                    <li class="footer_list_item"><a href="news.html">News</a></li>
                                    <li class="footer_list_item"><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Footer Column - Usefull Links -->

                        <div class="col-lg-3 footer_col">
                            <div class="footer_column_title">Usefull Links</div>
                            <div class="footer_column_content">
                                <ul>
                                    <li class="footer_list_item"><a href="#">Testimonials</a></li>
                                    <li class="footer_list_item"><a href="#">FAQ</a></li>
                                    <li class="footer_list_item"><a href="#">Community</a></li>
                                    <li class="footer_list_item"><a href="#">Campus Pictures</a></li>
                                    <li class="footer_list_item"><a href="#">Tuitions</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Footer Column - Contact -->

                        <div class="col-lg-3 footer_col">
                            <div class="footer_column_title">Contact</div>
                            <div class="footer_column_content">
                                <ul>
                                    <li class="footer_contact_item">
                                        <div class="footer_contact_icon">
                                            <img src="{{ Vite::asset('resources/images/placeholder.svg') }}"
                                                alt="https://www.flaticon.com/authors/lucy-g">
                                        </div>
                                        Blvd Libertad, 34 m05200 Arévalo
                                    </li>
                                    <li class="footer_contact_item">
                                        <div class="footer_contact_icon">
                                            <img src="{{ Vite::asset('resources/images/smartphone.svg') }}"
                                                alt="https://www.flaticon.com/authors/lucy-g">
                                        </div>
                                        +55 (98) 981282556
                                    </li>
                                    <li class="footer_contact_item">
                                        <div class="footer_contact_icon">
                                            <img src="{{ Vite::asset('resources/images/envelope.svg') }}"
                                                alt="https://www.flaticon.com/authors/lucy-g">
                                        </div>iaep@iaep.com
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
        </div>
        </footer>

    </div>
    <script type="text/javascript">
    var APP_URL = {!! json_encode(url('/')) !!}
    </script>

    <script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
    @vite('resources/js/app.js')
    @vite('resources/plugins/greensock/TweenMax.min.js')
    @vite('resources/plugins/greensock/TimelineMax.min.js')
    @vite('resources/plugins/greensock/ScrollToPlugin.min.js')
    @vite('resources/plugins/OwlCarousel2-2.2.1/owl.carousel.js')
    @vite('resources/plugins/scrollTo/jquery.scrollTo.min.js')
    @vite('resources/plugins/easing/easing.js')
    @vite('resources/js/custom.js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    @stack('scripts')

</body>

</html>
