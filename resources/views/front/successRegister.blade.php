@extends('front.master')


@section('content')
	<div class="success_container">
		<h1>Tire Um Print</h1>

		<div class="disclaimer">
			<p>PARABÉNS! Recebemos Sua Inscrição.</p>
			<p>Abaixo estão os dados referentes à sua inscrição. Entraremos em contato com você assim que possível atravez do whatsapp informado por você no momento da inscrição. Qualquer dúvida, acesse nossa páginda de <a href="{{route('front.contact')}}">Contato.</a></p>
		</div>

		<div class="info">
			<p><strong>Nome: </strong>{{$registration->name}}</p>
			<p><strong>Curso: </strong>{{$registration->course->title}}</p>
			<p><strong>Polo: </strong>{{$registration->polo->name}}</p>
			<p><strong>Endereço de Polo: </strong>{{$registration->polo->address}}</p>
			<p><strong>Horários de Aula: </strong>Aos Domingos, Das 08:00 as 11:30 e retorno das 13:30 as 17:00</p>
			<p><strong>Contato do Polo: </strong>{{$registration->polo->contact}}</p>

		</div>
	</div>

	
@endsection