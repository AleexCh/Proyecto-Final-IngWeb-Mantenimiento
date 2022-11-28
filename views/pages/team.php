<?php echo $script ?>

<?php include_once __DIR__ . "./../components/header.php" ?>
<h1 class="my-4 text-center text-white fs-big"><?php echo $equipo->country ?></h1>
<div class="w-90 grid-2 gap-5">
    <div>
        <?php include_once __DIR__ . "./../components/fav-btn.php" ?>
        <div>
            <?php foreach ($games as $game): ?>
                <?php if($game->first_team == $equipo->id || $game->second_team == $equipo->id): ?>
                    <div class="partido bg-form-auth mb-3 p-4">
                        <?php foreach ($teams as $team): ?>
                            <?php if($team->id == $game->first_team): ?>
                                <p><?php echo $team->country ?></p>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <p><?php echo ($game->first_team_goals !== null) ? $game->first_team_goals : "-"; ?></p>
                        <p>vs</p>
                        <p><?php echo ($game->second_team_goals !== null) ? $game->second_team_goals : "-"; ?></p>
                        <?php foreach ($teams as $team): ?>
                            <?php if($team->id == $game->second_team): ?>
                                <p><?php echo $team->country ?></p>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="px-3 px-md-5 mb-5 bg-form-auth">
        <div class="overflow-x-scroll">
            <table class="table bg-transparent table-hover text-nowrap">
                <thead>
                <tr class="text-center">
                    <th scope="col" class="py-3">Nombre</th>
                    <th scope="col" class="py-3">Numero</th>
                </tr>
                </thead>
                <tbody class="text-center">
                <?php foreach ($players ?? [] as $player): ?>
                    <tr>
                        <td class="flex-nowrap"><?php echo $player->full_name ?></td>
                        <td class="flex-nowrap"><?php echo $player->player_number ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="/javascript/favorites.js"></script>