<?php 
    // Inicia a sessão
    session_start();
	include_once('config.php');
?>
<html lang='pt-BR'>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pro Steel Soluções Em Usinagem De Precisão Eireli</title>
        <!--Bootstrap-->
        <script src="https://code.jquery.com/jquery.js"></script>
        <script src="bootstrap/js/formatapreco.js"></script>
        <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="./bootstrap/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="./bootstrap/css/style.css">
        <script src="bootstrap/js/bootstrap.js"></script>   
        <style>
			body{
                background: linear-gradient( to right ,RGB(4, 124, 194), RGB(96, 196, 254));
				text-align: right;
                color: white;
                font-size: 9pt;
                zoom: 1;
            }
            input{
                background-color: white;
                color: black;
            }
            .e{
                position: relative;
                left: 50%;
                font-size: 9pt;
            }
            .navbar-brand{
                right: 88%;  
                top: 20%; 
                position: relative;
                align-items: center;
            }
            .inf{
                color: black;
                font-size: 9pt;
                position: relative;
                text-align: left;
                align-items: center;
                border-radius: 10px;  
                top: 20%;
            }
            .prazo{
                position: absolute;
                top: 15%;
                right: 2%;
                text-align: right;
                color: black;
            }
            .infprosteel{
                color: black;
                font-size: 9pt;
                top: 35%;
                position: absolute;
                right: 2%;
                text-align: right;
            }
            .data{
                color: black;
                position: relative;
                text-align: center;
                top: 50%;
                left: 0%;
            }
            @media(max-width: 2000px){     
            }
        </style>   
    </head>
    <body class="infoorçamento">
        <?php
        if (empty($_SESSION['cesta'])) {
            echo"<span style='position: relative; top: 200px; right: 10%; color: red; font-size:40pt;'>
            ATENÇÃO: Orçamento já foi enviado ou não existe ainda!</span>";
        } else {
            echo"
            <nav style='background: rgba(0, 0, 0, 0.5)'
            class='navbar navbar-expand-lg navbar-dark bg'>
            <div class='container-fluid'>   
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNavDarkDropdown' aria-controls='navbarNavDarkDropdown' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarNavDarkDropdown'>
            <ul class='navbar-nav'>
            <li class='nav-item dropdown'>
            <a>
            <form class='inf' method='POST' action='imprimir.php'>
            <input type='text' name='pesquisar' placeholder='Para qual empresa e o orçamento'>
            <input class='btn btn-dark click-trigger' type='submit' value='+'>
            </form>
            <div class='btn-group'>
            <button href='#' class='btn btn-primary click-trigger' data-click-id='click-001'>Orçamento:</button>
            <button class='btn btn-success' click-trigger'
            onclick='gerarPdf()'>Gerar PDF</button>
            <button style='color: white;'
            class='btn btn-info' click-trigger'
            onclick='imprimir()'>Imprimir</button>
            <div></a></li></ul></div></div></nav>
            ";      
            echo"<div class='impessaopdf'>";
            echo "<a class='navbar-brand' href='/'>
            <img src='img/logo.png'/></a>";
            $cabeca = " <h2 style='position: relative; text-align: center; color: black;'>
            Orçamento:
            <span style='rigth: 60%; top: 10%; position: absolute;'
            id='click-001'></span></h2>" .
            "<table border='1' class='table table-striped' >" .
            "<tr style='color: black;' class='table-light'><td>QUANT.</td><td>DESCRIÇÃO</td><td>P.UNITÁRIO</td><td>P.TOTAL</td></tr>";
            //Inicia a vari�vel $total para fazer a soma
            $total = 0;
            //$corpo=array();
            foreach ($_SESSION['cesta'] as $indice) {
                foreach ($indice as $indice2) {
                    $total = $total + $indice2[4];
                    $corpo = "<tr class='table-light'>
                    <td>" . $indice2[1] . "</td>
                    <td>" . $indice2[2] . "</td><td>R$ " . $indice2[3] . "</td>
                    <td>R$ " . $indice2[4] . "</td>";
                }  
                @$tudo = $tudo . $corpo . "</tr>";
            }
            echo $message ="<div class='infprosteel'>Endereço: Artur Nogueira - SP ,Rua jose Sampaio Pires, 378 - Galpão <br>"."Bairro: Parque Industrial Itamaraty - CEP:13.160-000"."<br>"."Telefone/Fax: (19)3827-4238 // 3217-0287"."<br>"."E-mail: contato.prosteel@gmail.com<br>"."</div>";
            
            $totalgeral = "<tr class= 'table-light'; style='color: black;'><td></td><td></td><td>TOTAL DO ORÇAMENTO</td><td>R$ " . number_format($total, 2, '.', ' ') . "</td></tr>" . "</table>";
            
            $pesquisar = $_POST['pesquisar'];
            $result_cursos = "SELECT * FROM informacao WHERE empresa LIKE '%$pesquisar%' LIMIT 5";
            $resultado_cursos = mysqli_query($conexao, $result_cursos);
            
            while($rows_cursos = mysqli_fetch_array($resultado_cursos)){
                echo "<div class='inf'> Informações da Empresa: <br>".$rows_cursos['empresa']."<br>".' CNPJ/CPF: '.$rows_cursos['cnpj']."<br>".' Estado: '.$rows_cursos['estado']."<br>".' Endereço: '.$rows_cursos['endereço']."<br>".' Telefone: '.$rows_cursos['telefone']."<br>".' CEP: '.$rows_cursos['cep']."<br>".'Bairro: '.$rows_cursos['bairro']."<br>".' E-mail: '.$rows_cursos['gmail']."<br>".'Contato: '.$_SESSION['c']."<br>".'<br><br>'."</div>";
            }
            
            $hoje = date('d/m/Y' ) ;
                echo "<div class='data'>".$hoje."</div>";
                echo $prazo ="<div class='prazo'><br>Prazo de entrega: ".$_SESSION['pe']."<br> Pagto: ".$_SESSION['pp']."<br>Tipo de Pagamento: ".$_SESSION['tp']."<br>Forma de Pagamento: ".$_SESSION['fp']."</div>";
                echo $t = "<div>".$cabeca . $tudo . $totalgeral."</div>";
            
            }
            echo"</div>";
        ?>
         <ul class="nav navbar-nav">
             <li>
                 <a style="color: white;"
             href="./index.php" >Voltar</a>  
            </li>
            </ul>
            <??>
