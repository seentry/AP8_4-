<?php
require_once "autoloader.php";

class Modelo extends Connection {

    public function importar() {
        $dataBase = $this->getConn(); 
        
        $sql = "INSERT INTO tareas (titulo, descripcion, fecha_creacion, fecha_vencimiento) VALUES (?, ?, ?, ?)";
        $stmt = $dataBase->prepare($sql);
        
        $file = fopen("tareas.csv", "r");
        if ($file !== FALSE) {
            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                $fecha_creacion = date("Y-m-d", strtotime($data[2]));
                $fecha_vencimiento = date("Y-m-d", strtotime($data[3]));
                $stmt->bind_param("ssss", $data[0], $data[1], $fecha_creacion, $fecha_vencimiento);
                $stmt->execute();
            }
            fclose($file);
        }
        $stmt->close();
    }

    
  public function deleteList() {
    $conn = new Connection;
    $dataBase = $conn->getConn();
    $sql = "DELETE FROM tareas";
    $result = $dataBase->query($sql);
    return $result;
}

    public function init() {
        $this->deleteList();
        $this->importar();
    }
    public function getAllTasks(){
        $conn = $this->getConn();
        $sql = "SELECT * FROM tareas";
        $result = $conn->query($sql);
        $tasks = array();
    
        if ($result->num_rows > 0) { 
            while($row = $result->fetch_assoc()) {
                $tasks[] = $row;
            }
        }
        return $tasks; 
    }

    public function showAllTasks(){
        $tasks = $this->getAllTasks(); 

        if (!empty($tasks)) { 
            foreach ($tasks as $task) { 
                
                echo "<tr>";
                echo "<td>" . $task['id'] . "</td>"; 
                echo "<td><a href='detalle.php'>" . $task['titulo'] . "</a></td>";
                echo "<td>" . $task['descripcion'] . "</td>";

                echo "<td>" . $task['fecha_creacion']  . "</td>";
                echo "<td>" . $task['fecha_vencimiento'] . "</td>";
               
                echo "<td><a href='delete.php'><img src='del_icon.png' alt='Delete'></a></td>";
                echo "<td><a href='edit.php'><img src='edit_icon.png' alt='Edit'></a></td>";
                echo "</tr>";
            }
        }
    }

    public function addTarea(){
    $conn = $this->getConn();

    $sql = "INSERT INTO tareas (titulo, descripcion, fecha_creacion, fecha_vencimiento) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $titulo, $descripcion, $fecha_creacion, $fecha_vencimiento);
    
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
    
    $stmt->close();
    }

    public function updateTarea(){
        
    }

    public function deleteTarea(){
        
    }

    public function showNavigation(){
        
    }

    public function showOrderAction(){
        
    }
    
    public function getCurrentPage(){
        
    }

    public function getCurrentOrder(){
        
    }

}