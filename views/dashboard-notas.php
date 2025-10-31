<?php
require_once __DIR__ . "/../controllers/nota-controller.php";
use Controllers\NotaController; 

require_once __DIR__ . "/../controllers/materia-controller.php";
use Controllers\MateriaController;

require_once __DIR__ . "/../controllers/student-controller.php";
use Controllers\StudentController;

require_once __DIR__ . "/../models/entities/student.php";
require_once __DIR__ . "/../models/entities/materia.php";
require_once __DIR__ . "/../models/entities/nota.php";

use Models\Entities\Nota; 

if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
    $respuesta = [];
        switch ($accion) {
            
            case 'get_estudiantes':
                $studentCtrl = new StudentController();
                $students = $studentCtrl->getStudents(); 
                $respuesta = [];
                foreach ($students as $student) {
                    $respuesta[] = [
                        'codigo' => $student->get('codigo'),
                        'nombre' => $student->get('nombre')
                    ];
                }
                break;

            case 'get_materias':
                $codigo_estudiante = $_GET['estudiante_codigo'];
                $studentCtrl = new StudentController();
                $students = $studentCtrl->getStudents();
                $programa_code = null;
                foreach ($students as $student) {
                    if ($student->get('codigo') == $codigo_estudiante) {
                        $programa_code = $student->get('programaCode');
                        break;
                    }
                }
                $materiaCtrl = new MateriaController();
                $materias = $materiaCtrl->getAllMaterias();
                $respuesta = [];
                foreach ($materias as $materia) {
                    if ($materia->get('programaCode') == $programa_code) { 
                        $respuesta[] = [
                            'codigo' => $materia->get('cod'),
                            'nombre' => $materia->get('name')
                        ];
                    }
                }
                break;

            case 'guardar_nota':
                $data = [
                    'estudiante' => $_POST['estudiante_codigo'],
                    'materia'    => $_POST['materia_codigo'],
                    'actividad'  => $_POST['actividad'],
                    'nota'       => $_POST['nota']
                ];
                $notaCtrl = new NotaController();
                $resultado = $notaCtrl->saveNewNota($data); 
                $respuesta = ['success' => true, 'message' => 'Nota guardada exitosamente.'];
                break;
            
        }
        
        header('Content-Type: application/json');
        echo json_encode($respuesta);
    exit;
}
$students = new StudentController();
$students = $students->getStudents();

$materias = new MateriaController();
$materias = $materias->getAllMaterias(); 

$notaController = new NotaController();

$materia_filtro_id = null;
$notas = []; 