</body>

<!--Criar PDF-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            //pegar valor da div 
            const item = document.querySelector(".impessaopdf");

            function gerarPdf()
                { 
                //Estilo PDF
                var opt = {
                    margin: 1,
                    filename: "Orçamento.pdf",
                    html2canvas: { scale: 2 },
                    jsPDF: { unit: "mm", format: "a4", orientation: "landscape" },
                };
                //Gerando PDF
                html2pdf().set(opt).from(item).output('dataurlnewwindow').save();
                }

            function imprimir()
                { 
                //Estilo PDF
                var opt = {
                    margin: 1,
                    filename: "Orçamento.pdf",
                    html2canvas: { scale: 2 },
                    jsPDF: { unit: "mm", format: "a4", orientation: "landscape" },
                };
                //Gerando PDF
                html2pdf().set(opt).from(item).output('dataurlnewwindow');
                print(item);
                }
        </script>
        <script>
        </script>        
        <script>
        /*Codigo que envia valor para contador.php para adicionar mais um*/
                var clicks = document.querySelectorAll('.click-trigger');
                for(var i = 0; i < clicks.length; i++){
	             clicks[i].onclick = function(){
		            var id = this.getAttribute('data-click-id');
		            var post = 'id='+id;
		            var req = new XMLHttpRequest();
		            req.open('POST', 'contador0.php', true);
		            req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		            req.onreadystatechange = function(){
			            if (req.readyState != 4 || req.status != 200) return; 
			            document.getElementById(id).innerHTML = req.responseText;
			            };
		            req.send(post);
		            }
	            }
        </script>   
</html>