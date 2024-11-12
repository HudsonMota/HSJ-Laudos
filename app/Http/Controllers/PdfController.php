<?php

namespace App\Http\Controllers;

use \App\Solicitacao;
use Illuminate\Support\Facades\Auth;

class PdfController extends Controller
{
    public function gerarPdf($id)
    {
        // Salva o usuário logado que está autorizando o roteiro
        $reporting = Auth::user()->name;

        // Dividindo o nome em partes
        $names = explode(' ', $reporting);
        $first_name = isset($names[0]) ? $names[0] : '';
        $second_name = isset($names[1]) ? $names[1] : '';

        // Verifica se o segundo nome tem menos de 3 caracteres
        if (strlen($second_name) < 3 && isset($names[2])) {
            $second_name = $names[2];
        }

        $solicitacao = Solicitacao::where('id', '>', 0)->where('id', 'like', $id)->get();
        return View('request-report-pdf', compact('solicitacao', 'reporting', 'first_name', 'second_name'));
    }
}
