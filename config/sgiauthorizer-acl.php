<?php
/**
 * Created by PhpStorm.
 * User: joaoh
 * Date: 14/09/16
 * Time: 09:05
 */

return array(
    'acl' => [
        'permissoes' => [
            [
                'nome' => 'minha-permissao',
                'descricao' => 'descrição da permissão',
//                'excluir' => false
            ],
            [
                'nome' => 'minha2-permissao',
                'descricao' => 'descrição da permissão',
//                'excluir' => false
            ]
        ],
        'grupos' => [
            [
                'nome' => 'nome-do-grupo',
                'descricao' => 'descrição do grupo',
                'permissoes' => [
                    [
                        'nome' => 'minha-permissao'
                    ]
                ],
//                'excluir' => false,
            ],
            [
                'nome' => 'nome-do-grupo2',
                'descricao' => 'descrição do grupo2',
                'permissoes' => [
                    [
                        'nome' => 'minha-permissao'
                    ],
                    [
                        'nome' => 'minha2-permissao'
                    ]
                ],
//                'excluir' => false
            ]
        ]
    ]
);