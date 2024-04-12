<?php
if(isset($_POST['submit']))
    {
        include_once('config.php');

        $peça = $_POST['peça'];
        $quantidade = $_POST['quantidade'];
        $valorunit = $_POST['valorunit'];
        $fornecedor = $_POST['fornecedor'];

        $result = mysqli_query($conexao, "INSERT INTO tabela(peça,quantidade,valorunit,fornecedor) 
        VALUES ('$peça','$quantidade','$valorunit','$fornecedor')");
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Imagens/favicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Formulário | ProSteel</title>
    <style>
         body{
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient( to right ,RGB(4, 124, 194), RGB(96, 196, 254));
            zoom: 0.99;
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
            width: 30%
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
                <legend><b>Fórmulário de Estoque</b></legend>
                <br>
                <div class="d-flex">
                    <a style="color: white;" href="./Foto/upload.php">
                        <img style="width: 50px;"  src="./imagens/photo_115144.png" alt="Adicione Fotos">
                    </a>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="peça" id="peça" class="inputUser" required>
                    <label for="peça" class="labelInput">Descrição</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="number" name="quantidade" id="quantidade" class="inputUser" required>
                    <label for="quantidade" class="labelInput">Quantidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="number" name="valorunit" id="valorunit" class="inputUser" required>
                    <label for="valorunit" class="labelInput">Valor Unit</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="fornecedor" id="fornecedor" class="inputUser" required>
                    <label for="fornecedor" class="labelInput">fornecedor</label>
                </div>
                <br><br><br>
                    <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>