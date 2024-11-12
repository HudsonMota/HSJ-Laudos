@extends('layouts.application')

@section('content')
    <h1 class="ls-title-intro ls-ico-code">Editar Laudo</h1>

    @csrf
    <form method="POST" action="{{ route('solicitacao.postEdit', $reports->id) }}" class="col-md-12 row" id="add">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <fieldset id="field01">
            <div class="ls-box" style="background-color:whitesmoke; width: 100%;">

                {{-- DIV FORM --}}
                <div class="col-md-12">
                    <div class="form-group" style="width: 946px; height: 40px;">
                        <label for="geral_theme">Tema Geral do Laudo: </label>
                        <select class="form-control" name="geral_theme" id="geral_theme">
                            <option value="" disabled {{ $reports->geral_theme ? '' : 'selected' }}>Selecione o Tema
                                Geral</option> <!-- Opção padrão -->
                            <option value="BRONCOSCOPIA" {{ $reports->geral_theme === 'BRONCOSCOPIA' ? 'selected' : '' }}>
                                BRONCOSCOPIA</option>
                            <option value="COLONOSCOPIA" {{ $reports->geral_theme === 'COLONOSCOPIA' ? 'selected' : '' }}>
                                COLONOSCOPIA</option>
                            <option value="ECOCARDIOGRAMA"
                                {{ $reports->geral_theme === 'ECOCARDIOGRAMA' ? 'selected' : '' }}>ECOCARDIOGRAMA</option>
                            <option value="ENDOSCOPIA" {{ $reports->geral_theme === 'ENDOSCOPIA' ? 'selected' : '' }}>
                                ENDOSCOPIA</option>
                        </select>
                    </div>
                    <br>
                    <hr>

                    {{-- ============================================================================================================================ --}}
                    {{-- CAMPOS COMUNS DO EXAME GERAL --}}
                    {{-- ============================================================================================================================ --}}
                    <div style="margin-left:1px;">
                        <div class="form-group">
                            <label for="name">Nome do Paciente: </label>
                            <textarea class="form-control" type="text" id="name" name="name"
                                style="resize: none; width: 946px; height: 40px;" value="{{ $reports->name }}">{{ $reports->name }}</textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="dt_nascimento">Data de Nascimento: </label>
                            <input class="form-control" type="date" id="dt_nascimento" name="dt_nascimento"
                                style="resize: none; width: 473px; height: 40px;"value="{{ $reports->dt_nascimento }}" />
                        </div>

                        <div class="form-group">
                            <label for="prontuario">Prontuário: </label>
                            <textarea class="form-control" type="text" id="prontuario" name="prontuario"
                                style="resize: none; width: 946px; height: 40px;"value="{{ $reports->prontuario }}">{{ $reports->prontuario }}</textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="data_do_exame">Data do Exame: </label>
                            <input class="form-control" type="date" id="data_do_exame" name="data_do_exame"
                                style="resize: none; width: 473px; height: 40px;" value="{{ $reports->data_do_exame }}" />
                        </div>

                        <hr>
                        <div class="form-group">
                            <label for="unidade">Unidade: </label>
                            <select class="form-control" name="unidade" id="unidade" style="width: 946px; height: 40px;">
                                <option value="" disabled>Selecione a unidade</option> <!-- Opção padrão -->
                                <option value="Ambulatório" {{ $reports->unidade === 'Ambulatório' ? 'selected' : '' }}>
                                    Ambulatório</option>
                                <option value="Emergencia (A)"
                                    {{ $reports->unidade === 'Emergencia (A)' ? 'selected' : '' }}>Emergencia (A)</option>
                                <option value="B" {{ $reports->unidade === 'B' ? 'selected' : '' }}>B</option>
                                <option value="C" {{ $reports->unidade === 'C' ? 'selected' : '' }}>C</option>
                                <option value="D" {{ $reports->unidade === 'D' ? 'selected' : '' }}>D</option>
                                <option value="E" {{ $reports->unidade === 'E' ? 'selected' : '' }}>E</option>
                                <option value="F" {{ $reports->unidade === 'F' ? 'selected' : '' }}>F</option>
                                <option value="UTI" {{ $reports->unidade === 'UTI' ? 'selected' : '' }}>UTI</option>
                            </select>
                        </div>


                        <hr>

                        <div class="form-group">
                            <label for="medico">Médico Laudador/CRM: </label>
                            <textarea class="form-control" type="text" id="medico" name="medico"
                                style="resize: none; width: 946px; height: 40px;"value="{{ $reports->medico }}">{{ $reports->medico }}</textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="medico_solicitante">Médico Solicitante: </label>
                            <textarea class="form-control" type="text" id="medico_solicitante" name="medico_solicitante"
                                style="resize: none; width: 946px; height: 40px;"value="{{ $reports->medico_solicitante }}">{{ $reports->medico_solicitante }}</textarea>
                        </div>
                    </div>
                    {{-- ============================================================================================================================ --}}
                    {{-- /FIM DOS CAMPOS COMUNS DO EXAME GERAL --}}
                    {{-- ============================================================================================================================ --}}

                    <hr>

                    {{-- ============================================================================================================================ --}}
                    {{-- CAMPOS ESPECÍFICOS DOS EXAMES BRONCO E COLONO  --}}
                    {{-- ============================================================================================================================ --}}
                    <div class="form-group" id="select_broncocolono" style="display:none; margin-left:1px;">
                        <div class="form-group">
                            <label for="indicacao">Indicação: </label>
                            <textarea class="form-control" type="text" id="indicacao" name="indicacao"
                                style="resize: none; width: 946px; height: 40px;"value="{{ $reports->indicacao }}">{{ $reports->indicacao }}</textarea>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="medicacao">Medicação: </label>
                            <textarea class="form-control" type="text" id="medicacao" name="medicacao"
                                style="resize: none; width: 946px; height: 40px;"value="{{ $reports->medicacao }}">{{ $reports->medicacao }}</textarea>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="descricao">Descrição: </label>
                            <textarea class="form-control" type="text" id="descricao" name="descricao"
                                style="resize: none; width: 946px; height: 40px;"value="{{ $reports->descricao }}">{{ $reports->descricao }}</textarea>
                        </div>
                        {{-- ============================================================================================================================ --}}
                        {{-- /FIM DOS CAMPOS ESPECÍFICOS DOS EXAMES BRONCO E COLONO  --}}
                        {{-- ============================================================================================================================ --}}
                        <hr>
                        {{-- ======================================================================================================================= --}}
                        {{-- CAMPOS ESPECÍFICOS DO EXAME ENDOSCOPIA --}}
                        {{-- ======================================================================================================================= --}}
                        <div class="form-group" id="select_endoscopia" style="display:none; margin-left:1px;">
                            <div class="form-group">
                                <label for="esofago">Esofago: </label>
                                <textarea class="form-control" type="text" id="esofago" name="esofago"
                                    style="resize: none; width: 946px; height: 40px;"value="{{ $reports->esofago }}">{{ $reports->esofago }}</textarea>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label for="estomago">Estomago: </label>
                                <textarea class="form-control" type="text" id="estomago" name="estomago"
                                    style="resize: none; width: 946px; height: 40px;"value="{{ $reports->estomago }}">{{ $reports->estomago }}</textarea>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label for="duodeno">Duodeno: </label>
                                <textarea class="form-control" type="text" id="duodeno" name="duodeno"
                                    style="resize: none; width: 946px; height: 40px;"value="{{ $reports->duodeno }}">{{ $reports->duodeno }}</textarea>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label for="biopsia">Biopsia: </label>
                                <textarea class="form-control" type="text" id="biopsia" name="biopsia"
                                    style="resize: none; width: 946px; height: 40px;"value="{{ $reports->biopsia }}">{{ $reports->biopsia }}</textarea>
                            </div>
                        </div>
                        {{-- ===================================================================================================================== --}}
                        {{-- /FIM DOS CAMPOS ESPECÍFICOS DO EXAME ENDOSCOPIA --}}
                        {{-- ===================================================================================================================== --}}

                        {{-- Visivel apenas em Bronco Colono e Endoscopia --}}
                        <div class="form-group">
                            <label for="impressao_diagnostica">Impressão Diagnostica: </label>
                            <textarea class="form-control" type="text" id="impressao_diagnostica" name="impressao_diagnostica"
                                style="resize: none; width: 946px; height: 40px;"value="{{ $reports->impressao_diagnostica }}">{{ $reports->impressao_diagnostica }}</textarea>
                        </div>

                        {{-- campo antigo que contem informações, só deve ser apagado daqui 30 anos, conforme a LGPD, apenas 2054
                        ou futuramente pode ser movidos os dados para a impressão diagnóstica --}}
                        @if (!($reports->conclusao === null))
                            <hr>
                            <div class="form-group">
                                <label for="conclusao">Conclusão: </label>
                                <textarea class="form-control" type="text" id="conclusao" name="conclusao"
                                    style="resize: none; width: 946px; height: 40px;"value="{{ $reports->conclusao }}">{{ $reports->conclusao }}</textarea>
                            </div>
                        @endif
                    </div>

                    {{-- ============================================================================================================================ --}}
                    {{-- CAMPOS ESPECÍFICOS DO ECOCARDIOGRAMA --}}
                    {{-- ============================================================================================================================ --}}
                    <div class="form-group" id="select_ecocardiograma" style="display:none; margin-left:1px;">

                        <hr>

                        <div class="form-group">
                            <label for="sexo">Sexo: </label>
                            <select class="form-control" name="sexo" id="sexo"
                                style="width: 946px; height: 40px;">
                                <option value="" disabled {{ $reports->sexo ? '' : 'selected' }}>Selecione o Sexo
                                </option> <!-- Opção padrão -->
                                <option value="Masculino" {{ $reports->sexo === 'Masculino' ? 'selected' : '' }}>Masculino
                                </option>
                                <option value="Feminino" {{ $reports->sexo === 'Feminino' ? 'selected' : '' }}>Feminino
                                </option>
                                <option value="Não informado" {{ $reports->sexo === 'Não informado' ? 'selected' : '' }}>
                                    Não Informado</option>
                            </select>
                        </div>


                        <hr>

                        <div class="form-group">
                            <label for="leito">Leito: </label>
                            <textarea class="form-control" type="text" id="leito" name="leito"
                                style="resize: none; width: 946px; height: 40px;"value="{{ $reports->leito }}">{{ $reports->leito }}</textarea>
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
                                        style="resize: none; width: 150px; height: 40px;" placeholder="Kg"value="{{ $reports->peso }}">{{ $reports->peso }}</textarea>

                                    <label for="altura">Altura: </label>
                                    <textarea class="form-control" type="text" id="altura" name="altura"
                                        style="resize: none; width: 150px; height: 40px;" placeholder="cm"value="{{ $reports->altura }}">{{ $reports->altura }}</textarea>

                                    <label for="sc">SC: </label>
                                    <textarea class="form-control" type="text" id="sc" name="sc"
                                        style="resize: none; width: 150px; height: 40px;" placeholder="m&sup2;"value="{{ $reports->sc }}">{{ $reports->sc }}</textarea>

                                    <label for="aorta">Aorta (Diâmetro de Raiz): </label>
                                    <textarea class="form-control" type="text" id="aorta" name="aorta"
                                        style="resize: none; width: 150px; height: 40px;" placeholder="mm"value="{{ $reports->aorta }}">{{ $reports->aorta }}</textarea>

                                    <label for="atrio_esquerdo">Átrio Esquerdo: </label>
                                    <textarea class="form-control" type="text" id="atrio_esquerdo" name="atrio_esquerdo"
                                        style="resize: none; width: 150px; height: 40px;" placeholder="mm"value="{{ $reports->atrio_esquerdo }}">{{ $reports->atrio_esquerdo }}</textarea>

                                    <label for="diametro_diastolico">Diâmetro Diastólico Final do VE: </label>
                                    <textarea class="form-control" type="text" id="diametro_diastolico" name="diametro_diastolico"
                                        style="resize: none; width: 150px; height: 40px;" placeholder="mm"value="{{ $reports->diametro_diastolico }}">{{ $reports->diametro_diastolico }}</textarea>
                                </ul>
                            </div>
                            <div class="form-group col-md-4">
                                <ul>
                                    <label for="diametro_sistolico">Diâmetro Sistólico Final do VE: </label>
                                    <textarea class="form-control" type="text" id="diametro_sistolico" name="diametro_sistolico"
                                        style="resize: none; width: 150px; height: 40px;" placeholder="mm"value="{{ $reports->diametro_sistolico }}">{{ $reports->diametro_sistolico }}</textarea>

                                    <label for="espessura_diastolica_septo">Espessura Diastolica do Septo: </label>
                                    <textarea class="form-control" type="text" id="espessura_diastolica_septo" name="espessura_diastolica_septo"
                                        style="resize: none; width: 150px; height: 40px;"
                                        placeholder="mm"value="{{ $reports->espessura_diastolica_septo }}">{{ $reports->espessura_diastolica_septo }}</textarea>

                                    <label for="espessura_diastolica_parede">Espessura Diastolica de Parede Posterior
                                        VE:</label>
                                    <textarea class="form-control" type="text" id="espessura_diastolica_parede" name="espessura_diastolica_parede"
                                        style="resize: none; width: 150px; height: 40px;"
                                        placeholder="mm"value="{{ $reports->espessura_diastolica_parede }}">{{ $reports->espessura_diastolica_parede }}</textarea>

                                    <label for="fracao_ejecao">Fração Ejeção (Teicholz): </label>
                                    <textarea class="form-control" type="text" id="fracao_ejecao" name="fracao_ejecao"
                                        style="resize: none; width: 150px; height: 40px;" placeholder="%"value="{{ $reports->fracao_ejecao }}">{{ $reports->fracao_ejecao }}</textarea>

                                    <label for="delta_d">Delta D: </label>
                                    <textarea class="form-control" type="text" id="delta_d" name="delta_d"
                                        style="resize: none; width: 150px; height: 40px;" placeholder="%"value="{{ $reports->delta_d }}">{{ $reports->delta_d }}</textarea>

                                    <label for="massa_ventricular">Massa Ventricular Esquerda: </label>
                                    <textarea class="form-control" type="text" id="massa_ventricular" name="massa_ventricular"
                                        style="resize: none; width: 150px; height: 40px;" placeholder="gr"value="{{ $reports->massa_ventricular }}">{{ $reports->massa_ventricular }}</textarea>
                                </ul>
                            </div>
                            <div class="form-group col-md-4">
                                <ul>
                                    <label for="indice_atrio_esquerdo">Indice Átrio Esquerdo: </label>
                                    <textarea class="form-control" type="text" id="indice_atrio_esquerdo" name="indice_atrio_esquerdo"
                                        style="resize: none; width: 150px; height: 40px;"
                                        placeholder="mm/m&sup2;"value="{{ $reports->indice_atrio_esquerdo }}">{{ $reports->indice_atrio_esquerdo }}</textarea>

                                    <label for="indice_diametro_diastolico">Indice Diâmetro Diastólico Ventricular Esq.:
                                    </label>
                                    <textarea class="form-control" type="text" id="indice_diametro_diastolico" name="indice_diametro_diastolico"
                                        style="resize: none; width: 150px; height: 40px;"
                                        placeholder="mm/m&sup2;"value="{{ $reports->indice_diametro_diastolico }}">{{ $reports->indice_diametro_diastolico }}</textarea>

                                    <label for="indice_massa_ventricular">Indice de Massa Ventricular Esq. - SC: </label>
                                    <textarea class="form-control" type="text" id="indice_massa_ventricular" name="indice_massa_ventricular"
                                        style="resize: none; width: 150px; height: 40px;"
                                        placeholder="gr/m&sup2;"value="{{ $reports->indice_massa_ventricular }}">{{ $reports->indice_massa_ventricular }}</textarea>

                                    <label for="espessura_relativa">Espessura Relativa de Parede VE: </label>
                                    <textarea class="form-control" type="text" id="espessura_relativa" name="espessura_relativa"
                                        style="resize: none; width: 150px; height: 40px;" placeholder=""value="{{ $reports->espessura_relativa }}">{{ $reports->espessura_relativa }}</textarea>

                                    <label for="volume_diastolico">Volume Diastólico Final VE: </label>
                                    <textarea class="form-control" type="text" id="volume_diastolico" name="volume_diastolico"
                                        style="resize: none; width: 150px; height: 40px;" placeholder="ml"value="{{ $reports->volume_diastolico }}">{{ $reports->volume_diastolico }}</textarea>

                                    <label for="volume_sistolico">Volume Sistólico Final VE: </label>
                                    <textarea class="form-control" type="text" id="volume_sistolico" name="volume_sistolico"
                                        style="resize: none; width: 150px; height: 40px;" placeholder="ml"value="{{ $reports->volume_sistolico }}">{{ $reports->volume_sistolico }}</textarea>
                                </ul>
                            </div>
                        </div>
                        {{-- /DADOS DO EXAME --}}
                        <br>
                        {{-- PARAMETROS DO EXAME --}}
                        <label for="parametros" style="font-weight:bold; font-size:18px;">Parâmetros Descritivos e Laudo:
                        </label>
                        <hr>
                        <div class="form-group">
                            <label for="p_ritmo">Ritmo: </label>
                            <textarea class="form-control" type="text" id="p_ritmo" name="p_ritmo"
                                style="width: 946px; height: 40px;"value="{{ $reports->p_ritmo }}">{{ $reports->p_ritmo }}</textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="p_ventriculo_esquerdo">Ventrículo Esquerdo: </label>
                            <textarea class="form-control" type="text" id="p_ventriculo_esquerdo" name="p_ventriculo_esquerdo"
                                style="width: 946px; height: 40px;" value="{{ $reports->p_ventriculo_esquerdo }}">{{ $reports->p_ventriculo_esquerdo }}</textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="p_ventriculo_direito">Ventrículo Direito: </label>
                            <textarea class="form-control" type="text" id="p_ventriculo_direito" name="p_ventriculo_direito"
                                style="width: 946px; height: 40px;"value="{{ $reports->p_ventriculo_direito }}">{{ $reports->p_ventriculo_direito }}</textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="p_atrio_esquerdo">Átrio Esquerdo: </label>
                            <textarea class="form-control" type="text" id="p_atrio_esquerdo" name="p_atrio_esquerdo"
                                style="width: 946px; height: 40px;"value="{{ $reports->p_atrio_esquerdo }}">{{ $reports->p_atrio_esquerdo }}</textarea>
                        </div>


                        <hr>

                        <div class="form-group">
                            <label for="p_atrio_direito">Átrio Direito: </label>
                            <textarea class="form-control" type="text" id="p_atrio_direito" name="p_atrio_direito"
                                style="width: 946px; height: 40px;"value="{{ $reports->p_atrio_direito }}">{{ $reports->p_atrio_direito }}</textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="p_aorta">Aorta: </label>
                            <textarea class="form-control" type="text" id="p_aorta" name="p_aorta" style="width: 946px; height: 40px;"
                                value="{{ $reports->p_aorta }}">{{ $reports->p_aorta }}</textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="p_valva_mitral">Valva Mitral: </label>
                            <textarea class="form-control" type="text" id="p_valva_mitral" name="p_valva_mitral"
                                style="width: 946px; height: 40px;" value="{{ $reports->p_valva_mitral }}">{{ $reports->p_valva_mitral }}</textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="p_valva_aortica">Valva Aórtica: </label>
                            <textarea class="form-control" type="text" id="p_valva_aortica" name="p_valva_aortica"
                                style="width: 946px; height: 40px;"value="{{ $reports->p_valva_aortica }}">{{ $reports->p_valva_aortica }}</textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="p_valva_tricuspide">Valva Tricúspide: </label>
                            <textarea class="form-control" type="text" id="p_valva_tricuspide" name="p_valva_tricuspide"
                                style="width: 946px; height: 40px;"value="{{ $reports->p_valva_tricuspide }}">{{ $reports->p_valva_tricuspide }}</textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="p_valva_pulmonar">Valva Pulmonar: </label>
                            <textarea class="form-control" type="text" id="p_valva_pulmonar" name="p_valva_pulmonar"
                                style="width: 946px; height: 40px;"value="{{ $reports->p_valva_pulmonar }}">{{ $reports->p_valva_pulmonar }}</textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="p_pericardio">Pericárdio: </label>
                            <textarea class="form-control" type="text" id="p_pericardio" name="p_pericardio"
                                style="width: 946px; height: 40px;" value="{{ $reports->p_pericardio }}">{{ $reports->p_pericardio }}</textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="p_observacoes">Observações: </label>
                            <textarea class="form-control" type="text" id="p_observacoes" name="p_observacoes"
                                style="width: 946px; height: 40px;"value="{{ $reports->p_observacoes }}">{{ $reports->p_observacoes }}</textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="diagnostico_ecocardiografico">Diagnóstico Ecocardiográfico: </label>
                            <textarea class="form-control" type="text" id="diagnostico_ecocardiografico" name="diagnostico_ecocardiografico"
                                style="width: 946px; height: 90px;"value="{{ $reports->diagnostico_ecocardiografico }}">{{ $reports->diagnostico_ecocardiografico }}</textarea>
                        </div>
                        {{-- PARAMETROS DO EXAME --}}
                        <hr>
                    </div>
                    {{-- ============================================================================================================================ --}}
                    {{-- CAMPOS ESPECÍFICOS DO ECOCARDIOGRAMA --}}
                    {{-- ============================================================================================================================ --}}
                </div>
            </div>
            {{-- /DIV FORM --}}
            </div>

            <br>

        </fieldset>

        <div class="col-md-12">
            <div class="jumbotron">
                <div style="font-weight: bold;">
                    <input type="submit" value="Salvar Alterações" class="ls-btn-primary" title="Editar"
                        style="font-weight: bold;">
                    <a class="ls-btn-primary-danger" style="font-weight: bold;"
                        href="{{ route('solicitacoes') }}">Cancelar</a>
                </div>
            </div>
        </div>
    </form>

    {{-- ---------------------------------- SCRIPTS ---------------------------------- --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>

    {{-- SCRIPT PARA TEMA_GERAL --}}
    <script>
        const geralTheme = document.getElementById('geral_theme');
        const broncoColonoValue = document.getElementById('select_broncocolono');
        const endoValue = document.getElementById('select_endoscopia');
        const ecoValue = document.getElementById('select_ecocardiograma');

        // Verifica o valor do geral_theme carregado pelo ID
        if ('{{ $reports->geral_theme }}' === 'ECOCARDIOGRAMA') {
            ecoValue.style.display = 'block';
            broncoColonoValue.style.display = 'none';
            endoValue.style.display = 'none';
        } else if ('{{ $reports->geral_theme }}' === 'BRONCOSCOPIA' || '{{ $reports->geral_theme }}' ===
            'COLONOSCOPIA') {
            broncoColonoValue.style.display = 'block';
            ecoValue.style.display = 'none';
            endoValue.style.display = 'none';
        } else if ('{{ $reports->geral_theme }}' === 'ENDOSCOPIA') {
            broncoColonoValue.style.display = 'block';
            endoValue.style.display = 'block';
            ecoValue.style.display = 'none';
        }

        // Adiciona evento de mudança ao geral_theme
        geralTheme.addEventListener('change', function handleChange(event) {
            switch (event.target.value) {
                case 'BRONCOSCOPIA':
                case 'COLONOSCOPIA':
                    broncoColonoValue.style.display = 'block';
                    endoValue.style.display = 'none';
                    ecoValue.style.display = 'none';
                    break;
                case 'ECOCARDIOGRAMA':
                    ecoValue.style.display = 'block';
                    broncoColonoValue.style.display = 'none';
                    endoValue.style.display = 'none';
                    break;
                case 'ENDOSCOPIA':
                    broncoColonoValue.style.display = 'block';
                    endoValue.style.display = 'block';
                    ecoValue.style.display = 'none';
                    break;
                default:
                    broncoColonoValue.style.display = 'none';
                    endoValue.style.display = 'none';
                    ecoValue.style.display = 'none';
            }
        });
    </script>

@stop
