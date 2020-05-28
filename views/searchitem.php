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
        <title>Search Item</title>
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

                <h2 class="donationsh2">Resultados de Pesquisa</h2>
            </div>
        </header>
        
        <main>    
      
            <div class="container">
                <?php 
                if(!empty($items)) {
                foreach($items as $item) { ?>
                            
                <div class="well">
                    <div class="media">
                        <a class="pull-left" href="./?controller=donations&donation_id= <?php echo $item["donation_id"] ?>">
                            <img class="media-object" src="/imgs/uploads/<?php echo $item["photo"] ?>" width="200px">
                        </a>
                        <div class="media-body">
                            <h1 class="media-heading donation-title text-capitalize"><?php echo $item["item"] ?></h1>
                            <div class="mb-4 mt-4">
                                <i class="glyphicon glyphicon-calendar"></i><?php echo $item["donation_date"] ?> |
                                <a class="linkdon text-capitalize" href="/doncities/<?php echo $item["city_id"] ?>/?page=<?php echo $page_number ?> ">
                                    <i class="glyphicon glyphicon-home"></i> <?php echo $item["city"] ?> |
                                </a>
                                <a class="linkdon text-capitalize" href="/dontags/<?php echo $item["category_id"] ?>/?page=<?php echo $page_number ?>">
                                    <i class="fas fa-tag"></i> <?php echo $item["category"] ?>
                                </a>
                            </div>
                            <p class="first-letter-cap"><?php echo $item["description"] ?> </p>
                            <div class="float-right mt-4">
                                <a class="linkdon text-capitalize" href=" /donusers/<?php echo $item["user_id"] ?>/?page=<?php echo $page_number ?> ">
                                    <i class="glyphicon glyphicon-user text-capitalize"></i> <?php echo $item["name"] ?> | 
                                </a>
                                <span><i class="glyphicon glyphicon-envelope"></i> <?php echo $item["email"] ?> | </span>
                                <span><i class="glyphicon glyphicon-phone"></i> <?php echo $item["phone"] ?> </span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php ; } }else{ ?>
              
                <div class="text-center noresults">
                    <i class="fas fa-poo imgs-noresults"></i>
                    Ups! Não encontrámos resultados! Tenta de novo 
                    <i class="far fa-grin-beam-sweat imgs-noresults"></i>
                </div>

                <?php ; } ?>
                <div class="backdonations">
                    <button type="button" class="btn btn link">
                        <a class="back" href="/donations/?page=<?php echo $page_number ?> ">&#8634</a>
                    </button>
                </div>
            </div> <!-- end container -->
        </main>
    </body>
</html>