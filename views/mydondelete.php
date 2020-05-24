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
        <title>Delete my Donation</title>
    </head>
    <body>
        
        <header>
            <div class="container">
                <h1><a href="<?='/'?>"><img class="logo img-fluid" src="../imgs/infilogo.jpg" alt="logotipo"></a></h1>

                <nav class="navbar"> 
                    <ul class="list-inline nav-area"> 
                        <li class="list-inline-item"><a class="nav-link1" href="/myprofile/">
                            <i class="far fa-user pr-3"></i>O meu perfil</a>
                        </li>
                        <li class="list-inline-item"><a class="nav-link1" href="/mydon/">
                            <i class="fas fa-hand-holding-heart pr-3"></i>As minhas doações</a>
                        </li>
                    </ul>
                </nav>

            </div>
        </header>
        <main>
            <div class="container">

                <div class="well">
                    <section class="media">

                        <div class="pull-left">

                            <?php foreach($results as $result) { ?>
                            <img width="200" src="../imgs/uploads/<?php echo $result["photo"] ?> ">
                        </div> 

                        <div class="media-body pl-4">

                            <h1 class="h3 mb-4"> <?php echo $result["item"] ?> </h1>
                            <?php ; } ?>

                            <p class="pt-4">Tens a certeza que pretendes apagar esta doação? </p>
                            <p>Uma vez removida, não é possível retroceder. </p>

                        </div>

                        <div class="media-footer">

                            <div class="form-group float-right">
                                <a href="/deletedonation/<?php echo $result["donation_id"] ?>" class="btn buttons mt-4 changes-btn">
                                    <i class="far fa-trash-alt"></i>
                                    <span class="btn-txt"> Confirmo Remoção </span>
                                </button>
                            </div>
                        </div>
                    </section>
                </div>  <!-- well   -->
            </div> <!-- end container -->
        </main>
    </body>
</html>