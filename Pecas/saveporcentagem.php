<?php
    // isset -> serve para saber se uma variável está definida
    include_once('config.php');
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $valor_usuario = $_POST['valor_usuario'];
        
        $sqlInsert = "UPDATE pecas 
        SET valor_usuario='$valor_usuario'
        WHERE id=$id";
        $result = $conexao->query($sqlInsert);
        print_r($result);
    }
    header('Location: index.php');

?>