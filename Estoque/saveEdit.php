<?php
    // isset -> serve para saber se uma variável está definida
    include_once('config.php');
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $peça = $_POST['peça'];
        $quantidade = $_POST['quantidade'];
        $valorunit = $_POST['valorunit'];
        $fornecedor = $_POST['fornecedor'];
        
        $sqlInsert = "UPDATE tabela 
        SET peça='$peça',quantidade='$quantidade',valorunit='$valorunit',fornecedor='$fornecedor'
        WHERE id=$id";
        $result = $conexao->query($sqlInsert);
    }
    header('Location: sistema.php');
?>