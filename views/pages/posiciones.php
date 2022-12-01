<?php include_once __DIR__ . "./../components/header.php" ?>
<?php
    $groups = ["A", "B", "C", "D", "E", "F", "G", "H"];

    function calcularPartidos($team) {
        return $team->win + $team->draw + $team->loss;
    }

    function calcularPuntos($team) {
        $win = 3 * $team->win;
        $loss = 0 * $team->loss;
        $draw = 1 * $team->draw;
        return $win + $loss + $draw;
    }
    function calcularDiffGol($team) {
        $goals_favor =  $team->goals_favor;
        $goals_againts = $team->goals_againts;
        return $goals_favor - $goals_againts;
    }
?>

<div class="mt-5">
    <?php foreach ($groups as $group): ?>
        <h2 class="text-center text-white">Grupo <?php echo $group ?></h2>
            <div class="px-3 px-md-5 mb-5 bg-form-auth w-positions">
                <div class="overflow-x-scroll">
                    <table class="table bg-transparent table-hover text-nowrap">
                        <thead>
                        <tr class="text-center">
                            <th scope="col" class="py-3">Equipo</th>
                            <th scope="col" class="py-3">Partidos Jugados</th>
                            <th scope="col" class="py-3">Victorias</th>
                            <th scope="col" class="py-3">Empates</th>
                            <th scope="col" class="py-3">Derrotas</th>
                            <th scope="col" class="py-3">Goles a Favor</th>
                            <th scope="col" class="py-3">Goles en Contra</th>
                            <th scope="col" class="py-3">Diferencia de Goles</th>
                            <th scope="col" class="py-3">Puntos</th>

                        </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php foreach ($teams as $team ): ?>
                                <?php if($team->group === $group): ?>
                                    <tr>
                                        <td class="flex-nowrap"><?php echo $team->country ?></td>
                                        <td class="flex-nowrap"><?php echo calcularPartidos($team) ?></td>
                                        <td class="flex-nowrap"><?php echo $team->win ?></td>
                                        <td class="flex-nowrap"><?php echo $team->draw ?></td>
                                        <td class="flex-nowrap"><?php echo $team->loss ?></td>
                                        <td class="flex-nowrap"><?php echo $team->goals_favor ?></td>
                                        <td class="flex-nowrap"><?php echo $team->goals_againts ?></td>
                                        <td class="flex-nowrap"><?php echo calcularDiffGol($team)?></td>
                                        <td class="flex-nowrap"><?php echo calcularPuntos($team) ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
    <?php endforeach; ?>
</div>
