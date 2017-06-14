<?php
include 'lib/config.php';
$CantidadMostrar=5;
$aid = mysql_real_escape_string($_GET['id']);
     // Validado  la variable GET
    $compag         =(int)(!isset($_GET['pag'])) ? 1 : $_GET['pag']; 
	$TotalReg       =mysql_query("SELECT * FROM publicaciones WHERE usuario = '$aid'");
	$totalr = mysql_num_rows($TotalReg);
	//Se divide la cantidad de registro de la BD con la cantidad a mostrar 
	$TotalRegistro  =ceil($totalr/$CantidadMostrar);
	 //Operacion matematica para mostrar los siquientes datos.
	$IncrimentNum =(($compag +1)<=$TotalRegistro)?($compag +1):0;
	//Consulta SQL
	$consultavistas ="SELECT *
				FROM
				publicaciones WHERE usuario = '$aid'
				ORDER BY
				id_pub DESC LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
	$consulta=mysql_query($consultavistas);
	while ($lista=mysql_fetch_array($consulta)) {

		$userid = mysql_real_escape_string($lista['usuario']);

		$usuariob = mysql_query("SELECT * FROM usuarios WHERE id_use = '$userid'");
		$use = mysql_fetch_array($usuariob);
	?>
	<!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="avatars/<?php echo $use['avatar']; ?>" alt="user image">
                        <span class="username">
                          <a href=""><?php echo $use['usuario'];?></a>
                        </span>
                    <span class="description"><?php echo $lista['fecha'];?></span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    <?php echo $lista['contenido'];?>
                  </p>

                  <?php 
                  if($lista['imagen'] != '')
                  {
                  ?>
                  <img src="publicaciones/<?php echo $lista['imagen'];?>" width="50%">
                  <?php
                  }
                  ?>

                  <ul class="list-inline">
                    <li><a href="" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Compartir</a></li>
                    <li><a href="" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Me gusta</a>
                    </li>
                    <li class="pull-right">
                      <a href="" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comentarios
                        (5)</a></li>
                  </ul>

                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
                </div>
                <!-- /.post -->
    
    <br>

	<?php
	}
	//Validmos el incrementador par que no genere error
	//de consulta.  
    if($IncrimentNum<=0){}else {
	echo "<a href=\"miactividad.php?id=$aid&pag=".$IncrimentNum."\">Seguiente</a>";
	}
?>