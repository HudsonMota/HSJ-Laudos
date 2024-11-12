<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoleUser;
use App\Solicitacao;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Obtenha o usuário logado
        $user_id = Auth::user()->id;
        // dd($user_id);

        $reports = Solicitacao::all();

        // Obtenha o role_id do usuário logado
        $role_id = RoleUser::where('user_id', '=', $user_id)->value('role_id');
        // dd($role_id);

        return view('home', compact('reports', 'role_id'));
    }
}
