@extends('layouts.app')
@section('content')
    <div class='row'>
        <div class="col">
            <a class="btn btn-success" href="{{route('tarefas.create')}}">Criar Nova Tarefa</a> 
        </div>
    </div>

    <br/>

    @if($message = Session::get('success'))
        <div class="alert alert-success"><p>{{$message}}</p></div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope='col'>ID</th>
                <th scope='col'>Nome</th>
                <th scope='col'>Descrição</th>
                <th scope='col'>Status</th>
                <th style="width:250px">Ações</th>
            </tr>
            @forelse ($tarefas as $tarefa)
                <tr>
                    <td>{{$tarefa->id}}</td>
                    <td>{{$tarefa->nome}}</td>
                    <td>{{$tarefa->descricao}}</td>
                    <td>{{$tarefa->status}}</td>
                    <td class="display:flex">
                        <a class="btn btn-primary" href="{{ route('tarefas.edit', $tarefa->id) }}">Editar</a>
                        <form method="POST" action="{{route('tarefas.destroy', $tarefa->id)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" name="excluir" onclick="return confirm('Tem certeza que deseja excluir ?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
            <tr>
                <td>Não há registros</td>
            </tr>
            @endforelse
        </table>
        {{$tarefas->links()}}
</div>
@endsection