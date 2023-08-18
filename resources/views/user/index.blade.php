@extends('layouts.app')
@section('css')
    <!-- third party css -->
    <link href="{{ Vite::asset('resources/assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ Vite::asset('resources/assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->
@endsection
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">TPS</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Utilizador</a></li>
                            <li class="breadcrumb-item active">listar</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Utilizadores</h4>
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
                                <a href="{{ route('user.create') }}" class="btn btn-danger mb-2"><i
                                        class="mdi mdi-plus-circle me-2"></i> cadastar Utilizador</a>
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
                                    <tr>
                                        <th style="width: 20px;">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="customCheck1">
                                                <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th style="width: 75px;">Acção</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $item)
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="customCheck2">
                                                    <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td class="table-user">
                                                {{ $item->name }}
                                            </td>

                                            <td>
                                                {{ $item->email }}
                                            </td>


                                            <td>
                                                <span class="badge badge-success-lighten">Active</span>
                                            </td>

                                            <td>
                                                <a href="{{ route('user.edit', $item->id) }}" class="action-icon"> <i
                                                        class="mdi mdi-square-edit-outline"></i></a>
                                                <form method="POST" action="{{ route('user.destroy', $item->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('user.destroy', $item->id) }}"
                                                        onclick="event.preventDefault();
                                            this.closest('form').submit();"
                                                        class="action-icon text-red-500 hover:text-red-700"> <i
                                                            class="mdi mdi-delete"></i></a>
                                                </form>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4"
                                                class="px-6 py-4 whitespace-nowrap text-center font-semibold">não
                                                existe usuarios cadastrado no momento</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container -->
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
