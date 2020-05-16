<!DOCTYPE html>
    <html lang="pt-PT">
    <head>
        <meta charset="UTF-8"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/mycss.css">
        <link rel="stylesheet" type="text/css" href="css/homepage.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <title>Homepage reLife</title>
    </head>
<body class="p-1">
    <header>
        <div id="div_top"></div>
            <img class="logo" src="imgs/infilogo.jpg" alt="logotipo-relife" scrolling="no">
            <button type="button" class="btn incentivo"><a class="incentivo-link" href="<?=BASE_PATH."/login/"?>">DOAR</a></button>
            <div>
                <nav class="navbar col-12"> 
                    <ul class="list-inline"> 
                        <li class="list-inline-item p-2 bd-highlight"><a class="links p-4" href="#div_proj">O PROJECTO</a> </li>
                        <li class="list-inline-item p-2 bd-highlight"><a class="links p-4" href="#div_quem">QUEM SOMOS</a></li>
                        <li class="list-inline-item p-2 bd-highlight"><a class="links p-4" href="<?=BASE_PATH."/donations/"?>">DOAÇÕES</a></li>
                        <li class="list-inline-item p-2 bd-highlight" id="login-home"><a class="links p-4" href="<?=BASE_PATH."/login/"?>">LOGIN</a></li>
                    </ul>
                </nav>  
            </div>
        </div>
    </header>
    
    <main>
        <div class="bg">
            <p class="py-5 text-center">
                <img id="abraco" src="imgs/abraco.jpg" class="img-fluid" alt="peoplehug">  
            </p>
            <div id="text-incentivo">Dá outra vida às tuas coisas</div>
        </div>
    </main>

    <div id="div_proj"></div>
    <section class="section1">
            <div class="row">
                <div class="text center col-12 col-md-6 col-lg-3">
                    <img src="imgs/caneca.jpg" class="img-fluid imgprj" alt="caneca"> <br><br>
                    <img src="imgs/cozinha.jpg" class="img-fluid imgprj" alt="cozinha"><br><br> 
                    <img src="imgs/cafe.jpg" class="img-fluid imgprj" alt="maquinadecafe">
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <img src="imgs/quarto.jpg" class="img-fluid imgprj" alt="quarto"> <br><br>
                    <img src="imgs/roupa.jpg" class="img-fluid imgprj" alt="roupa"> <br><br>
                    <img src="imgs/livros.jpg" class="img-fluid imgprj" alt="livros">
                </div>

                <div class="col-12 col-md-12 col-lg-5">
                    <h2 class="text-center my-4 py-2 titproj">O Projecto</h2>
                        <ul class="objectivos p-2"> 
                            <div class="my-2 py-2">Nascido na cidade de Lisboa, o projecto ReLIFE tem como missão promover:</div>
                            <li class="p-2 bd-highlight"> 
                                a <span class="hl">doação</span> de todo o tipo de <span class="hl">objectos e materiais</span>
                            </li>
                            <li class="p-2 bd-highlight">
                                a <span class="hl">partilha comunitária de bens</span>, a sua <span class="hl">reutilização e renovação</span>,
                            </li>
                            <li class="p-2 bd-highlight">
                                a <span class="hl">redução de desperdício</span>,
                            </li>
                            <li class="p-2 bd-highlight">
                                <span class="hl">diminuição de bens desnecessários</span> nos nossos lares.
                            </li>
                            <div class=" text-center pt-4">Com gestos de dar e receber, tornamos o 
                                <span class="hl2">nosso mundo mais justo, igualitário e sustentável</span>.
                            </div>
                        </ul>
                        <div class="col-12 backtotop">
                            <button type="button" class="btn link">
                                <a class="p-4 back" href="#div_top">
                                    <i class="fas fa-angle-double-up"></i>
                                </a>
                            </button>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section2">
        <div id="div_quem"></div>
            <div class="row m-2 p-5">
                <div class="col-12 col-lg-6">
                    <h2 class="text-center my-4 py-2 titquem">Quem Somos</h2>
                        <p>
                        Já vivi em diversas cidades e dezenas de casas. Tenho sido tão nómada que, apesar de gostar de ter as minhas coisas, a vida me levou 
                        a um certo desprendimento. </p>
                        <p>Quando vou a casa de amigos ou familiares com casa fixa, fico sempre surpreendida com a quantidade de coisas que se vão acumulando,
                        algumas que as pessoas prezam e outras que estão simplesmente ali a um canto "porque ainda está bom, é pena deitar fora", mas que 
                        efectivamente não são usadas há anos.</p>
                        <p>Esses objectos, sejam eles toalhas, móveis ou electrodomésticos, poderão ser úteis noutras casas, para outras pessoas.
                        Não faz sentido que quem não tenha, tenha de ir comprar, quando alguém ao lado tem, está bom, não usa e pode dar.</p>
                        <p class="text-center">
                        Foi assim que surgiu esta ideia, este projecto, que não é meu, mas nosso.
                        <span class="hl">Quem somos? Somos todos nós. Contribui!</span>
                        </p>
                        <div class="backtotop">
                            <button type="button" class="btn btn link">
                                <a class="p-4 back" href="#div_top">
                                    <i class="fas fa-angle-double-up"></i>
                                </a>
                            </button>
                        </div>
                </div>
                <div class="col-12 col-lg-6">
                    <img src="imgs/abracando arvores.jpg" class="img-fluid" alt="abracarumaarvore"> <br><br>
                </div>
            </div>
    </section>
    <footer class="text-center footer-relife p-4">

        <h3 class="ttlnews my-3">Mantém-te a par!</h3>
        <p class="newstext">Inscreve-te na nossa newsletter e recebe todas as novidades</p>
            <form class="mb-3" action="<?=BASE_PATH?>" method="post">
                <div>
                    <span><input class="newsletter" id="form2" type="text" name="email" placeholder="Email"></span>
                    <button class="newsletter" type="submit" name="send" value=""><i class="far fa-paper-plane"></i></button>
                </div>
            </form>
    </footer>   
</body>
</html>