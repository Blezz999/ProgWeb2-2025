<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Aluno::create([
            "nome"=>'sagaz',
            "cpf"=>'99999999999',
            "telefone"=>'49 9999-9999',

        ]);
        $dados = Aluno::All();

        //dd($alunos);

        return view('aluno.list',['dados'=>$dados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aluno.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'nome'=>'required',
            'cpf'=>'required',
        ],[
            'nome.required'=>'0 :attribute é obrigatório',
            'cpf.required'=>'0 :attribute é obrigatório',
        ]);

        Aluno::create($request->all());

        return redirect('aluno');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
