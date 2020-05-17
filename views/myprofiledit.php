<!DOCTYPE html>
    <html lang="pt-PT">
    <head>
        <meta charset="UTF-8"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" type="Text/css" href="css/mycss.css">
        <link rel="stylesheet" type="text/css" href="css/donations.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <title>My Area: Profile</title>
    </head>
    <body>
        
        <header>
            <div class="container">
                <h1><a href="<?='/'?>"><img class="logo img-fluid" src="imgs/infilogo.jpg" alt="logotipo"></a></h1>

                <nav class="navbar"> 
                    <ul class="list-inline nav-area"> 
                        <li class="list-inline-item nav2">
                            <a class="nav-link1" href="myprofile.php">
                                <i class="far fa-user pr-3"></i>O meu perfil
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="nav-link1" href="mydon.php">
                                <i class="fas fa-hand-holding-heart pr-3"></i>As minhas doações
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
        </header>
            <main>
                <div class="container">

                    <div class="well">
                        <div class="media">

                            <section class="pull-left">
                                <i class="fas fa-id-card profilepic"></i>
                            </section>

                            <div class="media-body">
                                <div class="float-right">
                                    <div class="form-group">
                                        <button type="submit" value="" class="btn buttons mt-4 changes-btn" id="update-profile" value="update-profile"><i class="far fa-save"></i><span class="btn-txt"> Gravar perfil </span></button>
                                    </div>
                                </div>
                                
                                <div class="edit">
                                    <form action="/reLife/myprofile.php" method="post">

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                <input type="text" name="name" class="form-control" placeholder="nome" required>    
                                            </div>
                                        </div>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                                <input type="password" name="password" class="form-control" placeholder="nova password" required>
                                            </div>
                                        </div>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                                <input type="password" name="rep-password" class="form-control" placeholder="repetir nova password" required>
                                            </div>
                                        </div>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                <input type="text" name="phone" class="form-control" placeholder="contacto">  
                                            </div>  
                                        </div>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                <select class="form-control" required>
                                                    <option selected="">localidade </option>
                                                    <option>variável da cidade</option>
                                                </select> 
                                            </div>  
                                        </div>
                                    </form>

                            </div> <!-- end mediabody -->
                        </div>
                    </div>  <!-- well   -->
                </div> <!-- end container -->
            </main>
    </body>
</html>