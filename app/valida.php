<?php
    function checkLogin($pdo, $email, $senha) {
        $sql = <<<SQL
        SELECT hash_senha
        FROM gerentes
        WHERE email = ?
        SQL;

        try {
            // Neste caso utilize prepared statements para prevenir
            // ataques do tipo SQL Injection, pois precisamos
            // inserir dados fornecidos pelo usuário na 
            // consulta SQL (o email do usuário)
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email]);
            $row = $stmt->fetch();
            if (!$row) return false; // nenhum resultado (email não encontrado)

            return password_verify($senha, $row['hash_senha']);
        } catch (Exception $e) {
            exit('Falha insperada: '.$e->getMessage());
        }
    }

    require "../connect.php";
    $pdo = mysqlConnect();

    $email = $_POST["email"] ?? "";
    $senha = $_POST["senha"] ?? "";

    if (empty($_POST["email"]) || empty($_POST["senha"])) {
        header("Location: ../index.php?erro=2");
        exit();
    }

    if (checkLogin($pdo, $email, $senha)) {
        header("Location: ../home.php");
    } else {
        header("Location: ../index.html");
    }
?>