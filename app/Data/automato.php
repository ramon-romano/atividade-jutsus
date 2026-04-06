<?php

return [

    'estado_inicial' => 'q0',

    'estados_finais' => [
        'q4' => 'Katon: Goukakyuu no Jutsu',
        'q7' => 'Chidori'
    ],

    'transicoes' => [

        'q0' => [
            'TIGRE' => ['q1'],
            'BOI'   => ['q5']
        ],

        'q1' => [
            'DRAGAO' => ['q2']
        ],

        'q2' => [
            'COELHO' => ['q3']
        ],

        'q3' => [
            'TIGRE' => ['q4']
        ],

        // Chidori
        'q5' => [
            'COELHO' => ['q6']
        ],

        'q6' => [
            'MACACO' => ['q7']
        ],
    ]
];