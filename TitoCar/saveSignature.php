<?php
session_start();
$path = htmlspecialchars($_POST['path']);
$_SESSION["path"] = $path;
echo "llegue";
 ?>
