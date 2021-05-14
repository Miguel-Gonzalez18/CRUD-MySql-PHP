<?php
    include('db.php');
    include('include/header.php');
?>
<!-- Este es un comentario -->
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">
                <?php if(isset($_SESSION['message'])) { ?>
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                    </symbol>
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </symbol>
                    </svg>
                    <div class="alert alert-<?= $_SESSION['message_type']?> d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                            <?= $_SESSION['message']?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                <?php 
                    session_unset();
                    if(isset($_SESSION)) 
                    { 
                        session_destroy();
                    }
                }
                ?>
                <div class="card card-body">
                    <form action="save.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="title" id="" class="form-control" placeholder="Titulo de la tarea"
                            autofocus autocomplete="off">
                        </div>
                        <div class="form-group">
                            <textarea style="margin-top: 10px;" name="texto" id="" cols="30" rows="10" class="form-control" placeholder="Descripción de la tarea"></textarea>
                        </div>
                        <input style="margin-top: 10px;" type="submit" value="Guardar" class="btn btn-success btn-block" name="btn-guardar">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Fecha de creación</th>
                            <th>Acciónes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT * FROM tarea";
                            $result = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['titulo'];?></td>
                                <td><?php echo $row['texto'];?></td>
                                <td><?php echo $row['fecha'];?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-primary"><i class="fad fa-edit"></i></a>
                                    <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger"><i class="fad fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php 
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
    include('include/footer.php');
?>
