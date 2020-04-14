<?php
function navBar($n){
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark">
<a class="navbar-brand" href="<?php 
echo ($n == 0) ? "index" : '../index';
?>">
<img src="<?php 
echo ($n == 0) ? "img/monkapp.png" : '../img/monkapp.png';
?>" width="30" height="30" class="d-inline-block align-top" alt="">
Monkapp® 
</a>        
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="<?php 
    echo ($n == 0) ? "pymesup/index" : 'index.php';
?>">  Pymesup  <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Proyectos
        </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="https://github.com/Fromiti/MonkappWEB"> - </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="<?php 
    echo ($n == 0) ? "productos?pagina=1" : '../productos.php?pagina=1';
?>"> Productos </a>
        <a class="dropdown-item" href="<?php 
    echo ($n == 0) ? "leagueoflegends" : '../leagueoflegends.php';
?>"> League of legends API </a>
      </div>
  </ul>
    <a class="nav-link disabled" href="" tabindex="-1" aria-disabled="true"> Iniciaste sesión como: <?php echo $_SESSION['nick']; ?></a>
    <a href="<?php 
    echo ($n == 0) ? "cerrar_sesion" : '../cerrar_sesion.php';
?>"><button type="button" class="btn btn-outline-warning">Cerrar sesión</button> </a>       
</div>
</nav>
<!-- Cierre nav empiezo contenido -->
<?php
}

?>
