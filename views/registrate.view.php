<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section class="login-form">

         <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " method="post" name="login">

            <div class="img">
                <img src="img/logo.png" alt="">
            </div>
            <div class="box">
                <div class="heading">
                    <h2>REGISTRATE</h2>
                </div>

                <div class="form-fields">


                    <div class="input-box">
                        <input type="text" placeholder="Correo electronico" class="form-control" name="usuario">
                        <span><img src="img/mail.svg" alt=""></span>
                    </div>
                

                    <div class="input-box">
                        <input type="password" placeholder="Contraseña" class="form-control" name="password">
                        <span><img src="img/password.svg" alt=""></span>
                    </div>

                    <div class="input-box">
                        <input type="password" placeholder="Repite la contraseña" class="form-control" name="password2">
                        <span><img src="img/password.svg" alt=""></span>
                    </div>

            
                <div class="button-box">
               <p><button type="submit">Enviar</button></p> 
                </div>

                   <?php if (!empty($errores)): ?>
                 <div class="error">
                   <ul>
                       <?php echo "$errores"; ?>
                   </ul>
                 </div>
                <?php endif;  ?>
               

                <div class="button-box">
                    ¿ya tienes una cuenta ?
                    <a href="login.php">Iniciar sesion </a>
                </div>

                </div>
                <div class="social-links">
                    <p>or login with</p>
                    <div class="links-box ">
                        <a href="#" class="shine"><img src="img/sociales/facebook.svg" alt="facebook"></a>
                        <a href="#" class="shine"><img src="img/sociales/google.svg" alt="google"></a>    
                        <a href="#" class="shine"><img src="img/sociales/twitter.svg" alt="twitter"></a>     
                    </div>
                </div>
            </div> 

        </form>
    </section>
</body>
</html>