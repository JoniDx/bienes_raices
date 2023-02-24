<?php 

    require '../../includes/app.php';

    use App\Propiedad;
    use App\Vendedor;
    use Intervention\Image\ImageManagerStatic as Image;

    estaAutenticado();

    $propiedad = new Propiedad;

    //Consulta para obtener todo losvendedores
    $vendedores = Vendedor::all();

    // Arreglo con mensajes de errores
    $errores = Propiedad::getErrores();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $propiedad = new Propiedad($_POST['propiedad']);

        /** SUBIDA DE ARCHIVOS **/

        //Define la extensión para el archivo
        // if ($imagen['type'] === 'image/jpeg') {
        //     $exten = '.jpg';
        // }else if($imagen['type'] === 'image/jpg'){
        //     $exten = '.jpg';
        // } else{
        //     $exten = '.png';
        // }

        // Generar un nombre unico
        // $nombreImagen = md5( uniqid('')). $exten;
        $nombreImagen = md5( uniqid('')). '.jpg';

        if($_FILES['propiedad']['tmp_name']['imagen']){
            // $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
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
            $propiedad->guardar();


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

            <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php 
    incluirTemplate('footer');
?>