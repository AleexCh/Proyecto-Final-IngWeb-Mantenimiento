<table class="table caption-top">
    <caption>Lista de Partidos</caption>
    <thead>
        <tr class="text-center">
            <th scope="col">id</th>
            <th scope="col">Equipo # 1</th>
            <th scope="col">Equipo # 2</th>
            <th scope="col">Horario</th>
            <th scope="col">Fase</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php foreach ($games ?? [] as $game): ?>
        <tr>
            <td><?php echo $game->id ?></td>
            <td>
                <div class="d-flex flex-column">
                    <?php foreach ($teams ?? [] as $team): ?>
                        <?php if ($team->id == $game->first_team): ?>
                            <p><?php echo $team->country ?></p>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <p><?php echo $game->first_team_goals ?? "-" ?></p>
                </div>
            </td>
            <td>
                <div class="d-flex flex-column">
                    <?php foreach ($teams ?? [] as $team): ?>
                        <?php if ($team->id == $game->second_team): ?>
                            <p><?php echo $team->country ?></p>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <p><?php echo $game->second_team_goals ?? "-" ?></p>
                </div>
            </td>
            <td><?php echo $game->play_date ?></td>
            <td><?php echo $game->type ?></td>
            <td>
                <a href="<?php echo '/editar-partido?id=' . $game->id ?>" class="btn btn-outline-warning">Editar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>