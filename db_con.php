<?php
$servername = 'localhost';
$username = 'root';
$password = "020271mM#";
$dbname = 'tutorial';

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("Conexão Falhou: " . mysqli_connect_error());
}
//echo "Conexão efetuada com sucesso!";
