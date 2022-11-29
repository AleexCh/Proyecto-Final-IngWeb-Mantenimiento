<?php include_once __DIR__ . "./../components/header.php" ?>
<h1 class="fs-big mt-5 text-center text-white">Clasificaciones</h1>


<div class="grid-5 justify-content-between w-90 align-items-center">
    <!-- Octavos -->
    <div class="d-flex flex-column my-5 gap-5">
        <div class="d-flex flex-column gap-3">
            <div class="clasif-div">
                <?php if($octavos[0]->first_team === null):
                    echo "-";
                else:
                    foreach ($teams as $team):
                        if($team->id === $octavos[0]->first_team):
                            echo $team->country;
                        endif;
                    endforeach;
                endif; ?>
            </div>

            <div class="clasif-div">
                <?php if($octavos[0]->second_team === null):
                    echo "-";
                else:
                    foreach ($teams as $team):
                        if($team->id === $octavos[0]->second_team):
                            echo $team->country;
                        endif;
                    endforeach;
                endif; ?>
            </div>
        </div>

        <div class="d-flex flex-column gap-3">
            <div class="clasif-div">
                <?php if($octavos[1]->first_team === null):
                    echo "-";
                else:
                    foreach ($teams as $team):
                        if($team->id === $octavos[1]->first_team):
                            echo $team->country;
                        endif;
                    endforeach;
                endif; ?>
            </div>

            <div class="clasif-div">
                <?php if($octavos[1]->second_team === null):
                    echo "-";
                else:
                    foreach ($teams as $team):
                        if($team->id === $octavos[1]->second_team):
                            echo $team->country;
                        endif;
                    endforeach;
                endif; ?>
            </div>
        </div>

        <div class="d-flex flex-column gap-3">
            <div class="clasif-div">
                <?php if($octavos[2]->first_team === null):
                    echo "-";
                else:
                    foreach ($teams as $team):
                        if($team->id === $octavos[2]->first_team):
                            echo $team->country;
                        endif;
                    endforeach;
                endif; ?>
            </div>

            <div class="clasif-div">
                <?php if(isset($octavos) or $octavos[2]->second_team === null):
                    echo "-";
                else:
                    foreach ($teams as $team):
                        if($team->id === $octavos[2]->second_team):
                            echo $team->country;
                        endif;
                    endforeach;
                endif; ?>
            </div>
        </div>

        <div class="d-flex flex-column gap-3">
            <div class="clasif-div">
                <?php if($octavos[3]->first_team === null):
                    echo "-";
                else:
                    foreach ($teams as $team):
                        if($team->id === $octavos[3]->first_team):
                            echo $team->country;
                        endif;
                    endforeach;
                endif; ?>
            </div>

            <div class="clasif-div">
                <?php if($octavos[3]->second_team === null):
                    echo "-";
                else:
                    foreach ($teams as $team):
                        if($team->id === $octavos[3]->second_team):
                            echo $team->country;
                        endif;
                    endforeach;
                endif; ?>
            </div>
        </div>
    </div>

    <!-- Cuartos -->
    <div class="d-flex flex-column gap-5">
        <div class="d-flex flex-column gap-3 align-items-center mr-px">
            <div class="d-flex flex-column gap-3 align-items-center mr-px">
                <div class="clasif-div">
                    <?php if($cuartos[0]->first_team === null):
                        echo "-";
                    else:
                        foreach ($teams as $team):
                            if($team->id === $cuartos[0]->first_team):
                                echo $team->country;
                            endif;
                        endforeach;
                    endif; ?>
                </div>

                <div class="clasif-div">
                    <?php if($cuartos[0]->second_team === null):
                        echo "-";
                    else:
                        foreach ($teams as $team):
                            if($team->id === $cuartos[0]->second_team):
                                echo $team->country;
                            endif;
                        endforeach;
                    endif; ?>
                </div>
            </div>
        </div>

        <!-- Semis -->
        <div class="d-flex flex-column gap-3 align-items-end">
            <div class="clasif-div">
                <?php if($semis[0]->first_team === null):
                    echo "-";
                else:
                    foreach ($teams as $team):
                        if($team->id === $semis[0]->first_team):
                            echo $team->country;
                        endif;
                    endforeach;
                endif; ?>
            </div>

            <div class="clasif-div">
                <?php if($semis[0]->second_team === null):
                    echo "-";
                else:
                    foreach ($teams as $team):
                        if($team->id === $semis[0]->second_team):
                            echo $team->country;
                        endif;
                    endforeach;
                endif; ?>
            </div>
        </div>

        <!-- Cuartos -->
        <div class="d-flex flex-column gap-3 align-items-center mr-px">
            <div class="clasif-div">
                <?php if($cuartos[1]->first_team === null):
                    echo "-";
                else:
                    foreach ($teams as $team):
                        if($team->id === $cuartos[1]->first_team):
                            echo $team->country;
                        endif;
                    endforeach;
                endif; ?>
            </div>

            <div class="clasif-div">
                <?php if($cuartos[1]->second_team === null):
                    echo "-";
                else:
                    foreach ($teams as $team):
                        if($team->id === $cuartos[1]->second_team):
                            echo $team->country;
                        endif;
                    endforeach;
                endif; ?>
            </div>
    </div>
    </div>

    <!-- final -->
    <div class="p-5 d-flex flex-column gap-5 align-items-center">
        <div class="d-flex flex-column gap-3 align-items-center">
            <div class="clasif-div">
                <?php foreach ($final as $fn):
                    if($fn ->first_team === null):
                        echo "-";
                    else:
                        foreach ($teams as $team):
                            if($team->id === $fn->first_team)
                                echo $team->country;
                        endforeach;
                    endif;
                endforeach; ?>
            </div>

            <div class="clasif-div">
                <?php foreach ($final as $fn):
                    if($fn ->second_team === null):
                        echo "-";
                    else:
                        foreach ($teams as $team):
                            if($team->id === $fn->second_team)
                                echo $team->country;
                        endforeach;
                    endif;
                endforeach; ?>
            </div>
        </div>
        <img src="/images/copa.png" alt="Imagen copa" class="img-fluid" width="70%">
    </div>



    <!-- Cuartos y Semis -->
    <div class="d-flex flex-column gap-5">
        <div class="d-flex flex-column gap-3 align-items-center ml-px">
            <div class="d-flex flex-column gap-3 align-items-center mr-px">
                <div class="clasif-div">
                    <?php if( isset($cuartos) or $cuartos[2]->first_team === null):
                        echo "-";
                    else:
                        foreach ($teams as $team):
                            if($team->id === $cuartos[2]->first_team):
                                echo $team->country;
                            endif;
                        endforeach;
                    endif; ?>
                </div>

                <div class="clasif-div">
                    <?php if(isset($cuartos) or $cuartos[2]->second_team === null):
                        echo "-";
                    else:
                        foreach ($teams as $team):
                            if($team->id === $cuartos[2]->second_team):
                                echo $team->country;
                            endif;
                        endforeach;
                    endif; ?>
                </div>
            </div>
        </div>

        <!-- Semis -->
        <div class="d-flex flex-column gap-3">
            <div class="clasif-div">
                <?php if($semis[1]->first_team === null):
                    echo "-";
                else:
                    foreach ($teams as $team):
                        if($team->id === $semis[1]->first_team):
                            echo $team->country;
                        endif;
                    endforeach;
                endif; ?>
            </div>

            <div class="clasif-div">
                <?php if($semis[1]->second_team === null):
                    echo "-";
                else:
                    foreach ($teams as $team):
                        if($team->id === $semis[1]->second_team):
                            echo $team->country;
                        endif;
                    endforeach;
                endif; ?>
            </div>
        </div>

        <div class="d-flex flex-column gap-3 align-items-center ml-px">
            <div class="d-flex flex-column gap-3 align-items-center mr-px">
                <div class="clasif-div">
                    <?php if(isset($cuartos) or $cuartos[3]->first_team === null):
                        echo "-";
                    else:
                        foreach ($teams as $team):
                            if($team->id === $cuartos[3]->first_team):
                                echo $team->country;
                            endif;
                        endforeach;
                    endif; ?>
                </div>

                <div class="clasif-div">
                    <?php if( isset($cuartos) or $cuartos[3]->second_team === null):
                        echo "-";
                    else:
                        foreach ($teams as $team):
                            if($team->id === $cuartos[3]->second_team):
                                echo $team->country;
                            endif;
                        endforeach;
                    endif; ?>
                </div>
            </div>
        </div>
    </div>


    <!-- Octavos -->
    <div class="d-flex flex-column align-items-end my-5 gap-5">
        <div class="d-flex flex-column gap-3">
            <div class="clasif-div">
                <?php if(isset($octavos) or $octavos[4]->first_team === null):
                    echo "-";
                else:
                    foreach ($teams as $team):
                        if($team->id === $octavos[4]->first_team):
                            echo $team->country;
                        endif;
                    endforeach;
                endif; ?>
            </div>

            <div class="clasif-div">
                <?php if(isset($octavos) or $octavos[4]->second_team === null):
                    echo "-";
                else:
                    foreach ($teams as $team):
                        if($team->id === $octavos[4]->second_team):
                            echo $team->country;
                        endif;
                    endforeach;
                endif; ?>
            </div>
        </div>

        <div class="d-flex flex-column gap-3">
            <div class="clasif-div">
                <?php if(isset($octavos) or $octavos[5]->first_team === null):
                    echo "-";
                else:
                    foreach ($teams as $team):
                        if($team->id === $octavos[5]->first_team):
                            echo $team->country;
                        endif;
                    endforeach;
                endif; ?>
            </div>

            <div class="clasif-div">
                <?php if($octavos[5]->second_team === null):
                    echo "-";
                else:
                    foreach ($teams as $team):
                        if($team->id === $octavos[5]->second_team):
                            echo $team->country;
                        endif;
                    endforeach;
                endif; ?>
            </div>
        </div>

        <div class="d-flex flex-column gap-3">
            <div class="clasif-div">
                <?php if(isset($octavos) or $octavos[6]->first_team === null):
                    echo "-";
                else:
                    foreach ($teams as $team):
                        if($team->id === $octavos[6]->first_team):
                            echo $team->country;
                        endif;
                    endforeach;
                endif; ?>
            </div>

            <div class="clasif-div">
                <?php if(isset($octavos) or $octavos[6]->second_team === null):
                    echo "-";
                else:
                    foreach ($teams as $team):
                        if($team->id === $octavos[6]->second_team):
                            echo $team->country;
                        endif;
                    endforeach;
                endif; ?>
            </div>
        </div>

        <div class="d-flex flex-column gap-3">
            <div class="clasif-div">
                <?php if(isset($octavos) or $octavos[7]->first_team === null):
                    echo "-";
                else:
                    foreach ($teams as $team):
                        if($team->id === $octavos[7]->first_team):
                            echo $team->country;
                        endif;
                    endforeach;
                endif; ?>
            </div>

            <div class="clasif-div">
                <?php if(isset($octavos) or $octavos[7]->second_team === null):
                    echo "-";
                else:
                    foreach ($teams as $team):
                        if($team->id === $octavos[7]->second_team):
                            echo $team->country;
                        endif;
                    endforeach;
                endif; ?>
            </div>
        </div>
    </div>
</div>