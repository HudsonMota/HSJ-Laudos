@extends('layouts.application')

@section('content')
    <h1 class="ls-title-intro ls-ico-code">Cadastrar Laudo</h1>

    <form method="POST" action="{{ route('solicitacao.postAdd') }}" class="col-md-12 row" id="add" autocomplete="on">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <fieldset id="field01">
            <div class="ls-box" style="background-color:whitesmoke; width: 100%;">

                {{-- DIV FORM --}}
                <div class="col-md-12">
                    <div class="form-group"style="width: 946px; height: 40px;">
                        <label for="geral_theme">Tema Geral do Laudo: </label>
                        <select class="form-control" name="geral_theme" id="geral_theme">
                            <option value="" selected disabled>...</option>
                            <option value="BRONCOSCOPIA">BRONCOSCOPIA</option>
                            <option value="COLONOSCOPIA">COLONOSCOPIA</option>
                            <option value="ECOCARDIOGRAMA">ECOCARDIOGRAMA</option>
                            <option value="ENDOSCOPIA">ENDOSCOPIA</option>
                        </select>
                    </div>

                    <br>
                    <hr>
                    {{-- ============================================================================================================================ --}}
                    {{-- /CAMPOS ESPECÍFICOS DO EXAME GERAL --}}
                    {{-- ============================================================================================================================ --}}
                    <div class="initial" id="initial" style="display: none; margin-left:1px;">
                        <div class="form-group">
                            <label for="name">Nome do Paciente: </label>
                            <textarea class="form-control" type="text" id="name" name="name"
                                style="resize: none; width: 946px; height: 40px;"></textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="dt_nascimento">Data de Nascimento: </label>
                            <input class="form-control" type="date" id="dt_nascimento" name="dt_nascimento"
                                style="resize: none; width: 473px; height: 40px;" />
                        </div>


                        <div class="form-group">
                            <label for="prontuario">Prontuário: </label>
                            <textarea class="form-control" type="text" id="prontuario" name="prontuario"
                                style="resize: none; width: 946px; height: 40px;"></textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="data_do_exame">Data do Exame: </label>
                            <input class="form-control" type="date" id="data_do_exame" name="data_do_exame"
                                value="<?php echo date('Y-m-d'); ?>" style="resize: none; width: 473px; height: 40px;" />
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="unidade">Unidade: </label>
                            <select class="form-control" name="unidade" id="unidade" style="width: 946px; height: 40px;">
                                <option value="" selected disabled>...</option>
                                <option value="Ambulatório">Ambulatório</option>
                                <option value="Emergencia (A)">Emergencia (A)</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                                <option value="F">F</option>
                                <option value="UTI">UTI</option>
                            </select>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="medico">Médico Laudador/CRM:</label>
                            <textarea class="form-control" type="text" id="medico" name="medico"
                                style="resize: none; width: 946px; height: 40px;"></textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="medico_solicitante">Médico Solicitante: </label>
                            <textarea class="form-control" type="text" id="medico_solicitante" name="medico_solicitante"
                                style="resize: none; width: 946px; height: 40px;"></textarea>
                        </div>
                    </div>

                    <div class="form-group" id="geral_select" style="display:none; margin-left:1px;">

                        <hr>

                        <div class="form-group">
                            <label for="indicacao">Indicação: </label>
                            <textarea class="form-control" type="text" id="indicacao" name="indicacao"
                                style="resize: none; width: 946px; height: 40px;"></textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="medicacao">Medicação: </label>
                            <textarea class="form-control" type="text" id="medicacao" name="medicacao"
                                style="resize: none; width: 946px; height: 40px;"></textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="descricao">Descrição: </label>
                            <textarea class="form-control" type="text" id="descricao" name="descricao"
                                style="resize: none; width: 946px; height: 40px;"></textarea>
                        </div>

                        <hr>
                        {{-- ======================================================================================================================= --}}
                        {{-- CAMPOS ESPECÍFICOS DO EXAME ENDOSCOPIA --}}
                        {{-- ======================================================================================================================= --}}
                        <div class="form-group" id="select_endoscopia" style="display:none; margin-left:1px;">
                            <div class="form-group">
                                <label for="esofago">Esofago: </label>
                                <textarea class="form-control" type="text" id="esofago" name="esofago"
                                    style="resize: none; width: 946px; height: 40px;"></textarea>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label for="estomago">Estomago: </label>
                                <textarea class="form-control" type="text" id="estomago" name="estomago"
                                    style="resize: none; width: 946px; height: 40px;"></textarea>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label for="duodeno">Duodeno: </label>
                                <textarea class="form-control" type="text" id="duodeno" name="duodeno"
                                    style="resize: none; width: 946px; height: 40px;"></textarea>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label for="biopsia">Biopsia: </label>
                                <textarea class="form-control" type="text" id="biopsia" name="biopsia"
                                    style="resize: none; width: 946px; height: 40px;"></textarea>
                            </div>
                            {{-- ===================================================================================================================== --}}
                            {{-- CAMPOS ESPECÍFICOS DO EXAME ENDOSCOPIA --}}
                            {{-- ===================================================================================================================== --}}
                            <hr>

                        </div>

                        <div class="form-group">
                            <label for="impressao_diagnostica">Impressão Diagnostica: </label>
                            <textarea class="form-control" type="text" id="impressao_diagnostica" name="impressao_diagnostica"
                                style="resize: none; width: 946px; height: 40px;"></textarea>
                        </div>
                    </div>
                    {{-- ============================================================================================================================ --}}
                    {{-- /CAMPOS ESPECÍFICOS DO EXAME GERAL --}}
                    {{-- ============================================================================================================================ --}}


                    {{-- ============================================================================================================================ --}}
                    {{-- CAMPOS ESPECÍFICOS DO ECOCARDIOGRAMA --}}
                    {{-- ============================================================================================================================ --}}
                    <div class="form-group" id="select_ecocardiograma" style="display:none; margin-left:1px;">

                        <hr>

                        <div class="form-group">
                            <label for="sexo">Sexo: </label>
                            <select class="form-control" name="sexo" id="sexo"
                                style="width: 946px; height: 40px;">
                                <option value="" selected disabled>...</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                                <option value="Não informado">Não Informado</option>
                            </select>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="leito">Leito: </label>
                            <textarea class="form-control" type="text" id="leito" name="leito"
                                style="resize: none; width: 946px; height: 40px;"></textarea>
                        </div>

                        {{-- DADOS DO EXAME --}}
                        <div class="form-group col-md-12"
                            style="background-color: rgba(0, 0, 0, 0.499); color: white; width: 945px; height: 535px;">
                            <div>
                                <label for="medico" style="font-weight:bold; font-size:18px;">DADOS DO
                                    EXAME:
                                </label>
                            </div>
                            <div class="form-group col-md-4">
                                <ul>
                                    <label for="peso">Peso: </label>
                                    <textarea class="form-control" type="text" id="peso" name="peso"
                                        style="resize: none; width: 150px; height: 40px;" placeholder="Kg"></textarea>

                                    <label for="altura">Altura: </label>
                                    <textarea class="form-control" type="text" id="altura" name="altura"
                                        style="resize: none; width: 150px; height: 40px;" placeholder="cm"></textarea>

                                    <label for="sc">SC: </label>
                                    <textarea class="form-control" type="text" id="sc" name="sc"
                                        style="resize: none; width: 150px; height: 40px;" placeholder="m&sup2;"></textarea>

                                    <label for="aorta">Aorta (Diâmetro de Raiz): </label>
                                    <textarea class="form-control" type="text" id="aorta" name="aorta"
                                        style="resize: none; width: 150px; height: 40px;" placeholder="mm"></textarea>

                                    <label for="atrio_esquerdo">Átrio Esquerdo: </label>
                                    <textarea class="form-control" type="text" id="atrio_esquerdo" name="atrio_esquerdo"
                                        style="resize: none; width: 150px; height: 40px;" placeholder="mm"></textarea>

                                    <label for="diametro_diastolico">Diâmetro Diastólico Final do VE: </label>
                                    <textarea class="form-control" type="text" id="diametro_diastolico" name="diametro_diastolico"
                                        style="resize: none; width: 150px; height: 40px;" placeholder="mm"></textarea>
                                </ul>
                            </div>
                            <div class="form-group col-md-4">
                                <ul>
                                    <label for="diametro_sistolico">Diâmetro Sistólico Final do VE: </label>
                                    <textarea class="form-control" type="text" id="diametro_sistolico" name="diametro_sistolico"
                                        style="resize: none; width: 150px; height: 40px;" placeholder="mm"></textarea>

                                    <label for="espessura_diastolica_septo">Espessura Diastolica do Septo: </label>
                                    <textarea class="form-control" type="text" id="espessura_diastolica_septo" name="espessura_diastolica_septo"
                                        style="resize: none; width: 150px; height: 40px;" placeholder="mm"></textarea>

                                    <label for="espessura_diastolica_parede">Espessura Diastolica de Parede Posterior VE:
                                    </label>
                                    <textarea class="form-control" type="text" id="espessura_diastolica_parede" name="espessura_diastolica_parede"
                                        style="resize: none; width: 150px; height: 40px;" placeholder="mm"></textarea>

                                    <label for="fracao_ejecao">Fração Ejeção (Teicholz): </label>
                                    <textarea class="form-control" type="text" id="fracao_ejecao" name="fracao_ejecao"
                                        style="resize: none; width: 150px; height: 40px;" placeholder="%"></textarea>

                                    <label for="delta_d">Delta D: </label>
                                    <textarea class="form-control" type="text" id="delta_d" name="delta_d"
                                        style="resize: none; width: 150px; height: 40px;" placeholder="%"></textarea>

                                    <label for="massa_ventricular">Massa Ventricular Esquerda: </label>
                                    <textarea class="form-control" type="text" id="massa_ventricular" name="massa_ventricular"
                                        style="resize: none; width: 150px; height: 40px;" placeholder="gr"></textarea>
                                </ul>
                            </div>
                            <div class="form-group col-md-4">
                                <ul>
                                    <label for="indice_atrio_esquerdo">Indice Átrio Esquerdo: </label>
                                    <textarea class="form-control" type="text" id="indice_atrio_esquerdo" name="indice_atrio_esquerdo"
                                        style="resize: none; width: 150px; height: 40px;" placeholder="mm/m&sup2;"></textarea>

                                    <label for="indice_diametro_diastolico">Indice Diâmetro Diastólico Ventricular Esq.:
                                    </label>
                                    <textarea class="form-control" type="text" id="indice_diametro_diastolico" name="indice_diametro_diastolico"
                                        style="resize: none; width: 150px; height: 40px;" placeholder="mm/m&sup2;"></textarea>

                                    <label for="indice_massa_ventricular">Indice de Massa Ventricular Esq. - SC: </label>
                                    <textarea class="form-control" type="text" id="indice_massa_ventricular" name="indice_massa_ventricular"
                                        style="resize: none; width: 150px; height: 40px;" placeholder="gr/m&sup2;"></textarea>

                                    <label for="espessura_relativa">Espessura Relativa de Parede VE: </label>
                                    <textarea class="form-control" type="text" id="espessura_relativa" name="espessura_relativa"
                                        style="resize: none; width: 150px; height: 40px;" placeholder=""></textarea>

                                    <label for="volume_diastolico">Volume Diastólico Final VE: </label>
                                    <textarea class="form-control" type="text" id="volume_diastolico" name="volume_diastolico"
                                        style="resize: none; width: 150px; height: 40px;" placeholder="ml"></textarea>

                                    <label for="volume_sistolico">Volume Sistólico Final VE: </label>
                                    <textarea class="form-control" type="text" id="volume_sistolico" name="volume_sistolico"
                                        style="resize: none; width: 150px; height: 40px;" placeholder="ml"></textarea>
                                </ul>
                            </div>
                        </div>
                        {{-- /DADOS DO EXAME --}}
                        <br>

                        <label for="parametros" style="font-weight:bold; font-size:18px;">Parâmetros Descritivos e Laudo:
                        </label>
                        <hr>
                        <div class="form-group">
                            <label for="p_ritmo">Ritmo: </label>
                            <textarea class="form-control" type="text" id="p_ritmo" name="p_ritmo" style="width: 946px; height: 40px;"></textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="p_ventriculo_esquerdo">Ventrículo Esquerdo: </label>
                            <textarea class="form-control" type="text" id="p_ventriculo_esquerdo" name="p_ventriculo_esquerdo"
                                style="width: 946px; height: 40px;"></textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="p_ventriculo_direito">Ventrículo Direito: </label>
                            <textarea class="form-control" type="text" id="p_ventriculo_direito" name="p_ventriculo_direito"
                                style="width: 946px; height: 40px;"></textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="p_atrio_esquerdo">Átrio Esquerdo: </label>
                            <textarea class="form-control" type="text" id="p_atrio_esquerdo" name="p_atrio_esquerdo"
                                style="width: 946px; height: 40px;"></textarea>
                        </div>


                        <hr>

                        <div class="form-group">
                            <label for="p_atrio_direito">Átrio Direito: </label>
                            <textarea class="form-control" type="text" id="p_atrio_direito" name="p_atrio_direito"
                                style="width: 946px; height: 40px;"></textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="p_aorta">Aorta: </label>
                            <textarea class="form-control" type="text" id="p_aorta" name="p_aorta" style="width: 946px; height: 40px;"></textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="p_valva_mitral">Valva Mitral: </label>
                            <textarea class="form-control" type="text" id="p_valva_mitral" name="p_valva_mitral"
                                style="width: 946px; height: 40px;"></textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="p_valva_aortica">Valva Aórtica: </label>
                            <textarea class="form-control" type="text" id="p_valva_aortica" name="p_valva_aortica"
                                style="width: 946px; height: 40px;"></textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="p_valva_tricuspide">Valva Tricúspide: </label>
                            <textarea class="form-control" type="text" id="p_valva_tricuspide" name="p_valva_tricuspide"
                                style="width: 946px; height: 40px;"></textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="p_valva_pulmonar">Valva Pulmonar: </label>
                            <textarea class="form-control" type="text" id="p_valva_pulmonar" name="p_valva_pulmonar"
                                style="width: 946px; height: 40px;"></textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="p_pericardio">Pericárdio: </label>
                            <textarea class="form-control" type="text" id="p_pericardio" name="p_pericardio"
                                style="width: 946px; height: 40px;"></textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="p_observacoes">Observações: </label>
                            <textarea class="form-control" type="text" id="p_observacoes" name="p_observacoes"
                                style="width: 946px; height: 40px;"></textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="diagnostico_ecocardiografico">Diagnóstico Ecocardiográfico: </label>
                            <textarea class="form-control" type="text" id="diagnostico_ecocardiografico" name="diagnostico_ecocardiografico"
                                style="width: 946px; height: 90px;"></textarea>
                        </div>

                        <hr>

                    </div>
                    {{-- ============================================================================================================================ --}}
                    {{-- CAMPOS ESPECÍFICOS DO ECOCARDIOGRAMA --}}
                    {{-- ============================================================================================================================ --}}
                </div>
            </div>
            {{-- /DIV FORM --}}
            </div>
            {{-- DIVS PARA CASOS ESPECÍFICOS NOS EXAMES --}}
            {{-- <div class="col-md-12" id="select_broncoscopia" style="display:none; margin-left:1px;"> </div> --}}
            {{-- <div class="col-md-12" id="select_colonoscopia" style="display:none; margin-left:1px;"> </div> --}}
            {{-- <div class="col-md-12" id="select_ecocardiograma" style="display:none; margin-left:1px;"> </div> --}}
            {{-- <div class="col-md-12" id="select_endoscopia" style="display:none; margin-left:1px;"> </div> --}}
            <br>

        </fieldset>

        <div style="margin-top: 10px;" class="col-md-12">
            <div class="jumbotron">
                <div style="font-weight: bold;">
                    <input type="submit" value="Cadastrar" class="ls-btn-primary" title="Cadastrar"
                        style="font-weight: bold;">
                    <input class="ls-btn-primary-danger" type="reset" value="Limpar Formulário"
                        style="font-weight: bold;">
                </div>
            </div>
        </div>
    </form>

    {{-- ---------------------------------- SCRIPTS ---------------------------------- --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>

    {{-- SCRIPT PARA TEMA_GERAL --}}
    <script>
        const initial = document.getElementById('initial');
        const geral_theme = document.getElementById('geral_theme');
        const geral_select = document.getElementById('geral_select');
        const bronco_value = document.getElementById('select_broncoscopia');
        const colono_value = document.getElementById('select_colonoscopia');
        const eco_value = document.getElementById('select_ecocardiograma');
        const endo_value = document.getElementById('select_endoscopia');

        //INICIO
        geral_theme.addEventListener('change', function handleChange(event) {
            if (event.target.value === '') {
                initial.style.display = 'none';
            } else {
                initial.style.display = 'block';
            }
        });

        // GERAL
        geral_theme.addEventListener('change', function handleChange(event) {
            if (!(event.target.value === 'ECOCARDIOGRAMA')) {
                geral_select.style.display = 'block';
            } else {
                geral_select.style.display = 'none';
            }
        });
        // BRONCOSCOPIA
        geral_theme.addEventListener('change', function handleChange(event) {
            if (event.target.value === 'BRONCOSCOPIA') {
                bronco_value.style.display = 'block';
            } else {
                bronco_value.style.display = 'none';
            }
        });
        // COLUNOSCOPIA
        geral_theme.addEventListener('change', function handleChange(event) {
            if (event.target.value === 'COLONOSCOPIA') {
                colono_value.style.display = 'block';
            } else {
                colono_value.style.display = 'none';
            }
        });
        // ECOCARDIOGRAMA
        geral_theme.addEventListener('change', function handleChange(event) {
            if (event.target.value === 'ECOCARDIOGRAMA') {
                eco_value.style.display = 'block';
            } else {
                eco_value.style.display = 'none';
            }
        });
        // ENDOSCOPIA
        geral_theme.addEventListener('change', function handleChange(event) {
            if (event.target.value === 'ENDOSCOPIA') {
                endo_value.style.display = 'block';
            } else {
                endo_value.style.display = 'none';
            }
        });
    </script>

@stop
