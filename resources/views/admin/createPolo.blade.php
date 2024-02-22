@extends('admin.master')


@section('content')
<main class="form-create">
	<form method="POST" action="{{route('polos.store')}}" enctype="multipart/form-data">
		@csrf
		@if($errors->all())
            <div class="alert text-center alert-danger">Preencha os Campos Corretamente!</div>
        @else
        	<div class="alert text-center alert-success">Polo Cadastrado</div>
        @endif
		<div class="mb-3"> 
		  <label class="form-label">Nome do Polo</label>
		  <input type="text" class="form-control" name="name" value="{{old('name')}}">
		</div>
		<div class="mb-3">
		  <label class="form-label">Endereço do Polo</label>
		  <input type="text" class="form-control" name="address" value="{{old('address')}}">
		</div>

		<div class="mb-3">
		  <label class="form-label">Contato</label>
		  <input type="text" class="form-control" name="contact" value="{{old('contact')}}">
		</div>

		<div class="mb-3">
		  <label class="form-label">Sigla (Ex: CPU)</label>
		  <input type="text" class="form-control" name="acronym" value="{{old('acronym')}}">
		</div>
		
		<div class="input-group mb-3">
	      <input type="file" class="form-control" name="image">
	      <label class="input-group-text" >Banner do Curso</label>
    	</div>

    	
  <button type="submit" class="btn btn-primary">Salvar</button>
</form>
</main>
@endsection