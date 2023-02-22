<?php 

    use App\Propiedad;

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

    // Base de datos
    // require '../../includes/config/database.php';
    $db = conectarDB();

    // Consulta para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultados = mysqli_query($db, $consulta);

    // Arreglo con mensajes de errores
    $errores = [];

    // $titulo = $propiedad['titulo'];
    // $precio = $propiedad['precio'];
    // $descripcion = $propiedad['descripcion'];
    // $habitaciones = $propiedad['habitaciones'];
    // $wc = $propiedad['wc'];
    // $estacionamiento = $propiedad['estacionamiento'];
    // $vendedorId = $propiedad['vendedores_id'];
    // $imagenPropiedad = $propiedad['imagen'];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        //Asignar los atributos
        $args = $_POST['propiedad'];

        $propiedad->sincronizar($args);
        // debuguear($propiedad);

        // $titulo = mysqli_real_escape_string( $db, $_POST['titulo'] );
        // $precio = mysqli_real_escape_string( $db, $_POST['precio'] );
        // $descripcion = mysqli_real_escape_string( $db, $_POST['descripcion'] );
        // $habitaciones = mysqli_real_escape_string( $db, $_POST['habitaciones'] );
        // $wc = mysqli_real_escape_string( $db, $_POST['wc'] );
        // $estacionamiento = mysqli_real_escape_string( $db, $_POST['estacionamiento'] );
        // $vendedorId = mysqli_real_escape_string( $db, $_POST['vendedor'] );
        // $creado = date('y/m/d');

        // Asignar files hacia una variable
        $imagen = $_FILES['imagen'];

        if(!$titulo){
            $errores[] = "Debes añadir un titulo";
        }

        if(!$precio){
            $errores[] = "El precio es Obligatorio";
        }

        if(strlen( $descripcion ) < 50 ){
            $errores[] = "La descripción es obligatoria y debe tener al menos 50 caracteres";
        }

        if(!$habitaciones){
            $errores[] = "El número de habitaciones es obligatorio";
        }

        if(!$wc){
            $errores[] = "El número de baños es obligatorio";
        }

        if(!$estacionamiento){
            $errores[] = "El número de lugares de estacionamiento es obligatorio";
        }

        if(!$vendedorId){
            $errores[] = "Elige un vendedor";
        }

        //Validar tamaño de imagen 1mb máximo
        $media = 1000 * 1000;

        if($imagen['size'] > $media) {
            $errores[] = 'La imagen es muy pesada';
        }

        if(empty($errores)){

            /** SUBIDA DE ARCHIVOS **/

            // Creamos la carpeta
            $carpetaImagenes = '../../imagenes/';

            if(!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }

            $nombreImagen = '';

            if($imagen['name']){
                unlink($carpetaImagenes . $propiedad['imagen']);

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

            //Subir la imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
            } else{
                $nombreImagen = $propiedad['imagen'];
            }

            $query = " UPDATE propiedades SET titulo = '${titulo}', precio = '${precio}', imagen = '${nombreImagen}', descripcion = '${descripcion}', habitaciones = ${habitaciones}, wc = ${wc}, estacionamiento = ${estacionamiento}, vendedores_id = ${vendedorId} WHERE id = ${id}";
            $resultado = mysqli_query($db, $query);
        
            if($resultado){
            //echo "Insertado Correctamente";

            // Redireccionar al usuario
            header('location: /bienes_raices/admin?resultado=2');
}
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