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
        <title>My Donations</title>
    </head>
    <body>
        
        <header>
            <div class="container">
                <h1><a href="/"><img class="logo img-fluid" src="../imgs/infilogo.jpg" alt="logotipo"></a></h1>

                <nav class="navbar"> 
                    <ul class="list-inline nav-area"> 
                        <li class="list-inline-item"><a class="nav-link1" href="/myprofile/"><i class="far fa-user pr-3"></i>O meu perfil</a></li>
                        <li class="list-inline-item nav2"><i class="fas fa-hand-holding-heart pr-3"></i>As minhas doações</li>
                    </ul>
                </nav>   
            </div>
        </header>


        <main>

            <div class="container">

                <div class="totaldon" id="countdon">Total de doações: <?php echo count($donusers) ?></div>

                <?php if(isset($message_processing)){ ?>
                <p class="text-center text-info change-info">O seu pedido de alteração está a ser processado e ficará visível após aprovação</p>
                <?php } ?>

        <?php
            foreach($donusers as $donuser) {
            echo '
                <div class="well">
                    <div class="media">


                        <a class="pull-left" href="/mydonphotoedit/' .$donuser["donation_id"]. '">
                            <img class="media-object" src="../imgs/uploads/' .$donuser["photo"]. '" width="200px">
                        </a>

                        <div class="media-body">
                            <div class="btn pull-right">
                                <div>
                                    <a href="/mydonedit/' .$donuser["donation_id"]. '">
                                        <button class="buttons" id="update-don"><i class="fas fa-pen symbol changes-btn"></i></button>
                                    </a>
                                </div>
                            </div>
                            

                            <h4 class="media-heading">'.$donuser["item"].'</h4>

                            <div class="mb-4 mt-4 text-capitalize">
                                    <i class="glyphicon glyphicon-calendar"></i> '.$donuser["donation_date"].' |
                                    <i class="glyphicon glyphicon-home"></i> '.$donuser["city"].' |
                                    <i class="fas fa-tag"></i> '.$donuser["category"].'
                            </div>

                            <p>'.$donuser["description"].'</p>

                            <div class="btn pull-right">
                                <a href="/mydondelete/' .$donuser["donation_id"]. '">
                                    <button type="button" class="buttons" id="delete-don"><i class="far fa-trash-alt symbol changes-btn"></i></button>
                                </a>
                            </div>

                        </div>
                </div>  <!-- well   -->
            </div> <!-- end container -->
            ';
        }
    ?>
        </div>
        </main>
    </body>
</html>