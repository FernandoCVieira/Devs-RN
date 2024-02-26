<?php
    function calcularCobranca($pdo, $id_associado) {
        $sql0 = <<<SQL
        SELECT data_filiacao
        FROM associados 
        WHERE id = $id_associado
        SQL;

        $sql1 = <<<SQL
        SELECT id, ano, valor
        FROM anuidades
        SQL;

        try {
            $resultado = $pdo->query($sql0);
            $row = $resultado->fetch();
            $data_filiacao = new DateTime($row['data_filiacao']);

            $resultado = $pdo->query($sql1);
            $valor_total_devido = 0;
            while ($row = $resultado->fetch()) {
                $ano_anuidade = $row['ano'];
                $valor_anuidade = $row['valor'];
                $data_anuidade = new DateTime("$ano_anuidade-01-01");

                // Verificar se a anuidade é devida com base na data de filiação do associado
                if ($data_anuidade >= $data_filiacao) {
                    $valor_total_devido += $valor_anuidade;
                }
            }

            return $valor_total_devido;
        } catch (Exception $e) {
            exit('Falha insperada: '.$e->getMessage());
        }
        
    }

    require "../connect.php";
    $pdo = mysqlConnect();

    $id = $_GET["id"] ?? "";

    $valor_total_devido = calcularCobranca($pdo, $id);

    if ($valor_total_devido !== false) {
        echo "<span>Valor total devido: R$ " . number_format($valor_total_devido, 2, ',', '.') . "</span>";
        // Se deseja redirecionar após exibir o valor, use a linha abaixo
        //header("Location: ../cobranca.php");
    } else {
        echo "Erro ao calcular cobrança";
        // Se deseja redirecionar após erro, use a linha abaixo
        header("Location: ../home.php");
    }
    
?>