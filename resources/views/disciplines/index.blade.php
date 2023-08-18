<!-- resources/views/disciplines/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Lista de Disciplinas</h1>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Código</th>
                <th>Descrição</th>
                <th>Carga Horária</th>
                <!-- Outros cabeçalhos -->
            </tr>
        </thead>
        <tbody>
            @foreach ($disciplines as $discipline)
                <tr>
                    <td>{{ $discipline->name }}</td>
                    <td>{{ $discipline->code }}</td>
                    <td>{{ $discipline->description }}</td>
                    <td>{{ $discipline->hours }}</td>
                    <!-- Outros campos -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
