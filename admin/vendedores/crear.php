<?php 

    require '../../includes/app.php';

    use App\Vendedor;

    estaAutenticado();

    //Consulta para obtener todo losvendedores
    $vendedor = new Vendedor;

    // Arreglo con mensajes de errores
    $errores = Vendedor::getErrores();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $vendedor =  new Vendedor($_POST['vendedor']);

        $errores = $vendedor->validar();

        //No hay errores
        if(empty($errores)){
            $vendedor->guardar();
        }
    }   

    incluirTemplate('header');


    ?>

<main class="contenedor seccion">
        <h1>Registrar Vendedor(a)</h1>
        <a href="/bienes_raices/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/bienes_raices/admin/vendedores/crear.php" enctype="multipart/form-data">

            <?php include '../../includes/templates/formulario_vendedores.php'; ?>

            <input type="submit" value="Registrar Vendedor" class="boton boton-verde">
        </form>
    </main>

<?php 
    incluirTemplate('footer');
?>