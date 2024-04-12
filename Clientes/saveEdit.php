<?php
    // isset -> serve para saber se uma variável está definida
    include_once('config.php');
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $empresa = $_POST['empresa'];
        $cnpj = $_POST['cnpj'];
        $estado = $_POST['estado'];
        $endereço = $_POST['endereço'];
        $telefone = $_POST['telefone'];
        $cep = $_POST['cep'];
        $bairro = $_POST['bairro'];
        $gmail = $_POST['gmail'];
        $contato = $_POST['contato'];
        
        $sqlInsert = "UPDATE informacao 
        SET empresa='$empresa',cnpj='$cnpj',estado='$estado',endereço='$endereço',telefone='$telefone',cep='$cep',bairro='$bairro',gmail='$gmail',contato='$contato'
        WHERE id=$id";
        $result = $conexao->query($sqlInsert);
        print_r($result);
    }
    header('Location: sistema.php');

?>