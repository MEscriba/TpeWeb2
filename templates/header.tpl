<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}"> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Torneo regional</title>
</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg bg-light">
          <div class="card" style="width: 18rem;">
          <a href="https://www.cahockey.org.ar/"><img src="./images/logo_confe.jpg" class="card-img-top" alt="logo confederacion argentina de hockey"></a>
          </div>
            <div class="container-fluid">
              <a class="navbar-brand" href="home">Coordinacion de arbitros</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="home">Inicio</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="list-umpires">Arbitros</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="list-asociations">Asociaciones</a>
                  </li>
                  {if !isset($smarty.session.USER_ID)}
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="login">Ingresar</a>
                    </li>
                  {else}
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="logout">Cerrar Sesion ({$smarty.session.USER_EMAIL})</a>
                    </li>
                  {/if} 
                  
                </ul>
              </div>
            </div>
          </nav>
    </header>

    <!-- inicio main container -->
    <main class="container">
