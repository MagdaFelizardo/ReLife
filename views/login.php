<!DOCTYPE html>
    <html lang="pt-PT">
    <head>
        <meta charset="UTF-8"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../css/mycss.css">
        <link rel="stylesheet" type="text/css" href="../css/login-register.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <title>Login</title>
    </head>

    <body>
    

        <div class="container">
            <header><h1><a href="<?=BASE_PATH?>"><img src="../imgs/infilogo.jpg" alt="logotipo"></a></h1> </header>
        
            <main class="d-flex justify-content-center h-100">
                <section class="card card-login">
                    
                    <div class="card-header"><h2>Entrar</h2></div>
                    
                    <div class="card-body">
                    <?php if(isset($message)){ ?>
                    <div class="text-center mb-4 text-danger">O login falhou. Por favor verifica os dados que introduziste e tenta de novo.</div>
                    <?php }?>
                        <form action="<?php echo $_SERVER["REQUEST_URI"] ?>" method="POST">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" placeholder="email" name="email" aria-label="email" required>    
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" placeholder="password" name="password" aria-label="password" required>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" name="login" class="btn float-right btn-login">Login</button>
                            </div>
                        </form>
                    </div>

                    <div class="card-footer">
                        <div class="d-flex justify-content-center">
                            <p>Não tens conta? <a class="links" href="/register/">Regista-te! </a></p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a class="links" href="/forgotpass/">Esqueceste-te da password?</a>
                        </div>
                    </div>

                </section> <!-- end card -->
            </main>
        </div> <!-- end container -->
    </body>
</html>