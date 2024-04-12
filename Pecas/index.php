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
    <link rel="shortcut icon" href="../Imagens/favicon.png" type="image/x-icon">
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
        max-width: auto;
        min-width: 1%;
        max-height: 45pc;
        overflow: auto;
        align-items: center;
        margin: 1%;
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
            <a href="../Orçamento/index.php">Orçamento</a>
            <a href="../Clientes/senhaconfg.php">Clientes</a>
            <a href="../Estoque/sistema.php" >Estoque</a>
            <a href="../Cadastro/sair.php">Sair</a>
        </div>
    </div><br>
    <div tabindex="0" class="content" onfocus="closeSidebar()" id="content">
        <!--Corpo-->

        <h2
        style='color: white; left: -1%; position: relative; font-size: 40px; font-family: Brush Script MT, Brush Script Std, cursive;'
        >Lista de Preços</h2>
        <!--Barra de Pesquisa-->
        <br>
        <form method="POST" action="pesquisar.php">
            Pesquisar:<input style="background: white; border-radius: 5px;" style="background: white;" type="text" name="pesquisar" placeholder="PESQUISAR">
            <input style="border-radius: 5px;" class="btn-primary btn-sm" type="submit" title="Pesquisar" value="🔎">
        </form>
        <br>
        <!--/Barra de Pesquisa-->
        <div class="tabela">
            <table class="table text-white table-dark table-bg">  
                <thead>
                    <tr>
                        <th class="upid" scope="col">ID:</th>
                        <th class="upnome" scope="col">Nome:</th>
                        <th class="upvalor" scope="col">Valor:</th>
                        <th class="upØmm" scope="col">Ø(mm):</th>
                        <th class="uplargura" scope="col">Largura:</th>
                        <th class="upaltura" scope="col">Altura:</th>
                        <th class="upmaterial" scope="col">Material:</th>
                        <th class="upempressa" scope="col">Empressa:</th>
                        <th class="upemail" scope="col">E-mail:</th>
                        <th class="updata" scope="col">data de criação:</th>
                        <th class="upfoto" scope="col">Foto:</th>
                        <th class="up..." scope="col">...</th>
                    </tr>
                </thead>
                <tbody>    
                    <?php
if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    
    $query_usuarios = "SELECT id, nome_usuario, valor_usuario, mm_usuario, largura_usuario, altura_usuario, material_usuario, empressa_usuario, email_usuario, foto_usuario, created FROM pecas ORDER BY id 
     DESC";
    $result_usuarios = $conn->prepare($query_usuarios);
    $result_usuarios->execute();

    while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
        //var_dump($row_usuario);
        extract($row_usuario);
        //echo "ID: " . $row_usuario['id'] . "<br>
        echo "<tr>";
        echo "<td class='id' ><br><br>$id</td>";
        echo "<td class='nome' ><br><br>$nome_usuario</td>";
        echo "<td class='valor' ><br><br>$valor_usuario</td>";
        echo "<td class='mm' ><br><br>$mm_usuario</td>";
        echo "<td class='largura' ><br><br>$largura_usuario</td>";
        echo "<td class='altura' ><br><br>$altura_usuario</td>";
        echo "<td class='material' ><br><br>$material_usuario</td>";
        echo "<td class='empressa' ><br><br>$empressa_usuario</td>";
        echo "<td class='email' ><br><br>$email_usuario</td>";
        echo "<td class='created' ><br><br>$created</td>";
        echo "<td class='foto' >$foto_usuario";
        //echo "<img src='imagens/" . $row_usuario['id'] . "/" . $row_usuario['foto_usuario'] ."' width='100'></td>"; 
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
            <a class='btn btn-sm btn-primary' href='porcentagem.php?id=$id' title='Aumentar o preço em % '>
            Cotação
            </a>
            ";
            echo "
            <a class='btn btn-primary' href='imagens/$id/$foto_usuario' title='Download' >Download</a>
            <a class='btn btn-primary' href='visualizar.php?id=$id' title='Visualizar' >Visualizar</a></div></td>";
        }else{
            echo "<img src='imagens/icon_user.png' width='140'>";
            //echo "<a href='imagens/$id/$foto_usuario'>Download</a>";
            
        }  
        echo "</tr>";
    } 
    ?>
</tbody>
</table>
</div>
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