<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Iniciar Sesion | Eventos</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">  
    <!-- Bootstrap core CSS -->
    <link href="css/login.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form action="php/login.php" method="POST">
    <img class="mb-4" src="assets/images/logo-icon.png" alt="" width="70" height="70">
    <h1 class="h3 mb-3 fw-normal">Iniciar Sesión</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" name="username" placeholder="name@example.com" required>
      <label for="floatingInput">Usuario | Correo</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
      <label for="floatingPassword">Constraseña</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Ingresar</button>
    <br>
    <br>
    <a href="usuario_crear.php"><button class="w-100 btn btn-lg btn-info" type="button">Registrarse</button></a>
    <p class="mt-5 mb-3 text-muted">Desarrollado por: Jesus Damian Ake Franco | &copy; <?php echo date('Y');?> </p>
  </form>
</main>
  </body>
</html>
