<?php 
    include('db.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM tarea WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Fallo en la consulta");
        }
        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_array($result);
            $title = $row['titulo'];
            $description = $row['texto'];
        }

        if(isset($_POST['update'])){
            $id = $_GET['id'];
            $title = $_POST['titulo'];
            $texto = $_POST['texto'];

            $query = "UPDATE tarea SET titulo = '$title', texto = '$texto' WHERE id = $id";
            $result = mysqli_query($conn, $query);
            if($result){
                $_SESSION['message'] = 'Actualizado correctamente';
                $_SESSION['message_type'] = 'info';
                header('location: index.php');
            }
            else{
                die('Error de consulta');
            }
        }
    }
?>

<?php include('include/header.php')?>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="edit.php?id=<?php echo $_GET['id']?>" method="POST">
                        <div class="from-group">
                            <input type="text" name="titulo" id="" class="form-control" value="<?php echo $title?>">
                        </div>
                        <div class="form-group">
                            <textarea style="margin-top: 10px;" name="texto" id="" cols="30" rows="10" class="form-control"><?php echo $description?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-top: 10px;" name="update">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include('include/footer.php')?>