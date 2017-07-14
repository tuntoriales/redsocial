<?php
session_start();
include 'lib/config.php';
include 'lib/socialnetwork-lib.php';

ini_set('error_reporting',0);

if(!isset($_SESSION['usuario']))
{
  header("Location: login.php");
}
?>

<?php
if(isset($_GET['id'])) {

$id = mysql_real_escape_string($_GET['id']);
$action = mysql_real_escape_string($_GET['action']);

if($action == 'aceptar') {

	$update = mysql_query("UPDATE amigos SET estado = '1' WHERE id_ami = '$id'");
	header('Location:' . getenv('HTTP_REFERER'));

}

if($action == 'rechazar') {

	$delete = mysql_query("DELETE FROM amigos WHERE id_ami = '$id'");
	header('Location:' . getenv('HTTP_REFERER'));

}



}