@extends('layouts.app')
@section('css')
 <!-- third party css -->
 <link href="{{ Vite::asset('resources/assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
 <link href="{{ Vite::asset('resources/assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
 <!-- third party css end -->
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
                    Você pode gerenciar todas as funções, como edição, exclusão e atribuição de permissões.
                </p>
            </div>
        </div>
    </div>
    <!-- end page title -->



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="{{ route('roles.create') }}" class="btn btn-primary mb-2"><i
                                    class="mdi mdi-plus-circle me-2"></i> cadastar Função</a>
                        </div>
                        <div class="col-sm-7">
                            <div class="text-sm-end">
                                <button type="button" class="btn btn-success mb-2 me-1"><i
                                        class="mdi mdi-cog"></i></button>
                                <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                <button type="button" class="btn btn-light mb-2">Export</button>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table id="basic-datatable" class="table table-centered table-striped dt-responsive nowrap w-100"
                           >
                            <thead>
                                <tr class="">
                                    <th>Nome</th>
                                    <th>Criado em </th>
                                    <th>Acção</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($roles as $role)
                                    <tr>
                                        <td>
                                            <a href="{{ route('roles.edit', $role) }}"
                                               class="btn btn-link text-decoration-none text-bg-dark">
                                                {{ $role->name }}
                                            </a>
                                        </td>


                                        <td>{{ $role->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('roles.edit', $role) }}" class="action-icon"> <i
                                                    class="mdi mdi-square-edit-outline"></i></a>
                                            <form method="POST" action="{{ route('roles.destroy', $role) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('roles.destroy', $role) }}"
                                                    onclick="event.preventDefault();
                                        this.closest('form').submit();"
                                                    class="action-icon text-red-500 hover:text-red-700"> <i
                                                        class="mdi mdi-delete"></i></a>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection
@section('js')
<script src="{{ Vite::asset('resources/assets/js/vendor/jquery.dataTables.min.js') }}"></script>
<script src="{{ Vite::asset('resources/assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
<script src="{{ Vite::asset('resources/assets/js/vendor/dataTables.responsive.min.js') }}"></script>
<script src="{{ Vite::asset('resources/assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ Vite::asset('resources/assets/js/vendor/dataTables.checkboxes.min.js') }}"></script>
<!-- third party js ends -->
<!-- demo app -->
<script src="{{ Vite::asset('resources/assets/js/pages/demo.datatable-init.js') }}"></script>
@endsection
