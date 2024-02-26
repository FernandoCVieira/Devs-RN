<?php
    require "../connect.php";
    $pdo = mysqlConnect();

    $year = $_POST["ano"] ?? "";
    $money = $_POST["valor"] ?? "";

    try {
        $sql = <<<SQL
        -- Repare que a coluna Id foi omitida por ser auto_increment
        INSERT INTO anuidades (ano, valor)
        VALUE (?, ?)
        SQL;

        // Neste caso utilize prepared statements para prevenir
        // ataques do tipo SQL Injection, pois precisamos
        // cadastrar dados fornecidos pelo usuário
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$year, $money]);

        if ($stmt) {
            header("Location: ../home.php");
            exit();
        }
    } catch (Exception $e) {
        exit('Falha na conexão com o MySQL: '.$e->getMessage());
    }
?>