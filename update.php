<?php
require_once './vendor/autoload.php';

use ExemploPDOMySQL\MySQLConnection;

$bd = new MySQLConnection();

$genero = null;

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $comando = $bd->prepare('SELECT * FROM generos WHERE id = :id');
    $comando->execute([':id' => $_GET['id']]);

    $genero = $comando->fetch(PDO::FETCH_ASSOC);
} 


?>

<!DOCTYPE html>
<html lang="pt=br">
    <head>
        <meta charset="UTF-8">
        <title>Novo Gênero</title>
    </head>
    <body>
    <h1>Editar Gênero</h1>
        <form action="insert.php" method="post">
            <input type="hidden" name="id" value="<?= $genero['id'] ?>" />
            <label for="nome">Nome do Gênero</label>
            <input type="text" require name="nome" value="<?= $genero['id']?>" />
            <button type="submit">Salvar</button>
    </form>
    </body>