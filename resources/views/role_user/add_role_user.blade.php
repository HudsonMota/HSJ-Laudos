@extends('layouts.application')

@section('content')
    <h1 class="ls-title-intro ls-ico-cog"><b>Gerenciar papeis de usuários</b></h1>
    <div class="ls-box">
        <hr>
        <h5 class="ls-title-5">Cadastrar Papeis de usuário:</h5>
        <form method="POST" action="{{ route('roleuser.postAdd') }}" class="ls-form row">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <fieldset>


                <div class="col-md-12">
                    <div class="form-group col-md-4">
                        <label class="ls-label col-md-12">
                            <b class="ls-label-text">Usuário</b>
                            <div class="ls-custom-select">
                                <select name="user_id" class="ls-select">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">ID: {{ $user->id }} - {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </label>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="ls-label col-md-12">
                            <b class="ls-label-text">Papel</b>
                            <div class="ls-custom-select">
                                <select name="role_id" class="ls-select">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </label>
                    </div>
                    <div class="form-group col-md-4">
                        <b class="ls-label-text">Papel</b>
                        <p><strong>SUPER ADM</strong></p>
                        <p><strong>ADM</strong></p>
                        <p><strong>USER</strong></p>
                        <p><strong>NO ROLE</strong> Usuário sem permissões</p>
                    </div>
                </div>


            </fieldset>

            <div class="ls-actions-btn">
                <input type="submit" value="Cadastrar" class="ls-btn-primary" title="Cadastrar" style="font-weight: bold;">
                <input class="ls-btn-primary-danger" type="reset" value="Limpar" style="font-weight: bold;">
            </div>
        </form>

    </div>


@stop
