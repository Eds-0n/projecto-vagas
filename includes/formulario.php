<main>

    <section>
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3"><?= TITLE ?></h2>

    <form method="post">

        <div class="form-group">
            <label>Título</label>
            <input type="text" class="form-control" name="titulo" value="<?= isset($obVaga->titulo) ? $obVaga->titulo : '' ?>">
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <textarea name="descricao" class="form-control" rows="5"><?= isset($obVaga->descricao) ? $obVaga->descricao : '' ?></textarea>
        </div>

        <div class="form-group">
            <label>Status</label>
            <div>

                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="activo" value="s" checked> Activa
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="activo" value="n" <?php
                                                                    if (isset($obVaga->activo)) {
                                                                        echo $obVaga->activo == 'n' ? 'checked' : '';
                                                                    } else {
                                                                        echo '';
                                                                    }
                                                                    ?>> Inactiva
                    </label>
                </div>

            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>

    </form>

</main>