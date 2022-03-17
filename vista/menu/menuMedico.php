<header class="p-3 mb-3 border-bottom bg-white  ">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <div href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <img src="./img/hospital.png" width="40" height="40" role="img" aria-label="Bootstrap">
            </div>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 link-secondary link-dark">Menu Medico</a></li>
            </ul>


            <div class="dropdown text-end">
                <a href="#" class="d-block link-dark  text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="./img/user.png" alt="user" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                    <li><label class="dropdown-item text-center"><?php echo $_SESSION['nombres']; ?></label></li>
                    <li>

                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalModificar">
                            Modificar Datos
                        </button>

                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" id="cerrarSesion"  href="#">Salir</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>