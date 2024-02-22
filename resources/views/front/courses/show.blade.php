@extends('front.master')


@push('styles')
@vite('resources/styles/courses_styles.css')
@vite('resources/styles/courses_responsive.css')
@vite('resources/styles/course_page.css')
@endpush

@push('scripts')
@vite('resources/js/subscribe_course.js')
@endpush


@section('content')
<!-- Home -->

<div class="home">
    <div class="home_background_container prlx_parent">
        <img src="{{Vite::asset('resources/images/slider_background.jpg')}}" alt="">
    </div>
    <div class="home_content">
        <h1>{{$course->title}}</h1>
    </div>
</div>

<!-- Popular -->

<div class="popular page_section">
    <div class="container">

        <div class="course_container" id="{{$course->id}}">

            <div class="image">
                <img src="{{Storage::url($course->image)}}" alt="">
                <div class="btn-group tag-infos" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-info"><i class="bi bi-stopwatch"></i> Disponível</button>
                    <button type="button" class="btn btn-info"><i class="bi bi-patch-check"></i> Certificado</button>
                    <button type="button" class="btn btn-info"><i class="bi bi-patch-check"></i> Presencial</button>
                </div>
            </div>

            <div class="info">
                <p class="title">{{$course->title}}</p>
                <h2 class="minidesc">{{$course->mini_description}}</h2>
                <p class="desc">{{$course->description}}</p>
                <span><strong>Dias de Aula:</strong> Domingo</span>
                <span><strong>Horários:</strong> Das 08:00 as 11:30 e retorno das 13:30 as 17:00</span>
                <div class="active_polos">

                    @foreach($course->polos as $polo)
                    <div class="item">
                        <button type="button" class="btn btn-info">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"></path>
                            </svg>{{$polo->name}}
                        </button>
                    </div>
                    @endforeach

                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="subscribe"><i class="bi bi-hand-index-thumb" data-bs-toggle="modal" data-bs-target="#modalSubscribe"></i> Inscreva-se com Desconto</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="subscribe-modal modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Sua Inscrição:</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="alert alert-info text-center">Preencha os Dados e Efetue o Pagamento para Liberar Sua Inscrição!</div>

                <form class="row g-3">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email">

                    </div>
                    <div class="col-6">
                        <label for="inputAddress" class="form-label">Whatsapp(+55)</label>
                        <input type="text" class="form-control" id="telphone">
                    </div>

                    <div class="col-6">
                        <label for="inputAddress" class="form-label">RG</label>
                        <input type="text" class="form-control" id="rg">
                    </div>

                    <div class="col-6">
                        <label for="inputAddress" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="cpf">
                    </div>

                    <div class="col-6 civil-state">
                        <label for="inputAddress" class="form-label">Estado Civil</label>
                        <select class="form-select" aria-label="Default select example" id="civilstate">
                           <option value="solteiro(a)">Solteiro(a)</option>
                           <option value="casado(a)">Casado</option>
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="inputAddress" class="form-label">Data de Nascimento</label>
                        <input type="date" class="form-control" id="birthday">
                    </div>


                    <div class="col-12 polos-c">
                        <label for="inputAddress" class="form-label">Onde vai Estudar</label>
                        <select class="form-select" aria-label="Default select example" id="polo">
                            @foreach($polos as $polo)
                            <option value="{{$polo->id}}">{{$polo->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="pixContainer">
                        <p class="title">Efetue o pagamento para completar sua Inscrição!</p>
                        <span class="price">Valor: R$ 49,99</span>
                        <img id="qrcode" src="">
                        <span class="copypastetitle">Copia e Cola:</span>
                        <p id="copyPaste"></p>

                    </div>
                    <div class="col-12">
                        <button id="actionSubs" type="submit" class="btn btn-success">Inscreva-se</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
