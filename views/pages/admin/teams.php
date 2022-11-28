<?php include_once __DIR__ . "./../../components/admin-nav.php" ?>

<h1 class="pt-5 my-5 text-center">Lista de Partidos</h1>
<div class="px-3 px-md-5 mb-5">
    <div class="overflow-x-scroll">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr class="text-center">
                    <th scope="col" class="py-3">id</th>
                    <th scope="col" class="py-3">Nombre</th>
                    <th scope="col" class="py-3">Grupo</th>
                    <th scope="col" class="py-3">Victorias</th>
                    <th scope="col" class="py-3">Empates</th>
                    <th scope="col" class="py-3">Derrotas</th>
                    <th scope="col" class="py-3">Goles a Favor</th>
                    <th scope="col" class="py-3">Goles en Contra</th>
                    <th scope="col" class="py-3">Editar</th>

                </tr>
            </thead>
            <tbody class="text-center">
            <?php foreach ($teams ?? [] as $team): ?>
                <tr>
                    <td class="flex-nowrap"><?php echo $team->id ?></td>
                    <td class="flex-nowrap"><?php echo $team->country ?></td>
                    <td class="flex-nowrap"><?php echo $team->group ?></td>
                    <td class="flex-nowrap"><?php echo $team->win ?></td>
                    <td class="flex-nowrap"><?php echo $team->draw ?></td>
                    <td class="flex-nowrap"><?php echo $team->loss ?></td>
                    <td class="flex-nowrap"><?php echo $team->goals_favor ?></td>
                    <td class="flex-nowrap"><?php echo $team->goals_againts ?></td>
                    <td>
                        <a href="<?php echo '/editar-equipo?id=' . $team->id ?>" class="btn btn-outline-dark">Editar</a>
                    </td>

                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php include_once __DIR__ . "./../../components/footer.php" ?>
</div>
