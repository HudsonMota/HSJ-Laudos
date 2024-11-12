<!DOCTYPE html>
<html class="ls-theme-light-blue" lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="Insira aqui a descrição da página.">
    <link href="http://assets.locaweb.com.br/locastyle/3.10.0/stylesheets/locastyle.css" rel="stylesheet"
        type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon" />
    <title>{{ config('app.name') }}</title>
</head>

<body>
    <div class="ls-topbar ">

        <script src="js/app.js" charset="utf-8"></script>
        <!-- Barra de Notificações -->
        <div class="ls-notification-topbar">
            <!-- Dropdown com detalhes da conta de usuário -->
            <div data-ls-module="dropdown" class="ls-dropdown ls-user-account">
                <a href="#" class="ls-ico-user">
                    <span class="ls-name">{{ Auth::user()->name }}</span>
                </a>

                <nav class="ls-dropdown-nav ls-user-menu">
                    <ul>
                        <li><a href="{{ route('logout') }}" id="link">Sair</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Nome do produto/marca com sidebar -->


        <h1 class="ls-brand-name">
            <div class="container-fluid">
                <img src="{{ asset('images/LaudoHSJ.png') }}" alt="YOUR LOGO HERE!"
                    style="width: 8%; margin-top:-10px; margin-left:-20px;">
                <b>LAUDOS-HSJ</b>
            </div>
        </h1>
    </div>

    <aside class="ls-sidebar">
        <div class="ls-sidebar-inner">
            <a href="/locawebstyle/documentacao/exemplos//pre-painel" class="ls-go-prev">
                <span class="ls-text">Voltar à lista de controle</span></a>

            <nav class="ls-menu">
                <ul>
                    <!-- PÁGINA INICIAL -->
                    <li><a href="/" class="ls-ico-home" title="Pagina Inicial" id="link">Pagina Inicial</a>
                    </li>
                    <!-- /PÁGINA INICIAL -->

                    <!-- ADMINISTRATIVO -->
                    @can('Manages Users')
                        <li>
                            <a href="#" class="ls-ico-cog" title="Administrativo" id="link">Administrativo</a>
                            <ul>
                                <li><a href="{{ route('users') }}" id="link">Atualizar Informações <br> Usuários</a>
                                </li>
                                <li><a href="/roleuser/add" id="link">Cadastrar Papeis de <br> Usuário</a></li>
                                <li><a href="{{ route('roleusers') }}" id="link">Editar Papel de Usuários</a></li>
                            </ul>
                        </li>
                    @endcan
                    <!-- /ADMINISTRATIVO -->

                    <!-- CRIAÇÃO DE LAUDOS -->
                    <li>
                        <a href="#" class="ls-ico-code" title="Solicitacao" id="link">Criação/
                            Verificação<br> de Laudos</a>
                        <ul>
                            @php
                                // Obtém o ID do usuário autenticado
                                $user_id = Auth::user()->id;
                                // Obtém o ID da permissão do usuário autenticado
                                $permission_id = \App\RoleUser::getPermissionByUserId($user_id);
                            @endphp
                            {{-- Verifica se a permissão do usuário é diferente de 3 --}}
                            @if (!($permission_id === 3))
                                <li>
                                    <a href="/solicitacao-add" id="link">Cadastrar Laudo</a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ route('solicitacoes') }}" id="link">Verificar Laudo</a>
                            </li>
                        </ul>
                    </li>
                    <!-- /CRIAÇÃO DE LAUDOS -->



                </ul>
            </nav>
        </div>
    </aside>

    <main class="ls-main ">
        <div class="container-fluid">

            @yield('content')

        </div>
    </main>



    <!-- We recommended use jQuery 1.10 or up -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="http://assets.locaweb.com.br/locastyle/3.10.0/javascripts/locastyle.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.css" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
        integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
        crossorigin="anonymous"></script>
</body>

</html>

<style>
    /* Estilo para remover o sublinhado dos links */
    #link {
        text-decoration: none;
    }
</style>
