<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/login.css">
    <link rel="icon" href="../public/images/logo-gestor-white.png">
    <title>NotasApp</title>
</head>
<body>
    <div class="full-login">
        <div class="container-loging">
            <div class="container-logo">
                <div class="logo-gest">
                    <img src="../public/images/logo-gestor-white.png" alt="logo-gestor">
                </div>
                <h1>NotasApp</h1>
                <p>Sistema de Gestión de Notas</p>
            </div>
            <!-- Hacer el login y enviar a dashboard-programs -->
            <form action="operations\start-session.php" methos="post" class="form-login">
                <div class="space">
                    <label for="userName">Usuario</label>
                    <input type="text" name="userName" id="userName" placeholder="Ingrese su usuario">
                </div>
                <div class="space">
                    <label for="userCode">Contraseña</label>
                    <input type="password" name="userCode" id="userCode" placeholder="Ingrese su contraseña">
                </div>
                <button class="button-log" type="submit">Ingresar</button>
            </form>
            <div class="center-text">
                <p class="not-forget">No olvides tu contraseña (¬‿¬)</p>
            </div>
        </div>
        <div class="center-text out">
            <p>© 2025 NotasApp - Sistema de Gestión Académica</p>
        </div>
    </div>
    
</body>
</html>