if (isset($_GET['materia_filtro']) && !empty($_GET['materia_filtro'])) {
    $materia_filtro_id = $_GET['materia_filtro'];
    
    $notas = $notaController->getAllNotasPorMateria($materia_filtro_id);
} else {
    $notas = $notaController->getAllNotas();
}
?>
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
                <p>Jhoan</p>
            </div>
           <a href="operations/log-out.php">
                <button class="container-log-out">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#FFFFFF"><path d="M481-120v-60h299v-600H481v-60h299q24 0 42 18t18 42v600q0 24-18 42t-42 18H481Zm-55-185-43-43 102-102H120v-60h363L381-612l43-43 176 176-174 174Z"/></svg>
                    <p>Cerrar Sesión</p>
                </button>
            </a>
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
                <button id="crear">
                    <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#FFFFFF"><path d="M450-450H200v-60h250v-250h60v250h250v60H510v250h-60v-250Z"/></svg>
                    <p>Nueva Nota</p>
                </button>
            </div>

            <form action="dashboard-notas.php" method="GET" class="filtro-container">
                <label for="materia_filtro">Filtrar por Materia:</label>
                <select name="materia_filtro" id="materia_filtro">
                    <option value="">-- Mostrar Todas --</option>
                    <?php
                    foreach ($materias as $materia) {
                        $selected = ($materia->get('cod') == $materia_filtro_id) ? 'selected' : '';
                        echo '<option value="' . htmlspecialchars($materia->get('cod')) . '" ' . $selected . '>';
                        echo htmlspecialchars($materia->get('name'));
                        echo '</option>';
                    }
                    ?>
                </select>
                <button type="submit">Filtrar</button>
            </form>
            <table>
                <thead>
                    <th>Estudiante</th>
                    <th>Materia</th>
                    <th>Actividad</th>
                    <th>Nota</th>
                    <th>Promedio</th>
                    <th class="accions">Acciones</th>
                </thead>
                <tbody>
                    <?php
                        if (count($notas) > 0) {
                            foreach ($notas as $nota) {
                                echo '<tr>';
                                echo '  <td>' . htmlspecialchars($nota->getS()) . '</td>';
                                echo '  <td>' . htmlspecialchars($nota->getM()) . '</td>';
                                echo '  <td>' . htmlspecialchars($nota->get('actividad')) . '</td>';
                                echo '  <td>' . number_format($nota->get('nota'), 2) . '</td>';
                                
                                $promedio = $nota->getPromedioByStudent();
                                echo '  <td>' . ($promedio ? $promedio : 'N/A') . '</td>';
                                echo '</td>';
                                
                                echo '<td class="actions"><button class="btn edit">';
                                echo '<svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#FFFFFF"><path d="M180-180h44l472-471-44-44-472 471v44Zm-60 60v-128l575-574q8-8 19-12.5t23-4.5q11 0 22 4.5t20 12.5l44 44q9 9 13 20t4 22q0 11-4.5 22.5T823-694L248-120H120Zm659-617-41-41 41 41Zm-105 64-22-22 44 44-22-22Z"/></svg>';
                                echo '</button>';
                                echo '<button class="btn delete">';
                                echo '<svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#FFFFFF"><path d="M261-120q-24.75 0-42.37-17.63Q201-155.25 201-180v-570h-41v-60h188v-30h264v30h188v60h-41v570q0 24-18 42t-42 18H261Zm438-630H261v570h438v-570ZM367-266h60v-399h-60v399Zm166 0h60v-399h-60v399ZM261-750v570-570Z"/></svg>';
                                echo '</button></td></tr>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="6">No hay notas registradas';
                            if ($materia_filtro_id) {
                                echo ' para esta materia.';
                            } else {
                                echo '.';
                            }
                            echo '</td></tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="modal-nota" class="modal">
        <div class="modal-content">
            <span class="close" id="cerrarModal">&times;</span>
            <h2>Nueva Nota</h2>
            
            <form id="formCalificaciones"> <label for="selectEstudiante">Estudiante</label>
                <select name="estudiante_codigo" id="selectEstudiante" required> <option value="">Seleccione un estudiante</option>
                    <?php
                    foreach ($students as $student) {
                        echo '<option value="'.$student->get('codigo').'">' . $student->get('nombre') . '</option>';
                    }
                    ?>
                </select>

                <label for="selectMateria">Materia</label>
                <select name="materia_codigo" id="selectMateria" required disabled> 
                    <option value="">-- Esperando estudiante --</option>
                </select>

                <label for="actividad">Nombre de la Actividad</label>
                <input type="text" id="actividad" name="actividad" placeholder="Ingrese el Nombre de la Actividad" required>
                
                <label for="inputNota">Nota</label>
                <input type="number" id="inputNota" name="nota" placeholder="Ingrese la Nota" step="0.1" min="0" max="5" required>

                <div class="modal-buttons">
                    <button type="button" id="cancelarModal">Cancelar</button>
                    <button type="submit" id="btnGuardarNota">Crear</button>
                </div>
                
                <p id="resultado"></p> </form>
        </div>
    </div>

    <div id="modal-editar" class="modal">
        <div class="modal-content">
            <span class="close" id="cerrarEditar">&times;</span>
            <h2>Editar nota</h2>
            <form id="form-editar" action="operations/modificar-nota.php" method="post">
                <label for="notaEditar">Nota</label>
                <input type="hidden" id="estudianteC" name="estudianteC" required>
                <input type="hidden" id="actividadM" name="actividadM" required>
                
                <input type="number" id="notaEditar" name="nota" placeholder="Ingrese la Nota" step="0.1" min="0" max="5" required>
                
                <div class="modal-buttons">
                    <button type="button" id="cancelarEditar">Cancelar</button>
                    <button type="submit" id="btnActualizarNota">Actualizar</button>
                </div>
            </form>
        </div>
    </div>

    <div id="confirmacionEliminar" class="confirmacion-eliminar">
        <div class="confirmacion-contenido">
            <h3>¿Eliminar notas?</h3>
            <p>Esta acción eliminara TODAS las notas del estudiante y no se puede deshacer.</p>
            <div class="botones-confirmacion">
            <button id="cancelarEliminar" class="btn-cancelar">Cancelar</button>
            <form action="operations/delete-nota.php" method="post">
                <input type="hidden" id="estudianteCE" name="estudianteCE" required>
                <button id="continuarEliminar" class="btn-continuar" type="submit">Eliminar</button>
            </form>
            </div>
        </div>
    </div>
    
    <script src="../public/js/ventanaNota.js"></script>
</body>
</html>