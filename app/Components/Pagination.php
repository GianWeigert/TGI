<?php

namespace App\Components;

class Pagination
{
    public static function execute($quantidadeResultados, $limite, $paginaAtual)
    {
        $totalPaginas = ceil($quantidadeResultados / $limite);

        $pagination = [
            'total' => $quantidadeResultados,
            'paginaAtual' => $paginaAtual,
            'limite' => $limite,
            'totalPaginas' => $totalPaginas
        ];

        return $pagination;
    }
}