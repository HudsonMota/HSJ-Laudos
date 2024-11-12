@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 35px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row d-flex justify-content-around">
                    <div class="col-md-4">
                        <img src="{{ asset('images/LogoSESA.png') }}" style="width: 165px; margin-top:25%" />
                    </div>
                    <div class="col-md-4">
                        <img src="{{ asset('images/LogoHSJ.png') }}"
                            style="width: 175px; margin-top: 15%; margin-left:25%;" />
                    </div>
                    <div class="col-md-4">
                        <img src="{{ asset('images/LaudoHSJ.png') }}"
                            style="width: 85px; margin-top: 6%; margin-left:50%;" />
                        <b
                            style="
                            width: 85px;
                            margin-top: 20%;
                            margin-left: 34%;
                            font-family: Arial, sans-serif; /* Define a fonte padrão */
                            color: #038eff; /* Define a cor do texto */
                            line-height: 1.6; /* Define a altura da linha */
                            text-align: center; /* Alinha o texto ao centro */
                            font-size: 1.6em; /* Define o tamanho da fonte em relação ao tamanho da fonte do elemento pai */
                            -webkit-text-stroke: 0.1rem #000000; /* Adiciona um contorno de 0.1rem com a cor #000000 (para navegadores WebKit) */
                            text-stroke: 0.1rem #000000; /* Adiciona um contorno de 0.1rem com a cor #000000 */
                            white-space: nowrap; /* Impede que o texto seja quebrado em várias linhas */
                        ">LAUDOS-HSJ</b>



                    </div>
                </div>
                <div class="card">
                    <div class="card-header" style="background-color: #e4e4e4">{{ __('Entrar') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('senha')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Lembrar me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary col-md-4">
                                        {{ __('Entrar') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Esqueceu sua senha?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
