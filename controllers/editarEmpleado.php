<?php
require_once '../model/MYSQL.php';

$mysql = new MySQL();
$mysql->conectar();




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idImg = intval($_POST["id"]);

    $nombre = filter_var($_POST["nombre"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $numDocumento = filter_var($_POST["numDocumento"], FILTER_SANITIZE_NUMBER_INT);
    $cargo = filter_var($_POST["cargo"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $departamento = filter_var($_POST["departamento"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fechaIngreso = filter_var($_POST["fechaIngreso"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $salarioBase = filter_var($_POST["salarioBase"], FILTER_SANITIZE_NUMBER_INT);
    $telefono = filter_var($_POST["telefono"], FILTER_SANITIZE_NUMBER_INT);
    $correoElectronico = filter_var($_POST["correoElectronico"], FILTER_SANITIZE_EMAIL);
    $estado = filter_var($_POST["estado"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $rol = filter_var($_POST["rol"], FILTER_SANITIZE_NUMBER_INT);

    // Por defecto mantenemos la ruta anterior
    $res = $mysql->efectuarConsulta("SELECT imagen FROM empleados WHERE IDempleado = '$idImg'");
    $rutaAnterior = $res->fetch_assoc()['imagen'];
    $ruta = $rutaAnterior;

    // Si el usuario subió una nueva imagen
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $tipo = mime_content_type($_FILES['foto']['tmp_name']);
        $ext = ($tipo === 'image/png') ? '.png' : '.jpg';
        $nombreUnico = 'imagen_' . date("Ymd_Hisv") . $ext;
        $ruta = 'assets/img/' . $nombreUnico;
        $rutaAbsoluta = __DIR__ . '/../' . $ruta;

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $rutaAbsoluta)) {
            $anteriorAbsoluta = __DIR__ . '/../' . $rutaAnterior;
            if (file_exists($anteriorAbsoluta)) {
                unlink($anteriorAbsoluta);
            }
        }
    }

    $mysql->efectuarConsulta("UPDATE empleados SET 
        nombre = '$nombre', 
        numDocumento = $numDocumento, 
        cargo_id = '$cargo', 
        departamento_id = '$departamento', 
        fechaIngreso = '$fechaIngreso', 
        salarioBase = $salarioBase, 
        estado = '$estado', 
        correoElectronico = '$correoElectronico', 
        telefono = '$telefono', 
        imagen = '$ruta',
        rol_id = $rol
        WHERE IDempleado = $idImg");

    $mysql->desconectar();
    header('Location: ../index.php');
    exit();
}
?>