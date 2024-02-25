@extends('admin.master')


@section('content')
<main class="form-create">
	<form method="POST" action="{{route('courses.update', ['course'=> $course->slug])}}" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		@if($errors->all())
            <div class="alert text-center alert-danger">Preencha os Campos Corretamente</div>
        @else
        	<div class="alert text-center alert-success">Curso Cadastrado</div>
        @endif
		<div class="mb-3"> 
		  <label class="form-label">Nome do Curso</label>
		  <input type="text" class="form-control" name="title" value="{{$course->title}}">
		</div>
		<div class="mb-3">
		  <label class="form-label">Mini Descrição</label>
		  <input type="text" class="form-control" name="mini_desc" value="{{$course->mini_description}}">
		</div>
		<div class="mb-3">
		  <label class="form-label">Descrição do Curso</label>
		  <textarea name="description" class="form-control" rows="5">
		  	{{$course->description}}
		  </textarea>
		</div>

		<div class="input-group mb-3">
	      <input type="file" class="form-control" name="image">
	      <label class="input-group-text" >Banner do Curso</label>
    	</div>

    	<label class="form-label" >Quais Polos Pertencem o Curso</label>
    	<div class='polos-price'>
	    	@foreach($course->polos as $key => $polo)
		    	<div class="item">
		    		<label for="">{{$polo->name}}</label>
					 <input placeholder="R$" type="text" name="polo_{{$polo->id}}" value="{{$prices[$key]}}">
				</div>
			@endforeach

			@foreach($polos_new as $polo)
		    	<div class="item">
		    		<label for="">{{$polo->name}}</label>
					 <input placeholder="R$" type="text" name="polo_{{$polo->id}}">
				</div>
			@endforeach
		</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</main>
@endsection