<?php
    session_start();
    include_once 'conexion_dbs/conexion.php';
    include_once 'navbar.php';
    if(!isset($_SESSION['nombre'])){              // Si el usuario entra a index sin haberse logeado se le redirigirá a la pagina principal
      Header('Location:login');       
    }
    //recoger todos los productos
    $sql = 'SELECT * FROM productos';
    $sentencia = $pdo->prepare($sql);
    $sentencia->execute();
    $resultado = $sentencia->fetchAll();

    $articulos_x_pagina = 7;
    $total_articulos = $sentencia->rowCount(); // rowCont() retorna la cantidad de filas afectadas por la sentencia ejecutada
    $paginas = ceil($total_articulos / $articulos_x_pagina);
    
?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=$flex, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
	  <link rel="stylesheet" href="css/bootstrap.min.css">   
  </head>
  <body>
    <?php
      echo navBar(0);
    ?>

    <?php 
      if(!$_GET){
        header('Location:productos?pagina=1');
      }

      if($_GET['pagina'] > $paginas){
        echo'<script type="text/javascript">
        alert("?????, ESTAS BIEN DE LA CABEZA?");
        window.location.href="productos?pagina=1";
        </script>';
      }
      if($_GET['pagina'] <= 0){
        echo'<script type="text/javascript">
        alert("?????, ESTAS BIEN DE LA CABEZA?");
        window.location.href="productos?pagina=1";
        </script>';
      }
      
      $iniciar = ($_GET['pagina'] - 1) * $articulos_x_pagina; 
      $sql_productos_x_pagina = 'SELECT * FROM productos LIMIT :iniciar,:narticulos';
      $sql_productos_x_pagina_prepare = $pdo->prepare($sql_productos_x_pagina);
      $sql_productos_x_pagina_prepare->bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
      $sql_productos_x_pagina_prepare->bindParam(':narticulos', $articulos_x_pagina, PDO::PARAM_INT);
      $sql_productos_x_pagina_prepare->execute();

      $resultado_productos_x_pagina = $sql_productos_x_pagina_prepare->fetchAll();
      ?>

    <div class="container mt-4">
      <form apache = "" method = "POST" class = "mb-4">
        <div class="text-center"> 
          <h1 class="display-4 mb-4">Agregar producto</h1>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <div class="input-group mb-2 mr-sm-2">
              <div class="input-group-prepend">
                <div class="input-group-text">
                <?php
                echo $resultado[count($resultado) - 1]['id'] + 1; ?> 
                </div>
              </div>
              <input type="text" class="form-control" placeholder="Nombre de producto" maxlength = '25' name = 'nombre_producto' required> 
            </div>
          </div>
            <div class="form-group col-md-4">
                <select class="form-control" name = "seccion">
                    <option selected>Seccion</option>
                    <option>Mouses</option>
                    <option>Monitores</option>
                    <option>Teclados</option>
                    <option>Audífonos</option>
                    <option>Sillas Gamer</option>
                </select>
            </div>
          <div class="form-group col-md-2">
            <input type="number" class="form-control" placeholder="Precio Unitario " name = 'precio' max = '1000000' min = '1000' required>
          </div> 
          <div class="form-group col-md-1">
            <input type="number" class="form-control" placeholder="Stock " name = 'stock' max = '25' min = '1' size = '2' required  >
          </div>                  
          <div class="form-group col-md-1">
            <button type="submit" class="btn btn-primary" name = "presionado">Agregar</button>
          </div>        
        </div>
        <div class="alert alert-success alert-dismissible fade show 
            <?php
              $nombre_producto = $_POST['nombre_producto'];
              $seccion = strtolower($_POST['seccion']);
              $stock = $_POST['stock'];
              $precio = $_POST['precio'];
              if(isset($nombre_producto) && isset($seccion) && isset($precio) && isset($stock)){
                $sql_insert = 'INSERT INTO productos(nombre_producto, seccion, cantidad_producto, precio) VALUES (?, ?, ?, ?)';
                $s = $pdo->prepare($sql_insert);
                $s->execute(array($nombre_producto, $seccion, $stock, $precio));               
                echo 'd-block';
              }else{
                echo 'd-none';
              }
              ?>" 
            role="alert">
              <strong>OMG!</strong> Tu/s producto se ha registrado satisfactoriamente en la base de datos, puedes revisarlo al final del listado!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div> 
      </form>    
      <table class="table">
      <caption>Lista de productos</caption>
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombre</th>
          <th scope="col">Sección</th>
          <th scope="col">Precio</th>
          <th scope="col">Stock</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach($resultado_productos_x_pagina as $productos):
        ?>
        <tr>
          <th scope="row"><?php echo $productos['id']; ?></th>
          <td><?php echo $productos['nombre_producto'];?></td>
          <td><?php echo $productos['seccion']; ?></td>
          <td>$<?php echo $productos['precio']; ?></td>
          <td><?php echo $productos['cantidad_producto']; ?></td>
        </tr>
        <?php 
          endforeach; 
        ?>     
      </tbody>
    </table> 
    <hr>
    
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item <?php echo $_GET['pagina'] == 1 ? 'disabled' : ' '; ?>"><a class="page-link" href="productos?pagina=<?php echo $_GET['pagina']-1; ?>">Anterior</a></li>

        <?php for($i = 1; $i <= $paginas; $i++){
        ?>
        <li class="page-item <?php echo $_GET['pagina'] == $i ? 'active' : ' '; ?>"><a class="page-link" href="<?php echo 'productos?pagina='.$i;?>"> <?php echo $i; ?> </a></li>
        <?php } ?>

        <li class="page-item <?php echo $_GET['pagina'] == $paginas ? 'disabled' : ' '; ?>"><a class="page-link" href="productos?pagina=<?php echo $_GET['pagina']+1;?>">Siguiente</a></li>

      </ul>
    </nav>
    </div>    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script> 
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
    </script>    
</body>
</html>