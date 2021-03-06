<?php
require_once ('../config/init.php');

if (isset($_SESSION['userid'])) {
    $id = $_SESSION['userid'];

    /* Marcsi féle
      $sql = "SELECT * FROM gallery WHERE uid='$id';";
      $res = $conn->query($sql);
      if ($res) {
      $kepek = "<table class='table table-hover'><tr>";
      $kepek .= "<th>ID</th>";
      $kepek .= "<th>Cím</th>";
      $kepek .= "<th>Leírás</th>";
      $kepek .= "<th>Fájl neve</th>";
      $kepek .= "<th>Kép</th></tr>";
      }

      while ($row = $res->fetch_assoc()) {
      $eleres = '../uploads/' . $row['image'];
      $kepek .= "<td>{$row['id']}</td>";
      $kepek .= "<td>{$row['title']}</td>";
      $kepek .= "<td>{$row['description']}</td>";
      $kepek .= "<td>{$row['image']}</td>";
      $kepek .= "<td><img src='$eleres' title={$row['image']} class='img-thumbnail'></td></tr>";
      }
      $kepek .= "</table>"; */

    $sql = "SELECT * FROM gallery WHERE uid=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($id, $uid, $title, $description, $image);

    $kepek = "<div class='row'>";
    while ($stmt->fetch()) {
        $kepek .= "<div class='col-3'>"
                . "<img class='img-thumbnail' src='../uploads/{$image}' title={$image}>"
                . "</div>";
    }
    $kepek .= "</div>";
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Galéria</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <style>
            /*table, td, th{
                border: 1px solid black;
                margin: auto;
            }
            img{
                width: 20%;
            }*/
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="gallery.php" class="nav-link">Galéria</a>
                </li>
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

        <h1>A feltöltött képeid</h1>

        <div class="container-fluid">
            <?php
            echo $kepek;
            ?>
        </div>
    </body>
</html>
