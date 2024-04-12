<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pesquisar</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="shortcut icon" href="../Imagens/favicon.png" type="image/x-icon">
</head>
	<style>
		body{
			background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
			overflow: hidden;
			overflow-y: auto;
			zoom: 0.70;
		}
		.inf{
			position: relative;
			top: 30%;
			text-align: center;
			color: white;
		}
		h2, form{
			position: relative;
			top: 12%;
			color: white;
		}
		.header,
    	.navigation_header{
        	display: flex;
        	flex-direction: row;
        	align-items: center;
    	}
    	.header{
        	background-color: var(--color-dark2);
        	justify-content: space-between;
        	padding: 0 10%;
        	height: 3.5em;
        	box-shadow: 1px 1px 4px var(--color-dark4);
    	}
		.navigation_header{
       		 background: transparent;
    	}
    	.logo_header{
        	background: transparent;
    	}
		td, th{
        	background: transparent; 
        	-align: center;
		}
		.tabela{
        	max-width: 90%;
        	min-width: 1%;
        	max-height: 30pc;
        	overflow: auto;
        	align-items: center;
        	margin: 0 auto;
    	}
	</style>
<body>
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
            <a href="#">Configurações</a>
            <a href="../Cadastro/sair.php">Sair</a>
		</div>
	</div>
</body>
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
<?php
	include_once "conexao.php";

	$conn = mysqli_connect($host, $user, $pass, $dbname ,$port);
	
	$pesquisar = $_POST['pesquisar'];
	$result_cursos = "SELECT * FROM pecas WHERE nome_usuario LIKE '%$pesquisar%' LIMIT 5";
	$resultado_cursos = mysqli_query($conn, $result_cursos);
	
	echo "<br><br><br><br>";
	echo "<h2 style='color: white; left: -1%; position: relative; font-size: 40px; font-family: Brush Script MT, Brush Script Std, cursive;'>Lista de Preços</h2>";
	echo "<br>";
	echo "<form method='POST' action='pesquisar.php'>
	         Pesquisar:<input style='background: white;' type='text' name='pesquisar' placeholder='PESQUISAR'>
	         <input class='btn-primary' type='submit' value='🔎'>
        </form>";
	echo "<br>";

	while($rows_cursos = mysqli_fetch_array($resultado_cursos)){
echo "<div class='tabela'>";
echo "<table class='table text-white table-dark table-bg'>";
echo "<thead>";
    echo "<tr>";
    echo 	"<th class='upid' scope='col'>ID:</th>";
    echo 	"<th class='upnome' scope='col'>Nome:</th>";
    echo    "<th class='upvalor' scope='col'>Valor:</th>";
    echo    "<th class='upØmm' scope='col'>Ø(mm):</th>";
    echo    "<th class='uplargura' scope='col'>Largura:</th>";
    echo    "<th class='upaltura' scope='col'>Altura:</th>";
    echo    "<th class='upmaterial' scope='col'>Material:</th>";
    echo    "<th class='upempressa' scope='col'>Empressa:</th>";
    echo    "<th class='upemail' scope='col'>E-mail:</th>";
    echo   "<th class='updata' scope='col'>data de criação:</th>";
    echo    "<th class='upfoto' scope='col'>Foto:</th>";
    echo	"<th class='up...' scope='col'>...</th>";
   echo "</tr>";
echo "</thead>";
echo "<tbody>";
		echo "<tr class='inf'>";
        echo "<td class='id' ><br><br>".$rows_cursos['id']."</td>";
        echo "<td class='nome' ><br><br>".$rows_cursos['nome_usuario']."</td>";
        echo "<td class='valor' ><br><br>".$rows_cursos['valor_usuario']."</td>";
        echo "<td class='mm' ><br><br>".$rows_cursos['mm_usuario']."</td>";
        echo "<td class='largura' ><br><br>".$rows_cursos['largura_usuario']."</td>";
        echo "<td class='altura' ><br><br>".$rows_cursos['altura_usuario']."</td>";
        echo "<td class='material' ><br><br>".$rows_cursos['material_usuario']."</td>";
        echo "<td class='empressa' ><br><br>".$rows_cursos['empressa_usuario']."</td>";
        echo "<td class='email' ><br><br>".$rows_cursos['email_usuario']."</td>";
        echo "<td class='created' ><br><br>".$rows_cursos['created']."</td>";
		echo "<td class='foto' ><br><br>".$rows_cursos['foto_usuario'].'<br>'."<img src='imagens/" . $rows_cursos['id'] . "/" . $rows_cursos['foto_usuario'] ."' width='140'>"."</td>";
        echo "<td><div class='btn-group-vertical'>
            <a class='btn btn-sm btn-danger' href='delete.php?id=".$rows_cursos['id']."' title='Deletar'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
            <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
            <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
            </svg>
            </a>
            <a class='btn btn-sm btn-primary' href='edit.php?id=".$rows_cursos['id']."' title='Editar'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='curentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
            </svg>
            </a>
            <a class='btn btn-sm btn-primary' href='porcentagem.php?id=".$rows_cursos['id']."' title='Aumentar o preço em % '>
            Cotação
            </a>
            ";
        echo "
            <a class='btn btn-primary' href='imagens/".$rows_cursos['id']."/".$rows_cursos['foto_usuario']."' title='Download' >Download</a>
            <a class='btn btn-primary' href='visualizar.php?id=".$rows_cursos['id']."' title='Visualizar' >Visualizar</a></div></td>";
        echo "</tr>";
		echo "</tbody>";
		}?>
	</table>
</div>