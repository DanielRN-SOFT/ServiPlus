<?php
require_once '../model/MYSQL.php';

$mysql = new MySQL();
$mysql->conectar();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idImg = intval($_POST["id"]);

    $nombre = filter_var(trim($_POST["nombre"]), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $numDocumento = filter_var(trim($_POST["numDocumento"]), FILTER_SANITIZE_NUMBER_INT);
    $cargo = filter_var(trim($_POST["cargo"]), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $departamento = filter_var(trim($_POST["departamento"]), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fechaIngreso = filter_var(trim($_POST["fechaIngreso"]), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $salarioBase = filter_var(trim($_POST["salarioBase"]), FILTER_SANITIZE_NUMBER_INT);
    $salarioBaseNum = (int)$salarioBase;
    $salarioBaseComa = str_replace(".", ",", $salarioBaseNum);
    $telefono = filter_var(trim($_POST["telefono"]), FILTER_SANITIZE_NUMBER_INT);
    $correoElectronico = filter_var(trim($_POST["correoElectronico"]), FILTER_SANITIZE_EMAIL);
    $estado = filter_var(trim($_POST["estado"]), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $rol = filter_var(trim($_POST["rol"]), FILTER_SANITIZE_NUMBER_INT);
    $oldPassword = $_POST["oldPassword"];
    


    $res = $mysql->efectuarConsulta("SELECT * FROM empleados WHERE IDempleado = $idImg");
    $fila=$res->fetch_assoc();
    $passwordBD = $fila['password'];
    $rutaAnterior = $fila['imagen'];
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
    } else {
        $ruta = $rutaAnterior;
    }

    if (isset($_POST["oldPassword"], $_POST["oldPassword"]) && !empty($_POST["newPassword"]) && !empty($_POST["newPassword"])) {
        if (password_verify($oldPassword, $passwordBD)) {
        $newPassword = password_hash($_POST["newPassword"], PASSWORD_BCRYPT);
        
        } else {
            echo $salarioBaseNum . "<br>";
            echo "La contraseñas no coinciden";
            exit();
        }
    }else{
        $newPassword = $oldPassword;
    }

    $mysql->efectuarConsulta("UPDATE empleados SET 
        nombre = '$nombre', 
        numDocumento = $numDocumento, 
        cargo_id = '$cargo', 
        departamento_id = '$departamento', 
        fechaIngreso = '$fechaIngreso', 
        salarioBase = $salarioBaseComa, 
        estado = '$estado', 
        correoElectronico = '$correoElectronico', 
        telefono = '$telefono', 
        imagen = '$ruta',
        rol_id = $rol,
        password = '$newPassword'
        WHERE IDempleado = $idImg");

    $mysql->desconectar();
    header('Location: ../index.php');
    exit();
}
