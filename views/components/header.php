<header>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img
                        src="https://logodownload.org/wp-content/uploads/2018/07/world-cup-2022-logo.png"
                        height="50"
                        alt="FIFA"
                        loading="lazy"
                />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#"  role="button" data-bs-toggle="dropdown">Equipos</a>
                        <ul class="dropdown-menu drop-down-mh">
                            <?php foreach ($teams as $team): ?>
                            <li><a class= "dropdown-item" href="/equipo?id=<?php echo $team->id ?>"><?php echo $team->country ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/resultados">Resultados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tabla de posiciones por equipos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/favoritos">Favoritos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Clasificación</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">API</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>