<!DOCTYPE html>
<html>
<!-- link para relacionarlo con el css -->

<head>
  <title>Login</title>
  <link rel=stylesheet type="text/css" href="./style/login.css">
</head>

<!-- body principal con el formulario de acceso -->

<body>
  <main>
    <section id="section-login">
      <div class="login-container">
        <form class="form" method="post" action="./controlers/login.php">
          <p>Login</p>
          <div class="group">
            <input id="username" name="username" required="true" class="main-input" type="text">
            <span class="highlight-span"></span>
            <label for="username">User</label>
          </div>
          <div class="group">
            <input id="password" name="password" required="true" class="main-input" type="text">
            <span class="highlight-span"></span>
            <label for="password">password</label>
          </div>
          <button>Ingresar</button>
              <?php
              // seccion de comprobacion de errores
              session_start();
              if (isset($_SESSION["error"])) {
                echo "<div id='error-message'>Nombre de usuario o contraseña incorrectos</div>";
                unset($_SESSION["error"]);
              }
              ?>
        </form>
      </div>
    </section>
  </main>
</body>

</html>