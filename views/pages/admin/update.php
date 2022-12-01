<?php include_once __DIR__ . "./../../components/admin-nav.php" ?>


<div class="mt-5 py-5">
    <h1 class="mt-5 text-center">Actualizar Partido</h1>
    <p class="text-center fs-6 mb-5"><?php echo "Partido N° " . $game->id . " de la fase " . $game->fase_id ?></p>
    <form method="post" novalidate class="w-auth mx-auto d-flex flex-column gap-4">
        <div class="d-flex justify-content-between">
            <div class="col-7">
                <label class="form-label" for="first_team">Primer Equipo</label>
                <select class="form-select" id="first_team" name="first_team" <?php echo ($game->fase_id == 1) ? "disabled" : "" ?>>
                    <option value="">--Seleccione--</option>
                    <?php foreach ($teams ?? [] as $team) : ?>
                        <option value="<?php echo $team->id ?? "" ?>" <?php echo ($team->id == $game->first_team) ? "selected" : "" ?>><?php echo $team->country ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-4">
                <label class="form-label" for="first_team_goals">Goles</label>
                <div>
                    <input
                    id="first_team_goals"
                    name="first_team_goals"
                    type="String"
                    min="0"
                    value="<?php echo $game->first_team_goals ?? '0' ?>"
                    required
                    class="form-control"
                    >
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <div class="col-7">
                <label class="form-label" for="second_team">Segundo Equipo</label>
                <select class="form-select" id="second_team" name="second_team" <?php echo ($game->fase_id == 1) ? "disabled" : "" ?>>
                    <option value="">--Seleccione--</option>
                    <?php foreach ($teams ?? [] as $team) : ?>
                        <option value="<?php echo $team->id ?? "" ?>" <?php echo ($team->id == $game->second_team) ? "selected" : "" ?>><?php echo $team->country ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-4">
                <label class="form-label" for="second_team_goals">Goles</label>
                <div>
                    <input
                            id="second_team_goals"
                            name="second_team_goals"
                            type="string"
                            min="0"
                            value="<?php echo $game->second_team_goals ?? '0' ?>"
                            required
                            class="form-control"
                    >
                </div>
            </div>
        </div>

        <div>
            <label class="form-label" for="play_date">Dia y Hora del partido</label>
            <div>
                <input
                    id="play_date"
                    name="play_date"
                    type="datetime-local"
                    value="<?php echo $game->play_date ?? null ?>"
                    required
                    class="form-control"
                >
            </div>
        </div>

        <input class="btn btn-dark col-12 col-md-4" type="submit" value="Actualizar">
    </form>

    <?php include_once __DIR__ . "./../../components/footer.php" ?>
</div>



