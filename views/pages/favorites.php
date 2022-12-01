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
                        <a class="d-flex justify-content-end mt-4 mx-4 cursor-pointer hover text-dark" id="delete-favorite" href="/api/delete-favoritos?id=<?php echo $favorite->id ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16"><path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/></svg>
                        </a>
                        <h3 class="text-center p-3"><?php echo $team->country; ?></h3>

                        <?php foreach ($games as $game): ?>
                            <?php if($game->first_team == $team->id || $game->second_team == $team->id): ?>
                                <h6 class="text-center p-3"><?php echo $game->play_date; ?></h3>
                                <div class="px-4">
                                    <div class="partido bg-form-auth mb-3 p-4">
                                        <?php foreach ($teams as $tm): ?>
                                            <?php if($tm->id == $game->first_team): ?>
                                                <p><?php echo $tm->country ?></p>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <p><?php echo ($game->first_team_goals !== null) ? $game->first_team_goals : "-"; ?></p>
                                        <p>vs</p>
                                        <p><?php echo ($game->second_team_goals !== null) ? $game->second_team_goals : "-"; ?></p>
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
<script src="/javascript/delete.js"></script>


