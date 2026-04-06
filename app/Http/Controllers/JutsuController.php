<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AFNDService;

class JutsuController extends Controller
{
    public function form(AFNDService $afnd)
    {
        return view('jutsu', [
            'selosDisponiveis' => $afnd->listarSelos(),
        ]);
    }

    public function identificar(Request $request, AFNDService $afnd)
    {
        $selos = $request->input('selos');

        $selosArray = is_array($selos)
            ? $selos
            : preg_split('/\s*,\s*/', (string) $selos, -1, PREG_SPLIT_NO_EMPTY);

        $comTabela = (bool) $request->boolean('tabela');
        $resultado = $afnd->processar($selosArray, $comTabela);

        $jutsus = $comTabela ? ($resultado['jutsus'] ?? []) : $resultado;

        return response()->json([
            'entrada' => $comTabela ? ($resultado['entrada'] ?? []) : $selosArray,
            'jutsus' => $jutsus ?: ['Nenhum jutsu identificado'],
            'tabela' => $comTabela ? ($resultado['tabela'] ?? []) : null,
        ]);
    }
}
