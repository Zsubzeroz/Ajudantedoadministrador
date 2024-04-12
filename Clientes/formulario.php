<?php
if(isset($_POST['submit']))
    {
        include_once('config.php');

        $empresa = $_POST['empresa'];
        $cnpj = $_POST['cnpj'];
        $estado = $_POST['estado'];
        $endereço = $_POST['endereço'];
        $telefone = $_POST['telefone'];
        $cep = $_POST['cep'];
        $bairro = $_POST['bairro'];
        $gmail = $_POST['gmail'];
        $contato = $_POST['contato'];

        $result = mysqli_query($conexao, "INSERT INTO informacao(empresa,cnpj,estado,endereço,telefone,cep,bairro,gmail,contato) 
        VALUES ('$empresa','$cnpj','$estado','$endereço','$telefone','$cep','$bairro','$gmail','$contato')");
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="../Imagens/favicon.png" type="image/x-icon">
    <title>Formulário | ProSteel</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient( to right ,RGB(4, 124, 194), RGB(96, 196, 254));
            zoom: 0.70;
        }
        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 30%;
        }
        fieldset{
            border: 3px solid dodgerblue;
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
        }
    </style>
</head>
<body>
    <a class="btn btn-outline-light" href="sistema.php">Voltar</a>
    <div class="box">
        <form action="formulario.php" method="POST">
            <fieldset>
                <legend><b>Fórmulário de Clientes</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="empresa" id="empresa" class="inputUser" required>
                    <label for="empresa" class="labelInput">Empresa</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cnpj" id="cnpj" class="inputUser" required>
                    <label for="cnpj" class="labelInput">CPF/CNPJ</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado" class="labelInput">Estado</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereço" id="endereço" class="inputUser" required>
                    <label for="endereço" class="labelInput">Endereço</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">telefone</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cep" id="cep" class="inputUser" required>
                    <label for="cep" class="labelInput">CEP</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="bairro" id="bairro" class="inputUser" required>
                    <label for="bairro" class="labelInput">Bairro</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="gmail" id="gmail" class="inputUser" required>
                    <label for="gmail" class="labelInput">Gmail</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="contato" id="contato" class="inputUser" required>
                    <label for="contato" class="labelInput">Contato</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>