<!DOCTYPE html>
    <html lang="pt-PT">
    <head>
        <meta charset="UTF-8"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" type="Text/css" href="css/mycss.css">
        <link rel="stylesheet" type="text/css" href="css/donations.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <title>My Area: Donations</title>
    </head>
    <body>
        
        <header>
            <div class="container">
                <h1><a href="homepage.php"><img class="logo img-fluid" src="imgs/infilogo.jpg" alt="logotipo"></a></h1>

                <nav class="navbar"> 
                    <ul class="list-inline nav-area"> 
                        <li class="list-inline-item"><a class="nav-link1" href="./myprofile.php"><i class="far fa-user pr-3"></i>O meu perfil</a></li>
                        <li class="list-inline-item nav2"><i class="fas fa-hand-holding-heart pr-3"></i>As minhas doações</li>
                    </ul>
                </nav>   
            </div>
        </header>


        <main>
            <div class="container">

                <div class="totaldon" id="countdon">Total de Doações: {{countdon}}</div>

                <div class="well">
                    <div class="media">

                        <a class="pull-left" href="#">
                            <img class="media-object" src="./imgs/relogio.jpg" width="200px">
                        </a>

                        <div class="media-body">
                            <div class="btn pull-right">
                                <div>
                                    <a href="./mydonedit.php">
                                        <button class="buttons" id="update" value="update"><i class="fas fa-pen symbol changes-btn"></i></button>
                                    </a>
                                </div>
                            </div>
                            

                            <h4 class="media-heading">Relógio vintage</h4>

                            <div class="mb-4 mt-4">
                                    <i class="glyphicon glyphicon-calendar"></i> 20-04-08 |
                                    <i class="glyphicon glyphicon-home"></i> Lisboa |
                                    <i class="fas fa-tag"></i> Mobiliário
                            </div>

                            <p>Relógio clássico com mais de 50 anos. Era da minha avó. Quem quer? Funciona!</p>

                            <div class="btn pull-right">
                                <div>
                                    <button class="buttons" id="delete" value="reset"><i class="far fa-trash-alt symbol changes-btn"></i></button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>  <!-- well   -->
            </div> <!-- end container -->
        </main>

        <footer class="footer">
            <div class="container">
                <nav aria-label="Nav-pages">
                    <ul class="pagination float-right">
                        <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </nav>
            </div> <!-- end container -->
        </footer>
    </body>
</html>