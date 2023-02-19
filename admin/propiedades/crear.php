<?php 

    require '../../includes/app.php';

    use App\Propiedad;
    use Intervention\Image\ImageManagerStatic as Image;

    estaAutenticado();

    // Base de datos
    $db = conectarDB();

    // Consulta para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    // Arreglo con mensajes de errores
    $errores = Propiedad::getErrores();

    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedorId = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $propiedad = new Propiedad($_POST);


        /** SUBIDA DE ARCHIVOS **/

        //Define la extensión para el archivo
        if ($imagen['type'] === 'image/jpeg') {
            $exten = '.jpg';
        }else if($imagen['type'] === 'image/jpg'){
            $exten = '.jpg';
        } else{
            $exten = '.png';
        }

        // Generar un nombre unico
        $nombreImagen = md5( uniqid('')). $exten;

        if($_FILES['imagen']['tmp_name']){
            // $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
            $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
            $propiedad->setImagen($nombreImagen);
        }

        $errores = $propiedad->validar();

        if(empty($errores)){
            //Crear la carpeta para subir la imagen
            if(!is_dir(CARPETA_IMAGENES)) {
                mkdir(CARPETA_IMAGENES);
            }

            //Guardar la imagen
            $image->save(CARPETA_IMAGENES . $nombreImagen);

            //Guardar la imagen en la base de datos
            $resultado = $propiedad->guardar();

            if($resultado){
            //echo "Insertado Correctamente";

            // Redireccionar al usuario
            header('location: /bienes_raices/admin?resultado=1');
}
        }
    }
    
    incluirTemplate('header');
?>   


    <main class="contenedor seccion">
        <h1>Crear</h1>
        <a href="/bienes_raices/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/bienes_raices/admin/propiedades/crear.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo  $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="text" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo  $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png, image/jpg" name="imagen">

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"><?php echo  $descripcion; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend>

                <label for="habitacion">Habitaciones:</label>
                <input type="text" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo  $habitaciones; ?>">

                <label for="wc">Baños:</label>
                <input type="text" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo  $wc; ?>">

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="text" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo  $estacionamiento; ?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedores_id">
                    <option value="">-- Seleccione --</option>
                    <?php while($vendedor = mysqli_fetch_assoc($resultado) ) : ?>
                        <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : '' ?> value="<?php echo $vendedor['id']; ?>"> <?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?></option>
                    <?php endwhile; ?>
                </select>
            </fieldset>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php 
    incluirTemplate('footer');
?>