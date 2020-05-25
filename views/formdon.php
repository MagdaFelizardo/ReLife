<!DOCTYPE html>
<html lang="pt-PT">
    <head>
        <meta charset="UTF-8"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../css/mycss.css">
        <link rel="stylesheet" type="text/css" href="../css/form.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <title>Nova Doação</title>
    </head>
    <body class="img-background img-fluid"> 
            <div class="container">

                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6">
                    <h1 class="titledon">Nova Doação</h1>
                        <form class="form" action="<?php echo $_SERVER["REQUEST_URI"] ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="item">Item 
                                <input type="text" class="form-control-inline" size="15" name="item" id="item" placeholder="O que vais doar?" required>
                                </label>
                            </div>
                            <div class="form-check" required>
                                <span>
                                    <label class="radiobtns col-form-label">
                                        <input type="radio" class="form-check-input" name="category_id" value="1">
                                    Mobiliário</label>
                                    <label class="radiobtns col-form-label">
                                        <input type="radio" class="form-check-input" name="category_id" value="2">
                                    Textéis</label>
                                    <label class="radiobtns col-form-label">
                                        <input type="radio" class="form-check-input" name="category_id" value="3">
                                    Utensílios</label>
                                    <label class="radiobtns col-form-label">
                                        <input type="radio" class="form-check-input" name="category_id" value="4">
                                    Decoração</label>
                                    <br>
                                    <label class="radiobtns col-form-label">
                                        <input type="radio" class="form-check-input" name="category_id" value="5">
                                    Electrodomésticos</label>
                                    <label class="radiobtns col-form-label">
                                        <input type="radio" class="form-check-input" name="category_id" value="6">
                                    Higiene/Beleza</label>
                                    <label class="radiobtns col-form-label">
                                        <input type="radio" class="form-check-input" name="category_id" value="7">
                                    Livros</label>
                                    <label class="radiobtns col-form-label">
                                        <input type="radio" class="form-check-input" name="category_id" value="8">
                                    Outros</label>
                                </span>
                            </div>
                            <span class="form-group">
                                <input type="hidden" class="form-control-inline" name="city_id" value="<?= $user["city_id"] ?>">
                            </span>
                            <div class="form-group description">
                                <label for="description">Descrição 
                                <textarea class="form-control description" cols="70" rows="3" name="description" placeholder="Dá alguma informação adicional"></textarea>
                                </label>
                            </div>
                            <div class="form-group photo">
                                <div class="form-inline">    
                                    <label> Fotografia
                                    <input type="file" accept=".jpeg, .jpg, .png, .webp, .gif, .bmp" class="form-control-file" name="photo" id="choosephoto" required>
                                    </label>
                                </div>
                            </div>
                            <div class="small">
                            <p class="mt-3">Fotos até 200kb || Formatos: .jpeg, .jpg, .png, .webp, .gif e .bmp</p>
                            </div>
                            
                            <?php if(isset($message_one)){?>
                            <div class="text-danger text-center">Por favor preenche todos os campos</div>
                            <?php }elseif(isset($message_two)){ ?>
                            <div class="text-danger text-center">O upload da foto falhou. Aceitamos fotos até 200kb e nos formatos .jpg, .png, .webp, .gif, .bmp</div>
                            <?php }elseif(isset($thank_you)){ ?>
                            <div class="text-danger text center h3">Muito obrigado pela tua doação! <i class="fas fa-heart"></i></i></div>
                            <?php } ?>

                            <div class="form-group">
                                <button class="btnsendformdon" type="submit" id="sendformdon" name="sendon">Doar</button>
                            </div>
                        </form>
                        
                        
                        <div class="backhome">
                            <button type="button" class="btn btn link">
                                <a class="back" href="<?='/'?>">&#8634</a>
                            </button>
                        </div>
                    </div> <!-- fecho da segunda coluna -->
                </div>   <!-- fecho do row -->

            </div> <!--container -->
    </body>
</html>