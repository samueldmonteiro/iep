@extends('admin.master')


	
@section("content")
	<main class="polo-previews">
		<h1>Polos</h1>

		<div class="itens">
			@foreach($courses as $course)
				<a href="{{route('admin.showCourse', ['slug'=> $course->slug])}}" class="card course-item" style="width: 18rem;">
					<img src="{{Storage::url($course->image)}}" class="card-img-top" alt="...">
					<div class="card-body">
					<p class="card-text">{{$course->title}}</p>
  					</div>
				</a>
			@endforeach
		</div>


	</main>
@endsection