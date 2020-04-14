<?php
    session_start();
    include_once 'conexion_dbs/conexion.php';
    include_once 'navbar.php';
    include_once 'campeon_retorno.php';
    if(!isset($_SESSION['nombre'])){              // Si el usuario entra a index sin haberse logeado se le redirigirá a la pagina principal
      Header('Location:login');    
    
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=$flex, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="img/monkapp.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
      .background1{
        background:gray;
      }
      .background2{
        background:blue;
      }
    </style>
  </head>
  <body>
    <?php
      echo navBar(0);
    ?>   
    <div class="container mt-3 mb-3">
        <div class="row">
          <div class="col-sm-8">         
            <div class="jumbotron border">
                <h1 class="display-4">Monkapp te da la bienvenida!</h1>
                <p class="lead">Este es el sitio web central de la compañia, en el se hace una gestión y una concentración de los proyectos.</p>
                <hr class="my-4">
                <p>Nuestra historia es breve, un dia hace 6 meses, Lucas Vergara y Gonzalo Salazar se propusieron realizar un proyecto que se pueda materializar, y en el que ambos puedan aportar a su manera, ahí nació Monkapp, una idea que, a pesar de no contar con un objetivo claro, ya que comenzó como una aplicación movil y ahora pasó a ser una central de proyectos multiplataformas, significa mucho para sus dueños ya que en el se piensa plasmar toda la pasión por la programación y el aprendizaje.  En Abril y Marzo del 2020 se han realizado una serie de importantes avances que hacen que Monkapp signifique cada vez un mayor orgullo para sus Co-founders. </p>
                <a class="btn btn-outline-dark btn-lg btn-sm" href="https://github.com/Fromiti/MonkappWEB" role="button">Visitanos en GitHub!</a>
            </div>             
          </div>          
          <div class="col-sm-4 border">
            <div class="text-center mt-3">
            <h5 class="card-title lead mb-3"><?php echo $_SESSION['nombre']; ?> (<?php echo $_SESSION['nick']; ?>) </h5>
            </div>         
            <img src="img_perfil/<?php echo $_SESSION['imagen']; ?>" class="img-fluid rounded">
              <div class="card-body">                      
                  <p class="card-text lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo at deserunt vitae doloribus consectetur modi ratione aspernatur a commodi dignissimos.</p>
                  <hr>
                  <form action = "cambiar_avatar" method = "post" enctype = "multipart/form-data" >
                    <div class="form-group">
                    <h5><label for="exampleFormControlFile1" class ="lead">Cambiar imagen de perfil</label></h5>                   
                    <input type="file" class="form-control-file mt-3" id="exampleFormControlFile1" name = "avatar" data-max-size="2048">                   
                    <button type="submit" class="btn btn-primary mt-3 lead" name = "actualizar"> Cambiar </button>
                    </div>
                  </form> 
              </div>             
          </div>                                       
      </div>
      <hr>
      <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/qdp-Gg7e2vc?rel=0" allowfullscreen></iframe>
      </div>
    </div> 
    
    <!-- DECKS DE CEO Y MONKAPP -->
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>