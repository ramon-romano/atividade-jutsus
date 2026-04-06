<?php

return [
    /**
     * Todos os selos disponíveis para uso.
     */
    'selos_validos' => [
        'TIGRE', 'BOI', 'COELHO', 'MACACO', 'DRAGAO', 
        'PÁSSARO', 'COBRA', 'CAVALO', 'CARNEIRO', 
        'RATO', 'JAVALI', 'CÃO'
    ],

    /**
     * Definição dos jutsos.
     */
    'jutsus' => [
        'Katon: Goukakyuu no Jutsu' => ['TIGRE', 'DRAGAO', 'COELHO', 'TIGRE'],
        'Chidori' => ['BOI', 'COELHO', 'MACACO'],
        'Suiton: Suiryuudan' => ['BOI', 'MACACO', 'COELHO', 'TIGRE', 'DRAGAO', 'COBRA'],
        'Kage Bunshin' => ['COBRA', 'TIGRE', 'MACACO', 'COBRA'],
        'Kuchiyose no Jutsu' => ['JAVALI', 'CÃO', 'PÁSSARO', 'MACACO', 'COELHO'],
    ],

    'custom_transicoes' => [],
    'custom_estados_finais' => [],
];
