<?php
$id = mysql_real_escape_string($_GET['id']);
$album = mysql_real_escape_string($_GET['album']);
?>

                <center>
                <?php
                $fotosa = mysql_query("SELECT * FROM fotos WHERE usuario = '$id' AND album = '$album' ORDER BY id_fot desc");
                while($fot=mysql_fetch_array($fotosa))
                {
                ?>
                  <a href="#"><img src="publicaciones/<?php echo $fot['ruta'];?>" width="19%"> </a>
                <?php
                }
                ?>
                </center>