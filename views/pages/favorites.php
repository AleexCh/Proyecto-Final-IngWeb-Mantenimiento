<?php include_once __DIR__ . "./../components/header.php" ?>

<h1 class="my-4 text-center text-white fs-big">Equipos Favoritos</h1>
<?php if(empty($favorites)): ?>
    <p class="fs-3 text-white text-center">No tienes equipos favoritos</p>

<?php else: ?>
    <div class="w-90 grid-2 gap-5 mb-5">
        <?php foreach ($favorites as $favorite): ?>
            <div class="bg-form-auth">
                <?php foreach ($teams as $team): ?>
                    <?php if($team->id == $favorite->team_id): ?>
                        <h3 class="text-center p-3"><?php echo $team->country; ?></h3>

                        <?php foreach ($games as $game): ?>
                            <?php if($game->first_team == $team->id || $game->second_team == $team->id): ?>
                                <div class="px-4">
                                    <div class="partido bg-form-auth mb-3 p-4">
                                        <?php foreach ($teams as $tm): ?>
                                            <?php if($tm->id == $game->first_team): ?>
                                                <p><?php echo $tm->country ?></p>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <p><?php echo $game->first_team_goals ?></p>
                                        <p>vs</p>
                                        <p><?php echo $game->second_team_goals ?></p>
                                        <?php foreach ($teams as $tm): ?>
                                            <?php if($tm->id == $game->second_team): ?>
                                                <p><?php echo $tm->country ?></p>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endforeach; ?>

            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>




