@extends('base')
@section('titulo', 'Formulário Aluno')
@section('conteudo')


    <h3>Listagem de Alunos</h3>
    /*http://localhost:8000/aluno*/

    <div class="row">
        <div class="col">
            <form action="{{ route('aluno.search') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label class="form-label">Tipo</label>
                        <select name="tipo" class="form-select">
                            <option value="nome">Nome</option>
                            <option value="cpf">CPF</option>
                            <option value="telefone">Telefone</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Valor</label>
                        <input type="text" class="form-control" name="valor" placeholder="Pesquisar...">
                    </div>
                </div>

                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-magnifying-glass"></i>Buscar</button>
                </div>
                <div class="col-md-3">
                    <a class="btn btn-success" href="{{ url('/aluno/create') }}">
                        <i class="fa-solid fa-plus"></i>Novo</a>
                </div>
        </div>
            </form>
    </div>

    <div class="row">
        <table class="table table-hover"></table>

        <table>
            <thead>
                <tr>
                    <td>#ID</td>
                    <td>Nome</td>
                    <td>CPF</td>
                    <td>Telefone</td>
                    <td>Editar</td>
                    <td>Excluir</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nome }}</td>
                        <td>{{ $item->cpf }}</td>
                        <td>{{ $item->telefone }}</td>
                        <td><a href="{{route('aluno.edit', $item->id)}}" class="btn btn-outline-warning"><i class="fa-solid fa-user-pen"></i></a></td>
                        <td>
                            <form action="{{route('aluno.destroy',$item->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                 onclick="return confirm('Deseja remover o registro?')">
                                 <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
