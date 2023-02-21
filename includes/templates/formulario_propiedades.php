<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo s( $propiedad->titulo ); ?>">

    <label for="precio">Precio:</label>
    <input type="text" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo  s( $propiedad->precio ); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png, image/jpg" name="imagen">

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="descripcion"><?php echo  s( $propiedad->descripcion ); ?></textarea>
</fieldset>

<fieldset>
    <legend>Información Propiedad</legend>

    <label for="habitacion">Habitaciones:</label>
    <input type="text" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo  s( $propiedad->habitaciones ); ?>">

    <label for="wc">Baños:</label>
    <input type="text" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo  s( $propiedad->wc ); ?>">

    <label for="estacionamiento">Estacionamiento:</label>
    <input type="text" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo  s( $propiedad->estacionamiento ); ?>">
</fieldset>

<fieldset>
    <legend>Vendedor</legend>

    <select name="vendedores_id">
        <option value="">-- Seleccione --</option>
        <?php while($vendedor = mysqli_fetch_assoc($resultado) ) : ?>
            <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : '' ?> value="<?php echo s($propiedad->vendedor['id']); ?>"> <?php echo s( $propiedad->vendedor['nombre'] ) . " " . s( $propiedad->vendedor['apellido'] ); ?></option>
        <?php endwhile; ?>
    </select>
</fieldset>