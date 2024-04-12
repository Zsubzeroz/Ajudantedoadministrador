<?php
/**
 * @copyright  Copyright (C) 2012 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @autor      Sandy da Silva Santos
 */
session_start();
include_once('config.php');

/*$logado = $_SESSION['email'];*/

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
<html lang="pt-BR">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="Criar orçamento, fazer orçamento online, orçamento online" />
        <meta name="description" content="Crie orçamentos para seus cliente de forma fácil, rápida e objetiva e o melhor é grátis" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Crie orçamentos para seus clientes online e grátis ferramenta para MEI,Autônomos e Micro Empresários</title>    
        <!-- Bootstrap -->
        <script src="https://code.jquery.com/jquery.js"></script>
        <script src="bootstrap/js/formatapreco.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="bootstrap/css/layout.css">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            //Função js para formatar o preço
            function init()
            {
                $(document).ready(function() {
                    $('#input2').priceFormat({
                        prefix: '',
                        centsSeparator: ',',
                        thousandsSeparator: '.',
                        clearPrefix: 'true'
                        
                    });
                });
                
            }
            
            $(document).ready(init);
            
            $(function() {
                $('#input').bind('keydown', soNums); // o "#input" é o input que vc quer aplicar a funcionalidade
            });
            $(function() {
                $('#input2').bind('keydown', soNums); // o "#input" é o input que vc quer aplicar a funcionalidade
            });
            
            function soNums(e) {
                
                //teclas adicionais permitidas (tab,delete,backspace,setas direita e esquerda)
                keyCodesPermitidos = new Array(8, 9, 37, 39, 46);
                
                //numeros e 0 a 9 do teclado alfanumerico
                for (x = 48; x <= 57; x++) {
                    keyCodesPermitidos.push(x);
                }
                
                //numeros e 0 a 9 do teclado numerico
                for (x = 96; x <= 105; x++) {
                    keyCodesPermitidos.push(x);
                }
                
                //Pega a tecla digitada
                keyCode = e.which;
                
                //Verifica se a tecla digitada é permitida
                if ($.inArray(keyCode, keyCodesPermitidos) != -1) {
                    return true;
                }
                return false;
            }
        </script>     
 
        <script>
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
            
            ga('create', 'UA-48342615-1', 'orcamentus.com.br');
            ga('send', 'pageview');
            </script>
    <style>
        body{
            overflow-x: hidden;
            font-size: 10pt;
        }
        form{
            height: 100%;
            width: 100%;
        }
        input, select{
            height: 37px;
        }
        @media(max-width: 2000px){
        .collapse{
            position: relative;
            left: 10%;
        }
        body{
            zoom: 0.70;
        }
        }
    </style>

</head>
<body style="            background: linear-gradient( to right ,RGB(4, 124, 194), RGB(96, 196, 254));">        
    <center>
    <nav style="background: rgba(0, 0, 0, 0.5)"
    class="navbar navbar-expand-lg navbar-dark bg">
    <div class="container-fluid">
    <a class="navbar-brand" href="/">
    <img src="img/logo.png"/></a>   
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 Menu
                </a>
                <a class="navbar-brand" href="https://mail.google.com/mail/u/0/?tab=km#inbox">
                Enviar por e-mail</a>
                <a class="navbar-brand" href="https://web.whatsapp.com">
                Enviar por WhatsApp</a>
                <a class="navbar-brand click-trigger" href="mensagem.php" data-click-id="click-001">
                Imprimir Página</a>
                <a class="navbar-brand" href="destroisessao.php">
                Limpar o orçamento</a>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li><?php
                    echo "<u  style='color: white;'>Olhe referencias antes de criar seu orçamento!</u>";
                    ?></li>
                    <li><a href="../Cadastro/senhaconfg.php">Funcionarios</a></li>
                    <li><a href="../Clientes/senhaconfg.php">Clientes</a></li>
                    <li><a href="../Estoque/sistema.php">Estoque</a></li>
                    <li><a href="../Pecas/index.php">Tabela de Preços</a></li>
                    <li><a href="../Cadastro/sair.php">Sair</a></li>                
                </ul>
                </li>
                </ul>
                </div>
                <a class="navbar-brand" href="#">
    </div>
