<!DOCTYPE html>
    <html lang="pt-PT">
    <head>
        <meta charset="UTF-8"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" type="Text/css" href="../css/mycss.css">
        <link rel="stylesheet" type="text/css" href="../css/bigboss-don.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <title>Search Blocked Users</title>
    </head>
    <body>
        
        <header>
            <div class="container">
                <h1><a href="/"><img class="logo img-fluid" src="../imgs/infilogo.jpg" alt="logotipo" width="300"></a></h1>
                
                <nav class="navbar"> 
                    <ul class="list-inline"> 
                        <li class="list-inline-item"><a class="nav-link1" href="/bigboss-logout/"><i class="fas fa-sign-out-alt pr-3"></i>Log Out</a></li>
                    </ul>
                </nav>

                <nav class="navbar"> 
                    <ul class="list-inline nav-area"> 
                        <li class="list-inline-item nav2"><a class="nav-link1" href="/bigboss-pendingdons/"><i class="fas fa-hand-holding pr-3"></i>Gerir Doações</a></li>
                        <li class="list-inline-item"><i class="far fa-user pr-3"></i>Gerir Utilizadores</a></li>
                    </ul>
                </nav>

                <div class="searchbar float-right">
                    <form class="form-inline" action="/bigboss-search-blockedusers/" method="GET">
                        <input class="form-control" type="search" name="search" placeholder="Utilizadores bloqueados" aria-label="search">
                        <button class="bg-light text-dark btnsearch" type="submit" name="send"><i class="fas fa-search"></i></button>
                    </form> 
                </div>
                <br>

                <nav class="navbar2"> 
                    <ul class="list-inline"> 
                        <li class="list-inline-item"><a class="nav-link1" href="/bigboss-activeusers/"><i class="fas fa-user-check pr-4"></i>Activos</a></li>
                        <li class="list-inline-item"><a class="nav-link1" href="/bigboss-inactiveusers/"><i class="far fa-user pr-4"></i>Pendentes de Aprovação</a></li>
                        <li class="list-inline-item"><i class="fas fa-user-slash pr-3"></i>Bloqueados</li>
                    </ul>
                </nav>  
            </div>
        </header>

        <main>
            <div class="container mt-4">
                <?php
                if(!empty($blocked_users)){
                foreach($blocked_users as $blocked_user) {
                echo '
                <div class="well">
                
                    <section class="media">

                        <div class="pull-left">
                            <i class="fas fa-id-card profilepic"></i>
                        </div>

                        <div class="media-body">

                            <div class="float-right">
                                <button type="button" class="btn" id="unblock">
                                    <a class="linkdon" href="/bigboss-confirm-unblock/'.$blocked_user["user_id"].'">
                                        <i class="fas fa-user-check"></i>
                                        <span> Desbloquear Utilizador </span>
                                    </a>
                                </button>
                            </div>


                            <div class="profile">

                                <div class="profile-itens mb-4">
                                    <i class="fas fa-user"></i>
                                    <span class="txt">Nome: 
                                        <span class="font-italic">'.$blocked_user["name"].'</span>
                                    </span>
                                </div>

                                <div class="profile-itens">
                                    <i class="fas fa-envelope"></i>
                                    <span class="txt">Email: 
                                        <span class="font-italic">'.$blocked_user["email"].'</span>
                                    </span>
                                </div>

                                <div class="profile-itens">
                                    <i class="fas fa-phone"></i>
                                    <span class="txt">Contacto: 
                                        <span class="font-italic">'.$blocked_user["phone"].'</span>
                                    </span>
                                </div>

                                <div class="profile-itens">
                                    <i class="fas fa-home"></i>
                                    <span class="txt">Localidade: 
                                        <span class="font-italic">'.$blocked_user["city"].'</span>
                                    </span>
                                </div>

                            </div> <!-- end profile -->

                        </div> <!-- end mediabody -->
                    </section>
                </div>  <!-- well   -->
                '
                ; } }else{ ?>
              
                <div class="text-center noresults">
                    Não encontrámos qualquer resultado. 
                    <i class="far fa-grin-beam-sweat imgs-noresults"></i>
                </div>

                <?php ; } ?>
            </div> <!-- end container -->
            
        </main>
    </body>
</html>