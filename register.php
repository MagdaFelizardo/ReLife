<!DOCTYPE html>
    <html lang="pt-PT">
    <head>
        <meta charset="UTF-8"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/mycss.css">
        <link rel="stylesheet" type="text/css" href="css/login-register.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <title>Register</title>
    </head>

    <body>
    

        <div class="container">
            <header><h1><a href="homepage.php"><img src="imgs/infilogo.jpg" alt="logotipo"></a></h1> </header>
        
            <main class="d-flex justify-content-center h-100">
                <div class="card card-register">
                    
                    <section class="card-header"><h2>Criar Conta</h2></section>
                    
                    <section class="card-body">
                        <form action="/reLife/login.php" method="post">

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="name" class="form-control" placeholder="nome" required>    
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" name="email" class="form-control" placeholder="email" required>    
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control" placeholder="password" required>
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="rep-password" class="form-control" placeholder="repetir password" required>
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" name="phone" class="form-control" placeholder="contacto">    
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                </div>
                                <select class="form-control" required>
                                    <option selected="">localidade </option>
                                    <option>variável da cidade</option>
                                </select>   
                            </div>

                            <div class="form-group d-flex justify-content-center">
                                <button type="submit" value="signin" class="btn btn-reg"> Registar </button>
                            </div>
                        </form>
                    </section>

                    <section class="card-footer">
                        <div class="d-flex justify-content-center">
                            <p>Já tens conta? <a class="links" href="/reLife/login.php">Entrar </a></p>
                        </div>
                    </section>

                </div> <!-- end card -->
            </main>
        </div> <!-- end container -->
    </body>
</html>