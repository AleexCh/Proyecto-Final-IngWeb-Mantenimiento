<form method="post" novalidate class="w-50 mx-auto d-flex flex-column gap-4">
    <div class="d-flex gap-3">
        <div class="col-8">
            <label class="form-label" for="first_team">Primer Equipo</label>
            <select class="form-select" id="first_team" name="first_team" <?php echo ($game->type == "GRP") ? "disabled" : "" ?>>
                <option hidden selected>--Seleccione--</option>
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
                type="number"
                min="0"
                value="<?php echo $game->first_team_goals ?? null ?>"
                required
                class="form-control"
                >
            </div>
        </div>
    </div>

    <div class="d-flex gap-3">
        <div class="col-8">
            <label class="form-label" for="second_team">Segundo Equipo</label>
            <select class="form-select" id="second_team" name="first_team" <?php echo ($game->type == "GRP") ? "disabled" : "" ?>>
                <option hidden selected>--Seleccione--</option>
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
                        type="number"
                        min="0"
                        value="<?php echo $game->second_team_goals ?? null ?>"
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

</form>


