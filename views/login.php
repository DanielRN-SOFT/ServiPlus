<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login de usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <script src="https://kit.fontawesome.com/4c0cbe7815.js" crossorigin="anonymous"></script>
</head>

<body class="bg-login">
    <div class="row bg-sombra">
        <div class="col-md-12 d-flex justify-content-center align-items-center min-vh-100">
            <form action="../controllers/login.php" method="post" class="bg-body-secondary border p-5 rounded-5 shadow ">
                <h1 class="fw-bold text-center mb-4">Login de usuario </h1>

                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="fa-solid fa-id-card"></i></span>
                    <div class="form-floating">
                        <input type="number" class="form-control" id="exampleInputEmail1" name="numDocumento" placeholder="1113867890">
                        <label for="">No. de Identificacion</label>
                    </div>
                </div>
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Ingrese su contraseña">
                        <label for="">Password</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-3 fs-5 fw-bold">Ingresar <i class="fa-solid fa-right-to-bracket"></i></button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>