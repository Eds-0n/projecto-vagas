<?php

$mensagem = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
            break;

        case 'error':
            $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
            break;
    }
}

$resultados = '';

foreach ($vagas as $vaga) {
    $resultados .=   '<tr>
                        <td>' . $vaga->id . '</td>
                        <td>' . $vaga->titulo . '</td>
                        <td>' . $vaga->descricao . '</td>
                        <td>' . ($vaga->activo == 's' ? 'Activa' : 'Inactiva') . '</td>
                        <td>' . date('d/m/Y à\s H:i:s', strtotime($vaga->data)) . '</td>
                        <td>
                            <a href="http://localhost:8000/projecto-vagas/editar.php?id=' . $vaga->id . '">
                                <button type="button" class="btn btn-primary">Editar</button>
                            </a>
                            <a href="http://localhost:8000/projecto-vagas/excluir.php?id=' . $vaga->id . '">
                                <button type="button" class="btn btn-danger">Excluir</button>
                            </a>
                        </td>
                    </tr>';
}

// RESULTADOS DA CONSULTA NO BANCO DE DADOS
$resultados = !empty($resultados) ? $resultados : '<tr><td colspan="6" class="text-center">Nenhuma vaga encontrada!</td></tr>';

// GETS
unset($_GET['status']);
unset($_GET['pagina']);
$gets = http_build_query($_GET);

// PAGINAÇAO
$paginacao = '';
$paginas = $obPagination->getPages();
foreach ($paginas as $key => $pagina) {
    $class = $pagina['actual'] ? 'btn-primary' : 'btn-light';
    $paginacao .= '<a href="?pagina=' . $pagina['pagina'] . '&' . $gets . '">
                        <button type="button" class="btn ' . $class . '">' . $pagina['pagina'] . '</button>
                   </a>';
}

?>

<main>

    <?= $mensagem ?>

    <section>
        <a href="http://localhost:8000/projecto-vagas/cadastrar.php">
            <button class="btn btn-success">Nova vaga</button>
        </a>
    </section>

    <section>

        <form method="get">
            <div class="row my-4">
                <div class="col">
                    <label>Buscar por título</label>
                    <input type="text" name="busca" class="form-control" value='<?= $busca ?>'>
                </div>

                <div class="col">
                    <label>Status</label>
                    <select name="filtroStatus" class="form-control">
                        <option value="">Activo/Inactivo</option>
                        <option value="s" <?= $filtroStatus == 's' ? 'selected' : '' ?>>Activa</option>
                        <option value="n" <?= $filtroStatus == 'n' ? 'selected' : '' ?>>Inactiva</option>
                    </select>
                </div>

                <div class="col d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>
            </div>
        </form>

    </section>

    <section>

        <table class="table bg-dark-2 mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                <?= $resultados ?>
            </tbody>
        </table>

    </section>

    <section>
        <?= $paginacao ?>
    </section>

</main>