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
        <script src="../js/bigboss-pendingdons.js"></script>
        <title>Pending Donations Search</title>
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
                    <form class="form-inline" action="/bigboss-searchpendingdons/" method="GET">
                        <input class="form-control" type="search" name="search" placeholder="Doações pendentes" aria-label="search">
                        <button class="bg-light text-dark btnsearch" type="submit" name="send"><i class="fas fa-search"></i></button>
                    </form> 
                </div>

                <nav class="navbar2"> 
                    <ul class="list-inline">  
                        <li class="list-inline-item nav2"><a class="nav-link1" href="/bigboss-pendingdons/"><i class="fas fa-hourglass-half pr-3"></i>Doações Pendentes</a></li>
                        <li class="list-inline-item"><a class="nav-link1" href="/bigboss-activedons/"><i class="fas fa-hand-holding-heart pr-3"></i>Doações Activas</a></li>
                    </ul>
                </nav> 
            </div>
        </header>
        
        <main>    
      
            <div class="container">
                <?php 
                if(!empty($pendingdons)) {
                foreach($pendingdons as $pendingdon) { ?>

                <div class="well">
                    <div class="media">


                        <a class="pull-left" href="/bigboss-editphoto/ <?php echo $pendingdon["donation_id"] ?>/?source=pending">
                            <img class="media-object" src="../imgs/uploads/<?php echo $pendingdon["photo"] ?>" width="200px">
                        </a>

                        <div class="media-body">
                            <div class="btn pull-right">
                                <button class="buttons linkdon" value="approve" data-id="<?php echo $pendingdon["donation_id"] ?>">
                                    <i class="far fa-check-circle changes-btn"></i><span class="ml-3">Aprovar</span>
                                </button>
                            </div>

                            <div class="btn pull-right">
                                <div>
                                    <a class="linkdon" href="/bigboss-editdon/<?php echo $pendingdon["donation_id"] ?>/?source=pending">
                                        <button class="buttons" id="update-don">
                                            <i class="fas fa-pen changes-btn"></i><span class="ml-3">Alterar</span>
                                        </button>
                                    </a>
                                </div>
                            </div>
                          
                            

                            <h4 class="media-heading"><?php echo $pendingdon["item"] ?></h4>

                            <div class="mb-4 mt-4 text-capitalize">
                                    <i class="glyphicon glyphicon-calendar"></i> <?php echo $pendingdon["donation_date"] ?> |
                                    <i class="glyphicon glyphicon-home"></i> <?php echo $pendingdon["city"] ?> |
                                    <i class="fas fa-tag"></i> <?php echo $pendingdon["category"] ?>
                            </div>

                            <p> <?php echo $pendingdon["description"] ?> </p>

                            <div class="btn pull-right">
                                <button type="button" class="buttons linkdon" value="delete" data-id="<?php echo $pendingdon["donation_id"] ?>">
                                    <i class="far fa-trash-alt changes-btn"></i><span class="ml-3">Apagar</span>
                                </button>
                            </div>

                            <div class="mt-4">
                                <a class="linkdon text-capitalize" href="/bigboss-users/<?php echo $pendingdon["user_id"] ?>">
                                    <i class="glyphicon glyphicon-user text-capitalize"></i>
                                    <span class="ml-1"> <?php echo $pendingdon["name"] ?> </span>
                                </a>
                            </div>
                        </div>
                    </div> <!-- media   -->
                </div>  <!-- well   -->
                
                <?php ; } }else{ ?>
              
                <div class="text-center noresults">
                    Não encontrámos qualquer resultado. 
                    <i class="far fa-grin-beam-sweat imgs-noresults"></i>
                </div>

                <?php ; } ?>
            </div> <!-- end container -->
        </main>
    </body>
</html>