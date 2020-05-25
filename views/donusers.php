<!DOCTYPE html>
    <html lang="pt-PT">
    <head>
        <meta charset="UTF-8"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" type="Text/css" href="/css/mycss.css">
        <link rel="stylesheet" type="text/css" href="/css/donations.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <title>Donations by User</title>
    </head>
    <body class="img-background img-fluid">
        
        <header>
            <div class="container">
                <h1><a href="<?='/'?>"><img class="logo img-fluid" src="/imgs/infilogotrans.png" alt="logotipo"></a></h1>

                <div class="searchbar float-right">
                    <form class="form-inline" action="/searchitem/" method="GET">
                        <input class="form-control" type="search" name="search" placeholder="O que precisas?" aria-label="search">
                        <button class="bg-light text-dark btnsearch" type="submit" name="send"><i class="fas fa-search"></i></button>
                    </form> 
                </div>

                <h2 class="donationsh2">Doações por Pessoa</h2>
            </div>
        </header>
            <main>
                <?php
                foreach($donusers as $donuser) {
                echo '
                <div class="container">
                    <div class="well">
                        <div class="media">
                            <a class="pull-left" href="./?controller=donations&donation_id=' .$donuser["donation_id"]. '">
                                <img class="media-object" src="/imgs/uploads/' .$donuser["photo"]. '" width="200px">
                            </a>
                            <div class="media-body">
                                <h1 class="media-heading donation-title text-capitalize">' .$donuser["item"]. '</h1>
                                <div class="mb-4 mt-4">
                                    <i class="glyphicon glyphicon-calendar"></i> '.$donuser["donation_date"].' |
                                    <a class="linkdon text-capitalize" href="/doncities/'.$donuser["city_id"].'/?page='.$page_number.' "><i class="glyphicon glyphicon-home"></i> ' .$donuser["city"]. ' |</a>
                                    <a class="linkdon text-capitalize" href="/dontags/'.$donuser["category_id"].'/?page='.$page_number.'"><i class="fas fa-tag"></i> ' .$donuser["category"]. '</a>
                                </div>
                                <p class="first-letter-cap">' .$donuser["description"]. '</p>
                                <div class="float-right mt-4">
                                    <span><i class="glyphicon glyphicon-user text-capitalize"></i> ' .$donuser["name"]. ' | </span>
                                    <span><i class="glyphicon glyphicon-envelope"></i> ' .$donuser["email"]. ' | </span>
                                    <span><i class="glyphicon glyphicon-phone"></i> ' .$donuser["phone"]. ' </span>
                                </div>
                            </div>
                        </div>
                    </div>  <!-- well   -->
                </div> <!-- end container -->
                '; } ?>

                <div class="container">
                    <div class="backdonations">
                        <button type="button" class="btn btn link">
                            <a class="back" href="'.BASE_PATH.'/donations/">&#8634</a>
                        </button>
                    </div>
                </div> <!-- end container -->
            </main>


    </body>
</html>