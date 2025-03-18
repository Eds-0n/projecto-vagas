<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Vaga;
use \App\Db\Pagination;

// BUSCA
$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_SPECIAL_CHARS);

// FILTRO DE STATUS
$filtroStatus = filter_input(INPUT_GET, 'filtroStatus', FILTER_SANITIZE_SPECIAL_CHARS);
$filtroStatus = in_array($filtroStatus, ['s', 'n']) ? $filtroStatus : '';

// CONDIÇÕES SQL
$condicoes = [
    !empty($busca) ? 'titulo LIKE "%' . str_replace(' ', '%', $busca) . '%"' : null,
    !empty($filtroStatus) ? 'activo = "' . $filtroStatus . '"' : null
];

// REMOVE AS POSIÇÕES VAZIAS
$condicoes = array_filter($condicoes);

//  CLAUSULA WHERE
$where = implode(' AND ', $condicoes);

// QUANTIDADE TOTAL DE VAGAS
$quantidadeVagas = Vaga::getQuantidadeVagas($where);

// PAGINAÇÃO
$obPagination = new Pagination($quantidadeVagas, $_GET['pagina'] ?? 1, 5);
// echo '<pre>'; print_r($obPagination->getLimit()); echo '</pre>'; exit;

// OBTEM AS VAGAS   
$vagas = Vaga::getVagas($where, null, $obPagination->getLimit());

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listagem.php';
include __DIR__ . '/includes/footer.php';