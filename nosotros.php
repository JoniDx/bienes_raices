<?php 
    require 'includes/funciones.php';
    
    incluirTemplate('header');
?>   
  

    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>
        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 años de experiencia
                </blockquote>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus nihil, fugiat 
                    sequi sunt laborum vitae perspiciatis eos amet commodi! Fuga, veritatis. 
                    Sunt nesciunt harum eum ipsum fugit culpa earum ab.
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia, temporibus vero dolorem maiores deserunt atque. 
                    Rem corrupti eligendi suscipit atque, sapiente beatae quidem aliquid. Asperiores magnam dolore fugiat quas eos!
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus nihil, fugiat 
                    sequi sunt laborum vitae perspiciatis eos amet commodi! Fuga, veritatis. 
                    Sunt nesciunt harum eum ipsum fugit culpa earum ab.
                </p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Provident voluptatibus laborum soluta suscipit, officia, qui vitae adipisci perspiciatis, quia iure excepturi modi quos esse. Similique ab asperiores earum rerum expedita?</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Provident voluptatibus laborum soluta suscipit, officia, qui vitae adipisci perspiciatis, quia iure excepturi modi quos esse. Similique ab asperiores earum rerum expedita?</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Provident voluptatibus laborum soluta suscipit, officia, qui vitae adipisci perspiciatis, quia iure excepturi modi quos esse. Similique ab asperiores earum rerum expedita?</p>
            </div>
        </div>
    </section>

<?php 
    incluirTemplate('footer');
?>