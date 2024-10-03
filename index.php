<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;
        charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href="style.css" rel="stylesheet">
		<title>Registro</title>
    </head>
    <body>
	<div class="wrapper">
		<nav class="nav">
			<div class="nav-logo">
				<p>Logo .</p>
			</div>
			<div class="nav-menu">
				<ul>
					<li><a href="#" class="link active">Home</a></li>
					<li><a href="#" class="link">Blog</a></li>
					<li><a href="#" class="link">Servicios</a></li>
					<li><a href="#" class="link">Sobre nosotros</a></li>
				</ul>
			</div>
			<div class="nav-button">
            	<button class="btn white-btn" id="loginBtn" onclick="login()">Login</button>
            	<button class="btn" id="registerBtn" onclick="register()">Sign Up</button>
        	</div>
        	<div class="nav-menu-btn">
            	<i class="bx bx-menu" onclick="myMenuFunction()"></i>
            </div>
        </nav>

<!------------------------------------------- Form box ---------------------------------------------->	
		<div class="form-box">
            <!------------------------------- Login form ------------------------>

            <div class="login-container" id="login">
                <div class="top">
                    <span>Tienes una cuenta? <a href="#" onclick="register()">Login</a></span>
                    <header>Login</header>
                </div>
				<form class="registro" action="login.php" method="POST">

				<?php if (isset($_GET['error'])) { ?>
            	<p id="msgerror"><?php echo $_GET['error'] ?></p>
          		<?php } ?>

                <div class="input-box">
                    <input type="text" class="input-field" name="correo" placeholder="Correo"
					maxlength="60" required><br>
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" name="contrasena" placeholder="Contrasena"
					maxlength="50" required><br>
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input type="submit" class="submit" value="Sign In">
                </div>
                <div class="two-col">
                    <div class="one">
                        <input type="checkbox" id="login-check">
                        <label for="login-check">Recuerdame</label>
                    </div>
                    <div class="two">
                        <label><a href="#">Olvide mi contrasena</a></label>
                    </div>
                </div>
				</form>
            </div>

			<!-------------------------------- Registration form ------------------------>
			<div class="register-container" id="register">
				<div class="top">
                	<span>No tienes una cuenta? <a href="#" onclick="login()">Login</a></span>
                	<header>Sign Up</header>
                </div>	

				<form class="signup" action="guardar.php" method="POST">

				<?php if (isset($_GET['errorR'])) { ?>
           		<p id="msgerror"><?php echo $_GET['errorR'] ?></p>
         		<?php } ?>

				<div class="two-forms">
					<div class="input-box">
						<input type="text" class="input-field" name="Nombre" placeholder="Nombre"
						maxlength="30" required><br>
						<i class="bx bx-user"></i>
					</div>
					<div class="input-box">
						<input type="text" class="input-field" id="Apellidos" name="Apellidos" placeholder="Apellido"
						maxlength="60" required><br>
						<i class="bx bx-user"></i>
					</div>
				</div>

				<div class="input-box">
					<input type="text" class="input-field" id="correo" name="correo" placeholder="Correo"
					maxlength="60" required><br>
					<i class="bx bx-user"></i>
				</div>

				<div class="input-box">
					<input type="password" class="input-field" id="contrasena" name="contrasena" placeholder="Contrasena"
					maxlength="50" required><br>
					<i class="bx bx-user"></i>
				</div>

				<div class="input-box">
					<button class="submit" type="submit">Enviar Registro</bottom>
				</div>
				<div class="two-col">
            		<div class="one">
                		<input type="checkbox" id="register-check">
                		<label for="register-check">Recuerdame</label>
            		</div>
                	<div class="two">
                		<label><a href="#">Terminos y condiciones</a></label>
                	</div>
            	</div>
			</div>
			</form>
		</div>
	</div>

		<script>

			function myMenuFunction(){
				var i = document.getElementById("navMenu");

				if(i.className === "nav-menu"){
					i.className += " responsive";
				} else{
					i.className = "nav-menu";
				}
			}
		</script>

		<script>

			var a = document.getElementById("loginBtn");
			var b = document.getElementById("registerBtn");
			var x = document.getElementById("login");
			var y = document.getElementById("register");

			function login() {
				x.style.left = "4px";
				y.style.right = "-520px";
				a.className += "white-btn";
				b.className = "btn";
				x.style.opacity = 1;
				y.style.opacity = 0;
			}

			function register() {
				x.style.left = "-510px";
				y.style.right = "5px";
				a.className = "btn";
				b.className += "white-btn";
				x.style.opacity = 0;
				y.style.opacity = 1;
			}

		</script>
    </body>
</html>