<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
            array(
                'name'        => 'Em processo',
                'description' => 'A cirurgia entrou no sistema.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ),
            [
                'name'        => 'Agendado',
                'description' => 'A cirurgia foi agendada.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'name'        => 'Em atraso para início',
                'description' => 'A cirurgia está atrasada para início.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'name'        => 'Iniciado',
                'description' => 'A cirurgia iniciou!',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'name'        => 'Procedimento sendo realizado',
                'description' => 'O procedimento cirúrgico está sendo realizado',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'name'        => 'Em atraso para finalização',
                'description' => 'A cirurgia está demorando mais do que o previsto.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'name'        => 'Finalizado',
                'description' => 'A cirurgia terminou!',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'name'        => 'Em processo de reagendamento',
                'description' => 'A cirurgia está em processo de reagendamento.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'name'        => 'Procedimento emergencial',
                'description' => 'Este é um procedimento realizado com critério de emergência.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'name'        => 'Reagendado',
                'description' => 'A cirurgia foi reagendada.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'name'        => 'Cancelado',
                'description' => 'A cirurgia foi cancelada',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'name'        => 'Lista de Espera',
                'description' => 'A cirurgia está na lista de espera',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'name'        => 'Materiais confirmados pelo CME',
                'description' => 'Os materiais encontram-se disponíveis no CME',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'name'        => 'Materiais negados pelo CME',
                'description' => 'Os materiais não estão disponíveis no CME',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'name'        => 'Materiais confirmados pelo Centro Cirúrgico',
                'description' => 'Os materiais estão disponíveis no Centro Cirúrgico',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'name'        => 'Materiais negados pelo Centro Cirúrgico',
                'description' => 'Os materiais não estão disponíveis no Centro cirúrgico',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'name'        => 'Reagendado após confirmação de materiais',
                'description' => 'A cirurgia foi reagendada após a confirmação dos materiais pelo Centro cirúrgico ou CME.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'name'        => 'Intercorrência cirúrgica',
                'description' => 'Ocorreu um problema durante a realização do procedimento.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ],
            [
                'name'        => 'Agendamento removido.',
                'description' => 'O agendamento desta cirurgia foi cancelado.',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ]
        ]);

    }
}
