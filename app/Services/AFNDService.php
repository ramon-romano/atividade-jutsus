<?php

namespace App\Services;

class AFNDService
{
    private $transicoes = [];
    private $estadoInicial = 'q0';
    private $estadosFinais = [];

    public function __construct()
    {
        $config = config('automato');

        if (!is_array($config)) {
            throw new \RuntimeException("Config 'automato' não encontrado.");
        }

        $this->construirAFND($config);
    }

    /**
     * Constrói o AFND dinamicamente a partir das sequências de jutsus.
     */
    private function construirAFND(array $config)
    {
        $jutsus = $config['jutsus'] ?? [];

        foreach ($jutsus as $nome => $selos) {
            $estadoAtual = $this->estadoInicial;
            
            foreach ($selos as $i => $selo) {
                // Nome do estado baseado no jutsu para evitar colisões
                $prefixo = implode('_', array_slice($selos, 0, $i + 1));
                $proximoEstado = 'st_' . md5($prefixo); 

                $this->transicoes[$estadoAtual][strtoupper($selo)][] = $proximoEstado;
                $estadoAtual = $proximoEstado;
            }

            // O último estado da sequência é o estado final/aceitação
            $this->estadosFinais[$estadoAtual] = $nome;
        }

        // Merge com transições manuais se existirem
        if (isset($config['custom_transicoes'])) {
            $this->transicoes = array_merge_recursive($this->transicoes, $config['custom_transicoes'] ?? []);
        }
        if (isset($config['custom_estados_finais'])) {
            $this->estadosFinais = array_merge($this->estadosFinais, $config['custom_estados_finais'] ?? []);
        }
    }

    public function processar(array $selos, bool $comTabela = false)
    {
        $selosNormalizados = array_values(array_filter(array_map(function ($selo) {
            if ($selo === null) return null;
            $texto = trim((string) $selo);
            return $texto === '' ? null : mb_strtoupper($texto, 'UTF-8');
        }, $selos)));

        $estadosAtuais = [$this->estadoInicial];
        $tabela = [];

        if ($comTabela) {
            $tabela[] = [
                'passo' => 0,
                'selo' => null,
                'estados' => $estadosAtuais,
            ];
        }

        foreach ($selosNormalizados as $index => $selo) {
            $novosEstados = [];

            foreach ($estadosAtuais as $estado) {
                if (isset($this->transicoes[$estado][$selo])) {
                    $novosEstados = array_merge($novosEstados, $this->transicoes[$estado][$selo]);
                }
            }

            $estadosAtuais = array_unique($novosEstados);

            if ($comTabela) {
                $tabela[] = [
                    'passo' => $index + 1,
                    'selo' => $selo,
                    'estados' => $estadosAtuais,
                ];
            }
        }

        $jutsusIdentificados = [];
        foreach ($estadosAtuais as $estado) {
            if (isset($this->estadosFinais[$estado])) {
                $jutsusIdentificados[] = $this->estadosFinais[$estado];
            }
        }

        if (!$comTabela) {
            return $jutsusIdentificados;
        }

        return [
            'entrada' => $selosNormalizados,
            'tabela' => $tabela,
            'jutsus' => $jutsusIdentificados,
        ];
    }

    public function listarSelos(): array
    {
        $config = config('automato');
        if (isset($config['selos_validos']) && is_array($config['selos_validos'])) {
            $lista = $config['selos_validos'];
            sort($lista, SORT_STRING);
            return $lista;
        }

        $selos = [];
        foreach ($this->transicoes as $estado => $mapa) {
            foreach (array_keys($mapa) as $selo) {
                $selos[$selo] = true;
            }
        }
        $lista = array_keys($selos);
        sort($lista, SORT_STRING);
        return $lista;
    }
}
