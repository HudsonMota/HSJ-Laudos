<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class RoleUser extends Pivot
{

    public function getRoleUsers()
    {
        $role_users = RoleUser::all();
        return $role_users;
    }

    public function getRoleUsersbyUserId($user_id)
    {
        $role_users = RoleUser::where('user_id', '=', $user_id);
        return $role_users;
    }

    public static function getPermissionByUserId($user_id)
    {
        // Busca o registro na tabela pivot RoleUser com base no ID do usuário
        $role_user = RoleUser::where('user_id', $user_id)->first();

        // Verifica se o registro foi encontrado
        if ($role_user) {
            // Se sim, retorna o ID da permissão associada ao usuário
            return $role_user->role_id;
        } else {
            // Se não, retorna null
            return null;
        }
    }



    public function addRoleUser($field)
    {
        $role_user = new RoleUser();
        $role_user->user_id = $field['user_id'];
        $role_user->role_id = $field['role_id'];

        $role_user->save();
    }
}
