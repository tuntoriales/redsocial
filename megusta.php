<?php
session_start();
include 'lib/config.php';

$post = mysql_real_escape_string($_POST['id']);
$usuario = $_SESSION['id'];


$comprobar = mysql_query("SELECT * FROM likes WHERE post = '".$post."' AND usuario = ".$usuario."");
$count = mysql_num_rows($comprobar);

if ($count == 0) {

	$insert = mysql_query("INSERT INTO likes (usuario,post,fecha) values ('$usuario','$post',now())");
	$update = mysql_query("UPDATE publicaciones SET likes = likes+1 WHERE id_pub = '".$post."'");

}

else 

{

	$delete = mysql_query("DELETE FROM likes WHERE post = ".$post." AND usuario = ".$usuario."");
	$update = mysql_query("UPDATE publicaciones SET likes = likes-1 WHERE id_pub = '".$post."'");

}

$contar = mysql_query("SELECT likes FROM publicaciones WHERE id_pub = ".$post."");
$cont = mysql_fetch_array($contar);
$likes = $cont['likes'];

if ($count >= 1) { $megusta = "<i class='fa fa-thumbs-o-up'></i> Me gusta"; $likes = " (".$likes++.")"; } else { $megusta = "<i class='fa fa-thumbs-o-up'></i> No me gusta"; $likes = " (".$likes--.")"; }

$datos = array('likes' =>$likes,'text' =>$megusta);

echo json_encode($datos);

?>