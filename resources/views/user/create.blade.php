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
                        <li class="breadcrumb-item active">Cadastrar Utilizadores</li>
                    </ol>
                </div>
                <h4 class="page-title">Cadastrar Utilizadores</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nome</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" placeholder="Nome completo">
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
                                <input name="email" type="email" value="{{ old('email') }}"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">password</label>
                            <input type="password" name="password" value="{{ old('password') }}"
                                class="form-control @error('password') is-invalid @enderror" placeholder="password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{$message }}
                                </div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom04">Comfirmar a password</label>
                            <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="validationCustom04">
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <button class="btn btn-primary" type="submit">Salvar</button>
                    </form>
                    <!-- end row -->

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>

    <!-- end row-->
@endsection
