<?php
    require "../connect.php";
    $pdo = mysqlConnect();

    $name = $_POST["nome"] ?? "";
    $email = $_POST["email"] ?? "";
    $cpf = $_POST["cpf"] ?? "";
    $dataFiliacao = $_POST["data"] ?? "";

    $dataCorrente = date("Y");

    try {
        $sql0 = <<<SQL
        SELECT id
        FROM anuidades
        WHERE ano = :ano
        SQL;

        $stmt0 = $pdo->prepare($sql0);
        $stmt0->bindParam(":ano", $dataCorrente);
        $stmt0->execute();
        $id = $stmt0->fetchColumn();

        if (!$id) {
            exit('Anuidade não encontrada para o ano atual.');
        }

        $sql1 = <<<SQL
        INSERT INTO associados (nome, email, cpf, data_filiacao)
        value (?, ?, ?, ?)
        SQL;

        $sql2 = <<<SQL
        INSERT INTO associado_anuidade (id_associado, id_anuidade, pago)
        VALUE (?, ?, ?)
        SQL;

        //$stmt = $pdo->prepare($slq0);
        //$stmt->execute();
        //$id = $stmt->fetchColumn();

        $stmt1 = $pdo->prepare($sql1);
        $stmt1->execute([$name, $email, $cpf, $dataFiliacao]);

        $ultimoIdInserido = $pdo->lastInsertId();

        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute([$ultimoIdInserido, $id, 0]);
 
        if ($stmt1 && $stmt2) {
            header("Location: ../home.php");
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