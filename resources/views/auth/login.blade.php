@extends('auth.app')
@section('content')
    <div class="auth-fluid-form-box">
        <div class="align-items-center d-flex h-100">
            <div class="card-body">

                <!-- Logo -->
                <div class="auth-brand text-center text-lg-start">
                    <a href="index.html" class="logo-dark">
                        <span><img src="assets/images/logo-dark.png" alt="" height="18"></span>
                    </a>
                    <a href="index.html" class="logo-light">
                        <span><img src="assets/images/logo.png" alt="" height="18"></span>
                    </a>
                </div>

                <!-- title-->
                <h4 class="mt-0">Teacher Planning System</h4>
                <p class="text-muted mb-4">Digite seu endereço de e-mail e senha para acessar a conta.</p>

                <!-- form -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="emailaddress" class="form-label">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" id="emailaddress"
                            name="email" value="{{ old('email') }}" placeholder="digite o teu email">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        @if (Route::has('password.request'))
                            <a class="text-muted float-end" href="{{ route('password.request') }}">
                                Esqueceu a senha?
                            </a>
                        @endif

                        <label for="password" class="form-label ">Password</label>
                        <input class="form-control @error('password') is-invalid  @enderror" name="password" value="{{old('password')}}" type="password" id="password"
                            value="{{ old('password') }}" placeholder="digite a tua  password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid mb-0 text-center">
                        <button class="btn btn-primary" type="submit"><i class="mdi mdi-login"></i> Entrar </button>
                    </div>

                </form>
                <!-- end form-->



            </div> <!-- end .card-body -->
        </div> <!-- end .align-items-center.d-flex.h-100-->
    </div>
    <!-- end auth-fluid-form-box-->

    <!-- Auth fluid right content -->
    <div class="auth-fluid-right text-center">
        <div class="auth-user-testimonial">
            <h2 class="mb-3">Teacher Planning System!</h2>
            <p class="lead"><i class="mdi mdi-format-quote-open"></i>E uma ferramenta digital projetada para auxiliar os Professores no planeamento das suas atividades de ensino . <i
                    class="mdi mdi-format-quote-close"></i>
            </p>
            <p>

            </p>
        </div> <!-- end auth-user-testimonial-->
    </div>
    <!-- end Auth fluid right content -->
    </div>
@endsection
