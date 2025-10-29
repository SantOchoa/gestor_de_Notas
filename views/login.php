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
            <form class="form-login" name="startSession">
                <div class="space">
                    <label for="user">Usuario</label>
                    <input type="text" name="user" id="user" placeholder="Ingrese su usuario">
                </div>
                <div class="space">
                    <label for="pwd">Contraseña</label>
                    <input type="password" name="pwd" id="pwd" placeholder="Ingrese su contraseña">
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


    <div id="vacio" class="modal" >
        <h3 class="titulo">Falta de informacion</h3>
        <p class="descripcion">Los dos campos deben estar llenos</p>
        <form name="vacioForm" 
      
        >
            <button type="reset">Aceptar</button>
        </form>
    </div>
    
    <script src="../public/JS/ventanalogin.js"></script>
</body>
</html>
