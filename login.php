<?php 

    //Importar la conexión
    require 'includes/config/database.php';
    $db = conectarDB();

    $errores = [];

     // Autenticar el usuario
     if($_SERVER['REQUEST_METHOD'] == 'POST') {
          // var_dump($_POST); 

          $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
          $password = mysqli_real_escape_string($db, $_POST['password']);

          if(!$email){
               $errores[] = "El email es obligatorio o no es válido";
          }

          if(!$password){
               $errores[] = "El password es obligatorio";
          }

          if(empty($errores)){
               //Revisamos si el usuario existe
               $query = "SELECT * FROM usuarios WHERE email = '${email}'";
               $resultado = mysqli_query($db, $query);

               // var_dump($resultado);

               if($resultado->num_rows){
                    // Revisar si el password es correcto
                    $usuario = mysqli_fetch_assoc($resultado);

                    // Si el password es correcto o no
                    $auth = password_verify($password, $usuario['password']);

                    if($auth){
                         // El usuario esta autenticado
                         session_start();
                         $_SESSION['usuario'] = $usuario['email'];
                         $_SESSION['login'] = true;

                         header('Location: /bienes_raices/admin');

                    } else {
                         $errores[] = "El Correo o password es incorrecto";
                    }

               } else{
                    $errores[] = "El usuario no existe";
               }
          }
     }
    require 'includes/funciones.php';
    
    incluirTemplate('header');
?>   


    <main class="contenedor seccion contenido-centrado">
        <?php foreach($errores as $error) : ?>
          <div class="alerta error">
               <?php echo $error; ?>
          </div>
          <?php endforeach?>
        <h1>Iniciar Sesión</h1>
          <form method="POST" class="formulario">
               <fieldset>
                    <legend>Email y Password</legend>
                    
                    <label for="email">E-mail</label>
                    <input type="email" name="email" placeholder="Tu Email" id="email" require>

                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Tu Password" id="password" require>

                    <input type="submit" value="Iniciar Sesión" class="boton boton-verde">

               </fieldset>
          </form>
    </main>

<?php 
    incluirTemplate('footer');
?>