<!DOCTYPE html>
    <html lang="pt-PT">
    <head>
        <meta charset="UTF-8"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/mycss.css">
        <link rel="stylesheet" type="text/css" href="css/login-register.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <title>Forgot password?</title>
    </head>

    <body>
    

        <div class="container">
            <header><h1><a href="homepage.php"><img src="imgs/infilogo.jpg" alt="logotipo"></a></h1> </header>
        
            <main class="d-flex justify-content-center h-100">
                <div class="card card-forgot">
                    
                    <section class="card-header"><h2>Esqueceste-te da password?</h2></section>
                    
                    <section class="card-body">

                        <form action="/reLife/forgot.php" method="post">
                            <div class="input-group form-group forgot-pass">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" placeholder="email" required>    
                                <span><button type="submit" value="" class="btn btn-forgot float-right">Enviar</button></span>
                            </div>
                        </form>
                    </section>

                    <section class="card-footer">
                        <div class="d-flex justify-content-center">
                            <p>Enviamos-te uma nova!</p>
                        </div>
                    </section>
                </div> <!-- end card -->
            </main>
        </div> <!-- end container -->
    </body>
</html>