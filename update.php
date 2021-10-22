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

$_title = 'Editar Gênero';
?>

<?php include('./includes/header.php'); ?>
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
       
<?php include('./includes/footer.php'); ?>