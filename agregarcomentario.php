<?php
require('lib/config.php');

$usuario = mysql_real_escape_string($_POST['usuario']);
$comentario = mysql_real_escape_string($_POST['comentario']);
$publicacion = mysql_real_escape_string($_POST['publicacion']);

$insert = mysql_query("INSERT INTO comentarios (usuario, comentario, fecha, publicacion) VALUES ('$usuario', '$comentario', now(), '$publicacion')");


$llamado = mysql_query("SELECT * FROM publicaciones WHERE id_pub = '".$publicacion."'");
$ll = mysql_fetch_array($llamado);

$usuario2 = mysql_real_escape_string($ll['usuario']);

$insert2 = mysql_query("INSERT INTO notificaciones (user1, user2, tipo, leido, fecha, id_pub) VALUES ('$usuario', '$usuario2', 'ha comentado', '0', now(), '$publicacion')");


?>