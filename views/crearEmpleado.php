<?php
require_once '../controllers/crearEmpleado.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServiPlus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="stylesheet" href="../assets/css/styles.css">
    <script src="https://kit.fontawesome.com/4c0cbe7815.js" crossorigin="anonymous"></script>
</head>

<body class="bg-img">

    <div class="row bg-img">


        <div class="container bg-sombra">
            <main class="row">
                <div class="col-md-5 col-sm-5 mx-auto bg-body-tertiary p-4 rounded-4 mb-5 mt-4 shadow">
                    <form action="../controllers/crearEmpleado.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="mx-auto w-75 p-2 mb-3">
                                <h2 class="text-center fw-bold text-primary"> Registro de Empleados</h2>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre completo:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="numDocumento" class="form-label">Numero de documento:</label>
                                    <input type="number" class="form-control" id="numDocumento" name="NumDocumento" required>
                                </div>
                            </div>
                        </div>



                        <div class="mb-3">
                            <label for="" class="form-label">Cargo</label>
                            <select class="form-select" aria-label="Default select example" id="" name="cargo" required>
                                <?php while ($fila = $cargos->fetch_assoc()): ?>
                                    <option value="<?php echo $fila["IDcargo"] ?>"><?php echo $fila["nombreCargo"] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>



                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fs-5" for="">Departamento</label>
                                    <?php while ($fila = $departamentos->fetch_assoc()): ?>
                                        <div class="form-check">

                                            <input class="form-check-input" type="radio" name="departamento" id="<?php echo $fila["nombreDepartamento"] ?>" value="<?php echo $fila["IDdepartamento"] ?>">
                                            <label class="form-check-label" for="<?php echo $fila["nombreDepartamento"] ?>">
                                                <?php echo $fila["nombreDepartamento"] ?>
                                            </label>

                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="fecha" class="form-label">Fecha de ingreso:</label>
                                    <input type="date" class="form-control" id="fecha" name="fechaIngreso" value="27/08/2025" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="salario" class="form-label">Salario base:</label>
                                    <input type="number" class="form-control" id="salario" name="salarioBase" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Telefono de contacto:</label>
                                    <input type="number" class="form-control" id="telefono" name="telefono" required>
                                </div>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="correoElectronico" class="form-label">Correo Electronico:</label>
                            <input type="email" class="form-control" id="correoElectronico" name="correoElectronico" required>
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Selecciona una imagen:</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept=".jpg, .jpeg, .png" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña:</label>
                                    <input type="text" class="form-control" id="password" name="password" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="rol" class="form-label">Rol:</label>
                                    <select class="form-select" id=rol" name="rol" required>
                                    <?php while($filaRoles = $roles->fetch_assoc()): ?>
                                        <option value="<?php echo $filaRoles["id_rol"] ?>"><?php echo $filaRoles["nombre_rol"] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary w-100 fw-bold mt-2 fs-5">Enviar</button>

                        <div class="text-center mt-2">
                            <a href="../index.php" class="text-center">Volver al listado de empleados</a>
                        </div>


                    </form>
                </div>


            </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>