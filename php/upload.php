<?php
session_start();


?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Kép feltöltése</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">

    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="upload.php" class="nav-link">Kép feltöltése</a>
                </li>
                <?php
                if (isset($_SESSION['userid'])) {
                    echo "<a href='logout.php' class='nav-link'>Kilépés</a>";
                }
                ?>
            </ul>
        </nav>

        <form enctype="multipart/form-data" action="$_SERVER['PHP_SELF']" method="post">
            <div class='form-group'>
                <input type="text" placeholder="Cím" required name="title" class="form-control"> 
            </div>
            <div class='form-group'>
                <input type="text" placeholder="Leírás" required name="description" class="form-control"> 
            </div>           
            <div class='form-group'>
                <input type="file" required name="img">
            </div>
            <div class='form-group'>
                <input type="submit" required name="upload" value="Feltölt" class="btn btn-primary">
            </div>
        </form>
    </body>
</html>
