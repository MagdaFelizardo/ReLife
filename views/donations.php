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
                <h1><a href="homepage.php"><img class="logo img-fluid" src="../imgs/infilogotrans.png" alt="logotipo"></a></h1>

                <div class="searchbar float-right">
                    <form class="form-inline" action="" method="get">
                        <input class="form-control" type="search" placeholder="O que precisas?" aria-label="search">
                        <button class="bg-light text-dark btnsearch" type="submit" name="submit" value="enviar"><i class="fas fa-search"></i></button>
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
                                    <a class="pull-left" href="./?controller=donations&donation_id=' .$donation["donation_id"]. '">
                                        <img class="media-object" src="' .$donation["photo"]. '" width="200px">
                                    </a>
                                    <div class="media-body">
                                        <h1 class="media-heading donation-title text-capitalize">' .$donation["item"]. '</h1>
                                        <div class="mb-4 mt-4">
                                            <i class="glyphicon glyphicon-calendar"></i> 20-04-08 |
                                            <a class="linkdon text-capitalize" href=""><i class="glyphicon glyphicon-home"></i> ' .$donation["city"]. ' |</a>
                                            <a class="linkdon text-capitalize" href=""><i class="fas fa-tag"></i> ' .$donation["category"]. '</a>
                                        </div>
                                        <p class="first-letter-cap">' .$donation["description"]. '</p>
                                        <div class="float-right mt-4">
                                            <span><i class="glyphicon glyphicon-user text-capitalize"></i> ' .$donation["name"]. ' | </span>
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
            </main>

            <footer class="footer">
                <div class="container">
                    <nav aria-label="Nav-pages">
                        <ul class="pagination float-right">
                            <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </nav>
                </div> <!-- end container -->
            </footer>
    </body>
</html>