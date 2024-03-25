<?php
require_once "autoloader.php";
$lista = new Modelo();
$tareas = $lista->getAllTasks();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<table class="greenTable">
    <thead>
    <?php foreach ($tareas as $tarea): ?>
        <tr>
        <td><?php echo $tarea['titulo']; ?></td>
        </tr>
    </thead>
    <tfoot>
        <tr>
        <td><?php echo $tarea['fecha_vencimiento']; ?></td>
        </tr>
    </tfoot>
    <tbody>
        <tr>
        <td><?php echo $tarea['fecha_creacion']; ?></td>
        </tr>
        <tr>
        <td><?php echo $tarea['descripcion']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="lista.php">Volver</a>
</body>
</html>
