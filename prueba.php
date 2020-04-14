<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title> PRUEBA CTM XDDDDD</title>
</head>
<body>
            <h1>
            <?php
                $opcion = $_GET['lol'];
                echo $opcion;
            ?>
            </h1>
    <form method = "get" action = "">       
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputState">SECCION</label>
                <select id="inputState" class="form-control" name = "lol">
                    <option selected>Choose...</option>
                    <option>HOLA</option>
                    <option>xd</option>
                </select>
            </div>
        </div>  
        <button type="submit" class="btn btn-primary">ENVIAR</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>            
</body>
</html>