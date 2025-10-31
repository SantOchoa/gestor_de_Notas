<?php
require __DIR__ . "/../../controllers/session-controller.php";

use Controllers\SessionController;

$sessionController = new SessionController();
$sessionController->close();
header("Location: ../login.php");