</nav>        
            <form id="formulario" method="post"  role="form" action="insere.php">
                <!-- Grade contendo o cliente e empresa -->
                    <div class="row">
                    <div class="col-md-6">
                    <label style="position: relative;left: 10px; top: 10px; color: white;"
                    for="cliente">Forma de Pagamento:</label>
                    <select
                     name="fp" class="form-control" for="cliente" value="<?php echo @$_SESSION['fp'];?>"required>
                        <option value="Nenhum" selected>Nenhum</option>
                        <option value="Pagamento à Vista"> à Vista</option>
                        <option value="Pagamento à Prazo"> à Prazo</option>
                    </select> 
                    </div>
                    <div class="col-md-6">
                    <label style="position: relative; top: 10px; color: white;"
                     for="cliente">Tipo de Pagamento:</label>
                    <select
                    name="tp" class="form-control" for="cliente" value="<?php echo @$_SESSION['tp'];?>" required>
                        <option value="Nenhum" selected>Nenhum</option>
                        <option value="Dinheiro">Dinheiro</option>
                        <option value="Cheque">Cheque</option>
                        <option value="Cartão de Crédito">Cartão de Crédito</option>
                        <option value="Cartão de Débito">Cartão de Débito</option>
                        <option value="Cédito da lojaoption">Cédito da lojaoption</option>
                        <option value="Vale Alimentação">Vale Alimentação</option>
                        <option value="Vale Refeição">Vale Refeição</option>
                        <option value="Vale Presente">Vale Presente</option>
                        <option value="Vale Combústivel">Vale Combústivel</option>
                        <option value="Boleto Bancário">Boleto Bancário</option>
                        <option value="Déposito Bancario">Déposito Bancario</option>
                        <option value= "Pagamento Instantânio (PIX)">Pagamento Instantânio (PIX)</option>
                        <option value="Trasferência Bancária, Carteira Digital">Trasferência Bancária, Carteira Digital</option>
                        <option value="Programa de Fidelidade,Cashback,Crédito Virtual">Programa de Fidelidade,Cashback,Crédito Virtual</option>
                        <option value="Pagamento Parcelado (PIX)">Pagamento Parcelado (PIX)</option>
                        <option value="Sem Pagamento">Sem Pagamento</option>
                        <option value="Outro">Outro</option>
                    </select>
                    </div>
                    <div class="col-md-6">
                        <span><br></span>
                        <label for="cliente"></label>
                        <input type="text" class="form-control" name="pe" placeholder="Prazo de entrega:" value="<?php echo @$_SESSION['pe'];?>"required>
                    </div>
                    <div class="col-md-6">
                        <span><br><br></span>
                        <label for="cliente"></label>
                        <input type="text" class="form-control" name="pp" placeholder="Prazo Pagto:" value="<?php echo @$_SESSION['pp'];?>"required>
                    </div>
                    <div class="col-md-6">
                        <span></span>
                        <label for="cliente"></label>
                        <input type="text" class="form-control" name="c" placeholder="Contato" value="<?php echo @$_SESSION['c'];?>"required>
                    </div>       
                </div>
                    <!-- Grade contendo os campos para inserir valores no orçamento -->
                    <div class="row">
                        <div class="col-md-6">
                            <span><br></span>
                            <label for="cliente"></label>
                            <input type ="text"  name="descricao" placeholder="Produto ou serviço" class="form-control" required>
                        </div>
                        <div class="col">
                            <span><br></span>
                            <label for="cliente"></label>
                            <select class="form-control" name="unidade">            
                                <option value="un" selected>un</option>
                                <option value="mt">m</option>
                                <option value="kg">kg</option> 
                                <option value="l">l</option>
                            </select>
                        </div>
                        <div class="col">
                            <span><br></span>
                            <label for="cliente"></label>
                            <input type ="text"   name="quant" id="input" placeholder="Quantidade" class="form-control" required>
                        </div>
                        <div class="col">
                            <span><br></span>
                            <label for="cliente"></label>
                            <div class="input-group">
                                <span style="color: white;">R$</span>
                                <input type="text" id="input2" name="p_unitario" class="form-control" placeholder="Preço unitário" required>
                            </div>
                        </div><br><br>
                <!-- Botão Inserir no orçamento -->
                <br><br>
                    <div class="btn-group">
                        <button style="position: absolute; width: 300px;"
                        value="ENVIAR" type="submit" class="btn btn-primary">
                        Inserir no orçamento</button>
                    </div>
            </form><br><br><br>
        <?php
        include"valoresSessao.php";
        ?>
        
    </center>
        </body>

        <!--Codigo que envia valor para contador.php para adicionar mais um-->
        <script>
        var clicks = document.querySelectorAll('.click-trigger'); // IE8
        for(var i = 0; i < clicks.length; i++){
	        clicks[i].onclick = function(){
		        var id = this.getAttribute('data-click-id');
		        var post = 'id='+id; // post string
		        var req = new XMLHttpRequest();
		        req.open('POST', 'contador.php', true);
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
                    