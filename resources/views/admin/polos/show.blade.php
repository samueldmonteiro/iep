@extends('admin.master')


@section('content')
<main class="form-create">
	<form method="POST" action="{{route('polos.update', ['polo'=> $polo->slug])}}" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		@if($errors->all())
            <div class="alert text-center alert-danger">Preencha os Campos Corretamente!</div>
        @else
        	<div class="alert text-center alert-success">Polo Atualizado</div>
        @endif
		<div class="mb-3"> 
		  <label class="form-label">Nome do Polo</label>
		  <input type="text" class="form-control" name="name" value="{{$polo->name}}">
		</div>
		<div class="mb-3">
		  <label class="form-label">Endereço do Polo</label>
		  <input type="text" class="form-control" name="address" value="{{$polo->address}}">
		</div>

		<div class="mb-3">
		  <label class="form-label">Contato</label>
		  <input type="text" class="form-control" name="contact" value="{{$polo->contact}}">
		</div>

		<div class="mb-3">
		  <label class="form-label">Sigla (Ex: CPU)</label>
		  <input type="text" class="form-control" name="acronym" value="{{$polo->acronym}}">
		</div>
		
		<div class="input-group mb-3">
	      <input type="file" class="form-control" name="image">
	      <label class="input-group-text" >Banner do Curso</label>
    	</div>

    	
  <button type="submit" class="btn btn-primary me-3">Salvar</button>
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Deletar</button>

</form>
</main>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Deseja Deletar Este Polo?     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button id="deletePolo" urlback="{{route('admin.showPolos')}}" url="{{route('polos.destroy', ['polo'=> $polo->slug])}}" type="button" class="btn btn-danger">Deletar</button>
      </div>
    </div>
  </div>
</div>
@endsection