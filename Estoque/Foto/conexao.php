<?php
//Inicio da conexão com o banco de dados utilizando PDO
$host = "Localhost";
$user = "root";
$pass = "";
$dbname = "id19938266_prosteel";
$port = 3306;

try {
    //Conexão sem a porta
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    //echo "Conexão com banco de dados realizado com sucesso.";
} catch (PDOException $err) {
    echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage();
}