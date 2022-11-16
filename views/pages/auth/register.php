<?php
echo "<pre>";
var_dump($error ?? null);
echo "</pre>";

?>

<div class="bg-black w-auth my-5">
    <img src="/images/world-cup-2022.jpg" alt="Imagen Fifa World Cup Qatar 2022" class="img-fluid">
    <form class="d-flex flex-column gap-3" method="post" novalidate>
        <div class="form-group row align-items-center">
            <label class="form-label text-white" for="nombre">Nombre:</label>
            <div>
                <input
                    id="first_name"
                    name="first_name"
                    type="text"
                    placeholder="Ej: John"
                    required
                    class="form-control"
                >
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label class="form-label text-white" for="nombre">Apellido:</label>
            <div>
                <input
                id="last_name"
                name="last_name"
                type="text"
                placeholder="Ej: Doe"
                required
                class="form-control"
                >
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label class="form-label text-white" for="nombre">Nombre:</label>
            <div>
                <input
                        id="email"
                        name="email"
                        type="email"
                        placeholder="Ej: Correo@correo.com"
                        required
                        class="form-control"
                >
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label class="form-label text-white" for="nombre">Contraseña:</label>
            <div>
                <input
                    id="password"
                    name="password"
                    type="password"
                    required
                    class="form-control"
                >
            </div>
        </div>

        <div class="form-group row align-items-center">
            <label class="form-label text-white" for="nombre">Repete tu contraseña:</label>
            <div>
                <input
                    id="repeat_password"
                    name="repeat_password"
                    type="password"
                    required
                    class="form-control"
                >
            </div>
        </div>

        <input type="submit" class="btn btn-primary mt-3 fs-5 text-uppercase fw-bolder" value="Crear cuenta">
    </form>
</div>