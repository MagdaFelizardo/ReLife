<!DOCTYPE html>
<html lang="pt-PT">
    <head>
        <meta charset="UTF-8"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/mycss.css">
        <link rel="stylesheet" type="text/css" href="css/form.css">
        <title>Nova Doação</title>
    </head>
    <body class="img-background img-fluid"> 
            <div class="container">

                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6">
                    <h1 class="titledon">Nova Doação</h1>
                        <form class="form" id="formdon" action="/form.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="item">Item 
                                <input type="text" class="form-control-inline" size="15" name="item" id="item" value="" placeholder="O que vais doar?" required>
                                </label>
                            </div>
                            <div class="form-check" required>
                                <span>
                                    <label class="radiobtns col-form-label">
                                        <input type="radio" class="form-check-input" name="tags" id="tagfurniture" value="furniture">
                                    Mobiliário</label>
                                    <label class="radiobtns col-form-label">
                                        <input type="radio" class="form-check-input" name="tags" id="tagtextiles" value="textiles">
                                    Textéis</label>
                                    <label class="radiobtns col-form-label">
                                        <input type="radio" class="form-check-input" name="tags" id="tagobjects" value="objects">
                                    Utensílios</label>
                                    <label class="radiobtns col-form-label">
                                        <input type="radio" class="form-check-input" name="tags" id="tagdecor" value="decor">
                                    Decoração</label>
                                    <br>
                                    <label class="radiobtns col-form-label">
                                        <input type="radio" class="form-check-input" name="tags" id="tagelectro" value="electro">
                                    Electrodomésticos</label>
                                    <label class="radiobtns col-form-label">
                                        <input type="radio" class="form-check-input" name="tags" id="taghigbeauty" value="higbeauty">
                                    Higiene/Beleza</label>
                                    <label class="radiobtns col-form-label">
                                        <input type="radio" class="form-check-input" name="tags" id="tagbooks" value="books">
                                    Livros</label>
                                    <label class="radiobtns col-form-label">
                                        <input type="radio" class="form-check-input" name="tags" id="tagother" value="other">
                                    Outros</label>
                                </span>
                            </div>
                            <div class="form-group description">
                                <label for="description">Descrição 
                                <textarea class="form-control description" cols="70" rows="3" name="description" placeholder="Dá alguma informação adicional"></textarea>
                                </label>
                            </div>
                            <div class="form-group photo">
                                <div class="form-inline">    
                                    <label> Fotografia
                                    <input type="file" accept=".png, .jpg, .jpeg" class="form-control-file" name="photo" id="choosephoto" value="">
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btnsendformdon" type="submit" id="sendformdon">Doar</button>
                            </div>
                        </form>
                        <div class="backhome">
                            <button type="button" class="btn btn link">
                                <a class="back" href="homepage.php">&#8634</a>
                            </button>
                        </div>
                    </div> <!-- fecho da segunda coluna -->
                </div>   <!-- fecho do row -->

            </div> <!--container -->
    </body>
</html>