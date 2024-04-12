<?php
session_start();
ob_start();
include_once "conexao.php";

    include_once('config.php');

    $logado = $_SESSION['email'];
    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FrOM tabela WHErE id LIKE '%$data%' or peça LIKE '%$data%' or fornecedor LIKE '%$data%' OrDEr BY id DESC";
    }
    else
    {
        $sql = "SELECT * FrOM tabela OrDEr BY id DESC";
    }
    $result = $conexao->query($sql);
    ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Formulario upload imagem</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="../Imagens/favicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
*{
    overflow: hidden;
    zoom: 0.95;
}
.navigation_header{
    background: transparent;
}
.logo_header{
     background: transparent;
}
.btn{
    cursor: pointer;       
}
</style>
<body>
    <?php
    // Receber os dados do formulario
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    
    // Verificar se o usuario clicou no botao
    if (!empty($dados['SalvarFoto'])) {
        $arquivo = $_FILES['foto_usuario'];
        //var_dump($dados);
        //var_dump($arquivo);
        
        // Criar a QUERY cadastrar no banco de dados
        $query_usuario = "INSERT INTO pecas (nome_usuario, valor_usuario, mm_usuario, largura_usuario, altura_usuario, material_usuario, empressa_usuario, email_usuario, foto_usuario, created) VALUES (:nome_usuario, :valor_usuario, :mm_usuario, :largura_usuario, :altura_usuario, :material_usuario, :empressa_usuario, :email_usuario, :foto_usuario, NOW())";
        $cad_usuario = $conn->prepare($query_usuario);
        $cad_usuario->bindParam(':nome_usuario', $dados['nome_usuario'], PDO::PARAM_STR);
        $cad_usuario->bindParam(':valor_usuario', $dados['valor_usuario']);
        $cad_usuario->bindParam(':mm_usuario', $dados['mm_usuario']);
        $cad_usuario->bindParam(':largura_usuario', $dados['largura_usuario']);
        $cad_usuario->bindParam(':altura_usuario', $dados['altura_usuario']);
        $cad_usuario->bindParam(':material_usuario', $dados['material_usuario']);
        $cad_usuario->bindParam(':empressa_usuario', $dados['empressa_usuario']);
        $cad_usuario->bindParam(':email_usuario', $dados['email_usuario']);
        $cad_usuario->bindParam(':foto_usuario', $arquivo['name'], PDO::PARAM_STR);
        $cad_usuario->execute();

        // Verificar se cadastrou com sucesso
        if ($cad_usuario->rowCount()) {
            // Verificar se o usuario esta enviando a foto
            if ((isset($arquivo['name'])) and (!empty($arquivo['name']))) {
                // Recuperar ultimo ID inserido no banco de dados
                $ultimo_id = $conn->lastInsertId();
                
                // Diretorio onde o arquivo sera salvo
                $diretorio = "imagens/$ultimo_id/";
                
                // Criar o diretorio
                mkdir($diretorio, 0755);
                
                // Upload do arquivo
                $nome_arquivo = $arquivo['name'];
                move_uploaded_file($arquivo['tmp_name'], $diretorio . $nome_arquivo);
                
                $_SESSION['msg'] = "<p style='color: #90ee90;'>Usuário e a foto cadastrada com sucesso!</p>";
                header("Location: index.php");
            } else {
                $_SESSION['msg'] = "<p style='color: #90ee90;'>Usuário cadastrado com sucesso!</p>";
                header("Location: index.php");
            }
        } else {
            echo "<p style='color: #f00;'>Erro: Usuário não cadastrado com sucesso!</p>";
        }
    }
    ?>
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
            <a href="index.php" class="active">Lista</a>
            <a href="../Orçamento/index.php">Orçamento</a>
            <a href="../Clientes/senhaconfg.php">Clientes</a>
            <a href="../Estoque/sistema.php" >Estoque</a>
            <a href="../Cadastro/sair.php">Sair</a>
        </div>
    </div><br>
    <divtabindex="0" class="content" onfocus="closeSidebar()" id="content">
        <!---->
    <h2 style='color: white; left: -1%; position: relative; font-size: 40px; font-family: Brush Script MT, Brush Script Std, cursive;'
    >Upload Foto</h2><br>

    <form name="cad_usuario" method="POST" action="" enctype="multipart/form-data">
    <div class="input-group input-group mb-3">
        <label class="input-group-text" id="inputGroup-sizing">Nome: </label>
        <input style="background: white;" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing" name="nome_usuario" id="nome_usuario" placeholder="Nome completo da peça a ser salva" autofocus required>
    </div>

    <form name="cad_usuario" method="POST" action="" enctype="multipart/form-data">
    <div class="input-group input-group mb-3">
        <label class="input-group-text" id="inputGroup-sizing">Valor: </label>
        <span style="background: white;" class="input-group-text" id="inputGroup-sizing">R$</span>
        <input style="background: white;" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing" name="valor_usuario" id="valor_usuario" placeholder="Valor referente a cada peça" autofocus required>
    </div>

    <form name="cad_usuario" method="POST" action="" enctype="multipart/form-data">
    <div class="input-group input-group mb-3">    
        <label class="input-group-text" id="inputGroup-sizing">Ø(mm): </label>
        <input style="background: white;" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing" name="mm_usuario" id="mm_usuario" placeholder="Medida da circuferencia, não obrigatório" autofocus>
    </div>

    <form name="cad_usuario" method="POST" action="" enctype="multipart/form-data">
    <div class="input-group input-group mb-3">
        <label class="input-group-text" id="inputGroup-sizing">Largura: </label>
        <input style="background: white;" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing" name="largura_usuario" id="largura_usuario" placeholder="Medida referente a largura da peça, não obrigatório" autofocus>
    </div>

    <form name="cad_usuario" method="POST" action="" enctype="multipart/form-data">
    <div class="input-group input-group mb-3">
        <label class="input-group-text" id="inputGroup-sizing">Altura: </label>
        <input style="background: white;" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing" name="altura_usuario" id="altura_usuario" placeholder="Medida referente a altura da peça" autofocus required>
    </div>

    <form name="cad_usuario" method="POST" action="" enctype="multipart/form-data">
    <div class="input-group input-group mb-3">
        <label class="input-group-text" id="inputGroup-sizing">Material: </label>
        <input style="background: white;" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing" name="material_usuario" id="material_usuario" placeholder="Material utilizado ao fabricar a peça de referencia, não obrigatório" autofocus>
    </div>

    <form name="cad_usuario" method="POST" action="" enctype="multipart/form-data">
    <div class="input-group input-group mb-3">
        <label class="input-group-text" id="inputGroup-sizing">Empressa: </label>
        <input style="background: white;" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing" name="empressa_usuario" id="empressa_usuario" placeholder="Nome completo da enpressa que pediu a peça em uma orçamento, não obrigatório" autofocus >
    </div>
    
    <div class="input-group mb-3">
        <label class="input-group-text" id="basic-addon1">E-mail: </label>
        <span style="background: white;" class="input-group-text" id="basic-addon1">@</span>
        <input value="<?php echo "$logado";?>"
    style="background: white;" type="email" class="form-control" name="email_usuario" id="email_usuario" placeholder="O melhor e-mail" aria-label="Username" aria-describedby="basic-addon1" required>
    </div>
    
    <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupFile01">Upload</label>
        <input type="file" class="form-control" name="foto_usuario" id="foto_usuario" required>
    </div>

        <input class="btn-primary btn-lg" style="background: #1e90ff; color: white;" type="submit" value="Cadastrar" name="SalvarFoto">

    </form>
        <!---->
    </div tabindex=>
    <!--Barra Supreior-->
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
<!--Barra superiro-->
</body>

</html>