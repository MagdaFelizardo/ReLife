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
        <script src="../js/bigboss-activedons.js"></script>
        <title>Active Donations</title>
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
                        <li class="list-inline-item nav2"><i class="fas fa-hand-holding pr-3"></i>Gerir Doações</li>
                        <li class="list-inline-item"><a class="nav-link1" href="/bigboss-activeusers/"><i class="far fa-user pr-3"></i>Gerir Utilizadores</a></li>
                    </ul>
                </nav>  

                <div class="searchbar float-right mb-4">
                    <form class="form-inline" action="/bigboss-searchdon/" method="GET">
                        <input class="form-control" type="search" name="search" placeholder="Doações" aria-label="search">
                        <button class="bg-light text-dark btnsearch" type="submit" name="send"><i class="fas fa-search"></i></button>
                    </form> 
                </div>

                <nav class="navbar2"> 
                    <ul class="list-inline">  
                        <li class="list-inline-item nav2"><a class="nav-link1" href="/bigboss-pendingdons/"><i class="fas fa-hourglass-half pr-3"></i>Doações Pendentes</a></li>
                        <li class="list-inline-item"><i class="fas fa-hand-holding-heart pr-3"></i>Doações Activas</li>
                    </ul>
                </nav>    
            </div>
        </header>


        <main>

            <div class="container mt-4">

                <?php
                foreach($activedons as $activedon) {
                echo '
                <div class="well">
                    <div class="media">


                        <a class="pull-left" href="/bigboss-editphoto/' .$activedon["donation_id"]. '/?source=active">
                            <img class="media-object" src="../imgs/uploads/' .$activedon["photo"]. '" width="200px">
                        </a>

                        <div class="media-body">

                            <div class="btn pull-right">
                                <div>
                                    <a class="linkdon" href="/bigboss-editdon/' .$activedon["donation_id"]. '/?source=active">
                                        <button class="buttons" id="update-don">
                                            <i class="fas fa-pen changes-btn"></i><span class="ml-3">Alterar</span>
                                        </button>
                                    </a>
                                </div>
                            </div>

                            <div class="btn pull-right">
                                <button class="buttons linkdon" value="disapprove" data-id="' .$activedon["donation_id"]. '">
                                    <i class="far fa-check-circle changes-btn"></i><span class="ml-3">Desactivar</span>
                                </button>
                            </div>
                          
                            
                            <h4 class="media-heading">'.$activedon["item"].'</h4>

                            <div class="mb-4 mt-4 text-capitalize">
                                    <i class="glyphicon glyphicon-calendar"></i> '.$activedon["donation_date"].' |
                                    <i class="glyphicon glyphicon-home"></i> '.$activedon["city"].' |
                                    <i class="fas fa-tag"></i> '.$activedon["category"].'
                            </div>

                            <p>'.$activedon["description"].'</p>

                            <div class="btn pull-right">
                                <button type="button" class="buttons linkdon" value="delete" data-id="' .$activedon["donation_id"]. '">
                                    <i class="far fa-trash-alt changes-btn"></i><span class="ml-3">Apagar</span>
                                </button>
                            </div>

                            <div class="mt-4">
                                <a class="linkdon text-capitalize" href="/bigboss-users/'.$activedon["user_id"].'">
                                    <i class="glyphicon glyphicon-user text-capitalize"></i>
                                    <span class="ml-1"> ' .$activedon["name"]. '</span>
                                </a>
                            </div>
                        </div>
                    </div> <!-- media   -->
                </div>  <!-- well   -->
                '; } ?>
            </div> <!-- end container -->
        </main>
    </body>
</html>