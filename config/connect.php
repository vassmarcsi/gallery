<?php

$conn = new mysqli("localhost", "esti_gallery", "estigalleryuser",  "esti_gallery");

if($conn -> connect_errno){
    die("Sikertelen csatlakozás!");
}

$conn -> set_charset("utf-8");