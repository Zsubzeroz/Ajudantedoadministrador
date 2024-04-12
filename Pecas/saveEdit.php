<?php
    //serve para saber se uma variável está definida.
    include_once('config.php');
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nome_usuario = $_POST['nome_usuario'];
        $valor_usuario = $_POST['valor_usuario'];
        $mm_usuario = $_POST['mm_usuario'];
        $largura_usuario = $_POST['largura_usuario'];
        $altura_usuario = $_POST['altura_usuario'];
        $material_usuario = $_POST['material_usuario'];
        $empressa_usuario = $_POST['empressa_usuario'];

        $sqlInsert = "UPDATE pecas
        SET nome_usuario='$nome_usuario',valor_usuario='$valor_usuario',mm_usuario='$mm_usuario',largura_usuario='$largura_usuario',altura_usuario='$altura_usuario',material_usuario='$material_usuario',empressa_usuario='$empressa_usuario'
        WHERE id=$id";
        $result = $conexao->query($sqlInsert);
    }
        echo "<script>location.href='index.php?removido=true';</script>";
?>