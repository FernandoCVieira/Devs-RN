<?php
    require "../connect.php";
    $pdo = mysqlConnect();

    $id = $_GET["id"] ?? "";

    try {
        $sql = <<<SQL
        UPDATE associado_anuidade
        SET pago = 1
        WHERE id = ?  
        SQL;

        $stmt = $pdo->prepare($sql);
        $run = $stmt->execute([$id]);
        if ($run) {
            header("Location: ../pagamento.php");
            exit();
        }
    } catch (Exception $e) {
        exit('Falha inesperada: '.$e->getMessage());
    }
?>