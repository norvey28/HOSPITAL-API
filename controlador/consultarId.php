<?php

$objPersonaDAO = new PersonaDAO();

$objPersonaDAO->traerPorId($_REQUEST['consultaId']);