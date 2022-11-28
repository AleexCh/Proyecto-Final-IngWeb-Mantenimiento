<?php include_once __DIR__ . "./../../components/admin-nav.php" ?>
<div class="mt-5 py-5">
    <h1 class="mt-5 text-center">Actualizar Equipo <?php echo $team->country ?></h1>

    <form method="post" novalidate class="w-auth mx-auto d-flex flex-column gap-4">
        <div>
            <label class="form-label" for="win">Nombre</label>
            <div>
                <input
                    id="country"
                    type="text"
                    value="<?php echo $team->country ?? null ?>"
                    disabled
                    class="form-control cursor-disable"
                >
            </div>
        </div>

        <div>
            <label class="form-label" for="group">Grupo</label>
            <div>
                <input
                    id="group"
                    type="text"
                    value="<?php echo $team->group ?? null ?>"
                    disabled
                    class="form-control cursor-disable"
                >
            </div>
        </div>

        <div>
            <label class="form-label" for="win">Cantidad de Partidos Ganados</label>
            <div>
                <input
                    id="win"
                    name="win"
                    type="number"
                    value="<?php echo $team->win ?? null ?>"
                    required
                    class="form-control"
                >
            </div>
        </div>

        <div>
            <label class="form-label" for="draw">Cantidad de Partidos Empatados</label>
            <div>
                <input
                    id="draw"
                    name="draw"
                    type="number"
                    value="<?php echo $team->draw ?? null ?>"
                    required
                    class="form-control"
                >
            </div>
        </div>

        <div>
            <label class="form-label" for="loss">Cantidad de Partidos Perdidos</label>
            <div>
                <input
                    id="loss"
                    name="loss"
                    type="number"
                    value="<?php echo $team->loss ?? null ?>"
                    required
                    class="form-control"
                >
            </div>
        </div>

        <div>
            <label class="form-label" for="goals_favor">Cantidad de Goles a Favor</label>
            <div>
                <input
                    id="goals_favor"
                    name="goals_favor"
                    type="number"
                    value="<?php echo $team->goals_favor ?? null ?>"
                    required
                    class="form-control"
                >
            </div>
        </div>

        <div>
            <label class="form-label" for="goals_againts">Cantidad de Goles en Contra</label>
            <div>
                <input
                    id="goals_againts"
                    name="goals_againts"
                    type="number"
                    value="<?php echo $team->goals_againts ?? null ?>"
                    required
                    class="form-control"
                >
            </div>
        </div>

        <input class="btn btn-dark col-12 col-md-4" type="submit" value="Actualizar">
    </form>

    <?php include_once __DIR__ . "./../../components/footer.php" ?>
</div>
