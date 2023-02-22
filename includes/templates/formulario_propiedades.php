<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Titulo Propiedad" value="<?php echo s( $propiedad->titulo ); ?>">

    <label for="precio">Precio:</label>
    <input type="text" id="precio" name="propiedad[precio]" placeholder="Precio Propiedad" value="<?php echo  s( $propiedad->precio ); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="propiedad[imagen]" accept="image/jpeg, image/png, image/jpg" name="imagen">

    <?php if($propiedad->imagen) {?>
        <img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-small">
    <?php } ?>

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="propiedad[descripcion]"><?php echo  s( $propiedad->descripcion ); ?></textarea>
</fieldset>

<fieldset>
    <legend>Información Propiedad</legend>

    <label for="habitacion">Habitaciones:</label>
    <input type="text" id="habitaciones" name="propiedad[habitaciones]" placeholder="Ej: 3" min="1" max="9" value="<?php echo  s( $propiedad->habitaciones ); ?>">

    <label for="wc">Baños:</label>
    <input type="text" id="wc" name="propiedad[wc]" placeholder="Ej: 3" min="1" max="9" value="<?php echo  s( $propiedad->wc ); ?>">

    <label for="estacionamiento">Estacionamiento:</label>
    <input type="text" id="estacionamiento" name="propiedad[estacionamiento]" placeholder="Ej: 3" min="1" max="9" value="<?php echo  s( $propiedad->estacionamiento ); ?>">
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