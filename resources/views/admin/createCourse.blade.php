@extends('admin.master')


@section('content')
<main class="form-create">
	<form method="POST" action="{{route('courses.store')}}" enctype="multipart/form-data">
		@csrf
		@if($errors->all())
            <div class="alert text-center alert-danger">Preencha os Campos Corretamente</div>
        @else
        	<div class="alert text-center alert-success">Curso Cadastrado</div>
        @endif
		<div class="mb-3"> 
		  <label class="form-label">Nome do Curso</label>
		  <input type="text" class="form-control" name="title" value="{{old('title')}}">
		</div>
		<div class="mb-3">
		  <label class="form-label">Mini Descrição</label>
		  <input type="text" class="form-control" name="mini_desc" value="{{old('mini_desc')}}">
		</div>
		<div class="mb-3">
		  <label class="form-label">Descrição do Curso</label>
		  <textarea name="description" class="form-control" rows="5">
		  	{{old('description')}}
		  </textarea>
		</div>

		<div class="input-group mb-3">
	      <input type="file" class="form-control" name="image">
	      <label class="input-group-text" >Banner do Curso</label>
    	</div>

    	<label class="form-label" >Quais Polos Pertencem o Curso</label>
    	@foreach($polos as $polo)
	    	<div class="form-check">
				  <input class="form-check-input" type="checkbox" value="{{$polo->id}}" id="flexCheckDefault" name="polos[]">
				  <label class="form-check-label" for="flexCheckDefault">
				    {{$polo->name}}
				  </label>
			</div>
		@endforeach
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</main>
@endsection