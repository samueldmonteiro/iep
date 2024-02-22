@extends('front.master')


@push('styles')
	@vite('resources/styles/contact_styles.css')
	@vite('resources/styles/contact_responsive.css')
@endpush
@section('content')

<div class="super_container">
	<div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url({{Vite::asset('resources/images/contact_background.jpg')}}"></div>
		</div>
		<div class="home_content">
			<h1>Contato</h1>
		</div>
	</div>

	<!-- Contact -->

	<div class="contact">
		<div class="container">
			<div class="row">
				
				<div class="contact_main">
					<div class="about">
						<div class="about_title">Se tiver Dúvidas:</div>
						<p class="about_text">Estamos sempre aqui para ajudar e esclarecer quaisquer dúvidas que possam surgir. Se você tiver alguma pergunta, comentário ou precisa de assistência, não hesite em entrar em contato conosco. Estamos disponíveis para fornecer as informações necessárias da maneira mais amigável e eficiente possível.
						</p>
						<p class="about_text">Sua satisfação é nossa prioridade, e estamos comprometidos em garantir que sua experiência conosco seja a melhor possível. Fique à vontade para nos enviar um e-mail ou utilizar nossos canais de comunicação para nos contatar. Estamos ansiosos para ajudar!</p>

						<div class="contact_info">
							<ul>
								<li class="contact_info_item">
									<div class="contact_info_icon">
										<img src="{{Vite::asset('resources/images/smartphone.svg')}}" alt="https://www.flaticon.com/authors/lucy-g">
									</div>
									+55 (98) 985424145
								</li>
								<li class="contact_info_item">
									<div class="contact_info_icon">
										<img src="{{Vite::asset('resources/images/smartphone.svg')}}" alt="https://www.flaticon.com/authors/lucy-g">
									</div>
									+55 (98) 981282556
								</li>
								<li class="contact_info_item">
									<div class="contact_info_icon">
										<img src="{{Vite::asset('resources/images/envelope.svg')}}" alt="https://www.flaticon.com/authors/lucy-g">
									</div>hello@company.com
								</li>
							</ul>
						</div>

					</div>
				</div>

			</div>
		</div>
	</div>
</div>

@endsection