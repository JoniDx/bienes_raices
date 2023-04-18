<?php
     use App\Propiedad;

     if(isset($_GET['type'])) {
          $query = "SELECT * FROM propiedades WHERE tipo = '".$_GET['type']."'";
          $resultado = mysqli_query($db, $query);
          $propiedades = [];
          while($registro = $resultado->fetch_assoc()){
              $objeto = new Propiedad;
              foreach($registro as $key => $value){
                  if(property_exists( $objeto, $key )){
                      $objeto->$key = $value;
                  }
              }
              $propiedades[] = $objeto;
          }

     }else {
          $propiedades = Propiedad::all();
     }

?>
<div class="contenedor-anuncios">
     <?php foreach($propiedades as $propiedad) {?>
     
          <div class="anuncio">
               <picture>
                    <img loading="lazy" src="/bienes_raices/imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio">
               </picture>
               <div class="contenido-anuncio">
                    <h3><?php echo $propiedad->titulo; ?></h3>
                    <!-- <h3><?php echo $propiedad->tipo; ?></h3> -->
                    <p><?php echo $propiedad->descripcion; ?></p>
                    <p class="precio"><?php echo $propiedad->precio; ?></p>
                    <ul class="iconos-caracteristicas">
                         <li>
                              <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                              <p><?php echo $propiedad->wc; ?></p>
                         </li>
                         <li>
                              <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                              <p><?php echo $propiedad->estacionamiento; ?></p>
                         </li>
                         <li>
                              <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                              <p><?php echo $propiedad->habitaciones; ?></p>
                         </li>
                    </ul>
                    <a href="anuncio.php?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">
                         Ver Propiedad
                    </a>
               </div>
          </div>
     <?php } ?>
</div>
