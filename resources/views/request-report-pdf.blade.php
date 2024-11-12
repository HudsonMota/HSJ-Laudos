<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>{{ config('app.name') }}</title>
</head>

<body>
    @foreach ($solicitacao as $solicitacao)
        <div class="container" style="margin-top: -10px;">
            <!--IMAGENS-->
            <style>
                .col {
                    padding: 0px;
                }

                .imgLogo {
                    margin: 0px;
                }
            </style>
            <div class="header">
                <div class="row no-gutters align-items-center">
                    <div class="col text-center">
                        <div class="logo">
                            <img class="imgLogo" src="{{ asset('images/LaudoHSJ.png') }}" style="width:20%;" />
                        </div>
                    </div>
                    <div class="col text-center">
                        <div class="logo">
                            <img class="imgLogo" src="{{ asset('images/LogoHSJ.png') }}" style="width:40%;" />
                        </div>
                    </div>
                    <div class="col text-center">
                        <div class="logo">
                            <img class="imgLogo" src="{{ asset('images/LogoSESA.png') }}" style="width:40%;" />
                        </div>
                    </div>
                </div>
            </div>
            <!--/IMAGENS-->
            <br>
            <div class="body text-center">
                <div id="request">
                    <h2 class="smaller-header"><img src="{{ asset('images/LaudoHSJ.png') }}"
                            style="width: 5%; margin-top: -10px;">LAUDOS-HSJ
                    </h2><br />
                    <table class="table-bordered border-secondary">
                        <thead>
                            <tr>
                                <th style="background-color: #c6c6c6;" class="smaller-header">
                                    <h5>DADOS DO PACIENTE</h5>
                                </th>
                            </tr>
                        </thead>
                    </table>

                    <table class="table-bordered border-secondary">
                        <tbody>
                            <tr>
                                <th>Nome</th>
                                <td> {{ $solicitacao->name }}</td>
                            </tr>
                            <tr>
                                <th>Data de Nascimento</th>
                                <td>{{ \Carbon\Carbon::parse($solicitacao->dt_nascimento)->format('d/m/Y') }}</td>
                            </tr>
                            <tr>
                                <th>Prontuário</th>
                                <td> {{ $solicitacao->prontuario }}</td>
                            </tr>
                            <tr>
                                <th>Médico Solicitante</th>
                                <td>{{ $solicitacao->medico_solicitante }}</td>
                            </tr>
                            <tr>
                                <th>Data do Exame</th>
                                <td>
                                    {{ \Carbon\Carbon::parse($solicitacao->data_do_exame)->format('d/m/Y') }} -
                                    {{ \Carbon\Carbon::parse($solicitacao->created_at)->format('H:i:s') }}
                                </td>
                            </tr>

                            <tr>
                                <th>Unidade</th>
                                <td>{{ strlen($solicitacao->unidade) < 2 ? 'Unidade ' . $solicitacao->unidade : $solicitacao->unidade }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <br>

                <div id="goal">
                    <table class="table-bordered border-secondary">
                        <thead>
                            <tr>
                                <th style="background-color: #c6c6c6;" class="smaller-header">
                                    <h5>DADOS DO EXAME</h5>
                                </th>
                            </tr>
                        </thead>
                    </table>

                    <table class="table-bordered border-secondary">
                        <tbody>
                            <tr>
                                <th>Exame</th>
                                <td><b>{{ $solicitacao->geral_theme }}</b></td>
                            </tr>
                            <tr>
                                <th>Médico Laudador/CRM</th>
                                <td>{{ $solicitacao->medico }}</td>
                            </tr>
                            {{-- BRONCO, COLONO e ENDOSCOPIA --}}
                            @if (
                                $solicitacao->geral_theme == 'BRONCOSCOPIA' ||
                                    $solicitacao->geral_theme == 'COLONOSCOPIA' ||
                                    $solicitacao->geral_theme == 'ENDOSCOPIA')
                                <tr>
                                    <th>Indicação</th>
                                    <td>{{ $solicitacao->indicacao }}</td>
                                </tr>
                                <tr>
                                    <th>Medicação</th>
                                    <td>{{ $solicitacao->medicacao }}</td>
                                </tr>
                                <tr>
                                    <th>Descrição</th>
                                    <td class="descricao">{{ $solicitacao->descricao }}</td>
                                </tr>
                                @if ($solicitacao->geral_theme == 'ENDOSCOPIA')
                                    <tr>
                                        <th>Esofago</th>
                                        <td>{{ $solicitacao->esofago }}</td>
                                    </tr>
                                    <tr>
                                        <th>Estomago</th>
                                        <td>{{ $solicitacao->estomago }}</td>
                                    </tr>
                                    <tr>
                                        <th>Duodeno</th>
                                        <td>{{ $solicitacao->duodeno }}</td>
                                    </tr>
                                    <tr>
                                        <th>Biopsia</th>
                                        <td>{{ $solicitacao->biopsia }}</td>
                                    </tr>
                                @endif
                            @endif
                            {{-- BRONCO, COLONO e ENDOSCOPIA --}}
                            {{-- ECOCARDIOGRAMA --}}
                            @if ($solicitacao->geral_theme == 'ECOCARDIOGRAMA')
                                <tr>
                                    <th>Sexo</th>
                                    <td>{{ $solicitacao->sexo }}</td>
                                </tr>
                                <tr>
                                    <th>Leito</th>
                                    <td>{{ $solicitacao->leito }}</td>
                                </tr>

                                <div style="font-size: 10px; background-color: #c6c6c6; color: rgb(88, 5, 5);;">
                                    <style>
                                        .row {
                                            margin-bottom: 2px;
                                            /* reduzir margem inferior */
                                        }

                                        label {
                                            padding: 1px;
                                            display: inline-block;
                                            /* reduzir padding */
                                        }

                                        .col-md-4 {
                                            padding: 1px;
                                            /* reduzir padding */
                                        }

                                        hr {
                                            margin-top: 0px;
                                            /* remover margem superior da linha horizontal */
                                            margin-bottom: 0px;
                                            /* remover margem inferior da linha horizontal */
                                        }
                                    </style>

                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <style>
                                                b {
                                                    color: black;
                                                }
                                            </style>
                                            <label><b>Peso:</b> <br>{{ $solicitacao->peso }}</label>
                                        </div>
                                        <div class="col-md-4">
                                            <label><b>Diâmetro Sistólico Final do
                                                    VE:</b><br>
                                                {{ $solicitacao->diametro_sistolico }}</label>
                                        </div>
                                        <div class="col-md-4">
                                            <label><b>Indice Átrio Esquerdo:</b><br>
                                                {{ $solicitacao->indice_atrio_esquerdo }}</label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <label><b>Altura:</b><br>
                                                {{ $solicitacao->altura }}</label>
                                        </div>
                                        <div class="col-md-4">
                                            <label><b>Espessura Diastolica do
                                                    Septo:</b><br>
                                                {{ $solicitacao->espessura_diastolica_septo }}</label>
                                        </div>
                                        <div class="col-md-4">
                                            <label><b>Indice Diâmetro Diastólico
                                                    Ventricular Esq.:</b><br>
                                                {{ $solicitacao->indice_diametro_diastolico }}</label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <label><b>SC:</b> <br>{{ $solicitacao->sc }}</label>
                                        </div>
                                        <div class="col-md-4">
                                            <label><b>Espessura Diastolica de
                                                    Parede
                                                    Posterior VE:</b><br>
                                                {{ $solicitacao->espessura_diastolica_parede }}</label>
                                        </div>
                                        <div class="col-md-4">
                                            <label><b>Indice de Massa Ventricular
                                                    Esq. - SC: </b><br>
                                                {{ $solicitacao->indice_massa_ventricular }}</label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <label><b>Aorta (Diâmetro de Raiz):</b><br>
                                                {{ $solicitacao->aorta }}</label>
                                        </div>
                                        <div class="col-md-4">
                                            <label><b>Fração Ejeção (Teicholz):</b><br>
                                                {{ $solicitacao->fracao_ejecao }}</label>
                                        </div>
                                        <div class="col-md-4">
                                            <label><b>Delta D:</b><br>
                                                {{ $solicitacao->delta_d }}</label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <label><b>Átrio Esquerdo:</b><br>
                                                {{ $solicitacao->atrio_esquerdo }}</label>
                                        </div>
                                        <div class="col-md-4">
                                            <label><b>Massa Ventricular Esquerda:</b><br>
                                                {{ $solicitacao->massa_ventricular }}</label>
                                        </div>
                                        <div class="col-md-4">
                                            <label><b>Espessura Relativa de Parede
                                                    VE:</b><br>
                                                {{ $solicitacao->espessura_relativa }}</label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <label><b>Diâmetro Diastólico Final do
                                                    VE:</b><br>
                                                {{ $solicitacao->diametro_diastolico }}</label>
                                        </div>
                                        <div class="col-md-4">
                                            <label><b>Volume Diastólico Final VE:</b><br>
                                                {{ $solicitacao->volume_diastolico }}</label>
                                        </div>
                                        <div class="col-md-4">
                                            <label><b>Volume Sistólico Final VE:</b><br>
                                                {{ $solicitacao->volume_sistolico }}</label>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <tr>
                                    <th>Ritmo</th>
                                    <td>{{ $solicitacao->p_ritmo }}</td>
                                </tr>
                                <tr>
                                    <th>Ventrículo Esquerdo</th>
                                    <td>{{ $solicitacao->p_ventriculo_esquerdo }}</td>
                                </tr>
                                <tr>
                                    <th>Ventrículo Direito</th>
                                    <td>{{ $solicitacao->p_ventriculo_direito }}</td>
                                </tr>
                                <tr>
                                    <th>Átrio Esquerdo</th>
                                    <td>{{ $solicitacao->p_atrio_esquerdo }}</td>
                                </tr>
                                <tr>
                                    <th>Átrio Direito</th>
                                    <td>{{ $solicitacao->p_atrio_direito }}</td>
                                </tr>
                                <tr>
                                    <th>Aorta</th>
                                    <td>{{ $solicitacao->p_aorta }}</td>
                                </tr>
                                <tr>
                                    <th>Valva Mitral</th>
                                    <td>{{ $solicitacao->p_valva_mitral }}</td>
                                </tr>
                                <tr>
                                    <th>Valva Aórtica</th>
                                    <td>{{ $solicitacao->p_valva_aortica }}</td>
                                </tr>
                                <tr>
                                    <th>Valva Tricúspide</th>
                                    <td>{{ $solicitacao->p_valva_tricuspide }}</td>
                                </tr>
                                <tr>
                                    <th>Valva Pulmonar</th>
                                    <td>{{ $solicitacao->p_valva_pulmonar }}</td>
                                </tr>
                                <tr>
                                    <th>Pericárdio</th>
                                    <td>{{ $solicitacao->p_pericardio }}</td>
                                </tr>
                                <tr>
                                    <th>Observações</th>
                                    <td>{{ $solicitacao->p_observacoes }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <br>

                <div id="goal">
                    <table class="table-bordered border-secondary">
                        <thead>
                            <tr>
                                <th style="width: 1000px; background-color: #c6c6c6;" class="smaller-header">
                                    <h5>CONCLUSÃO</h5>
                                </th>
                            </tr>
                        </thead>
                    </table>

                    <table class="table-bordered border-secondary">
                        <thead>
                            <tr>
                                @if (
                                    $solicitacao->geral_theme == 'BRONCOSCOPIA' ||
                                        $solicitacao->geral_theme == 'COLONOSCOPIA' ||
                                        $solicitacao->geral_theme == 'ENDOSCOPIA')
                                    <th style="width: 300px; height:40px;">Impressão Diagnostica</th>
                                    <td style="width: 700px; height:40px;"> {{ $solicitacao->impressao_diagnostica }}
                                    </td>
                                @elseif($solicitacao->geral_theme == 'ECOCARDIOGRAMA')
                                    <th style="width: 300px; height:40px;">Diagnóstico Ecocardiográfico</th>
                                    <td style="width: 300px; height:40px;">
                                        {{ $solicitacao->diagnostico_ecocardiografico }}</td>
                                @endif
                            </tr>
                            @if ($solicitacao->conclusao != null)
                                <tr>
                                    <th>Conclusão</th>
                                    <td>{{ $solicitacao->conclusao }}</td>
                                </tr>
                            @endif
                        </thead>
                    </table>
                </div>
            </div>
            {{-- /CORPO --}}
            <br>
            <div class="footer">
                <div class="small-text">
                    <p>Laudado em:
                        {{ \Carbon\Carbon::parse($solicitacao->created_at)->format('d/m/Y') }}
                        <br><br>
                        ________________________________________<br>
                        {{ $reporting }}
                    </p>
                </div>
            </div>
        </div>
    @endforeach
</body>

</html>


<style>
    body {
        background-color: #525659;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        font-size: 0.8em;
        /* Reduz o tamanho da fonte de todo o documento */
    }

    .container {
        background-color: #fff;
        width: 210mm;
        /* A4 width */
        min-height: 297mm;
        /* A4 height */
        padding: 20mm;
        /* Adjust padding to avoid content cutoff */
        box-sizing: border-box;
        margin: auto;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .header {
        border: 1px solid #000;
        padding: 10px;
        text-align: center;
    }

    .imgLogo {
        width: 200px;
    }

    .body {
        padding: 10px 0;
        width: 100%;
    }

    .footer {
        position: relative;
        width: 100%;
        text-align: center;
    }

    .imgfooter {
        width: 100%;
        max-width: 900px;
    }

    .small-text {
        font-size: 0.7em;
        /* Diminui ainda mais a fonte final */
        color: darkslategray;
        margin-left: 450px;
    }

    .smaller-header {
        font-size: 0.8em;
        /* Diminui o tamanho da fonte dos cabeçalhos específicos */
    }

    table {
        margin: auto;
        width: 100%;
    }

    th,
    td {
        text-align: center;
        padding: 4px;
        /* Ajusta o padding para caber mais conteúdo */
        border: 1px solid #ddd;
    }

    @media print {
        @page {
            size: A4;
            margin: 0;
        }

        body {
            background-color: white;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        .container {
            width: 100%;
            max-width: 190mm;
            /* Ensure it fits within A4 with margins */
            padding: 10mm;
            box-sizing: border-box;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .footer {
            bottom: 10mm;
            position: relative;
            width: 100%;
            text-align: center;
        }

        .imgfooter {
            width: 100%;
            max-width: 180mm;
        }

        table {
            border-collapse: collapse;
            margin-bottom: 20px;
            width: 100%;
        }

        th,
        td {
            padding: 4px;
            text-align: center;
            border: 1px solid #ddd;
        }
    }

    .descricao {
        overflow-wrap: break-word;
        max-width: 100px;
        height: 40px;
    }
</style>
