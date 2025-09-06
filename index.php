<?php
require_once './model/MYSQL.php';
require_once './model/usuarios.php';
session_start();

if ($_SESSION['acceso'] == NULL || $_SESSION["acceso"] == false) {
    header("Location: ./views/login.php");
    exit();
}

$usuarios = new usuarios();
$usuarios = $_SESSION['usuario'];
$nombre = $usuarios->getNombre();
$rol = $usuarios->getCargo();
$nombreRol = $usuarios->getNombreRol();

$mysql = new MySQL();
$mysql->conectar();

$empleados = $mysql->efectuarConsulta("SELECT IDempleado, nombre, numDocumento, roles.nombre_rol, cargos.nombreCargo, departamentos.nombreDepartamento, fechaIngreso, salarioBase, estado, correoElectronico, telefono, imagen FROM empleados JOIN cargos ON cargos.IDcargo = empleados.cargo_id JOIN departamentos ON departamentos.IDdepartamento = empleados.departamento_id JOIN roles ON rol_id = id_rol");

$mysql->desconectar();


?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServiPlus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>

<body class="bg-body-tertiary">
    <div class="text-center mb-5 row d-flex justify-content-center mx-auto">
        <div class="col-md-12 bg-primary p-3">
            <h1 class="display-5 text-light fw-semibold text-uppercase border-bottom p-2 border-5">Listado de empleados </h1>
        </div>

    </div>
    <section class="container mt-4">
        <div class="row d-flex justify-content-center aling-items-center">
            <div class="col-md-8">
                <h2><span class="fw-bold">Bienvenido: <br> </span> <?php echo $nombre ?></h2>
            </div>

            <div class="col-md-4">
                <h2><span class="fw-bold">Rol: <br> </span> <?php echo $nombreRol ?></h2>
            </div>
        </div>
    </section>


    <?php if ($rol == 1) { ?>
        <div class="row">
            <div class="col-md-5 mx-auto mb-3 mt-4">
                <a class="text-center" href="./views/crearEmpleado.php"><button class="p-3 btn btn-outline-primary w-100 fw-bold fs-4"> <i class="fa-solid fa-circle-plus"></i> Crear empleado</button></a>
            </div>





        <?php
    }
        ?>

        <div class="col-md-5 mx-auto mb-3 mt-4">
            <a class="text-center" href="./controllers/logout.php"><button class="p-3 btn btn-outline-danger w-100 fw-bold fs-4"> <i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión </button></a>
        </div>
        </div>
        <?php if ($rol == 1) { ?>

            <div class="row">
                <div class="col-md-5 mx-auto mb-3 mt-4">
                    <a class="text-center" href="./views/generar_pdf.php"><button class="p-3 btn btn-outline-warning w-100 fw-bold fs-4"> <i class="fa-solid fa-circle-plus"></i> Generar reporte general</button></a>
                </div>



                <div class="col-md-5 mx-auto mb-3 mt-4">
                    <a class="text-center" href="./views/ListadoDepartamentosPDF.php"><button class="p-3 btn btn-outline-info w-100 fw-bold fs-4"> <i class="fa-solid fa-circle-plus"></i> Generar reporte por departamento</button></a>
                </div>
            </div>





        <?php } ?>


        </div>

        <section>

            <section>
                <div class="container mt-3">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-center fw-bold text-uppercase"></h2>
                        </div>
                    </div>
                </div>
            </section>

            <div class="col-12 mt-2">

                <table class="table table-striped table-bordered table-responsive">
                    <thead class="text-center">
                        <tr class="bg bg-dark">
                            <th scope="col" class="text-dark">Imagen</th>
                            <th scope="col" class="text-dark">Nombre</th>
                            <th scope="col" class="text-dark">NumDocumento</th>
                            <th scope="col" class="text-dark">Rol</th>
                            <th scope="col" class="text-dark">Cargo</th>
                            <th scope="col" class="text-dark">Departamento</th>
                            <th scope="col" class="text-dark">FechaIngreso</th>
                            <th scope="col" class="text-dark">SalarioBase</th>
                            <th scope="col" class="text-dark">Estado</th>
                            <th scope="col" class="text-dark">Telefono</th>
                            <th scope="col" class="text-dark">E-mail</th>
                            <?php if ($rol == 1) { ?>
                                <th scope="col" class="text-dark">Acciones</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($fila = $empleados->fetch_assoc()): ?>
                            <tr>
                                <td>
                                    <img src=" <?php echo $fila["imagen"] ?>" width="50" alt="">
                                </td>
                                <td>
                                    <?php echo $fila["nombre"] ?>
                                </td>
                                <td>
                                    <?php echo $fila["numDocumento"] ?>
                                </td>
                                <td>
                                    <?php echo $fila["nombre_rol"] ?>
                                </td>
                                <td>
                                    <?php echo $fila["nombreCargo"] ?>
                                </td>
                                <td>
                                    <?php echo $fila["nombreDepartamento"] ?>
                                </td>
                                <td>
                                    <?php echo $fila["fechaIngreso"] ?>
                                </td>
                                <td>
                                    <?php echo $fila["salarioBase"] ?>
                                </td>
                                <td>
                                    <?php echo $fila["estado"] ?>
                                </td>
                                <td>
                                    <?php echo $fila["telefono"] ?>
                                </td>
                                <td>
                                    <?php echo $fila["correoElectronico"] ?>
                                </td>
                                <?php
                                if ($rol == 1) { ?>
                                    <td>
                                        <div class="d-flex">
                                            <a href="./views/editarEmpleado.php?IDempleado=<?php echo $fila["IDempleado"]; ?>"><button class="btn btn-outline-warning mx-2"><i class="fa-solid fa-pen-to-square"></i></button></a>


                                            <?php
                                            if ($fila["estado"] == "Activo") { ?>

                                                <a href="./controllers/eliminarEmpleado.php?IDempleado=<?php echo $fila["IDempleado"]; ?>" onclick="return confirm('¿Desea eliminar esta persona?')"><button class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button></a>
                                            <?php } else { ?>
                                                <a href="./controllers/eliminarEmpleado.php?IDempleado=<?php echo $fila["IDempleado"]; ?>" onclick="return confirm('¿Desea reintegrar esta persona?')"><button class="btn btn-outline-success"><i class="fa-solid fa-check"></i></button></a>

                                            <?php } ?>
                                        <?php } ?>


                                        </div>

                                    </td>
                            </tr>




                        <?php endwhile; ?>
                    </tbody>

                </table>
            </div>

        </section>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/4c0cbe7815.js" crossorigin="anonymous"></script>
</body>

</html>