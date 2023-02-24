<?php 

    use App\Propiedad;
    use App\Vendedor;
    use Intervention\Image\ImageManagerStatic as Image;

    require '../../includes/app.php';

    estaAutenticado();

    // if(!$auth){
    //     header('Location: /bienes_raices');
    // }

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    
    if(!$id){
        header('location: /bienes_raices/admin');
    }

    //Obtener los datos de la propiedad
    $propiedad = Propiedad::find($id);

    $vendedores = Vendedor::all();

    // Arreglo con mensajes de errores
    $errores = Propiedad::getErrores();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        //Asignar los atributos
        $args = $_POST['propiedad'];

        $propiedad->sincronizar($args);
       
        // Validación
        $errores = $propiedad->validar();
        
        /** SUBIDA DE ARCHIVOS **/
        $nombreImagen = md5( uniqid('')). '.jpg';

        if($_FILES['propiedad']['tmp_name']['imagen']){
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
            $propiedad->setImagen($nombreImagen);
        }


        // $creado = date('y/m/d');

        if(empty($errores)){
            //Almacenar imagen
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $image->save(CARPETA_IMAGENES . $nombreImagen);
               
            } 
            $propiedad->guardar();
        }
    }
    
    incluirTemplate('header');
?>   


    <main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>
        <a href="/bienes_raices/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" enctype="multipart/form-data">

            <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php 
    incluirTemplate('footer');
?>