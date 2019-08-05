<?php

use Illuminate\Database\Seeder;
use Junges\ACL\Http\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
           'name' => 'Administrador',
           'slug' => 'admin',
           'description' => 'Administrador do sistema'
        ]);
        Permission::create([
            'name' => 'Editar usuários',
            'slug' => 'users.edit',
            'description' => 'Permite editar os usuários cadastrados'
        ]);
        Permission::create([
            'name' => 'Remover usuários',
            'slug' => 'users.remove',
            'description' => 'Permite remover um usuário do sistema'
        ]);
        Permission::create([
            'name' => 'Adicionar usuários',
            'slug' => 'users.create',
            'description' => 'Permite adicionar um usuário'
        ]);
        Permission::create([
            'name' => 'Remover um usuário permanentemente',
            'slug' => 'users.remove.permanently',
            'description' => 'Permite remover um usuário permanentemente'
        ]);
        Permission::create([
            'name' => 'Restaurar usuário removido',
            'slug' => 'users.restore',
            'description' => 'Permite restarurar um usuário previamente deletado'
        ]);
    }
}
