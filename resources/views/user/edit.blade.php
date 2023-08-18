@extends('layouts.app')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">TPS</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Utilizadores</a></li>
                        <li class="breadcrumb-item active">'Actualizar Utilizadores</li>
                    </ol>
                </div>
                <h4 class="page-title">Actualizar Utilizadores</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Nome</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name', $user->name) }}" placeholder="Nome completo">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input name="email" type="email" value="{{ old('email', $user->email) }}"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Salvar</button>
                    </form>
                    <!-- end row -->

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->

    <div class="border"></div>
    <div class="section-body">
        <h2 class="section-title">Funções</h2>
        <p class="section-lead">
            Funções
            Atribuir funções a este usuário
        </p>

        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 ms-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Roles</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('users.roles.assign', $user) }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label class="form-label">
                                        Roles
                                    </label>

                                    <div class="selectgroup selectgroup-pills">
                                        @foreach ($roles as $role)
                                            <label class="selectgroup-item mb-3">
                                                <input type="checkbox" name="roles[{{ $role->name }}]"
                                                    value="{{ $role->name }}" class="selectgroup-input"
                                                    {{ $user->hasRole($role) || collect(old('roles', []))->has($role->name) ? 'checked' : '' }}>

                                                <span class="selectgroup-button">{{ $role->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Actualizar funções</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="border"></div>
    <div class="section-body">
        <h2 class="section-title">Permissões</h2>
        <p class="section-lead">

            Atribuir permissões diretas ao usuário não herdadas das funções
        </p>

        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 ms-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Permissões</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('users.permissions.assign', $user) }}" method="POST">
                                @csrf

                                @foreach ($permissions->groupBy(fn($permission) => Str::plural(Str::afterLast($permission->name, ' '))) as $model => $modelPermissions)
                                    <div class="form-group">
                                        <label class="form-label">
                                            {{ Str::title($model) }}
                                        </label>

                                        <div class="selectgroup selectgroup-pills">
                                            @foreach ($modelPermissions as $permission)
                                                <label class="selectgroup-item mb-3">
                                                    <input type="checkbox" name="permissions[{{ $permission->name }}]"
                                                        value="{{ $permission->name }}" class="selectgroup-input"
                                                        {{ $user->hasDirectPermission($permission) || collect(old('permissions', []))->has($permission->name) ? 'checked' : '' }}>

                                                    <span class="selectgroup-button">{{ $permission->name }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Actualizar Permissões</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
