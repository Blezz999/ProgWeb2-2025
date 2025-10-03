<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\CategoriaAluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       /* Aluno::create([
            "nome"=>'sagaz',
            "cpf"=>'99999999999',
            "telefone"=>'49 9999-9999',

        ]);*/
        $dados = Aluno::All();

        //dd($alunos);

        return view('aluno.list',['dados'=>$dados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias=CategoriaAluno::orderBy('nome')->get();
        return view('aluno.form', ['categorias'=>$categorias]);
    }
    private function validateRequest(Request $request){
        $request->validate([
            'nome'=>'required',
            'cpf'=>'required',
            'categoria_id'=>'required',
            'imagem'=>'nullable|image|mimes:png,jpg,jpeg',

        ],[
            'nome.required'=>'0 :attribute é obrigatório',
            'cpf.required'=>'0 :attribute é obrigatório',
            'categoria_id.required'=>'0 :attribute é obrigatório',
            'imagem.image'=>'0 :attribute deve ser enviado',
            'imagem.mimes'=>'0 :attribute deve ser das extensões>PNG,JPG,JPEG',
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validateRequest($request);
        $data=$request->all();
        $imagem=$request->file('imagem');

        if($imagem){
            $nome_imagem=date('YmdiHs').".".$imagem->getClientOriginalExtension();
            $diretorio="imagem/aluno/";
            $imagem->storeAs(
                $diretorio,
                $nome_imagem,
                'public'
            );
            $data['imagem']=$diretorio.$nome_imagem;
        }

        Aluno::create($data);

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
        //dd($dado);
        $dado=Aluno::findOrFail($id);
        $categorias=CategoriaAluno::orderBy('nome')->get();
        return view('aluno.form',['dado'=>$dado,'categorias'=>$categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       // dd($request->all(),$id);
       $this->validateRequest($request);
       $data=$request->all();
       $imagem=$request->file('imagem');

       if($imagem){
           $nome_imagem=date('YmdiHs').".".$imagem->getClientOriginalExtension();
           $diretorio="imagem/aluno/";

           $imagem->storeAs(
               $diretorio,
               $nome_imagem,
               'public'
           );
           $data['imagem']=$diretorio.$nome_imagem;
       }

    Aluno::updateOrCreate(['id'=>$id],$data);
    return redirect('aluno');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dado=Aluno::findOrFail($id);
        $dado->delete();
        return redirect('aluno');
    }
    //
    public function search(Request $request){
        if(!empty($request->valor)){
            $dados=Aluno::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else{
            $dados=Aluno::All();
        }
        return view('aluno.list', ["dados"=>$dados]);
    }
}
