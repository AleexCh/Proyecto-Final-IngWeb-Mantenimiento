<div class="w-auth py-5 px-4 px-md-5 bg-form-auth my-5">
    <h2 class="text-center">Registrar Cuenta</h2>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger text-center text-uppercase p-2 mb-0 mt-4">
            <?php echo $error ?>
        </div>
    <?php endif; ?>
    <form class="d-flex flex-column gap-3 mt-4" method="post" novalidate>
        <div class="form-group row align-items-center">
            <label class="form-label fw-bolder" for="first_name">Nombre:</label>
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
            <label class="form-label fw-bolder" for="last_name">Apellido:</label>
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
            <label class="form-label fw-bolder" for="email">Email:</label>
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
            <label class="form-label fw-bolder" for="password">Contraseña:</label>
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
            <label class="form-label fw-bolder" for="repeat_password">Repete tu contraseña:</label>
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

        <input type="submit" class="btn btn-outline-dark mt-3 fs-5 text-uppercase fw-bolder" value="Crear cuenta">
        <a href="/login" class="text-center fw-bolder text-dark mt-4">¿Ya tienes cuenta? Inicia Sesión</a>
    </form>

    <?php include_once __DIR__ . "./../../components/footer.php" ?>
</div>