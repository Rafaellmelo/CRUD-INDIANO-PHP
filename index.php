<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP APLICAÇÃO CRUD</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color:#00ff00;">
        PHP APLICAÇÃO COMPLETA CRUD
    </nav>

   <div class="container">
    <?php
    if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        ' . htmlspecialchars($msg) . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    ?>
    <a href="add_new.php" class="btn btn-success mb-3"><i class="fa-solid fa-plus"></i> Adicionar novo registro</a>
    <a href="gerar_pdf.php" class="btn btn-primary mb-3"><i class="fa-solid fa-file-pdf"></i> Gerar PDF</a> <!-- Botão para gerar PDF -->
    <table class="table table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Primeiro Nome</th>
                <th scope="col">Sobrenome</th>
                <th scope="col">Email</th>
                <th scope="col">Gênero</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'db_con.php';
            $sql = "SELECT * FROM `crud`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['first_name']?></td>
                    <td><?php echo $row['last_name']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['gender']?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
   </div>

<!--- Bootstrap --->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
