@extends('layouts.app') <!-- Ira Buscar o conteudo que está em layouts.app -->

@section('title','Listagem')

@section('content')
    <!-- Tudo aqui dentro vai ser renderizado lá noso template -->
    <div class="container mt-5">
    <div class="row">
        <div class="col-sm-10">
        <h1>Listagem de Jogos</h1>

        </div>
    <div class="col-sm-3"> 
    <a href="{{ route('jogos-create') }}" class="btn btn-success">Novo jogo</a>
    </div>
    </div>
    <table class="table mt-3">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Categoria</th>
        <th scope="col">Ano de Criação</th>
        <th scope="col">Valor</th>
        <th scope="col">...</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jogos as $jogo)
    <tr>
        <th>{{ $jogo->id }} </th>
        <th>{{ $jogo->nome}}</th>
        <th>{{ $jogo->categoria}}</th>
        <th>{{ $jogo->ano_criacao}}</th>   
        <th>{{ $jogo->valor}}</th>
        <th class="d-flex">
        <a href="{{ route('jogos-edit', ['id'=>$jogo->id]) }}" class="btn btn-primary">Editar</a>
        <form action="{{ route('jogos-destroy', ['id'=>$jogo->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
        </th>
    </tr>
    @endforeach <!-- Fecho foreach -->
  </tbody>
</table>
</div>
@endsection