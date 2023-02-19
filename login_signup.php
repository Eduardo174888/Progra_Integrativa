<!DOCTYPE html>

<html>
  <head>

    <title>Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="/css/estiloss.css">

  </head>

  <body>

    <div class="container" id="container">

      <div class="form-container register-container">
        <form action="includes/singup.inc.php" method="post">
          <h1>Registro</h1>
          <input type="text" name="Nickname" placeholder="Nickname" required>
          <input type="text" name="Nombre" placeholder="Nombre" required>
          <input type="text" name="Apellido" placeholder="Apellidos" required>
          <input type="email" name="Email" placeholder="Email" required>
          <input type="password" name="pwd" placeholder="Password" required>
          <input type="password" name="pswRepeat" placeholder="Repeat Password" required>

          <button type="submit" name="submit">Registrar</button>
        
        </form>
      </div>

      <div class="form-container login-container">
        <form action="includes/login.inc.php" method="post">
          <h1>Iniciar Sesion</h1>
          <input type="text" name="uid" placeholder="Username/Email...">
          <input type="password" name="log_pwd" placeholder="Password"> 
          <div class="content">
            <div class="checkbox">
              <input type="checkbox" name="checkbox" id="checkbox">
              <label>Recordar Usuario</label>
            </div>
            
          </div>
          <button type="login" name="login">Acceder</button>
          
        </form>
      </div>

      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1 class="title">Hola <br> Amigo</h1>
            <p>Forma parte de nuestra gran comunidad y disfruta de muchas recetas para cocinar</p>
            <button class="ghost" id="login">Accerder
              <i class="lni lni-arrow-left login"></i>
            </button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1 class="title">Hola listo para <br> Cocinar</h1>
            <p>Comparte tus mejores recetas o cocina las que la gente comparte.</p>
            <button class="ghost" id="register">Register
              <i class="lni lni-arrow-right register"></i>
            </button>
          </div>
        </div>
      </div>

      <?php
      if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
          echo "<p>Fill in all fields!</p>";
        }
        elseif ($_GET["error"] == "passwordsdontmatch") {
          echo "<p>Password don't match!</p>";
        }
        elseif ($_GET["error"] == "usernametaken") {
          echo "<p>That username is already taken!</p>";
        }
        elseif ($_GET["error"] == "stmtfailed") {
          echo "<p>Something went wrong......</p>";
        }
        elseif ($_GET["error"] == "wronglogin") {
          echo "<p>Incorrect login information!</p>";
        }
        elseif ($_GET["error"] == "none") {
          echo "<p>You have signed in!</p>";
        }
      }
      ?>

    </div>

    

    <script src="/javascript/script.js"></script>

  </body>

</html>