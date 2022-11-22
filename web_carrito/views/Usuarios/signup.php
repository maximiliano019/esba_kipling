<?php //var_dump($_POST); ?>
<!doctype html>
<html lang="en">
  <head>
  	<title>kipling | registrarse </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/public/login/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
                    <?php
                        if ((isset($_POST['email'] )) && (!empty($_POST['email']))){
                    ?>
    <h3> Usuarios y/o contraseña invalidos </h3>
                    <?php } ?>
                    <h2 class="heading-section"> Bienvenido a kipling </h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(<?php echo BASE_URL;?>/public/login/images/mkup_login.png);">  
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">

                            <h3 class="mb-4"> Ingrese sus datos para registrarse </h3>
			      		</div>
			      	</div>
                        <main class="form-signin">
                            <form action="<?=BASE_URL?>/signup"  method="POST">
                                <div class="form-floating">
                                    <input type="nombre" name="nombre" class="form-control" id="floatingInput" placeholder="mynombre">
                                    <!--                                    <label for="floatingInput"></label>-->
                                </div>
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="mailparamilogin@maildeejemplo.com">
<!--                                    <label for="floatingInput"></label>-->
                                </div>
                                <div class="form-floating">
                                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="MiPassword">
<!--                                    <label for="floatingPassword"></label>-->
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Ingresar</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Recordarme aqui
                                                  <input type="checkbox" checked>
                                                  <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="w-50 text-md-right">
                                                    <a href="#">Olvide mi password</a>
                                                </div>
                                </div>
                            </form>
                        </main>
		          <p class="text-center">¿Aun no te has registrado? <a data-toggle="tab" href="./signup">Registrate!</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	</body>
</html>

