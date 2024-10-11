<?php
include 'db_con.php';

$id = intval($_GET['id']); // Garantir que o ID seja um inteiro

if(isset($_POST['submit'])){
    // Sanitize input to prevent SQL injection
    $primeiro_nome = mysqli_real_escape_string($conn, $_POST['primeiro_nome']);
    $sobrenome = mysqli_real_escape_string($conn, $_POST['sobrenome']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $genero = mysqli_real_escape_string($conn, $_POST['genero']);

    // Atualizar dados no banco
    $sql = "UPDATE `crud` SET `first_name` = '$primeiro_nome', `last_name` = '$sobrenome', `email` = '$email', `gender` = '$genero' WHERE `crud`.`id` = $id";
    $result = mysqli_query($conn, $sql);

    if($result){
        header('Location: index.php?msg=Dados atualizados com sucesso');
        exit(); // Evita reenvio do formulário
    } else {
        echo 'Erro ao atualizar: '.mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP APLICAÇÃO CRUD</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color:#00ff00;">
        PHP APLICAÇÃO COMPLETA CRUD
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Editar registro</h3>
            <p class="text-muted">Aperte atualizar após mudar qualquer informação</p>
        </div>

        <?php
        // Buscar os dados do registro para edição
        $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 50vw; min-width: 300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label" for="">Primeiro Nome:</label>
                        <input type="text" class="form-control" name="primeiro_nome" value="<?php echo $row['first_name']; ?>" required>
                    </div>

                    <div class="col">
                        <label class="form-label" for="">Sobrenome:</label>
                        <input type="text" class="form-control" name="sobrenome" value="<?php echo $row['last_name']; ?>" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="">Email:</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label for="">Gênero:</label> &nbsp;
                    <input type="radio" class="form-check-input" name="genero" id="m" value="Masculino" <?php echo $row['gender'] == 'Masculino' ? 'checked' : '';?> required>
                    <label for="m" class="form-input-label">Masculino</label>
                    &nbsp;
                    <input type="radio" class="form-check-input" name="genero" id="f" value="Feminino" <?php echo $row['gender'] == 'Feminino' ? 'checked' : '';?>>
                    <label for="f" class="form-input-label">Feminino</label>
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Atualizar</button>
                    <a href="index.php" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

<!---Bootstrap---> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
