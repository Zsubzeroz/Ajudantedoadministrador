<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pesquisar</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
		body{
			background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
			overflow: hidden;
			overflow-y: auto;
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
			<a href="http://localhost/Prosteel/Or%C3%A7amento/index.php">Orçamento</a>
			<a href="../sistema.php" >Estoque</a>
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
	session_start();
	include_once "conexao.php";

	$conn = mysqli_connect($host, $user, $pass, $dbname ,$port);
	
	$pesquisar = $_POST['pesquisar'];
	$result_cursos = "SELECT * FROM usuarios WHERE nome_usuario LIKE '%$pesquisar%' LIMIT 5";
	$resultado_cursos = mysqli_query($conn, $result_cursos);
	
	echo "<br><br>";
	echo "<h2 style='color: white;'>Listar Fotos de Estoque</h2>";
	echo "<br><br>";
	echo "<form method='POST' action='pesquisar.php'>
	         Pesquisar:<input style='background: white;' type='text' name='pesquisar' placeholder='PESQUISAR'>
	         <input class='btn-primary' type='submit' value='ENVIAR'>
        </form>";
	echo "<br><br>";

	while($rows_cursos = mysqli_fetch_array($resultado_cursos)){
		echo "<div class='inf'> ID: ".$rows_cursos['id'].'<br>'.'Nome: '.$rows_cursos['nome_usuario']."<br>".' E-mail: '.$rows_cursos['email_usuario']."<br>".' data de criação: '.$rows_cursos['created'].'<br>'.' Foto: '.$rows_cursos['foto_usuario'].'<br>'."<img src='imagens/" . $rows_cursos['id'] . "/" . $rows_cursos['foto_usuario'] ."' width='140'>".'<br><br>'."</div>";
	}?>