<!DOCTYPE html>
    <html lang="pt-PT">
    <head>
        <meta charset="UTF-8"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../css/mycss.css">
        <link rel="stylesheet" type="text/css" href="../css/login-register.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <title>Register</title>
    </head>

    <body>
    

        <div class="container">
            <header><h1><a href="<?=BASE_PATH?>"><img src="../imgs/infilogo.jpg" alt="logotipo"></a></h1> </header>
        
            <main class="d-flex justify-content-center h-100">
                <section class="card card-register">
                    
                    <div class="card-header"><h2>Criar Conta</h2></div>
                    
                    <div class="card-body">
                        <?php if(isset($message)){ ?>
                        <div class="text-center mb-4 text-danger">O registo falhou. Por favor verifica os dados que introduziste e tenta de novo.</div>
                        <?php } ?>
                    
                        <form action="<?php echo $_SERVER["REQUEST_URI"] ?>" method="POST">

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="name" aria-label="name" class="form-control" placeholder="Nome" required>    
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" name="email" aria-label="email" class="form-control" placeholder="Email" required>    
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="password" aria-label="password" class="form-control" placeholder="Password" required>
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="rep-password" aria-label="repeat password" class="form-control" placeholder="Repetir password" required>
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" name="phone" aria-label="phone" class="form-control" placeholder="Contacto">    
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                </div>
                                
                                <select id="cities" list="cities" aria-label="cities" name="city_id" class="form-control">
                                    <?php 
                                        foreach($cities as $city){
                                            echo '
                                                <option value="'.$city["city_id"].'">'.$city["city"].'</option>
                                                '
                                            ;} 
                                    ?>         
                                </select>
                            </div>

                            
                            <div class="form-group text-center">
                                <img src="/register-captcha/" alt="Captcha Image">
                                    <input type="text" class="captcha-txt" name="captcha" size="10" required>
                                    <p class="small">Escreve o que vês na imagem</p>
                            </div>
                            <?php if(isset($message_captcha)){ ?>
                            <div class="text-center mb-4 text-danger">Captcha incorrecto</div>
                            <?php } ?>
                           
                            
                            <div class="form-group d-flex justify-content-center">
                                <button class="btn btn-reg" type="submit" name="register">Registar</button>
                            </div>
                        </form>
                    </div>

                    <div class="card-footer">
                        <div class="d-flex justify-content-center">
                            <p>Já tens conta? <a class="links" href="/login/?source=login">Entrar </a></p>
                        </div>
                    </div>

                </section> <!-- end card -->
            </main>
        </div> <!-- end container -->
    </body>
</html>