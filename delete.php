<?php 
    include('db.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM tarea WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Fallo en la consulta");
        }

        $_SESSION['message'] = 'Borrado correctamente!';
        $_SESSION['message_type'] = 'danger';
        header('location: index.php');
    }
?>