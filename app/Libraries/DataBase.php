<?php

try {
    $dsn = sprintf(
        '%s:host=%s;port=%s;dbname=%s;charset=%s',
        DB_CONNECTION,
        DB_HOST,
        DB_PORT,
        DB_DATABASE,
        DB_CHARSET
    );

    $dbh = new PDO($dsn, DB_USERNAME, DB_PASSWORD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' . DB_CHARSET . ' COLLATE ' . DB_COLLATION,
    ]);
} catch (PDOException $e) {
    die('Erro na conexão com o banco de dados: ' . $e->getMessage());
}