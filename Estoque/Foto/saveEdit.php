<?php
    // isset -> serve para saber se uma variável está definida
    include_once('config.php');
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nome_usuario = $_POST['nome_usuario'];
  
        
        $sqlInsert = "UPDATE usuarios 
        SET nome_usuario='$nome_usuario'
        WHERE id=$id";
        $result = $conexao->query($sqlInsert);
        print_r($result);
    }
    header('Location: index.php');

?>