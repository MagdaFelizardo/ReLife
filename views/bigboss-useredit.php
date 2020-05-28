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
        <title>User Edit</title>
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
                            <li class="list-inline-item"><a class="nav-link1" href="/bigboss-activeusers/"><i class="fas fa-user-check pr-4"></i>Activos</a></li>
                            <li class="list-inline-item"><a class="nav-link1" href="/bigboss-inactiveusers/"><i class="far fa-user pr-4"></i>Pendentes de Aprovação</a></li>
                            <li class="list-inline-item"><a class="nav-link1" href="/bigboss-blockedusers/"><i class="fas fa-user-slash pr-3"></i>Bloqueados</a></li>
                        </ul>
                    </nav>  
                </div>
            </header>
            <main>
                <div class="container">

                    <div class="well">
                        <section class="media">

                            <div class="pull-left">
                                <i class="fas fa-id-card profilepic"></i>
                            </div>

                            <div class="media-body">

                            <?php if(isset($message)){ ?>
                                <div class="text-right mb-4 text-danger">Não foi possível alterar os teus dados. Por favor verifica o que introduziste e tenta de novo.</div>
                            <?php }?>

                            
                                <div class="edit">
                                    <form action="<?php echo $_SERVER["REQUEST_URI"] ?>" method="POST">

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                <input type="text" name="name" aria-label="name" class="form-control" value="<?php echo $user["name"] ?>" required>    
                                            </div>
                                        </div>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                <input type="text" name="phone" aria-label="phone" class="form-control" value="<?php echo $user["phone"] ?>">  
                                            </div>  
                                        </div>

                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                <select id="cities" list="cities" aria-label="cities" name="city_id" class="form-control">
                                                    <?php foreach($cities as $city){ ?>
                                                        <option <?php echo $user["city_id"] === $city["city_id"] ? "selected" : "" ?> value=" <?php echo $city["city_id"] ?> "> <?php echo $city["city"] ?> </option>
                                                    <?php  ;} ?>         
                                                </select>
                                            </div>  
                                        </div>
                                            
                                        <input type="hidden" name="user_id" value="<?php echo $url_parts[2] ?>">  


                                        <div class="text-center">
                                            <div class="form-group">
                                                <button type="submit" name="update-profile" class="btn buttons mt-4 changes-btn" id="update-profile" ><i class="far fa-save"></i><span class="btn-txt"> Gravar perfil </span></button>
                                            </div>
                                        </div>
                                    </form>

                            </div> <!-- end mediabody -->
                        </section>
                    </div>  <!-- well   -->
                </div> <!-- end container -->
            </main>
    </body>
</html>