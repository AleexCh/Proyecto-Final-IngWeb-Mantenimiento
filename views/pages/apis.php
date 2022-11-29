<?php
    include_once __DIR__ . "./../components/header.php";
    $ruta = "http://localhost:" . $_SERVER['SERVER_PORT'];
?>

<h1 class="text-center fs-big text-white my-5">Lista de API's</h1>

<div class="bg-form-auth w-auth p-4 d-flex flex-column gap-3">
    <?php foreach ($apis as $api): ?>
        <a class="text-center" href="<?php echo $ruta . $api ?>"><?php echo $ruta . $api ?></a>
    <?php endforeach; ?>
</div>