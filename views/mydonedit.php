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
        <title>My Donations Edit</title>
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
                    <div class="media">

                        <section class="pull-left">
                        <!-- <i class="fas fa-gift profilepic"></i> -->
                            <?php foreach($results as $result) {
                                echo '
                            <img class="donphoto" src="../imgs/uploads/'.$result["photo"].'">
                            ';
                        }
                        ?>
                        </section>

                            <div class="media-body">

                                <div class="edit-donat">
                                    <form action="<?php echo $_SERVER["REQUEST_URI"] ?>" method="POST" enctype="multipart/form-data">
                                    <?php foreach($results as $result) {
                                    echo '
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-gift"></i></span>
                                                <input type="text" name="item" aria-label="name" class="form-control" value="'.$result["item"].'" required>    
                                            </div>
                                        </div>
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-tags"></i></i></span>
                                                <select class="form-control text-capitalize" name="category_id" aria-label="categories" required>';
                                                foreach($categories as $category) {
                                                    echo '
                                                    <option '.($result["category_id"] === $category["category_id"] ? "selected" : "").' value="'.$category["category_id"].'">'.$category["category"].'</option>
                                                    ';
                                                } echo'
                                                </select> 
                                            </div>  
                                        </div>
                                        <div class="input-group form-group description">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                                <textarea class="form-control description" aria-label="description" cols="70" rows="3" name="description">'.$result["description"].'</textarea>    
                                            </div> 
                                        </div>

                                        <span><input type="hidden" name="donation_date" value="'.$result["donation_date"].'"></span>
                                        <span><input type="hidden" name="donation_id" value="'.$url_parts[2].'"></span>
                                        <span><input type="hidden" name="city_id" value="'.$result["city_id"].'"></span>

                                  
                                        <div class="form-group float-right">
                                            <button type="submit" name="update-donation" class="btn buttons mt-4 changes-btn">
                                                <i class="far fa-save"></i>
                                                <span class="btn-txt"> Gravar </span>
                                            </button>
                                        </div>
                                        ';
                                    }
                                    ?>
                                    </form>
                                </div> <!--end edit -->
                            </div> <!-- end mediabody -->
                    </div>
                </div>  <!-- well   -->
            </div> <!-- end container -->
        </main>
    </body>
</html>