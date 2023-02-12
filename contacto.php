<?php 
    require 'includes/funciones.php';
    
    incluirTemplate('header');
?>   

   <main class="contenedor seccion">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img src="build/img/destacada.jpg" alt="Imagen Contacto">
        </picture>

        <h2>Llene el formulario de Contaco</h2>
        <form class="formulario">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu nombre" id="nombre">

                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu email" id="email">

                <label for="telefono">Teléfono</label>
                <input type="tel" placeholder="Tu telefono" id="telefono">

                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <label for="opciones">Vende o Compra:</label>
                <select id="opciones">
                    <option value="" disabed selected>-- Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto">
            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input type="radio" name="contacto" value="telefono" id="contactar-telefono">
                    
                    <label for="contactar-email">E-mail</label>
                    <input type="radio" name="contacto" value="email" id="contactar-email">
                </div>

                <p>Si eligió teléfono, elija la fecha y la hora</p>

                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha">

                <label for="hora">Hora:</label>
                <input type="time" id="hora" min="09:00" max="18:00">
            </fieldset>

            <input type="submit" value="enviar" class="boton-verde">
        </form>
    </main>

<?php 
    incluirTemplate('footer');
?>