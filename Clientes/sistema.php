<?php
    session_start();
    include_once('config.php');

    $logado = $_SESSION['email'];
    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FrOM informacao WHErE id LIKE '%$data%' or empresa LIKE '%$data%' or telefone LIKE '%$data%' OrDEr BY id DESC";
    }
    else
    {
        $sql = "SELECT * FrOM informacao OrDEr BY id DESC";
    }
    $result = $conexao->query($sql);
    ?>
<!DOCTYPE html>
<html lang="pt-Br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="sistema.css">
        <link rel="shortcut icon" href="../Imagens/favicon.png" type="image/x-icon">
        <title>SISTEMA | ProSteel</title>
        <style>
        body{
            background: linear-gradient( to right ,RGB(4, 124, 194), RGB(96, 196, 254));
            color: white;
            text-align: center;
            max-width: 100%;
            min-width: 1%;
            font-size: 13pt;
            zoom: 0.65;
            overflow: hidden;
        }
		.table-bg{
            background: rgba(115, 115, 115, 0.1);
            border-radius: 15px 15px 0 0;
            max-width: 100%;
            min-width: 1%;
        }
        .box-search{
            display: flex;
            justify-content: center;
            gap: .1%;
        }
        .m-5{
            max-width: 100%;
            min-width: 1%;
            max-height: 30pc;
            overflow: auto;
        }
        @media(max-width: 800px){
        .m-5{
            max-height: 50pc;
        }
       }
        </style>
</head>
<body>
    
    <!--Menu-->
    <div class="menu">
        <input id="chec" type="checkbox">
        <label for="chec">
            <img alt="Icone" id="m" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABsAAAAbCAYAAACN1PRVAAAAAXNSR0IArs4c6QAAAIVJREFUSEvtlMENgDAMA6+TwCYwCpsAmzAKbAKbVOGBeBR4JLSo1JKfteXItSMiXEQvipnJtZOfsQYqgygbsJ51QskGoDcwGwHROpDczCBUWCJ5QaIma4HGwHEB5k8VpAOEWkyA8Lb6WpPL9/9qY75zJasv1EIW/3H1tSalja9dcBfO91N7Rp4SHPqntVgAAAAASUVORK5CYII="/>
    </label>
    <nav>
        <p class="User">
            <img id="user" alt="user" src="../Imagens/user.png"/>
            <br><?php
        echo "<u style='color:white';>$logado</u>";
        ?>
        </p>
        <ul>
          <li><br><br></li>
          <li><a href="../Cadastro/senhaconfg.php">Funcionarios</a></li>
          <li><a href="../Estoque/sistema.php">Estoque</a></li>
          <li><a href="../Orçamento/index.php">Orçamento</a></li>
          <li><a href="../Pecas/index.php">Tabela de Preços</a></li>
          <li><a href="../Cadastro/sair.php">Sair</a></li>        
        </ul>
    </nav>
</div>
<!--Menu fim-->

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SISTEMA DO GN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <br>
    <?php
        echo "<h1
        style='left: -1%; position: relative; font-size: 50px; font-family: Brush Script MT, Brush Script Std, cursive;'
        >Clientes</h1>";
    ?>
    <br>
    <div style="left: 40%;" class="btn-group">
        <a href="formulario.php" class="btn btn-primary me-5">Incluir</a>
    </div>
    <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="curentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div><br><br>
    <div class="m-5">
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">CPF/CNPJ</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">telefone</th>
                    <th scope="col">Cep</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">Gmail</th>
                    <th scope="col">Contato</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($user_data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$user_data['id']."</td>";
                        echo "<td>".$user_data['empresa']."</td>";
                        echo "<td>".$user_data['cnpj']."</td>";
                        echo "<td>".$user_data['estado']."</td>";
                        echo "<td>".$user_data['endereço']."</td>";
                        echo "<td>".$user_data['telefone']."</td>";
                        echo "<td>".$user_data['cep']."</td>";
                        echo "<td>".$user_data['bairro']."</td>";
                        echo "<td>".$user_data['gmail']."</td>";
                        echo "<td>".$user_data['contato']."</td>";
                        echo "<td>
                        <a class='btn btn-sm btn-primary' href='edit.php?id=$user_data[id]' title='Editar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='curentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </a> 
                            <a class='btn btn-sm btn-danger' href='delete.php?id=$user_data[id]' title='Deletar'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='curentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                </svg>
                            </a>
                            </td>";
                        echo "</tr>";
                    }
                    ?>
            </tbody>
        </table>
    </div>
</body>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'sistema.php?search='+search.value;
    }
</script>
</html>