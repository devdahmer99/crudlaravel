<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;

class TarefasController extends Controller
{

    public function index()
    {
        $tarefas = Tarefa::paginate(3);

        return view('tarefas.index', compact('tarefas'));
    }

    public function create()
    {
        return view('tarefas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'      => 'required',
            'descricao' => 'required',
            'status'    => 'required'
        ]);

        Tarefa::create($request->all());
        return redirect()->route('tarefas.index')->with('success', 'Tarefa Criada com sucesso!');
        
    }

    public function edit(Tarefa $tarefa)
    {
        return view('tarefas.edit', compact('tarefa'));
    }

    public function update(Request $request, Tarefa $tarefa)
    {
        $request->validate([
            'nome'      => 'required',
            'descricao' => 'required',
            'status'    => 'required'
        ]);

        $tarefa->update($request->all());
        return redirect()->route('tarefas.index')->with('success', 'Tarefa Atualizada com sucesso!');
    }

    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();
        return redirect()->route('tarefas.index')->with('success', 'Tarefa Deletada com sucesso!');
    }
}
