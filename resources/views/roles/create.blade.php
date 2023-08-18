@extends('layouts.app')

@section('css')

@endsection

@section('content')
 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">TPS</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Função</a></li>
                    <li class="breadcrumb-item active">Cadastrar Função</li>
                </ol>
            </div>
            <h4 class="page-title">Cadastrar Função</h4>
            <p class="section-lead">

                Você pode adicionar novas funções e atribuir permissões a elas
            </p>
        </div>
    </div>
</div>
<!-- end page title -->



                <div class="row">
                    <div class="col-12 col-md-7 ms-auto">
                        <div class="card">
                            <div class="card-header">
                                <h4>Função</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('roles.store') }}"
                                      method="POST">
                                    @csrf

                                      <div class="mb-3">
                                        <label for="name"
                                               class="label form-control-label">Name</label>
                                        <input type="text"
                                               name="name"
                                               id="name"
                                               class="form-control @error('name') is-invalid @enderror"
                                               value="{{ old('name') }}">
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
                                               value="{{ old('guard') }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                        <button type="submit"
                                                class="btn btn-primary">Criar Função</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



@endsection
