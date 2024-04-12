<?php
session_start();
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Pesquisar</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    body{
        overflow: hidden;
        zoom: 0.70;
    }
    .content{
        color: white;
    }
    .navigation_header{
        background: transparent;
    }
    .logo_header{
        background: transparent;
    }
    .bi{
        background: transparent;
    }
    td, th{
        background: transparent; 
        text-align: center;
    }
    .tabela{
        max-width: 90%;
        min-width: 1%;
        max-height: 30pc;
        overflow: auto;
        align-items: center;
        margin: 0 auto;
    }
    @media(max-width: 800px){
        .body{
            zoom: 1;
        }
        .tabela{
            max-height: 50pc;
        }
        }
</style>
<body>
    <!--Barra Supreior-->
<div class="header" id="header">
        <button onclick="toggleSidebar()" class="btn_icon_header">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
            </svg>
        </button>
        <div class="logo_header">
            <a style="color: white;">Pro Steel</a> 
        </div>
        <div class="navigation_header" id="navigation_header">
            <button onclick="toggleSidebar()" class="btn_icon_header">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </button>
            <a href="upload.php" class="active">Adicionar</a>
            <a href="http://localhost/Prosteel/Or%C3%A7amento/index.php">Orçamento</a>
            <a href="../sistema.php" >Estoque</a>
            <a href="../Cadastro/sair.php">Sair</a>
        </div>
    </div><br>
    <div tabindex="0" class="content" onfocus="closeSidebar()" id="content">
        <!--Corpo-->

        <!--Barra de Pesquisa-->
        <!--Barra de Pesquisa-->
        <h2
        style='color: white; left: -1%; position: relative; font-size: 40px; font-family: Brush Script MT, Brush Script Std, cursive;'
        >Listar Fotos de Estoque</h2>
        <br>
        <form method="POST" action="pesquisar.php">
	         Pesquisar:<input style="background: white;" type="text" name="pesquisar" placeholder="PESQUISAR">
	         <input class="btn-primary" type="submit" value="🔎">
        </form>
        <br><br>
        <div class="tabela">
            <table class="table text-white table-dark table-bg">  
                <thead>
                    <tr>
                        <th scope="col">ID:</th>
                        <th scope="col">Nome:</th>
                        <th scope="col">E-mail:</th>
                        <th scope="col">Foto:</th>
                        <th scope="col">...</th>
                    </tr>
                </thead>
                <tbody>      
        <?php

if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    $query_usuarios = "SELECT id, nome_usuario, email_usuario, foto_usuario FROM usuarios ORDER BY id 
     DESC";
    $result_usuarios = $conn->prepare($query_usuarios);
    $result_usuarios->execute();

    while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
        //var_dump($row_usuario);
        extract($row_usuario);
        //echo "" . $row_usuario['id'] . "<br>";
        echo "<tr>";
        echo "<td> $id </td>";
        echo "<td> $nome_usuario </td>";
        echo "<td> $email_usuario </td>";
        echo "<td> $foto_usuario ";    
        //echo "<img src='imagens/" . $row_usuario['id'] . "/" . $row_usuario['foto_usuario'] ."' width='140'>";
        
    
        if((!empty($foto_usuario)) and (file_exists("imagens/$id/$foto_usuario"))){
            echo "<img src='imagens/$id/$foto_usuario' width='100'></td>";
            echo "<td><div class='btn-group-vertical'>
            <a class='btn btn-sm btn-danger' href='delete.php?id=$id' title='Deletar'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
            <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
            <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
            </svg>
            </a>
            <a class='btn btn-sm btn-primary' href='edit.php?id=$id' title='Editar'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='curentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
            </svg>
            </a>
            ";
            echo "
            <a class='btn btn-primary' href='imagens/$id/$foto_usuario' title='Download' >Download</a>
            <a class='btn btn-primary' href='visualizar.php?id=$id' title='Visualizar' >Visualizar</a></div></td>";
        }else{
            echo "<img src='imagens/icon_user.png' width='140'><br>";
            //echo "<a href='imagens/$id/$foto_usuario'>Download</a>";
        }
        
        echo "</tr>";
    }
    
    ?>

</div>
</body>
<!--Barra superiro-->
<script>
    var header           = document.getElementById('header');
    var navigationHeader = document.getElementById('navigation_header');
    var content          = document.getElementById('content');
    var showSidebar      = false;

    function toggleSidebar()
    {
        showSidebar = !showSidebar;
        if(showSidebar)
        {
            navigationHeader.style.marginLeft = '-10vw';
            navigationHeader.style.animationName = 'showSidebar';
            content.style.filter = 'blur(2px)';
        }
        else
        {
            navigationHeader.style.marginLeft = '-100vw';
            navigationHeader.style.animationName = '';
            content.style.filter = '';
        }
    }

    function closeSidebar()
    {
        if(showSidebar)
        {
            showSidebar = true;
            toggleSidebar();
        }
    }

    window.addEventListener('resize', function(event) {
        if(window.innerWidth > 768 && showSidebar) 
        {  
            showSidebar = true;
            toggleSidebar();
        }
    });

</script>
</html>