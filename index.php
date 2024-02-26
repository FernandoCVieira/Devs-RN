<!DOCTYPE html><!-- doctype do HTML5 -->
<!-- Inicio do documento HTML -->
<html lang="pt-BR">
    <!-- Cabeçalho do documento -->
    <head>
        <!-- Meta tags Obrigatórias -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- Normalize CSS -->
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
        <!-- Estilo CSS -->
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/1c48d10a6f.js" crossorigin="anonymous"></script>
        <!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <![endif]-->
        <title>Devs - RN</title>
    </head>
    <body>
        <!-- Login -->
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <h1 class="text-center text-dark display-4 font-weight-bold">Devs - RN</h1>
                        <p class="text-center text-dark lead font-weight-bold">Associação de programadores e desenvolvedores do Estado do Rio Grande Do Norte.</p>
                        <div class="card my-5">
                            <form class="card-body cardbody-color p-lg-5" action="app/valida.php" method="POST">
                                <div class="text-center mb-2">
                                    <img src="img/f.png" width="200" alt="Associação" class="img-fluid profile-image-pic rounded-circle my-3">
                                </div>
                                <div class="form-group">
                                    <!-- <label for="user" class="form-label font-weight-bold">Usuário</label> -->
                                    <input type="text" name="email" class="form-control" id="Useremail" placeholder="E-mail" autofocus>
                                </div>
                                <div class="form-group">
                                    <!-- <label for="senha" class="form-label font-weight-bold">Senha</label> -->
                                    <input type="password" name="senha" class="form-control" id="Usersenha" placeholder="Senha">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-color px-5 mt-2 mb-5 w-100">Login</button>
                                </div>
                                <div id="emailHelp" class="form-text text-center mb-5 text-dark">
                                    Não registrado?<a href="gerente.php" class="text-dark font-weight-bold" id="no-decoration"> Crie a sua conta aqui</a>
                                </div>
                                <?php
                                    $erro = isset($_GET["erro"]) ? $_GET["erro"] : "";
                                    if ($erro == 1) {
                                        echo '<span class="erro">Usuário e/ou senha incorretos</span>';
                                    }
                                    if ($erro == 2) {
                                        echo '<span class="erro">Usuário e/ou senha em branco!</span>';
                                    }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- JavaScript (Opcional) -->
        <script src="js/index.js"></script>
        <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>