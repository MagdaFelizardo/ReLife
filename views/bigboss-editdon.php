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
        <title>Big Boss Edit Donations</title>
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
                        <li class="list-inline-item nav2"><a class="nav-link1" href="/bigboss-pendingdons/"><i class="fas fa-hourglass-half pr-3"></i>Doações Pendentes</a></li>
                        <li class="list-inline-item"><a class="nav-link1" href="/bigboss-activedons/"><i class="fas fa-hand-holding-heart pr-3"></i>Doações Activas</a></li>
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
                                <img class="donphotoedit" src="/imgs/uploads/<?php echo $result["photo"] ?>">
                                <a class="linkdon" href="/bigboss-editphoto/<?php echo $result["donation_id"].'/'.$url_parts[3] ?>"><div class="medium text-center mt-3">(Alterar foto)</div></a>
                            <?php }; ?>
                            
                        </div>

                            <div class="media-body">

                                <div class="edit-donat">
                                    <form action="<?php echo $_SERVER["REQUEST_URI"] ?>" method="POST" enctype="multipart/form-data">
                                    <?php foreach($results as $result) { ?>
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-gift"></i></span>
                                                <input type="text" name="item" aria-label="name" class="form-control" value="<?php echo $result["item"] ?>" required>    
                                            </div>
                                        </div>
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-tags"></i></i></span>
                                                <select class="form-control text-capitalize" name="category_id" aria-label="categories" required>';
                                                <?php foreach($categories as $category) { ?>
                                                    <option <?php echo $result["category_id"] === $category["category_id"] ? "selected" : "" ?> value="<?php echo $category["category_id"] ?> "> <?php echo $category["category"] ?></option>
                                                <?php ;} ?>
                                                </select> 
                                            </div>  
                                        </div>
                                        <div class="input-group form-group description">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                                <textarea class="form-control description" aria-label="description" cols="70" rows="3" name="description"> <?php echo $result["description"] ?></textarea>    
                                            </div> 
                                        </div>

                                        <span><input type="hidden" name="donation_date" value="<?php echo $result["donation_date"] ?>"></span>
                                        <span><input type="hidden" name="donation_id" value="<?php echo $url_parts[2] ?>"></span>
                                        <span><input type="hidden" name="city_id" value="<?php echo $result["city_id"] ?>"></span>
                                  
                                        <div class="form-group float-right">
                                            <button type="submit" name="update-donation" class="btn buttons mt-4 changes-btn">
                                                <i class="far fa-save"></i>
                                                <span class="btn-txt"> Gravar </span>
                                            </button>
                                        </div>
                                        <?php ;} ?>
                                    </form>

                                    <?php if(isset($notaccepted)){?>
                                    <div class="text-danger">Lamentamos mas não foi possível actualizar os dados.</div>
                                    <?php } ?>

                                </div> <!--end edit -->
                            </div> <!-- end mediabody -->
                    </section>
                </div>  <!-- well   -->
            </div> <!-- end container -->
        </main>
    </body>
</html>