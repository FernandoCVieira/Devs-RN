<?php
    require "../connect.php";
    $pdo = mysqlConnect();

    $user = $_POST["user"] ?? "";
    $email = $_POST["email"] ?? "";
    $hash_senha = $_POST["senha"] ?? "";

    // calcula um hash de senha seguro para armazenar no BD
    $hashSenha = password_hash($hash_senha, PASSWORD_DEFAULT);

    try {
        $sql = <<<SQL
        -- Repare que a coluna Id foi omitida por ser auto_increment
        INSERT INTO gerentes (nome, email, hash_senha)
        VALUE (?, ?, ?)
        SQL;

        // Neste caso utilize prepared statements para prevenir
        // ataques do tipo SQL Injection, pois precisamos
        // cadastrar dados fornecidos pelo usuário
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user, $email, $hashSenha]);

        if ($stmt) {
            header("Location: ../index.php");
            exit();
        }
        
    } catch (Exception $e) {
        if ($e->errorInfo[1] === 1062) {
            exit('Dados duplicados: '.$e->getMessage());
        } else {
            exit('Falha ao cadastrar os dados: '.$e->getMessage());
        }      
    }
?>