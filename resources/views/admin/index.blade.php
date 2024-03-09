@extends("admin.master")
@section("content")
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Inscrições</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">ativas</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Inscritos
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Curso</th>
                            <th>Polo</th>
                            <th>Status</th>
                            <th>CPF</th>
                            <th>RG</th>
                            <th>Estado Civil</th>
                            <th>Profissão</th>
                            <th>Endereço</th>
                            <th>Aniversário</th>
                            <th>Inscrição</th>
                            <th>Deletar</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Curso</th>
                            <th>Polo</th>
                            <th>Status</th>
                            <th>CPF</th>
                            <th>RG</th>
                            <th>Estado Civil</th>
                            <th>Profissão</th>
                            <th>Endereço</th>
                            <th>Aniversário</th>
                            <th>Inscricão</th>
                            <th>Deletar</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($registrations as $reg)
                            <tr>
                                <td>{{$reg->name}}</td>
                                <td>{{$reg->email}}</td>
                                <td>{{$reg->telphone}}</td>
                                <td>{{$reg->course->title ?? "Inexistente"}}</td>
                                <td>{{$reg->polo->name ?? "Inexistente"}}</td>
                                <td>{{$reg->statusPayment()}}</td>
                                <td>{{$reg->cpf}}</td>
                                <td>{{$reg->rg}}</td>
                                <td>{{$reg->civilstate}}</td>
                                <td>{{$reg->profession}}</td>
                                <td>{{$reg->address}}</td>
                                <td>{{$reg->birthday}}</td>
                                <td>{{$reg->created_at}}</td>
                                <td>
                                    <form method="POST" action="{{route('registrations.destroy', ['registration'=> $reg->id])}}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger" href="">Apagar</button>
                                    </form>
                                </td>
                                    
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

@endsection