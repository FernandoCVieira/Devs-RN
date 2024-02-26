<?php
    function mysqlConnect() {
        $db_host = "localhost:3306";
        $db_username = "root";
        $db_password = "";
        $db_name = "meu_database";

        $dsn = "mysql:host=$db_host; dbname=$db_name; charset=utf8mb4";

        $options = [
            PDO::ATTR_EMULATE_PREPARES => false, // desativa a execução emulada de prepared statements
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // ativa o modo de erros para lançar exceções
            PDO::ATTR_PERSISTENT => true, // ativa o uso de conexões persistentes para maior eficiência
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // altera o modo padrão do método fetch para FETCH_ASSOC
        ];

        try {
            // O objeto $pdo será utilizado nas operações com o BD
            $pdo = new PDO($dsn, $db_username, $db_password, $options);
            return $pdo;
        } catch (Exception $e) {
            exit('Falha na conexão com o MySQL: '.$e->getMessage());
        }
    }
?>