<?php
require('lib/config.php');

$usuario = mysql_real_escape_string($_POST['usuario']);
$comentario = mysql_real_escape_string($_POST['comentario']);
$publicacion = mysql_real_escape_string($_POST['publicacion']);

$insert = mysql_query("INSERT INTO comentarios (usuario, comentario, fecha, publicacion) VALUES ('$usuario', '$comentario', now(), '$publicacion')");
?>