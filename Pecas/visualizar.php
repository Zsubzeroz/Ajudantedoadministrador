<?php
session_start();
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Visualizar foto</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="../Imagens/favicon.png" type="image/x-icon">
</head>
<style>
    body{
        color: white;
        overflow: hidden;
        zoom: 1;
    }
    .imgbtn{
        top: 10%;
        left: 5%;
        position: absolute;
        background: transparent;
    }
    .text{
        top: 15%;
        left: 50%;
        text-align: left;
        position: relative;
        background: transparent;
    }
    @media(max-width: 800px){
    body{
        zoom: 0.6;
    }
    .imgbtn{
        top: 20%;
        left: 0;
    }
    .text{
        top: 50%;
        left: 55%;
    }
        } 
</style>
<body>
    <div class="content" id="content" tabindex="0" onfocus="closeSidebar()">   
    <?php
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    
    if(!empty($id)){
        $query_usuario = "SELECT id, nome_usuario, valor_usuario, mm_usuario, largura_usuario, altura_usuario, material_usuario, empressa_usuario, email_usuario, foto_usuario, created FROM 
        pecas WHERE id=:id LIMIT 1";
        $result_usuario = $conn->prepare($query_usuario);
        $result_usuario->bindParam(':id', $id);
        $result_usuario->execute(); 
        
        $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
        //var_dump($row_usuario);
        extract($row_usuario);
        echo "<div class='text'>";
        echo "ID: $id <br>";
        echo "Nome: $nome_usuario <br>";
        echo "Valor: $valor_usuario <br>";
        echo "Ø(mm): $mm_usuario <br>";
        echo "Largura: $largura_usuario <br>";
        echo "Altura: $altura_usuario <br>";
        echo "Material: $material_usuario <br>";
        echo "Empressa: $empressa_usuario <br>";
        echo "E-mail: $email_usuario <br>";
        echo "data de criação: $created <br>";
        echo "Foto: $foto_usuario <br>";
        echo "</div>";
        
        if((!empty($foto_usuario)) and (file_exists("imagens/$id/$foto_usuario"))){
            //echo "<img src='imagens/$id/$foto_usuario' width='300'><br>";
            echo "<div class='imgbtn'>
            <img src='imagens/$id/$foto_usuario' width='400'><br><br>
            <a class='btn btn-danger' href='index.php'>Voltar</a>
            <a class='btn btn-primary' href='imagens/$id/$foto_usuario' download>Download</a><br><br>
            </div>";
        }else{
            echo "<img src='imagens/icon_user.png' width='180'><br>";
        }
    }else{
        $_SESSION["msg"] = "<p style='color: #f00;'>Erro: Necessario selecionar o usuário!</p>";
        header("Location: index.php");
    } 
    ?>
</div>
</body>
</html>