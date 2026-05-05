<?php
session_start();
if (isset($_SESSION['usuari'])) {
    header("Location: /index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Diversión con Banderas</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
    <?php include_once __DIR__ . "/../../includes/header.php"; ?>
    <main>
        <h2 style="">Iniciar sesión</h2>

        <form action="/proc/login.proc.php" method="POST">
            <input type="hidden" name="anterior" value="<?= $_GET['anterior'] ?? 'ranking' ?>">

            <div>
                <label for="usuari">Nombre de usuario</label>
                <input type="text" id="usuari" name="usuari" required placeholder="Tu nombre de usuario">
            </div>

            <div>
                <label for="contrasenya">Contraseña</label>
                <input type="password" id="contrasenya" name="contrasenya" required placeholder="••••••••">
            </div>

            <button type="submit">Entrar →</button>
        </form>

        <?php
            if (isset($_SESSION['rondes']) && $_SESSION['rondes'] == 10) {
                $ruta = "fin";
            } else {
                $ruta = "ranking";
            }
        ?>
        <p style="text-align:center; margin-top:1rem;">
            ¿No tienes cuenta?
            <a href="../users/register.php?anterior=<?= $ruta ?>">Regístrate aquí</a>
        </p>
    </main>
</body>
</html>