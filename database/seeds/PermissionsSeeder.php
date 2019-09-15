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
           'name' => 'Admin',
           'slug' => 'admin',
           'description' => 'Possui acesso total ao sistema.'
        ]);

        Permission::create([
            'name' => 'Visualizar grupos',
            'slug' => 'groups.index',
            'description' => 'Permite visualizar os grupos de permissão cadastrados no sistema.'
        ]);
        Permission::create([
            'name' => 'Criar grupos',
            'slug' => 'groups.create',
            'description' => 'Permite criar um grupo de permissões.'
        ]);
        Permission::create([
            'name' => 'Atualizar grupos',
            'slug' => 'groups.update',
            'description' => 'Permite atualizar um grupo de permissões'
        ]);
        Permission::create([
            'name' => 'Visualizar permissões de grupos',
            'slug' => 'groups.view-permissions',
            'description' => 'Permite visualizar as permissões atribuídas a um grupo.'
        ]);
        Permission::create([
            'name' => 'Remover permissão de grupos',
            'slug' => 'groups.revoke-permissions',
            'description' => 'Permite remover permissões de grupos.'
        ]);
        Permission::create([
            'name' => 'Ver usuários no grupo',
            'slug' => 'group.view-users',
            'description' => 'Permite visualizar os usuários pertencentes a um grupo de permisões.'
        ]);
        Permission::create([
            'name' => 'Visualizar grupos do usuário',
            'slug' => 'users.view-groups',
            'description' => 'Permite visualizar os grupos de um usuário'
        ]);
        Permission::create([
            'name' => 'Visualizar permissões do usuário',
            'slug' => 'users.view-permissions',
            'description' => 'Permite visualizar as permissões de um usuário'
        ]);
        Permission::create([
            'name' => 'Visualizar usuários',
            'slug' => 'users.index',
            'description' => 'Permite visualizar os usuários cadastrados no sistema'
        ]);
        Permission::create([
            'name' => 'Adicionar usuários',
            'slug' => 'users.create',
            'description' => 'Permite adicionar usuários ao sistema'
        ]);
        Permission::create([
            'name' => 'Atualizar usuários',
            'slug' => 'users.update',
            'description' => 'Permite atualizar os dados dos usuários do sistema'
        ]);
        Permission::create([
            'name' => 'Remover usuários',
            'slug' => 'users.delete',
            'description' => 'Permite remover usuários no sistema'
        ]);
        Permission::create([
            'name' => 'Visualizar cirurgias que necessitam confirmação de materiais do CME',
            'slug' => 'cme.view-pending-surgeries',
            'description' => 'Pemite visualizar cirurgias que necessitam confirmação de materiais do CME'
        ]);
        Permission::create([
            'name' => 'Visualizar pacientes',
            'slug' => 'patients.index',
            'description' => 'Permite visualizar os pacientes cadastrados no sistema.'
        ]);
        Permission::create([
            'name' => 'Adicionar pacientes',
            'slug' => 'patients.create',
            'description' => 'Permite adicionar um novo paciente ao sistema.'
        ]);
        Permission::create([
            'name' => 'Atualizar pacientes',
            'slug' => 'patients.update',
            'description' => 'Permite atualizar um paciente no sistema.'
        ]);
        Permission::create([
            'name' => 'Ver cirurgias do paciente',
            'slug' => 'patients.surgeries',
            'description' => 'Permite visualizar as cirurgias marcadas para um paciente'
        ]);
        Permission::create([
            'name' => 'Visualizar procedimentos',
            'slug' => 'procedures.index',
            'description' => 'Permite visualizar os procedimentos cadastrados'
        ]);
        Permission::create([
            'name' => 'Cadastrar procedimentos',
            'slug' => 'procedures.create',
            'description' => 'Permite adicionar um novo procedimento ao sistema'
        ]);
        Permission::create([
            'name' => 'Atualizar procedimentos',
            'slug' => 'procedures.update',
            'description' => 'Permite atualizar os procedimentos cadastrados.'
        ]);
        Permission::create([
            'name' => 'Visualizar eventos com materiais confirmados',
            'slug' => 'schedule.confirmed-materials',
            'description' => 'Pèrmite visualizar a agenda com materiais confirmados.'
        ]);
        Permission::create([
            'name' => 'Acessar agendamento',
            'slug' => 'scheduling',
            'description' => 'Permite acessar a tela de agendamento de cirurgias'
        ]);
        Permission::create([
            'name' => 'Visualizar minhas cirurgias',
            'slug' => 'surgeries.my-surgeries',
            'description' => 'Permite visualizar minhas cirurgias'
        ]);
        Permission::create([
            'name' => 'Adicionar cirurgias',
            'slug' => 'surgeries.create',
            'description' => 'Permite adicionar uma nova cirurgia no sistema'
        ]);
        Permission::create([
            'name' => 'Atualizar cirurgias',
            'slug' => 'surgeries.update',
            'description' => 'Permite atualizar os dados de uma cirurgia cadastrada.'
        ]);
        Permission::create([
            'name' => 'Visualizar cirurgias em andamento',
            'slug' => 'surgeries.on-going',
            'description' => 'Permite visualizar as cirurgias em andamento'
        ]);
        Permission::create([
            'name' => 'Visualizar cirurgias que necessitam de confirmação de materiais do centro cirúrgico',
            'slug' => 'surgery-center.confirm-materials',
            'description' => 'Permite visualizar cirurgias que necessitam de confirmação de materiais do centro cirúrgico'
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);
        Permission::create([
            'name' => '',
            'slug' => '',
            'description' => ''
        ]);

    }
}
