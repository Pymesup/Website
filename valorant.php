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
      .borde_liga { 
        padding:20;
        border-image: url(https://opgg-static.akamaized.net/images/borders2/platinum.png);
      }
    
    </style>
  </head>
  <body>
    <?php
      echo navBar(0);
    ?>
    <div class="container">
    <div class="card bg-light">
	  <article class="card-body mx-auto" style="max-width: 500px;">
    <form action="" method="GET">
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="nick" class="form-control" placeholder="Nombre de usuario" type="text" required>
    </div> <!-- form-group// -->   
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Revisar datos de jugador </button>
    </div> <!-- form-group// -->
    </article>
    </div>
    </div>
    <hr>
    <?php 
      if(isset($_GET['nick'])){
      $_GET['nick'] = str_replace(' ','%20', $_GET['nick']);
      
      //API KEYS    
      $user = json_decode(file_get_contents("https://la2.api.riotgames.com/lol/summoner/v4/summoners/by-name/".$_GET['nick']."?api_key=RGAPI-60af67e2-b586-438f-b497-ad2c50555bcc"), true);
      $user_details_rank = json_decode(file_get_contents("https://la2.api.riotgames.com/lol/league/v4/entries/by-summoner/".$user['id']."?api_key=RGAPI-60af67e2-b586-438f-b497-ad2c50555bcc"), true);
      $user_details_masteries = json_decode(file_get_contents("https://la2.api.riotgames.com/lol/champion-mastery/v4/champion-masteries/by-summoner/".$user['id']."?api_key=RGAPI-60af67e2-b586-438f-b497-ad2c50555bcc"), true);

      if($user_details_rank[0]['queueType'] == "RANKED_SOLO_5x5"){
        $soloq = 0;
        $flex = 1;
      }else{
        $soloq = 1;
        $flex = 0;
      }
    ?>
      <div class="container">
        <div class="row">
          <div class="col-sm p-1">
            <div class="text-center">
              <img src="https://opgg-static.akamaized.net/images/profile_icons/profileIcon<?php echo $user['profileIconId']?>.jpg?image=q_auto&v=1518361200" height = "120" width = "120" >
              <img src="https://opgg-static.akamaized.net/images/borders2/<?php 
              $rango_soloq = strtolower($user_details_rank[$soloq]['tier']);
              $rango_flex = strtolower($user_details_rank[$flex]['tier']);
              $rango_soloq_tier = returnRangeTier($rango_soloq);
              $rango_flex_tier = returnRangeTier($rango_flex);
              if($rango_soloq_tier > $rango_flex_tier){
                echo $rango_soloq;
              }else{
                echo $rango_flex;
              }
              ?>.png" height = "140" width = "140">
              <h4 class = "mt-2"> <?php echo $user['name']?></h4>
              <h4>Nivel: <?php echo $user['summonerLevel']?></h4>
            </div>          
            </div>
          <div class="col-sm">
              <div class="text-center">
              <?php             
                  if(isset($user_details_rank[$soloq]['wins']) && isset($user_details_rank[$soloq]['losses'])){
                  ?>
                    <h5>Ranked Soloq stats:</h5>
                    <h5>Victorias: <?php
                    echo $user_details_rank[$soloq]['wins']; ?> Derrotas: <?php echo $user_details_rank[$soloq]['losses']; ?> </h5>
                    <h5>
                    <?php 
                    $suma = $user_details_rank[$soloq]['wins'] + $user_details_rank[$soloq]['losses'];
                    $porcentaje = (100 / $suma) * $user_details_rank[$soloq]['wins'];
                    echo round($porcentaje);  
                    ?>
                    % de victorias
                    </h5>
                    <img src="
                    <?php 
                    $rango = strtolower($user_details_rank[$soloq]['tier']);
                    echo "https://opgg-static.akamaized.net/images/medals/".$rango."_1.png?image=q_auto&v=$flex";
                    ?>
                    " class="img-fluid" alt="Responsive image" height = "200" width ="200">                
                    <h5><?php echo $user_details_rank[$soloq]['tier']." ". $user_details_rank[$soloq]['rank']; ?></h5>
                  <?php 
                  }else{ ?>
                  <h5>Ranked Soloq stats:</h5>
                  <h5>Victorias: 0 Derrotas: 0 </h5> 
                    <h5> 0 % de victorias </h5>
                    <img src="
                    <?php 
                    echo "https://opgg-static.akamaized.net/images/medals/default.png";
                    ?>
                    " class="img-fluid" alt="Responsive image" height = "200" width ="200">                
                    <h5> UNRANKED </h5>
                  <?php } ?>
              </div>
          </div>
            <div class="col-sm">
              <div class="text-center"> 
                  <?php             
                  if(isset($user_details_rank[$flex]['wins']) && isset($user_details_rank[$flex]['losses'])){
                  ?>
                    <h5>Ranked Flexible 5v5 stats:</h5>
                    <h5>Victorias: <?php
                    echo $user_details_rank[$flex]['wins']; ?> Derrotas: <?php echo $user_details_rank[$flex]['losses']; ?> </h5>
                    <h5>
                    <?php 
                    $suma = $user_details_rank[$flex]['wins'] + $user_details_rank[$flex]['losses'];
                    $porcentaje = (100 / $suma) * $user_details_rank[$flex]['wins'];
                    echo round($porcentaje);  
                    ?>
                    % de victorias
                    </h5>
                    <img src="
                    <?php 
                    $rango = strtolower($user_details_rank[$flex]['tier']);
                    echo "https://opgg-static.akamaized.net/images/medals/".$rango."_1.png?image=q_auto&v=$flex";
                    ?>
                    " class="img-fluid" alt="Responsive image" height = "200" width ="200">                
                    <h5><?php echo $user_details_rank[$flex]['tier']." ". $user_details_rank[$flex]['rank']; ?></h5>
                  <?php 
                  }else{ ?>
                  <h5>Ranked Flexible 5v5 stats:</h5>
                  <h5>Victorias: 0 Derrotas: 0 </h5> 
                    <h5> 0 % de victorias </h5>
                    <img src="
                    <?php 
                    echo "https://opgg-static.akamaized.net/images/medals/default.png";
                    ?>
                    " class="img-fluid" alt="Responsive image" height = "200" width ="200">                
                    <h5> UNRANKED </h5>
                  <?php } ?>                                                
              </div>          
            </div>           
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-4 p-2 border">
              <div class="text-center mt-2">
                <h4>Campeones más Utilizados XD</h4>
              </div>
              <hr>               
                    <?php 
                    $id_encrypted = $user['accountId'];
                    $matches = json_decode(file_get_contents("https://la2.api.riotgames.com/lol/match/v4/matchlists/by-account/".$id_encrypted."?queue=420&season=13&beginTime=1578625200000&api_key=RGAPI-60af67e2-b586-438f-b497-ad2c50555bcc"), true); // soloq desde 10 de enero              
                    for($i = 0; $i < $matches['endIndex']; $i++){                   
                      $datos_partidas[$matches['matches'][$i]['champion']]++;
                    }
                                     
                    foreach($datos_partidas as $id_champ=>$cantidad_juegos){                                  
                    ?>
                      <li class="media mb-3">
                        <img src="<?php 
                        echo "https://cdn2.leagueofgraphs.com/img/champion-icons/10.7/64/".$id_champ.".png";
                        ?>" class="mr-3 rounded" alt="Champion <?php echo $i?>" height = "50" width = "50">                
                        <div class="media-body">
                          <h5 class="mt-0 mb-1"><?php echo returnChamp($id_champ); ?></h5>
                          Partidas jugadas: <?php echo $cantidad_juegos; ?>
                        </div>  
                      </li>
                      <?php
                      }
                      ?>                           
              </nav>
            </div>
            <div class="col-8">
              <?php                
              for($i = 0; $i < 2; $i++){
                  $id_partida = $matches['matches'][$i]['gameId'];
                  $partida = json_decode(file_get_contents("https://la2.api.riotgames.com/lol/match/v4/matches/".$id_partida."?api_key=RGAPI-60af67e2-b586-438f-b497-ad2c50555bcc"), true);
              ?>
              <div class="row border p-1 mb-2">                       
                <div class="col p-2">
                  <div class="media">
                    <img src="<?php echo "https://cdn2.leagueofgraphs.com/img/champion-icons/10.7/64/".$partida['participants'][0]['championId'].".png"?>" class="mr-3 rounded-circle" alt="..." height = "50" width = "50">
                    <div class="media-body">
                    <h6 class="mt-0"><?php echo $partida['participantIdentities'][0]['player']['summonerName']; ?></h6>
                      <?php 
                      echo "K/D/A: ".  $partida['participants'][0]['stats']['kills']."/".$partida['participants'][0]['stats']['deaths']."/".$partida['participants'][0]['stats']['assists'];
                      ?>
                    </div>
                  </div>
                </div>
                <div class="col p-2">
                  <div class="media">
                    <img src="<?php echo "https://cdn2.leagueofgraphs.com/img/champion-icons/10.7/64/".$partida['participants'][5]['championId'].".png"?>" class="mr-3 rounded-circle" alt="..." height = "50" width = "50">
                    <div class="media-body">
                    <h6 class="mt-0"><?php echo $partida['participantIdentities'][5]['player']['summonerName']; ?></h6>
                      <?php 
                      echo "K/D/A: ".$partida['participants'][5]['stats']['kills']."/".$partida['participants'][5]['stats']['deaths']."/".$partida['participants'][5]['stats']['assists'];
                      ?>
                    </div>
                  </div>
                </div>
                <div class="w-100"></div>
                <div class="col p-2">
                  <div class="media">
                    <img src="<?php echo "https://cdn2.leagueofgraphs.com/img/champion-icons/10.7/64/".$partida['participants'][1]['championId'].".png"?>" class="mr-3 rounded-circle" alt="..." height = "50" width = "50">
                    <div class="media-body">
                    <h6 class="mt-0"><?php echo $partida['participantIdentities'][1]['player']['summonerName']; ?></h6>
                      <?php 
                      echo "K/D/A: ".$partida['participants'][1]['stats']['kills']."/".$partida['participants'][1]['stats']['deaths']."/".$partida['participants'][1]['stats']['assists'];
                      ?>
                    </div>
                  </div>
                </div>
                <div class="col p-2">
                  <div class="media">
                    <img src="<?php echo "https://cdn2.leagueofgraphs.com/img/champion-icons/10.7/64/".$partida['participants'][6]['championId'].".png"?>" class="mr-3 rounded-circle" alt="..." height = "50" width = "50">
                    <div class="media-body">
                    <h6 class="mt-0"><?php echo $partida['participantIdentities'][6]['player']['summonerName']; ?></h6>
                      <?php 
                      echo "K/D/A: ".$partida['participants'][6]['stats']['kills']."/".$partida['participants'][6]['stats']['deaths']."/".$partida['participants'][6]['stats']['assists'];
                      ?>
                    </div>
                  </div>
                </div>
                <div class="w-100"></div>
                <div class="col p-2">
                  <div class="media">
                    <img src="<?php echo "https://cdn2.leagueofgraphs.com/img/champion-icons/10.7/64/".$partida['participants'][2]['championId'].".png"?>" class="mr-3 rounded-circle" alt="..." height = "50" width = "50">
                    <div class="media-body">
                    <h6 class="mt-0"><?php echo $partida['participantIdentities'][2]['player']['summonerName']; ?></h6>
                      <?php 
                      echo "K/D/A: ".$partida['participants'][2]['stats']['kills']."/".$partida['participants'][2]['stats']['deaths']."/".$partida['participants'][2]['stats']['assists'];
                      ?>
                    </div>
                  </div>
                </div>
                <div class="col p-2">
                  <div class="media">
                    <img src="<?php echo "https://cdn2.leagueofgraphs.com/img/champion-icons/10.7/64/".$partida['participants'][7]['championId'].".png"?>" class="mr-3 rounded-circle" alt="..." height = "50" width = "50">
                    <div class="media-body">
                    <h6 class="mt-0"><?php echo $partida['participantIdentities'][7]['player']['summonerName']; ?></h6>
                      <?php 
                      echo "K/D/A: ".$partida['participants'][7]['stats']['kills']."/".$partida['participants'][7]['stats']['deaths']."/".$partida['participants'][7]['stats']['assists'];
                      ?>
                    </div>
                  </div>
                </div>
                <div class="w-100"></div>
                <div class="col p-2">
                  <div class="media">
                    <img src="<?php echo "https://cdn2.leagueofgraphs.com/img/champion-icons/10.7/64/".$partida['participants'][3]['championId'].".png"?>" class="mr-3 rounded-circle" alt="..." height = "50" width = "50">
                    <div class="media-body">
                    <h6 class="mt-0"><?php echo $partida['participantIdentities'][3]['player']['summonerName']; ?></h6>
                      <?php 
                      echo "K/D/A: ".$partida['participants'][3]['stats']['kills']."/".$partida['participants'][3]['stats']['deaths']."/".$partida['participants'][3]['stats']['assists'];
                      ?>
                    </div>
                  </div>
                </div>
                <div class="col p-2">
                  <div class="media">
                    <img src="<?php echo "https://cdn2.leagueofgraphs.com/img/champion-icons/10.7/64/".$partida['participants'][8]['championId'].".png"?>" class="mr-3 rounded-circle" alt="..." height = "50" width = "50">
                    <div class="media-body">
                    <h6 class="mt-0"><?php echo $partida['participantIdentities'][8]['player']['summonerName']; ?></h6>
                      <?php 
                      echo "K/D/A: ".$partida['participants'][8]['stats']['kills']."/".$partida['participants'][8]['stats']['deaths']."/".$partida['participants'][8]['stats']['assists'];
                      ?>
                    </div>
                  </div>
                </div>
                <div class="w-100"></div>
                <div class="col p-2">
                  <div class="media">
                    <img src="<?php echo "https://cdn2.leagueofgraphs.com/img/champion-icons/10.7/64/".$partida['participants'][4]['championId'].".png"?>" class="mr-3 rounded-circle" alt="..." height = "50" width = "50">
                    <div class="media-body">
                    <h6 class="mt-0"><?php echo $partida['participantIdentities'][4]['player']['summonerName']; ?></h6>
                      <?php 
                      echo "K/D/A: ".$partida['participants'][4]['stats']['kills']."/".$partida['participants'][4]['stats']['deaths']."/".$partida['participants'][4]['stats']['assists'];
                      ?>
                    </div>
                  </div>
                </div>
                <div class="col p-2">
                  <div class="media">                   
                      <img src="<?php echo "https://cdn2.leagueofgraphs.com/img/champion-icons/10.7/64/".$partida['participants'][9]['championId'].".png"?>" class="mr-3 rounded-circle" alt="..." height = "50" width = "50">                   
                    <div class="media-body">
                    <h6 class="mt-0"><?php echo $partida['participantIdentities'][9]['player']['summonerName']; ?></h6>
                      <?php 
                      echo "K/D/A: ".$partida['participants'][9]['stats']['kills']."/".$partida['participants'][9]['stats']['deaths']."/".$partida['participants'][9]['stats']['assists'];
                      ?>
                    </div>
                  </div>
                </div>
              </div>             
              <?php
              }
              ?>
            </div>
          </row>       
        </div>
        <?php } ?>        
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script> 
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
    </script>    
</body>
</html>