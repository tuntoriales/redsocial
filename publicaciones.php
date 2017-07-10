<?php
include 'lib/config.php';
?>
<script type="text/javascript" src="js/likes.js"></script>
<script type="text/javascript">
$(document).ready(function() {

    $(".enviar-btn").keypress(function(event) {

      if ( event.which == 13 ) {

        var getpID =  $(this).parent().attr('id').replace('record-','');

        var usuario = $("input#usuario").val();
        var comentario = $("#comentario-"+getpID).val();
        var publicacion = getpID;
        var avatar = $("input#avatar").val();
        var nombre = $("input#nombre").val();
        var now = new Date();
        var date_show = now.getDate() + '-' + now.getMonth() + '-' + now.getFullYear() + ' ' + now.getHours() + ':' + + now.getMinutes() + ':' + + now.getSeconds();

        if (comentario == '') {
            alert('Debes añadir un comentario');
            return false;
        }

        var dataString = 'usuario=' + usuario + '&comentario=' + comentario + '&publicacion=' + publicacion;

        $.ajax({
                type: "POST",
                url: "agregarcomentario.php",
                data: dataString,
                success: function() {
                    $('#nuevocomentario'+getpID).append('<div class="box-comment"><img class="img-circle img-sm" src="avatars/'+ avatar +'"><div class="comment-text"><span class="username"> '+ nombre +'<span class="text-muted pull-right">' + date_show + '</span></span>' + comentario + '</div></div>');
                }
        });
        return false;
      }
    });

});
</script>

<?php
$CantidadMostrar=5;
     // Validado  la variable GET
    $compag         =(int)(!isset($_GET['pag'])) ? 1 : $_GET['pag']; 
	$TotalReg       =mysql_query("SELECT * FROM publicaciones");
	$totalr = mysql_num_rows($TotalReg);
	//Se divide la cantidad de registro de la BD con la cantidad a mostrar 
	$TotalRegistro  =ceil($totalr/$CantidadMostrar);
	 //Operacion matematica para mostrar los siquientes datos.
	$IncrimentNum =(($compag +1)<=$TotalRegistro)?($compag +1):0;
	//Consulta SQL
	$consultavistas ="SELECT *
				FROM
				publicaciones
				ORDER BY
				id_pub DESC LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
	$consulta=mysql_query($consultavistas);
	while ($lista=mysql_fetch_array($consulta)) {

		$userid = mysql_real_escape_string($lista['usuario']);

		$usuariob = mysql_query("SELECT * FROM usuarios WHERE id_use = '$userid'");
    $use = mysql_fetch_array($usuariob);

    $fotos = mysql_query("SELECT * FROM fotos WHERE publicacion = '$lista[id_pub]'");
    $fot = mysql_fetch_array($fotos);
	?>
	<!-- START PUBLICACIONES -->
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="avatars/<?php echo $use['avatar']; ?>" alt="User Image">
                <span class="description" onclick="location.href='perfil.php?id=<?php echo $use['id_use'];?>';" style="cursor:pointer; color: #3C8DBC;""><?php echo $use['usuario'];?></span>
                <span class="description"><?php echo $lista['fecha'];?></span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- post text -->
              <p><?php echo $lista['contenido'];?></p>

              <?php 
              if($lista['imagen'] != 0)
              {
              ?>
              <img src="publicaciones/<?php echo $fot['ruta'];?>" width="100%">
              <?php
          	  }
          	  ?>

              <br><br>
              <?php 
              $numcomen = mysql_num_rows(mysql_query("SELECT * FROM comentarios WHERE publicacion = '".$lista['id_pub']."'"));
              ?>
              <!-- Social sharing buttons -->
            <ul class="list-inline">

              <?php
              $query = mysql_query("SELECT * FROM likes WHERE post = '".$lista['id_pub']."' AND usuario = ".$_SESSION['id']."");

              if (mysql_num_rows($query) == 0) { ?>

                <li><div class="btn btn-default btn-xs like" id="<?php echo $lista['id_pub']; ?>"><i class="fa fa-thumbs-o-up"></i> Me gusta </div><span id="likes_<?php echo $lista['id_pub']; ?>"> (<?php echo $lista['likes']; ?>)</span></li>

              <?php } else { ?>
                
                <li><div class="btn btn-default btn-xs like" id="<?php echo $lista['id_pub']; ?>"><i class="fa fa-thumbs-o-up"></i> No me gusta </div><span id="likes_<?php echo $lista['id_pub']; ?>"> (<?php echo $lista['likes']; ?>)</span></li>

              <?php } ?>



                    <li class="pull-right">
                      <span href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comentarios
                        (<?php echo $numcomen; ?>)</span></li>
                  </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer box-comments">

            <?php 
            $comentarios = mysql_query("SELECT * FROM comentarios WHERE publicacion = '".$lista['id_pub']."' ORDER BY id_com desc LIMIT 2");
            while($com=mysql_fetch_array($comentarios)){
              $usuarioc = mysql_query("SELECT * FROM usuarios WHERE id_use = '".$com['usuario']."'");
              $usec = mysql_fetch_array($usuarioc);
              ?>


              <div class="box-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="avatars/<?php echo $usec['avatar'];?>">

                <div class="comment-text">
                      <span class="username">
                        <?php echo $usec['usuario'];?>
                        <span class="text-muted pull-right"><?php echo $com['fecha'];?></span>
                      </span><!-- /.username -->
                  <?php echo $com['comentario'];?>
                </div>
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
              <?php } ?>

              <?php if ($numcomen > 2) { ?> 
              <br>
                <center><span onclick="location.href='publicacion.php?id=<?php echo $lista['id_pub'];?>';" style="cursor:pointer; color: #3C8DBC;">Ver todos los comentarios</span></center>
              <?php } ?>

              <div id="nuevocomentario<?php  echo $lista['id_pub'];?>"></div>
              <br>
                <form method="post" action="">
                <label id="record-<?php  echo $lista['id_pub'];?>">
                <input type="text" class="enviar-btn form-control input-sm" style="width: 800px;" placeholder="Escribe un comentario" name="comentario" id="comentario-<?php  echo $lista['id_pub'];?>">
                <input type="hidden" name="usuario" value="<?php echo $_SESSION['id'];?>" id="usuario">
                <input type="hidden" name="publicacion" value="<?php echo $lista['id_pub'];?>" id="publicacion">
                <input type="hidden" name="avatar" value="<?php echo $_SESSION['avatar'];?>" id="avatar">
                <input type="hidden" name="nombre" value="<?php echo $_SESSION['usuario'];?>" id="nombre">
                </form>

              </div>

        </div>
        <!-- /.col -->
        <!-- END PUBLICACIONES -->
    
    <br><br>

	<?php
	}
	//Validmos el incrementador par que no genere error
	//de consulta.  
    if($IncrimentNum<=0){}else {
	echo "<a href=\"publicaciones.php?pag=".$IncrimentNum."\">Seguiente</a>";
	}
?>