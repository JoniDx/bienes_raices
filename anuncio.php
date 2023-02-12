<?php 
    require 'includes/funciones.php';
    
    incluirTemplate('header');
?>   
 

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta frente al bosque</h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="Image de la propiedad">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio">$3,000,000</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                    <p>4</p>
                </li>
            </ul>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Itaque aliquid voluptatum voluptates, reprehenderit porro obcaecati qui rem ipsam illum dolore. Nisi velit non dicta a possimus perferendis 
                corporis, dolores tempore. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores est, cumque, sit quod earum placeat non necessitatibus 
                doloribus nemo dolorum reiciendis corporis libero neque! Distinctio ea culpa asperiores facere aut?
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Itaque aliquid voluptatum voluptates, reprehenderit porro obcaecati qui rem ipsam illum dolore. Nisi velit non dicta a possimus perferendis 
                corporis, dolores tempore.
            </p>
        </div>
    </main>

<?php 
    incluirTemplate('footer');
?>