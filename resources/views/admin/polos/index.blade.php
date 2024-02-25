@extends('admin.master')


	
@section("content")
	<main class="polo-previews">
		<h1>Polos</h1>

		<div class="itens">
			@foreach($polos as $polo)
				<a href="{{route('admin.showPolo', ['slug'=> $polo->slug])}}" class="card polo-item" style="width: 18rem;">
					<img src="{{Storage::url($polo->image)}}" class="card-img-top" alt="...">
					<div class="card-body">
					<p class="card-text">{{$polo->name}}</p>
  					</div>
				</a>
			@endforeach
		</div>


	</main>
@endsection