<?php include_once __DIR__ . "./../components/header.php" ?>
<form class="bg-form-auth w-auth mt-5 p-3" method="post" novalidate>
    <label class="form-label text-center w-100 fs-4 mb-3" for="play_date">Dia del partido</label>
    <div class="d-flex gap-4 justify-content-center">
        <div class="col-8">
            <input
                id="play_date"
                name="play_date"
                type="date"
                value="<?php echo $date ?? null ?>"
                required
                class="form-control"
            >
        </div>
        <input class="btn btn-secondary" type="submit" value="Buscar">
    </div>
</form>


<div class="d-flex w-90 my-5 justify-content-center">
    <div class="w-auth">
        <?php if(!isset($games) || count($games) === 0): ?>
            <p class="text-center text-white fs-4">No hay partidos en esta fecha</p>
        <?php else: ?>
            <?php foreach ($games as $game): ?>
                <div class="bg-form-auth mb-3 p-4">
                    <p class="text-center">Hora:
                        <?php
                            $hour = explode(" ", $game->play_date);
                            echo $hour[1];
                        ?>
                    </p>
                    <div class="partido">
                        <?php if($game->second_team === null): ?>
                            <p>Por Definir</p>
                        <?php else: ?>
                            <?php foreach ($teams as $team): ?>
                                <?php if($team->id == $game->first_team): ?>
                                    <p><?php echo ($game->first_team === null) ? "Por Definir" : $team->country; ?></p>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <p><?php echo ($game->first_team_goals !== null) ? $game->first_team_goals : "-"; ?></p>
                        <p>vs</p>
                        <p><?php echo ($game->second_team_goals !== null) ? $game->second_team_goals : "-"; ?></p>
                        <?php if($game->second_team === null): ?>
                            <p>Por Definir</p>
                        <?php else: ?>
                            <?php foreach ($teams as $team): ?>
                                <?php if($team->id == $game->second_team): ?>
                                    <p><?php echo ($game->second_team === null) ? "Por Definir" : $team->country; ?></p>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>