<?php 
    require 'includes/app.php';
    
    incluirTemplate('header');
?>   
 
    <main class="contenedor seccion contenido-centrado">
        <h1>Guía para la decoración de tu hogar</h1>
        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="Image de la propiedad">
        </picture>

        <p class="informacion-meta">Escrito el: <span>20/10/2022</span> por: <span>Admin</span></p>


        <div class="resumen-propiedad">
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