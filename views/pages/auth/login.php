<div class="w-auth py-5 px-4 px-md-5 bg-form-auth my-5">
    <h2 class="text-center">Iniciar Sesión</h2>
    <?php if (isset($error)): ?>
    <div class="alert alert-danger text-center text-uppercase p-2 mb-0 mt-4">
        <?php echo $error ?>
    </div>
    <?php endif; ?>
    <form class="d-flex flex-column gap-3 mt-4" method="post" novalidate>
        <div class="form-group row align-items-center">
            <label class="form-label fw-bolder" for="nombre">Email:</label>
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
            <label class="form-label fw-bolder" for="nombre">Contraseña:</label>
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

        <input type="submit" class="btn btn-outline-dark mt-3 fs-5 text-uppercase fw-bolder" value="Iniciar Sesión">
        <a href="/registrar" class="text-center fw-bolder text-dark mt-4">¿Aun no tienes cuenta? Registrate</a>
    </form>

    <?php include_once __DIR__ . "./../../components/footer.php" ?>
</div>