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
<!DOCTYPE html>
<htmL>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>EDITAR MI PERFÍL</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php echo Headerb (); ?>

<?php echo Side (); ?>

<?php
if(isset($_GET['id']))
{
$id = mysql_real_escape_string($_GET['id']);

$miuser = mysql_query("SELECT * FROM usuarios WHERE id_use = '$id'");
$use = mysql_fetch_array($miuser);

if($_SESSION['id'] != $id) {
?>
<script type="text/javascript">window.location="login.php";</script>
<?php
}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

      
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- /.box -->



          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Editar mi perfíl</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre completo</label>
                  <input type="text" name="nombre" class="form-control" placeholder="Nombre completo" value="<?php echo $use['nombre'];?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Usuario</label>
                  <input type="text" name="usuario" class="form-control" placeholder="Usuario" value="<?php echo $use['usuario'];?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $use['email'];?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Cambiar mi avatar</label>
                  <input type="file" name="avatar">
                </div>
                <div class="checkbox">
                  <label>
                    <input type="radio" value="H" name="sexo" <?php if($use['sexo'] == 'H') { echo 'checked'; } ?>> Hombre <br>
                    <input type="radio" value="M" name="sexo" <?php if($use['sexo'] == 'M') { echo 'checked'; } ?>> Mujer
                  </label>
                </div>

                <!-- Date dd/mm/yyyy -->
              <div class="form-group">
                <label>Fecha de nacimiento</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="nacimiento" placeholder="<?php echo $use['nacimiento'];?>" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask >
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="actualizar" class="btn btn-primary">Actualizar datos</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

          <?php
          if(isset($_POST['actualizar']))
          {
            $nombre = mysql_real_escape_string($_POST['nombre']);
            $usuario = mysql_real_escape_string($_POST['usuario']);
            $email = mysql_real_escape_string($_POST['email']);
            $sexo = mysql_real_escape_string($_POST['sexo']);
            $nacimiento = mysql_real_escape_string($_POST['nacimiento']);
            if($nacimiento != '') {$nac = $nacimiento;} else {$nac = $use['nacimiento'];}

            $comprobar = mysql_num_rows(mysql_query("SELECT * FROM usuarios WHERE usuario = '$usuario' AND id_use != '$id'"));
            if($comprobar == 0){

            $type = 'jpg';
            $rfoto = $_FILES['avatar']['tmp_name'];
            $name = $id.'.'.$type;

            if(is_uploaded_file($rfoto))
            {
              $destino = 'avatars/'.$name;
              $nombrea = $name;
              copy($rfoto, $destino);
            }
            else
            {
              $nombrea = $use['avatar'];
            }

            $sql = mysql_query("UPDATE usuarios SET nombre = '$nombre', usuario = '$usuario', email = '$email', sexo = '$sexo', nacimiento = '$nac', avatar = '$nombrea' WHERE id_use = '$id'");

            if($sql) {echo "<script type='text/javascript'>window.location='editarperfil.php?id=$_SESSION[id]';</script>";}

            } else {echo 'El nombre de usuario ya está en uso, escoja otro';}

          }
          ?>


        </div>

        <div class="col-md-4">          

          <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Solicitudes de amistad ó últimos seguidores</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <li class="item">
                  <div class="product-img">
                    <img src="dist/img/avatar2.png" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Marcela Correa
                      <span class="label label-success pull-right">Aceptar</span></a>
                      <br>
                      <span class="label label-danger pull-right">Cancelar</span></a>
                        <span class="product-description">
                          Ciudad
                        </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <img src="dist/img/avatar3.png" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Adriana Ozuna
                      <span class="label label-success pull-right">Aceptar</span></a>
                      <br>
                      <span class="label label-danger pull-right">Cancelar</span></a>
                        <span class="product-description">
                          Ciudad
                        </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <img src="dist/img/avatar.png" alt="Product Image">
                  </div>
                  <div class="product-info">
                  <a href="javascript:void(0)" class="product-title">Carlos andrés
                    <span class="label label-success pull-right">Aceptar</span></a>
                      <br>
                    <span class="label label-danger pull-right">Cancelar</span></a>
                        <span class="product-description">
                          Ciudad
                        </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <img src="dist/img/user1-128x128.jpg" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Maria del Hoyo
                      <span class="label label-success pull-right">Aceptar</span></a>
                      <br>
                      <span class="label label-danger pull-right">Cancelar</span></a>
                        <span class="product-description">
                          Ciudad
                        </span>
                  </div>
                </li>
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="javascript:void(0)" class="uppercase">Ver todas las solicitudes</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->


        <div class="col-md-4">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Últimos registrados</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                  <?php $registrados = mysql_query("SELECT avatar,usuario,fecha_reg FROM usuarios order by id_use desc limit 8");
                  while($reg=mysql_fetch_array($registrados)) 
                  {
                  ?>
                    <li>
                      <img src="avatars/<?php echo $reg['avatar']; ?>" alt="User Image">
                      <a class="users-list-name" href="#"><?php echo $reg['usuario']; ?></a>
                      <span class="users-list-date">Hoy</span>
                    </li>
                  <?php
                  }
                  ?>

                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->


      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->

      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->
<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script>
  $(function () {
    $("[data-mask]").inputmask();
  });
</script>
</body>
</html>
<?php } ?>