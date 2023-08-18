<!-- resources/views/disciplines/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Cadastrar Nova Disciplina</h1>
    <form action="{{ route('disciplines.store') }}" method="post">
        @csrf
        <label for="name">Nome:</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <!-- Outros campos -->
        <button type="submit">Cadastrar</button>
    </form>
@endsection
