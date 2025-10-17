@extends('base')
@section('titulo', 'Formulário Turma')
@section('conteudo')

    @php
        if (!empty($dado->id)) {
            $action = route('turma.update', $dado->id);
        } else {
            $action = route('turma.store');
        }
    @endphp

    <form action="{{ $action }}" method="post" enctype="multipart/form-data">
        @csrf

        @if (!empty($dado->id))
            @method('put')
        @endif

        <input type="hidden" name="id" value="{{ old('id', $dado->id ?? '') }}">

        @if (!empty($cursos))

            <div class="col">
                <label for="">Curso</label>
                <select name="curso_id">
                    @foreach ($cursos as $item)
                        <option value="{{ $item->id }}"
                            {{ old('curso_id', $dado->curso_id ?? '') == $item->id ? 'selected' : '' }}>
                            {{ $item->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
        @else
            <div class="col">
                <input type="hidden" name="curso_id" value="{{ old('curso_id', $curso->id) }}">
                <h4 for="">Curso: {{ $curso->nome }}</h4>
            </div>
        @endif
        <div class="row">
            <div class="col">
                <label for="">Nome</label>
                <input type="text" name="nome" value="{{ old('nome', $dado->nome ?? '') }}">
            </div>
            <div class="col">
                <label for="">Código</label>
                <input type="text" name="codigo" value="{{ old('codigo', $dado->codigo ?? '') }}">
            </div>
            <div class="col">
                <label for="">Data Inicio</label>
                <input type="date" name="data_inicio" value="{{ old('data_inicio', $dado->data_inicio ?? '') }}">
            </div>
            <div class="col">
                <label for="">Data Fim</label>
                <input type="date" name="data_fim" value="{{ old('data_fim', $dado->data_fim ?? '') }}">
            </div>

        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success">{{ !empty($dado->id) ? 'Atualizar' : 'Salvar' }}</button>
                <a href="{{ url('turma') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </form>
@stop
