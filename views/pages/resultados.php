<?php include_once __DIR__ . "./../components/header.php" ?>

<form action="" class="d-flex bg-form-auth w-auth mt-5">
    <div>
        <label class="form-label" for="play_date">Dia y Hora del partido</label>
        <div>
            <input
                id="play_date"
                name="play_date"
                type="datetime-local"
                value="<?php echo $game->play_date ?? null ?>"
                required
                class="form-control"
            >
        </div>
    </div>
</form>