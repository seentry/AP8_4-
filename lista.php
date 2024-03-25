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
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Fecha Creacion</th>
            <th>Fecha Vencimientos</th>
            <th colspan="2">Actions</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <td colspan="7">
                &nbsp;
            </td>
        </tr>
    </tfoot>
    <tbody>
    <?php foreach ($tareas as $tarea): ?>
        <tr>
            <td><?php echo $tarea['id']; ?></td>
            <td><a href='detalle.php?id=<?php echo $tarea['id']; ?>'><?php echo $tarea['titulo']; ?></a></td>
            
            <td><?php echo $tarea['fecha_creacion']; ?></td>
            <td><?php echo $tarea['fecha_vencimiento']; ?></td>
            <td>
                <a href='delete.php'><img src='img/del_icon.png' alt='delete' width="20 px"></a>
                <a href='edit.php'><img src='img/edit_icon.png' alt='edit' width="20 px"></a>
            </td>
        </tr>
        <?php endforeach; ?>
        <a href='nueva.php'>add</a>
    </tbody>
    
</table>

</body>
</html>
