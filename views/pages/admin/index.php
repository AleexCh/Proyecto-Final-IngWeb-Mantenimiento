<?php include_once __DIR__ . "./../../components/admin-nav.php" ?>

<h1 class="pt-5 my-5 text-center">Lista de Partidos</h1>
<div class="px-3 px-md-5 mb-5">
    <div class="overflow-x-scroll">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr class="text-center">
                    <th scope="col" class="py-3">id</th>
                    <th scope="col" class="py-3">Equipo # 1</th>
                    <th scope="col" class="py-3">Equipo # 2</th>
                    <th scope="col" class="py-3">Horario</th>
                    <th scope="col" class="py-3">Fase</th>
                    <th scope="col" class="py-3">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php foreach ($games ?? [] as $game): ?>
                <tr>
                    <td class="flex-nowrap"><?php echo $game->id ?></td>
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
                        <a href="<?php echo '/editar-partido?id=' . $game->id ?>" class="btn btn-outline-dark">Editar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php include_once __DIR__ . "./../../components/footer.php" ?>
</div>
