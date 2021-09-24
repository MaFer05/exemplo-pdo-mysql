<?php
require_once './vendor/autoload.php';
use ExemploPDOMySQL\MySQLConnection; //PDO;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bd = new MySQLConnection();
    $comando = $bd->prepare('INSERT INTO generos(nome) VALUES(:nome)');
    $comando->execute([':nome' => $_POST['nome']]);

    header('Location:/index.php');
}

$bd = new MySQLConnection(); //PDO('mysql:host=localhost;dbname=biblioteca', 'root', '');

$comando = $bd->prepare('SELECT *FROM generos');
$comando->execute();
$generos = $comando->fetchALL(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca</title>
</head>
<body>
    <a href="insert.php">Novo Gênero</a>
    <table>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>&nbsp;</th>
    </tr>
    <?php foreach($generos as $g): ?>
        <tr>
            <td><?= $g['id'] ?></td>
            <td><?= $g['nome'] ?></td>   
            <td>
                <a href="update.php?id=<?= $g['id'] ?>">Editar</a>
            </td>
        </tr>
    <?php endforeach ?>
    </table>
</body>
</html>