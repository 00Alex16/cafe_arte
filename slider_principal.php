<?php 
  include_once('admin/control/conexion.php');
  $sql= "SELECT * FROM imagenes WHERE seccion='slider principal' ORDER BY orden";
  $resultado=mysqli_query($conexion, $sql);
  $resultado2=mysqli_query($conexion, $sql);
 ?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <?php
           $c=-1;
           while($consulta = mysqli_fetch_array($resultado)){
            $c++;
            ?>
          <li data-target="#myCarousel" data-slide-to="<?php echo $c ?>" <?php if($c==0) echo 'class="active"'?>></li>
        <?php } ?>
                

        </ol>

        <div class="carousel-inner">

          <?php
          $c=0; 
          while($consulta = mysqli_fetch_array($resultado2)){
            $c++;
            ?>

          <div class="carousel-item <?php if($c==1) echo 'active' ?>">
            <img class="first-slide" src="imagenes/<?php echo $consulta["nombre"]; ?>" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1 style="color:black; font-size:4vw; font-family:comic sans ms"><?php echo $consulta["titulo"]; ?></h1>
                <p><?php echo $consulta["descripcion"]; ?></p>
               <!-- <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p> -->
              </div>
            </div>
          </div>
          <?php } ?>

        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>