<?php
    include_once('config.php'); 
    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM pecas WHERE id=$id";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $nome_usuario = $user_data['nome_usuario'];
                $valor_usuario = $user_data['valor_usuario'];
                $mm_usuario = $user_data['mm_usuario'];
                $largura_usuario = $user_data['largura_usuario'];
                $altura_usuario = $user_data['altura_usuario'];
                $material_usuario = $user_data['material_usuario'];
                $empressa_usuario = $user_data['empressa_usuario'];
            }
        }
            else
        {
            header('Location: index.php');
        }
    }
        else
    {
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Imagens/estoque.png" type="image/x-icon">
    <title>Formulário | ProSteel</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
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
            width: 20%;
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
    <a href="index.php">Voltar</a>
    <div class="box">
        <form action="saveEdit.php" method="POST">
            <fieldset>
                <legend>Editar Lista</legend>
                <div class="d-flex">
                <div class="inputBox">
                    <input type="text" name="nome_usuario" id="nome_usuario" class="inputUser" value=<?php echo $nome_usuario;?> required>
                    <label for="nome_usuario" class="labelInput">Descrição</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text0" name="valor_usuario" id="valor_usuario" class="inputUser" value=<?php echo $valor_usuario;?> required>
                    <label for="valor_usuario" class="labelInput">Valor</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="mm_usuario" id="mm_usuario" class="inputUser" value=<?php echo $mm_usuario;?> required>
                    <label for="mm_usuario" class="labelInput">Ø(mm):</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="largura_usuario" id="largura_usuario" class="inputUser" value=<?php echo $largura_usuario;?> required>
                    <label for="largura_usuario" class="labelInput">Largura:</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="altura_usuario" id="altura_usuario" class="inputUser" value=<?php echo $altura_usuario;?> required>
                    <label for="altura_usuario" class="labelInput">Altura:</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="material_usuario" id="material_usuario" class="inputUser" value=<?php echo $material_usuario;?> required>
                    <label for="material_usuario" class="labelInput">Material:</label>
                </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="empressa_usuario" id="empressa_usuario" class="inputUser" value=<?php echo $empressa_usuario;?> required>
                    <label for="empressa_usuario" class="labelInput">Empressa:</label>
                </div>
                <br>
                </div>
				<input type="hidden" name="id" value=<?php echo $id;?>>
                <input type="submit" name="update" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>