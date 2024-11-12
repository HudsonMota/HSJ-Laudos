<?php

namespace App\Http\Controllers;

use App\Solicitacao;
use App\RoleUser;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class SolicitacaoController extends Controller
{
    // Função para mostrar view de formulário de solicitação
    public function viewRequestAdd(Request $field)
    {
        $documents = Solicitacao::all();

        return view('solicitacao/solicitacao-add', compact('documents'));
    }

    // Função para gravar dados
    public function store(Request $field)
    {
        $camposComuns = [
            'geral_theme' => $field['geral_theme'],
            'name' => $field['name'],
            'dt_nascimento' => $field['dt_nascimento'],
            'prontuario' => $field['prontuario'],
            'data_do_exame' => $field['data_do_exame'],
            'unidade' => $field['unidade'],
            'medico' => $field['medico'],
            'medico_solicitante' => $field['medico_solicitante'],
        ];
        $camposBroncoColono = [
            'indicacao' => $field['indicacao'],
            'medicacao' => $field['medicacao'],
            'descricao' => $field['descricao'],
            'impressao_diagnostica' => $field['impressao_diagnostica'],
        ];

        $camposEndoscopia = [
            'esofago' => $field['esofago'],
            'estomago' => $field['estomago'],
            'duodeno' => $field['duodeno'],
            'biopsia' => $field['biopsia'],
        ];

        $camposEcocardiograma = [
            'sexo' => $field['sexo'],
            'leito' => $field['leito'],
            'peso' => $field['peso'],
            'altura' => $field['altura'],
            'sc' => $field['sc'],
            'aorta' => $field['aorta'],
            'atrio_esquerdo' => $field['atrio_esquerdo'],
            'diametro_diastolico' => $field['diametro_diastolico'],
            'diametro_sistolico' => $field['diametro_sistolico'],
            'espessura_diastolica_septo' => $field['espessura_diastolica_septo'],
            'espessura_diastolica_parede' => $field['espessura_diastolica_parede'],
            'fracao_ejecao' => $field['fracao_ejecao'],
            'delta_d' => $field['delta_d'],
            'massa_ventricular' => $field['massa_ventricular'],
            'indice_atrio_esquerdo' => $field['indice_atrio_esquerdo'],
            'indice_diametro_diastolico' => $field['indice_diametro_diastolico'],
            'indice_massa_ventricular' => $field['indice_massa_ventricular'],
            'espessura_relativa' => $field['espessura_relativa'],
            'volume_diastolico' => $field['volume_diastolico'],
            'volume_sistolico' => $field['volume_sistolico'],
            'p_ritmo' => $field['p_ritmo'],
            'p_ventriculo_esquerdo' => $field['p_ventriculo_esquerdo'],
            'p_ventriculo_direito' => $field['p_ventriculo_direito'],
            'p_atrio_esquerdo' => $field['p_atrio_esquerdo'],
            'p_atrio_direito' => $field['p_atrio_direito'],
            'p_aorta' => $field['p_aorta'],
            'p_valva_mitral' => $field['p_valva_mitral'],
            'p_valva_aortica' => $field['p_valva_aortica'],
            'p_valva_tricuspide' => $field['p_valva_tricuspide'],
            'p_valva_pulmonar' => $field['p_valva_pulmonar'],
            'p_pericardio' => $field['p_pericardio'],
            'p_observacoes' => $field['p_observacoes'],
            'diagnostico_ecocardiografico' => $field['diagnostico_ecocardiografico'],
        ];

        $reports = new Solicitacao();

        if ($field['geral_theme'] === "BRONCOSCOPIA" || $field['geral_theme'] === "COLONOSCOPIA") {
            $reports->fill($camposComuns);
            $reports->fill($camposBroncoColono);
        } elseif ($field['geral_theme'] === "ENDOSCOPIA") {
            $reports->fill($camposComuns);
            $reports->fill($camposBroncoColono);
            $reports->fill($camposEndoscopia);
        } elseif ($field['geral_theme'] === "ECOCARDIOGRAMA") {
            $reports->fill($camposComuns);
            $reports->fill($camposEcocardiograma);
        }

        // dd($reports);

        try {
            $reports->save();
            return redirect()->route('solicitacoes')->with('msg', 'Solicitacão registrada com sucesso!');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withErrors(['Erro ao salvar solicitação.']);
        }
    }

    // Função para listar solicitações
    public function list_solicitacoes()
    {
        $user_id = Auth::user()->id;
        // dd($user_id);
        $reports = Solicitacao::orderBy('id', 'desc')->get();
        $role_id = RoleUser::where('user_id', '=', $user_id)->value('role_id');
        // dd($role_id);

        return view('solicitacao/solicitacao-list', compact('reports', 'role_id'));
    }

    // Função para exbir view de edição de formulário
    public function get_edit_solicitacao($id)
    {
        // Retorna os temas

        $reports = Solicitacao::find($id);

        // tema geral = ordem ABC


        return view('solicitacao/solicitacao-edit', compact('reports'));
    }

    // Função para editar formulário
    public function post_edit_solicitacao(Request $info, $id)
    {

        $reports = Solicitacao::find($id);

        $camposComuns = [
            'geral_theme' => $info['geral_theme'],
            'name' => $info['name'],
            'dt_nascimento' => $info['dt_nascimento'],
            'prontuario' => $info['prontuario'],
            'data_do_exame' => $info['data_do_exame'],
            'unidade' => $info['unidade'],
            'medico' => $info['medico'],
            'medico_solicitante' => $info['medico_solicitante'],
        ];
        $camposBroncoColono = [
            'indicacao' => $info['indicacao'],
            'medicacao' => $info['medicacao'],
            'descricao' => $info['descricao'],
            'impressao_diagnostica' => $info['impressao_diagnostica'],
        ];

        $camposEndoscopia = [
            'esofago' => $info['esofago'],
            'estomago' => $info['estomago'],
            'duodeno' => $info['duodeno'],
            'biopsia' => $info['biopsia'],
        ];

        $camposEcocardiograma = [
            'sexo' => $info['sexo'],
            'leito' => $info['leito'],
            'peso' => $info['peso'],
            'altura' => $info['altura'],
            'sc' => $info['sc'],
            'aorta' => $info['aorta'],
            'atrio_esquerdo' => $info['atrio_esquerdo'],
            'diametro_diastolico' => $info['diametro_diastolico'],
            'diametro_sistolico' => $info['diametro_sistolico'],
            'espessura_diastolica_septo' => $info['espessura_diastolica_septo'],
            'espessura_diastolica_parede' => $info['espessura_diastolica_parede'],
            'fracao_ejecao' => $info['fracao_ejecao'],
            'delta_d' => $info['delta_d'],
            'massa_ventricular' => $info['massa_ventricular'],
            'indice_atrio_esquerdo' => $info['indice_atrio_esquerdo'],
            'indice_diametro_diastolico' => $info['indice_diametro_diastolico'],
            'indice_massa_ventricular' => $info['indice_massa_ventricular'],
            'espessura_relativa' => $info['espessura_relativa'],
            'volume_diastolico' => $info['volume_diastolico'],
            'volume_sistolico' => $info['volume_sistolico'],
            'p_ritmo' => $info['p_ritmo'],
            'p_ventriculo_esquerdo' => $info['p_ventriculo_esquerdo'],
            'p_ventriculo_direito' => $info['p_ventriculo_direito'],
            'p_atrio_esquerdo' => $info['p_atrio_esquerdo'],
            'p_atrio_direito' => $info['p_atrio_direito'],
            'p_aorta' => $info['p_aorta'],
            'p_valva_mitral' => $info['p_valva_mitral'],
            'p_valva_aortica' => $info['p_valva_aortica'],
            'p_valva_tricuspide' => $info['p_valva_tricuspide'],
            'p_valva_pulmonar' => $info['p_valva_pulmonar'],
            'p_pericardio' => $info['p_pericardio'],
            'p_observacoes' => $info['p_observacoes'],
            'diagnostico_ecocardiografico' => $info['diagnostico_ecocardiografico'],
        ];

        // Atribuição dos campos comuns
        $reports->fill($camposComuns);

        if ($info['geral_theme'] === "BRONCOSCOPIA" || $info['geral_theme'] === "COLONOSCOPIA") {
            $reports->fill($camposBroncoColono);
            $this->limparCamposEndoscopia($reports);
            $this->limparCamposEcocardiograma($reports);
        } elseif ($info["geral_theme"] === "ECOCARDIOGRAMA") {
            $reports->fill($camposEcocardiograma);
            $this->limparCamposEndoscopia($reports);
            $this->limparCamposBroncoColono($reports);
        } elseif ($info["geral_theme"] === "ENDOSCOPIA") {
            $reports->fill($camposEndoscopia);
            $this->limparCamposEcocardiograma($reports);
        }

        $reports->save();

        return redirect()->route('solicitacoes')->with('msg', 'Solicitacão alterada com sucesso!');
    }


    // Função deletar Autorização
    public function delete_solicitacao($id)
    {
        $reports = Solicitacao::find($id);
        $reports->delete();
        return redirect()->back()->with('msg', 'Solicitacão removida com sucesso!');
    }

    // Filtro do Dashboard
    // Suas solicitações pendentes
    public function your_pending_requests(Request $field)
    {

        $users = DB::table('users')->select(
            DB::raw('id as id'),
            DB::raw('name as name')
        )->get();

        $requests = Solicitacao::where('solicitante', auth()->user()->id)
            ->where('statussolicitacao', 'PENDENTE')
            ->orderBy('id', 'DESC')->get();


        if (Solicitacao::first()) {
            $reports = true;
        } else {
            $reports = false;
        }
        return view('solicitacao/solicitacao-list', compact('reports'))
            ->with('requests', json_encode($requests))
            ->with('users', json_encode($users));
    }

    // Suas viagens solicitadas
    public function your_trips_made(Request $field)
    {

        $users = DB::table('users')->select(
            DB::raw('id as id'),
            DB::raw('name as name')
        )->get();

        $requests = Solicitacao::where('solicitante', auth()->user()->id)
            ->where('statussolicitacao', 'REALIZADO')
            ->orderBy('id', 'DESC')->get();


        if (Solicitacao::first()) {
            $reports = true;
        } else {
            $reports = false;
        }
        return view('solicitacao/solicitacao-list', compact('reports'))
            ->with('requests', json_encode($requests))
            ->with('users', json_encode($users));
    }


    private function limparCamposEndoscopia($reports)
    {
        $reports->esofago = null;
        $reports->estomago = null;
        $reports->duodeno = null;
        $reports->biopsia = null;
    }

    private function limparCamposBroncoColono($reports)
    {
        $reports->indicacao = null;
        $reports->medicacao = null;
        $reports->descricao = null;
        $reports->impressao_diagnostica = null;
    }

    private function limparCamposEcocardiograma($reports)
    {
        $reports->sexo = null;
        $reports->leito = null;
        //DADOS DO EXAME
        $reports->peso = null;
        $reports->altura = null;
        $reports->sc = null;
        $reports->aorta = null;
        $reports->atrio_esquerdo = null;
        $reports->diametro_diastolico = null;
        $reports->diametro_sistolico = null;
        $reports->espessura_diastolica_septo = null;
        $reports->espessura_diastolica_parede = null;
        $reports->fracao_ejecao = null;
        $reports->delta_d = null;
        $reports->massa_ventricular = null;
        $reports->indice_atrio_esquerdo = null;
        $reports->indice_diametro_diastolico = null;
        $reports->indice_massa_ventricular = null;
        $reports->espessura_relativa = null;
        $reports->volume_diastolico = null;
        $reports->volume_sistolico = null;
        //PARAMETROS DESCRITIVOS
        $reports->p_ritmo = null;
        $reports->p_ventriculo_esquerdo = null;
        $reports->p_ventriculo_direito = null;
        $reports->p_atrio_esquerdo = null;
        $reports->p_atrio_direito = null;
        $reports->p_aorta = null;
        $reports->p_valva_mitral = null;
        $reports->p_valva_aortica = null;
        $reports->p_valva_tricuspide = null;
        $reports->p_valva_pulmonar = null;
        $reports->p_pericardio = null;
        $reports->p_observacoes = null;
        $reports->diagnostico_ecocardiografico = null;
    }
}
