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
                        <li class="list-inline-item nav2"><i class="far fa-user pr-3"></i>O meu perfil</li>
                        <li class="list-inline-item"><a class="nav-link1" href="./mydon.php"><i class="fas fa-hand-holding-heart pr-3"></i>As minhas doações</a></li>
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

                                <div class="form-group float-right">
                                    <button type="button" value="" class="btn buttons" id="update-profile" value="">
                                        <a class="changes-btn" href="myprofiledit.php">
                                            <i class="fas fa-user-edit"></i>
                                            <span class="btn-txt"> Editar perfil </span>
                                        </a>
                                    </button>
                                </div>


                                <div class="profile">
                                    <div class="profile-itens">
                                        <i class="fas fa-user"></i>
                                        <span class="txt">Nome: 
                                            <span class="font-italic">José Manuel das Couves</span>
                                        </span>
                                    </div>

                                    <div class="profile-itens">
                                        <i class="fas fa-envelope"></i>
                                        <span class="txt">Email: 
                                            <span class="font-italic">jmcouves@gmail.com</span>
                                        </span>
                                    </div>

                                    <div class="profile-itens">
                                        <i class="fas fa-phone"></i>
                                        <span class="txt">Contacto: 
                                            <span class="font-italic">244913456</span>
                                        </span>
                                    </div>

                                    <div class="profile-itens">
                                        <i class="fas fa-home"></i>
                                        <span class="txt">Localidade: 
                                            <span class="font-italic">Leiria</span>
                                        </span>
                                    </div>

                                </div> <!-- end profile -->

                                <div class="float-right changes-btn">
                                    <div class="btn-block">
                                        <button type="button" class="buttons" id="delete-profile" value="">
                                            <i class="fas fa-user-times"></i>
                                            <span class="btn-txt">Apagar perfil</span>
                                        </button>
                                    </div>
                                </div>
                                    
                            </div> <!-- end mediabody -->
                        </div>
                    </div>  <!-- well   -->
                </div> <!-- end container -->
            </main>
    </body>
</html>