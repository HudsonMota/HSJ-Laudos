<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    protected $table = "reports";

    protected $fillable = [
        'geral_theme',
        'name',
        'dt_nascimento',
        'prontuario',
        'data_do_exame',
        'unidade',
        'medico',
        'medico_solicitante',
        'indicacao',
        'medicacao',
        'descricao',
        'impressao_diagnostica',
        'esofago',
        'estomago',
        'duodeno',
        'biopsia',
        'sexo',
        'leito',
        'peso',
        'altura',
        'sc',
        'aorta',
        'atrio_esquerdo',
        'diametro_diastolico',
        'diametro_sistolico',
        'espessura_diastolica_septo',
        'espessura_diastolica_parede',
        'fracao_ejecao',
        'delta_d',
        'massa_ventricular',
        'indice_atrio_esquerdo',
        'indice_diametro_diastolico',
        'indice_massa_ventricular',
        'espessura_relativa',
        'volume_diastolico',
        'volume_sistolico',
        'p_ritmo',
        'p_ventriculo_esquerdo',
        'p_ventriculo_direito',
        'p_atrio_esquerdo',
        'p_atrio_direito',
        'p_aorta',
        'p_valva_mitral',
        'p_valva_aortica',
        'p_valva_tricuspide',
        'p_valva_pulmonar',
        'p_pericardio',
        'p_observacoes',
        'diagnostico_ecocardiografico'
    ];
}
