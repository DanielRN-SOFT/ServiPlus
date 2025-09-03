<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login de usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center align-items-center min-vh-100  bg-body-tertiary">
            <form action="../controllers/login.php" method="post" class="bg-body-secondary p-5 rounded-5 shadow ">
                <div class="mb-3">
                    <h1 class="fw-bold text-center mb-4">Login de usuario</h1>
                    <label for="exampleInputEmail1" class="form-label">Documento de identidad</label>
                    <input type="number" class="form-control mb-4" id="exampleInputEmail1" name="numDocumento">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-3 fw-bold">Ingresar</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>