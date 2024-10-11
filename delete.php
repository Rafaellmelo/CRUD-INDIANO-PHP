<?php
include 'db_con.php';
$id = $_GET['id'];
$sql = "DELETE FROM `crud` WHERE id = $id";
$result = mysqli_query($conn, $sql);
if($result){
    header('Location: index.php?msg=Dados excluídos com sucesso');
}else{
    echo 'Erro ao excluir: '.mysqli_error($conn);
}
?>