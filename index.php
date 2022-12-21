<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bienvnido a Tourism-System</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
#principal{
            border:solid lpx #74ed72;
            margin:0 auto;
            padding:5px;
            width:80%;
            background:white;
            }
            body {
                 background:url (fondo.jpg);
                 background - size:100%;
                 background - attachment:fxed;
                 }
                 fieldset{
                 margin-bottom:10px;
                 }
                 legend{
                 border:solid lpx Black;
                 padding: 10px;
                 font-weight:bold;
                 border-radius: 20px;
                 background: #c7c7c7; 
                 }

    </style>
  </head>
  <body>
    <div class=body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <div id="principal">
       
        echo "<img src="yeber.jpg"  id="yeber"  align="left"  width= "130" />"
      

        <br/>
        <h3>Curriculum</h3>
     
     
        <br/>
        <br/>
     
            <fieldset>
            <legend>Datos Personales</legend>
            <ul>
                <li>Nombres: Yeiber Ramon </li>
                <li>Apellidos: Rebolledo Perez</li>
                <li>Cedula: 29.846.529</li>
                <li>Edad: 19 años</li>
                <li>Sexo: Masculino</li>
                <li>Telefono: (0424) 365-57-74</li>
            </ul>
        </fieldset>
            <fieldset>
            <legend>Estudios Realzados</legend>
            <ul>
                <li>Estudios Primarios: E.B.N "Melicia Nieves de Tejada"</li>
                <li>Estudios Secundarios: U.E.N "Melicia Nieves de Tejada"</li>
                <li>Estudios Universitarios: U.N.E "Romulo Gallegos" (En Proceso)</li>
            </ul>
        </fieldset>
            <fieldset>
            <legend>Experiencia Laboral</legend>
            <ul>
                <li>Todo Calderas Hnos.Corrales 2012 - (Tiempo de duracion: 1 año y 6 meses)</li>
                <li>Atracciones DumboPark - (Tiempo de Duracion: Activo)</li>
            </ul>
        </fieldset>
            <fieldset>
            <legend>Experenca en la Programacion</legend>
            <ul>
                <li>La experiencia adquirida con cada uno de estos lenguajes ha sido un poco diferente, aunque no la he usado mucho mayormente para la realización de archivos y páginas web. Me ha gustado utilizar un poco más el PHP, aunque el Python es el lenguaje más fácil por así decirlo para programar debido a su código abierto y que la sintaxis es un poco más simple y sencilla de entender, pero me gusta un poco más la sintaxis de PHP aparte que, permite un mejor desarrollo del lado de las aplicaciones del lado del servidor. Con las practicas se me han  presentado uno que otros errores, más que todo comunes pero que con las practicas algunos han mejorados y espero seguir mejorando.</li>
            </ul>
        </fieldset>
      <a href="logout.php">
        Logout
      </a>
    <?php else: ?>

        <h1>Entrar o Registrarse</h1></p>

        <a href="login.php">Entrar</a> o
        <a href="signup.php">Registrarse</a></p>

    <?php endif; ?>
  </body>
</html>
