<!DOCTYPE html>
<html lang= "en">
<head>

<title> document</title>
</head>
<body>
<h1>Olá mundo Laravel</h1>
<p>/*http://localhost:8000/alunoList*/ </p>
<p>Finshedd </p>

<table>
    <thead>
        <tr>
            <td>#ID</td>
            <td>Nome</td>
            <td>CPF</td>
            <td>Telefone</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($dados as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nome}}</td>
                <td>{{$item->cpf}}</td>
                <td>{{$item->telefone}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
