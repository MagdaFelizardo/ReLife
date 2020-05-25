<!DOCTYPE html>
    <html lang="pt-PT">
    <head>
        <meta charset="UTF-8"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" type="Text/css" href="../css/mycss.css">
        <link rel="stylesheet" type="text/css" href="../css/donations.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <!-- <script src="../js/delete-user.js"></script> -->
        <title>My Profile</title>
    </head>
    <body>
        
        <header>
            <div class="container">
                <h1><a href="<?='/'?>"><img class="logo img-fluid" src="../imgs/infilogo.jpg" alt="logotipo"></a></h1>

                <nav class="navbar"> 
                    <ul class="list-inline nav-area"> 
                        <li class="list-inline-item nav2"><i class="far fa-user pr-3"></i>O meu perfil</li>
                        <li class="list-inline-item"><a class="nav-link1" href="<?='/mydon/'?>"><i class="fas fa-hand-holding-heart pr-3"></i>As minhas doações</a></li>
                    </ul>
                </nav>

            </div>
        </header>
            <main>
                <div class="container">

                    <div class="well">
                        <section class="media">

                            <div class="pull-left">
                                <i class="far fa-sad-tear profilepic"></i>
                            </div>

                            <div class="media-body">

                                <div class="alert">
                                    <h2 class="h3 pb-4">Tens a certeza que pretendes apagar a tua conta?</h2>
                                    <p>Toda a informação de perfil irá desaparecer, bem como todas as tuas doações.</p>
                                    <p>Não será possível reverter esta acção.</p>
                                    <p>Se mesmo assim quiseres continuar, clica no botão de confirmação</p>

                                </div> <!-- end profile -->


                                <div class="float-right">
                                    <div class="btn-block">
                                        <a class="delink" href="/deleteaccount/">
                                            <i class="fas fa-user-times"></i>
                                            <span class="btn-txt">Confirmo que quero apagar a minha conta</span>
                                        </a>
                                    </div>
                                </div>
       
                            </div> <!-- end mediabody -->
                        </section>
                    </div>  <!-- well   -->
                </div> <!-- end container -->
            </main>
    </body>
</html>