<!DOCTYPE html>
    <html lang="pt-PT">
    <head>
        <meta charset="UTF-8"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" type="text/css" href="/css/mycss.css">
        <link rel="stylesheet" type="text/css" href="/css/bigboss-don.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <title>Manage Active Users</title>
    </head>
    <body>
        
        <header>
            <div class="container">
                <h1><a href="/"><img class="logo img-fluid" src="/imgs/infilogo.jpg" alt="logotipo" width="300"></a></h1>

                <nav class="navbar"> 
                    <ul class="list-inline"> 
                        <li class="list-inline-item"><a class="nav-link1" href="/bigboss-logout/"><i class="fas fa-sign-out-alt pr-3"></i>Log Out</a></li>
                    </ul>
                </nav>

                <nav class="navbar"> 
                    <ul class="list-inline nav-area"> 
                        <li class="list-inline-item nav2"><a class="nav-link1" href="/bigboss-pendingdons/"><i class="fas fa-hand-holding pr-3"></i>Gerir Doações</a></li>
                        <li class="list-inline-item"><a class="nav-link1" href="/bigboss-activeusers/"><i class="far fa-user pr-3"></i>Gerir Utilizadores</a></li>
                    </ul>
                </nav>

                <nav class="navbar2"> 
                    <ul class="list-inline"> 
                        <li class="list-inline-item"><a class="nav-link1" href="/bigboss-activeusers/"><i class="fas fa-user-check pr-4"></i>Activos</a></li>
                        <li class="list-inline-item"><a class="nav-link1" href="/bigboss-inactiveusers/"><i class="far fa-user pr-4"></i>Pendentes de Aprovação</a></li>
                        <li class="list-inline-item"><a class="nav-link1" href="/bigboss-blockedusers/"><i class="fas fa-user-slash pr-3"></i>Bloqueados</a></li>
                    </ul>
                </nav>  
            </div>
        </header>

        <main>
                <div class="container">

                    <div class="well">
                        <section class="media">

                            <div class="pull-left">
                                <i class="fas fa-user-secret profilepic"></i>
                            </div>

                            <div class="media-body">

                                <div class="alert">
                                    <h2 class="h3 pb-4">Tens a certeza que pretende bloquear este utilizador?</h2>
                                    <p>O utilizador fica impedido de fazer login ou voltar a registar-se com o mesmo email.</p>
                                    <p> As doações existentes serão também bloqueadas. </p> 
                                    <p>Se mesmo assim quiser continuar, clique no botão de confirmação</p>

                                </div> <!-- end profile -->


                                <div class="float-right">
                                    <div class="btn-block">
                                        <a class="delink linkdon" href="/bigboss-blockaccount/<?php echo $user["user_id"]?>">
                                            <i class="fas fa-user-slash"></i>
                                            <span class="btn-txt">Confirmo que quero bloquear <?php echo $user["name"] ?> </span>
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