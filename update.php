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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    </head>
    <body>
        <main class="container">
            <h1 style="color: green;">Editar Gênero</h1>
                <form action="insert.php" method="post">
                    <input type="hidden" name="id" value="<?= $genero['id'] ?>" />
                    <div class="form-group">
                        <label for="nome">Nome do Gênero</label>
                        <input type="text" require name="nome" value="<?= $genero['id']?>" />
                    </div><br>
                    <a class="btn btn-secondary" href="/index.php">Voltar</a>
                    <button class="btn btn-success" type="submit">Salvar</button>
                </form>
        </main>
    </body>
</html>