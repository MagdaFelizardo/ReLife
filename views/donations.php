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
        <title>Donations</title>
    </head>
    <body class="img-background img-fluid">
        
        <header>
            <div class="container">
                <h1><a href="<?='/'?>"><img class="logo img-fluid" src="../imgs/infilogotrans.png" alt="logotipo"></a></h1>

                <div class="searchbar float-right">
                    <form class="form-inline" action="/searchitem/" method="GET">
                        <input class="form-control" type="search" name="search" placeholder="O que precisas?" aria-label="search">
                        <button class="bg-light text-dark btnsearch" type="submit" name="send"><i class="fas fa-search"></i></button>
                    </form> 
                </div>

                <h2 class="donationsh2">Listagem de Doações</h2>
            </div>
        </header>
            <main>
                <?php
                    foreach($donations as $donation) {
                        echo '
                        <div class="container">
                            <div class="well">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="../imgs/uploads/' .$donation["photo"]. '" width="200px">
                                    </span>
                                    <div class="media-body">
                                        <h1 class="media-heading donation-title text-capitalize">' .$donation["item"]. '</h1>
                                        <div class="mb-4 mt-4">
                                            <i class="glyphicon glyphicon-calendar"></i> '.$donation["donation_date"].' |
                                            <a class="linkdon text-capitalize" href="/doncities/'.$donation["city_id"].'/?page='.$page_number.' "><i class="glyphicon glyphicon-home"></i> ' .$donation["city"]. ' |</a>
                                            <a class="linkdon text-capitalize" href="/dontags/'.$donation["category_id"].'/?page='.$page_number.' "><i class="fas fa-tag"></i> ' .$donation["category"]. '</a>
                                        </div>
                                        <p class="first-letter-cap">' .$donation["description"]. '</p>
                                        <div class="float-right mt-4">
                                            <a class="linkdon text-capitalize" href="/donusers/'.$donation["user_id"].'/?page='.$page_number.' "><i class="glyphicon glyphicon-user text-capitalize"></i> ' .$donation["name"]. ' | </a>
                                            <span><i class="glyphicon glyphicon-envelope"></i> ' .$donation["email"]. ' | </span>
                                            <span><i class="glyphicon glyphicon-phone"></i> ' .$donation["phone"]. ' </span>
                                        </div>
                                    </div>
                                </div>
                            </div>  <!-- well   -->
                        </div> <!-- end container -->
                        ';
                    }
                ?>
                <?php if (isset($disable_forward)) { ?>
                <div class="text-center noresults">
                    Fim dos resultados! 
                    <i class="far fa-grin-beam-sweat imgs-noresults"></i>
                </div>
                <?php ;} ?>
            </main>    

            <footer class="footer">
                <div class="container">
                    <nav aria-label="Nav-pages">
                        <ul class="pagination float-right">
                            <li class="page-item <?php echo isset($disable_back) ? "disabled" : "" ?> "><a class="page-link" href="/donations/?page=<?php echo $page ?>">&laquo;</a></li>
                            <li class="page-item disabled"><a class="page-link" href=""><?php echo ++$page ?></a></li>
                            <li class="page-item <?php echo isset($disable_forward) ? "disabled" : "" ?>"><a class="page-link" href="/donations/?page=<?php echo ++$page ?>">&raquo;</a></li>
                        </ul>
                    </nav>
                </div> <!-- end container -->
            </footer>
    </body>
</html>