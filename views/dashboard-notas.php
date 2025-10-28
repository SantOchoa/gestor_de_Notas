<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/dashboards.css">
    <link rel="stylesheet" href="../public/css/notas.css">
    <link rel="icon" href="../public/images/logo-gestor-white.png">
    <title>NotasApp-Notas</title>
</head>
<body>
    <header>
        <div class="container-log-notas">
            <div class="logo-notas">
                <img src="../public/images/logo-gestor-white.png" alt="">
            </div>
            <h1>NotasApp</h1>
        </div>
        <div class="container-user-accions">
            <div class="container-user-info">
                <img src="../public/images/user-log.png" alt="user">
                <!-- Debe Mostrar el nombre del usuario-->
                <p>Usuario</p>
            </div>
            <button class="container-log-out">
                <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#FFFFFF"><path d="M481-120v-60h299v-600H481v-60h299q24 0 42 18t18 42v600q0 24-18 42t-42 18H481Zm-55-185-43-43 102-102H120v-60h363L381-612l43-43 176 176-174 174Z"/></svg>
                <p>Cerrar Sesión</p>
            </button>
        </div>
    </header>
    <div class="nav-info">
        <div class="nav-links">
            <nav>
                <a href="dashboard-programs.php">
                    <div class="button program">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#FFFFFF"><path d="M248-300q53.57 0 104.28 12.5Q403-275 452-250v-427q-45-30-97.62-46.5Q301.76-740 248-740q-38 0-74.5 9.5T100-707v434q31-14 70.5-20.5T248-300Zm264 50q50-25 98-37.5T712-300q38 0 78.5 6t69.5 16v-429q-34-17-71.82-25-37.82-8-76.18-8-54 0-104.5 16.5T512-677v427Zm-30 90q-51-38-111-58.5T248-239q-36.54 0-71.77 9T106-208q-23.1 11-44.55-3Q40-225 40-251v-463q0-15 7-27.5T68-761q42-20 87.39-29.5 45.4-9.5 92.61-9.5 63 0 122.5 17T482-731q51-35 109.5-52T712-800q46.87 0 91.93 9.5Q849-781 891-761q14 7 21.5 19.5T920-714v463q0 27.89-22.5 42.45Q875-194 853-208q-34-14-69.23-22.5Q748.54-239 712-239q-63 0-121 21t-109 58ZM276-489Z"/></svg>
                        <p>Programa de Formación</p>
                    </div>
                </a>
                <a href="dashboard-materias.php">
                    <div class="button materias">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#FFFFFF"><path d="M320-460h320v-60H320v60Zm0 120h320v-60H320v60Zm0 120h200v-60H320v60ZM220-80q-24 0-42-18t-18-42v-680q0-24 18-42t42-18h361l219 219v521q0 24-18 42t-42 18H220Zm331-554v-186H220v680h520v-494H551ZM220-820v186-186 680-680Z"/></svg>
                        <p>Materias</p>
                    </div>
                </a>
                <a href="dashboard-students.php">
                    <div class="button student">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#FFFFFF"><path d="M38-160v-94q0-35 18-63.5t50-42.5q73-32 131.5-46T358-420q62 0 120 14t131 46q32 14 50.5 42.5T678-254v94H38Zm700 0v-94q0-63-32-103.5T622-423q69 8 130 23.5t99 35.5q33 19 52 47t19 63v94H738ZM358-481q-66 0-108-42t-42-108q0-66 42-108t108-42q66 0 108 42t42 108q0 66-42 108t-108 42Zm360-150q0 66-42 108t-108 42q-11 0-24.5-1.5T519-488q24-25 36.5-61.5T568-631q0-45-12.5-79.5T519-774q11-3 24.5-5t24.5-2q66 0 108 42t42 108ZM98-220h520v-34q0-16-9.5-31T585-306q-72-32-121-43t-106-11q-57 0-106.5 11T130-306q-14 6-23 21t-9 31v34Zm260-321q39 0 64.5-25.5T448-631q0-39-25.5-64.5T358-721q-39 0-64.5 25.5T268-631q0 39 25.5 64.5T358-541Zm0 321Zm0-411Z"/></svg>
                        <p>Estudiantes</p>
                    </div>
                </a>
                <a href="dashboard-notas.php">
                    <div class="button notas">
                        <img src="../public/images/logo-gestor-white.png" alt="Notas">
                        <p>Notas</p>
                    </div>
                </a>
                <a href="dashboard-statistics.php">
                    <div class="button statistics">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#FFFFFF"><path d="M180-120q-24 0-42-18t-18-42v-660h60v660h660v60H180Zm75-135v-334h119v334H255Zm198 0v-540h119v540H453Zm194 0v-170h119v170H647Z"/></svg>
                        <p>Reporte</p>
                    </div>
                </a>
            </nav>
        </div>
        <div class="banner-info">
            <div class="name-create">
                <h2>Notas</h2>
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#FFFFFF"><path d="M450-450H200v-60h250v-250h60v250h250v60H510v250h-60v-250Z"/></svg>
                    <p>Nueva Nota</p>
                </button>
            </div>

        </div>
    </div>
</body>
</html>