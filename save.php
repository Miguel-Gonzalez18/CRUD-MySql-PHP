<?php
    include('db.php');
    if(isset($_POST['btn-guardar'])){
        $title = $_POST['title'];
        $description = $_POST['texto'];

        $query = "INSERT INTO tarea(titulo, texto) VALUES('$title', '$description')";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die('No guardado');
        }
        else{
            $_SESSION['message'] = 'Tarea guardada corectamente!';
            $_SESSION['message_type'] = 'success';
            header('location: index.php');
        }
    }
?>