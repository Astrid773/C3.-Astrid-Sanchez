<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <title>Error</title>
  </head>
  <body>
    <div class="msg">
      <div class="Titulo">
        <h1>Uy!</h1>
      </div>
      <hr />
      <div class="Cont">
        <p>Hay un error al iniciar sesión/registrarse.</p>

        <?php if (isset($_GET['errorI'])) { ?>
            <p style="font-weight: bold;"><?php echo $_GET['errorI'] ?></p>
          <?php } ?>

          <br>
        <a href="index.php"><button>Regresar</button></a>
      </div>
    </div>
    <script src="js/script.js"></script>
  </body>
</html>