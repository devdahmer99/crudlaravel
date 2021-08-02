@extends('layouts.app')
@section('content')
<div class='row'>
        <div class="col">
            <a class="btn btn-primary" href="{{route('tarefas.index')}}">Voltar</a> 
        </div>
    </div>

    <br/>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @forelse($errors->any() as $error)
                    <li>{{$error}}</li>
                @empty
                @endforelse
            </ul>
        </div> 
    @endif
    <form action="{{ route('tarefas.update', $tarefa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" value="{{$tarefa->nome}}" required/>
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Descrição</label>
            <input type="text" class="form-control" name="descricao" id="description"
                value="{{ $tarefa->descricao }}" required>
        </div>

        <div class="form-group">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" aria-label="Default select example" name="status">
                <option selected value="{{$tarefa->status}}">{{ $tarefa->status }}</option>
                <option value="Pendente">Pendente</option>
                <option value="Concluido">Concluido</option>
            </select>
        </div>

        <br/>

        <button type="submit" class="btn btn-primary" style="width: 100%">Atualizar</button>
    </form> 
@endsection