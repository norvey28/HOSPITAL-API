<!DOCTYPE html>
<html lang="en">


<head>
    <?php
    session_start();
//    echo "<script>alert('SESSION ID = " . $_SESSION['id'] . "')</script>";
    include_once('./vista/encabezado.php');
    ?>

    <title>Hospital</title>

</head>

<body>

    <?php include_once('./vista/menu.php'); ?>
    <div class="mensajes-ajax"></div>

    <div class="container">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Custom jumbotron</h1>
                <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
                <button class="btn btn-primary btn-lg" type="button">Example button</button>
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
    <div class="modal fade" id="modalModificar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-5 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <!-- <h5 class="modal-title">Modal title</h5> -->
                    <h2 class="fw-bold mb-0">Modificar Datos</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-5 pt-0">
                    <form class="">

                    </form>
                </div>
            </div>
        </div>
    </div>











    <?php include_once('./vista/scripts.php'); ?>
    <?php
    if ($_SESSION['id'] == "") {
        session_destroy();
        echo "<script type='text/javascript'>
        Swal.fire({
            title: 'ERROR',
            text: 'Inicie sesion primero',
            icon: 'error',
            backdrop: 'rgba(34,40,49,1)',
            allowOutsideClick: false,
        }).then((result) => {
            if (result.value) {
                window.location = './index.php';
            }
        });
    </script>";
    }
    ?>
</body>

</html>