@extends('layouts.application')

@section('content')
    <h1 class="ls-title-intro ls-ico-home">Bem vindo ao {{ config('app.name') }}!</h1>

    <div class="ls-box ls-board-box text-center">
        <header class="ls-info-header" style="background-color: #0e4387 ;">
            <h2 class="ls-title-2 fa-blink" id="text" style="font-weight: bold;">ATENÇÃO !</h2>
        </header>

        <br>

        <h3>Nenhum papel ou função foi atribuído ao seu usuário.</h3>
        <h3>Por favor,
            solicite suas permissões ao Administrador do sistema.</h3>
    </div>
    <header class="text-center">
        <h3 class="ls-title-3">
            <a href="http://glpi.saude.ce.gov.br/glpi/front/helpdesk.public.php?create_ticket=1" class="ls-btn-primary"
                style="font-size: 20px; font-weight: bold;" target="_blank">Solicitar Permissões</a>
        </h3>
    </header>
@endsection



<style>
    @keyframes fa-blink {
        0% {
            opacity: 1;
            color: red;
        }

        50% {
            opacity: 0.5;
            color: white;
        }

        100% {
            opacity: 1;
            color: red;

        }
    }

    .fa-blink {
        -webkit-animation: fa-blink .75s linear infinite;
        -moz-animation: fa-blink .75s linear infinite;
        -ms-animation: fa-blink .75s linear infinite;
        -o-animation: fa-blink .75s linear infinite;
        animation: fa-blink .75s linear infinite;
    }
</style>
