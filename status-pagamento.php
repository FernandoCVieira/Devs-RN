<?php
    require "connect.php";
    $pdo = mysqlConnect();

    try {
        $sql = <<<SQL
        SELECT associados.nome AS associado, anuidades.ano AS anuidade, associado_anuidade.pago AS pago
        FROM associados
        JOIN associado_anuidade ON associados.id = associado_anuidade.id_associado
        JOIN anuidades ON anuidades.ano = YEAR(associados.data_filiacao)
        ORDER BY associados.nome, anuidades.ano
        SQL;

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        exit('Ocorreu uma falha: ' . $e->getMessage());
    }
?>

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
        <title>Status de Pagamento</title>
    </head>
    <body>
        <!-- Menu -->
        <head>
            <nav class="navbar navbar-expand-sm navbar-light cardbody-color">
                <div class="container">
                    <!-- Logo -->
                    <a href="#" class="navbar-brand">
                        <img src="img/f.png" alt="Devs-RN" title="Logo" width="50" class="img-fluid rounded-circle">
                    </a>
                    <!-- Menu Hamburger -->
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-target">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collaspe navbar-collaspe" id="nav-target">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="index.php" class="btn btn-outline-danger ml-4">Sair</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </head>
        <!-- Principal -->
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 mt-5">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="home.php">Home</a></li>
                            <li class="list-group-item"><a href="associado.php">Cadastrar Associados</a></li>
                            <li class="list-group-item"><a href="anuidades.php">Cadastrar Anuidades</a></li>
                            <li class="list-group-item"><a href="cobranca.php">Cobrança das Anuidades</a></li>
                            <li class="list-group-item"><a href="pagamento.php">Pagamento de Anuidades</a></li>
                            <li class="list-group-item"><a href="status-pagamento.php">Status de Pagamento</a></li>
                        </ul>
                    </div>
                    <div class="col-md-9 mt-5">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                <h3 class="text-dark font-weight-bold">Status de Pagamento</h4>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Associado</th>
                                                <th>Anuidade</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            foreach ($resultados as $resultado) {
                                                $status = $resultado['pago'] ? 'Pago' : 'Pendente';
                                                echo "<tr><td>{$resultado['associado']}</td><td>{$resultado['anuidade']}</td><td>$status</td></tr>";
                                            }
                                        ?>
                                    </table>
                                </div>
                            </div>
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