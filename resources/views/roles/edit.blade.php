@extends('layouts.app')

@section('css')
@endsection

@section('content')
@section('content')
 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">TPS</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Função</a></li>
                    <li class="breadcrumb-item active">Editar Função</li>
                </ol>
            </div>
            <h4 class="page-title">Editar Função</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12 col-md-7 ms-auto">
        <div class="card">
            <div class="card-header">
                <h4>Role</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('roles.update', $role) }}"
                      method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name"
                               class="label form-control-label">Name</label>
                        <input type="text"
                               name="name"
                               id="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $role->name) }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="guard"
                               class="label form-control-label">Guard</label>
                        <input type="text"
                               name="guard"
                               id="guard"
                               placeholder="web"
                               class="form-control @error('guard') is-invalid @enderror"
                               value="{{ old('guard', $role->guard) }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit"
                                class="btn btn-primary">Update Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="border"></div>
<div class="section-body">
    <h2 class="section-title"> Permissões</h2>
    <p class="section-lead">
        Atribuir permissões a esta função
    </p>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-7 ms-auto">
                <div class="card">
                    <div class="card-header">
                        <h4> Permissões</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('roles.permissions.assign', $role) }}"
                              method="POST">
                            @csrf

                            @foreach ($permissions->groupBy(fn($permission) => Str::plural(Str::afterLast($permission->name, ' '))) as $model => $modelPermissions)
                                <div class="form-group">
                                    <label class="form-label">
                                        {{ Str::title($model) }}
                                    </label>

                                    <div class="selectgroup selectgroup-pills">
                                        @foreach ($modelPermissions as $permission)
                                            <label class="selectgroup-item mb-3">
                                                <input type="checkbox"
                                                       name="permissions[{{ $permission->name }}]"
                                                       value="{{ $permission->name }}"
                                                       class="selectgroup-input"
                                                       {{ $role->hasPermissionTo($permission) || collect(old('permissions', []))->has($permission->name) ? 'checked' : '' }}>

                                                <span class="selectgroup-button">{{ $permission->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach

                            <div class="form-group">
                                <button type="submit"
                                        class="btn btn-primary">Actualizar  Permissões</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('js')
@endsection
