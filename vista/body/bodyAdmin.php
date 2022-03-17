<div class="container">
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Editar Datos Basicos Personas</h1>
            <div>
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">C. Nacimiento</th>
                            <th scope="col">C. Residencia</th>
                            <th scope="col">Codigo Postal</th>
                            <th scope="col">Num Seg Social</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Edit</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $objPersonaDAO = new PersonaDAO();
                        $personas = $objPersonaDAO->traerTodo();
                        foreach ($personas as $persona) {
                        ?>
                            <tr>
                                <th scope="col"> <?php echo $persona->getId(); ?> </th>
                                <th> <?php echo $persona->getNombres(); ?> </th>
                                <th> <?php echo $persona->getApellidos(); ?> </th>
                                <th> <?php echo $persona->getDireccion(); ?> </th>
                                <th> <?php echo $persona->getTelefono(); ?> </th>
                                <th>
                                    <?php
                                    $objDAO = new DepartamentoDAO();
                                    $departamentos = $objDAO->consultarTodos();
                                    foreach ($departamentos as $dep) {
                                        if ($persona->getDepartamentoNacimiento() == $dep->getId()) {
                                            echo $dep->getNombre();
                                        }
                                    }
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    foreach ($departamentos as $dep) {
                                        if($persona->getDepartamentoResidencia() == $dep->getId()){
                                           echo $dep->getNombre();
                                        }
                                    }
                                    
                                    ?>
                                </th>
                                <th> <?php echo $persona->getCodigoPostal(); ?> </th>
                                <th> <?php echo $persona->getNumSeguridadSocial(); ?> </th>
                                <th> <?php echo $persona->getIdRol(); ?> </th>
                                <th>
                                    <a href="./actualizar-persona.php?id=<?php echo $persona->getId(); ?>">
                                        <button class="btn btn-info btn-modal" data-bs-toggle="modal" data-bs-target="#modalEditar"> Edit </button>
                                    </a>
                                </th>


                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row align-items-md-stretch">
        <div class="col-md-6">
            <div class="h-100 p-5 text-white bg-dark rounded-3">
                <h2>Change the background</h2>
                <p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look. Then, mix and match with additional component themes and more.</p>
                <button class="btn btn-outline-light" type="button">Example button</button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3">
                <h2>Add borders</h2>
                <p>Or, keep it light and add a border for some added definition to the boundaries of your content. Be sure to look under the hood at the source HTML here as we've adjusted the alignment and sizing of both column's content for equal-height.</p>
                <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#modalAjustes">Example button</button>
            </div>
        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-5 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h2 class="fw-bold mb-0">Editar Persona</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <form class="">


                </form>
            </div>
        </div>
    </div>
</div>