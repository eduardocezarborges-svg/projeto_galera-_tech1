<?php
declare(strict_types=1);

/*
|---------------------------------------------------------------
| Configuração do banco
|---------------------------------------------------------------
| 1. Crie um banco MySQL, exemplo: galeratech
| 2. Importe database/schema.sql
| 3. Importe database/seed.sql
| 4. Ajuste os dados abaixo conforme seu servidor
*/

$host = 'localhost';
$dbname = 'galeratech';
$user = 'root';
$password = '';
$charset = 'utf8mb4';

$dsn = "mysql:host={$host};dbname={$dbname};charset={$charset}";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE =>
    PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
    exit('Erro ao conectar ao banco de dados. Verifique config/database.php');
}
?>