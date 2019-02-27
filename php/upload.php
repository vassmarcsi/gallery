<?php
session_start();

require_once ('../config/connect.php');

if (isset($_POST['upload']) && isset($_SESSION['userid'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $userid = $_SESSION['userid'];
    $img_name = $_FILES['img']['name'];
    $file_type = $_FILES['img']['type'];
    //engedélyezett fájltípusok és méret:
    if ($file_type == "image/jpeg" || $file_type == "image/png" || $file_type == "image/gif" && $_FILES['img']['size'] < 500000) {
        if ($_FILES['img']['error'] > 0) {
            //Hiba a feltöltés során
            echo 'Hiba a feltöltés során: ' . $_FILES['img']['error'];
        } else {
            //Sikeres feltöltés
            $i = 1;
            $success = false;
            $new_img_name = $img_name;
            while (!$success) {
                if (file_exists("../uploads/" . $new_img_name)) {
                    $i++;
                    $new_img_name = $i . $img_name;
                } else {
                    $success = true;
                }
            }
            move_uploaded_file($_FILES['img']['tmp_name'], '../uploads/' . $new_img_name);

            $sql = "INSERT INTO gallery (uid, title, description, image) VALUES (?,?,?,?);";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("isss", $userid, $title, $description, $new_img_name);
            $stmt -> execute();
        }
    } else {
        echo 'Nem engedélyezett fájl!';
    }
    //var_dump($imgName);
}

$stmt -> close();
$conn ->close();

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

        <form enctype="multipart/form-data" action=" <?php $_SERVER['PHP_SELF'] ?>" method="post">
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
