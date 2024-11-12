<!-- ################################# H O M E ############################################# -->
@extends('layouts.application')

@section('content')
    <?php
    $name = substr(Auth::user()->name, 0, strrpos(substr(Auth::user()->name, 0, 20), ' '));
    ?>
    <h1 class="ls-title-intro ls-ico-home">Olá {{ Auth::user()->name }}!</h1>


    <div class="ls-box ls-board-box">
        <header class="ls-info-header card-footer d-flex">
            <h2 class="ls-title-3 mr-auto p-2">Quantitativo de Laudos por Categoria</h2>
            <h2 class="ls-title-3 p-2">Total: {{ App\Solicitacao::count() }}</h2>
        </header>

        {{-- CARDS --}}
        <div class="col-sm-6 col-md-3 dash">
            <div class="ls-box" style="background-color: rgb(0, 0, 149);">
                <div class="ls-box-head">
                    <h6 class="ls-title-4" style="color: white; font-weight: bold;">BRONCOSCOPIA</h6>
                </div>
                <div class="ls-box-body">
                    <strong style="color: white;">
                        {{ App\Solicitacao::where('geral_theme', 'BRONCOSCOPIA')->count() }}
                    </strong>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3 dash">
            <div class="ls-box" style="background-color: rgb(2, 78, 49);">
                <div class="ls-box-head">
                    <h6 class="ls-title-4" style="color: white; font-weight: bold;">COLONOSCOPIA</h6>
                </div>
                <div class="ls-box-body">
                    <strong style="color: white;">
                        {{ App\Solicitacao::where('geral_theme', 'COLONOSCOPIA')->count() }}
                    </strong>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3 dash">
            <div class="ls-box" style="background-color: rgb(153, 0, 41);">
                <div class="ls-box-head">
                    <h6 class="ls-title-4" style="color: white; font-weight: bold;">ECOCARDIOGRAMA</h6>
                </div>
                <div class="ls-box-body">
                    <strong style="color: white;">
                        {{-- ============================================================ ALTERAR ============================================================================ --}}
                        {{ App\Solicitacao::where('geral_theme', 'ECOCARDIOGRAMA')->count() }}
                        {{-- ============================================================ ALTERAR ============================================================================ --}}
                    </strong>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3 dash">
            <div class="ls-box" style="background-color: #753b00;">
                <div class="ls-box-head">
                    <h6 class="ls-title-4" style="color: white; font-weight: bold;">ENDOSCOPIA</h6>
                </div>
                <div class="ls-box-body">
                    <strong style="color: white;">
                        {{ App\Solicitacao::where('geral_theme', 'ENDOSCOPIA')->count() }}
                    </strong>
                </div>
            </div>
        </div>
        {{-- /CARDS --}}

    </div>
@endsection
