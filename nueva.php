<?php
require_once "autoloader.php";
$modelo = new Modelo();
$add->addTarea();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $titulo = $_POST["title"];
    $descripcion = $_POST["description"];
    $fecha_vencimiento = $_POST["fecha_vencimiento"];
    
    
    if ($modelo->addTarea($titulo, $descripcion, date("Y-m-d"), $fecha_vencimiento)) {
        
        header("Location: lista.php");
        exit(); 
    }
}
?>
