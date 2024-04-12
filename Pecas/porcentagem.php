<?php
session_start();
ob_start();
include_once "conexao.php";
include_once "config.php";

if(!empty($_GET['id']))
{
    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM pecas WHERE id=$id";
    $result = $conexao->query($sqlSelect);
    if($result->num_rows > 0)
    {
        while($user_data = mysqli_fetch_assoc($result))
        {
            $valor_usuario = $user_data['valor_usuario'];
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
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="porcentagem.css">
    <title>Porcentagem</title>
</head>
<body>
    <div class="container">
        <h3>Soma entre</h3>
        <br>
        <form action="saveporcentagem.php" method="POST">
            <div class="inputBox">
                <input type="text" class="totais" id="total0"  value="0"><br>
                <p>% +</p>
                <input type="text" class="totais" id="total1"  value=<?php echo $valor_usuario;?> required>
                <p>=</p>
            </div>
            <input type="text" name="valor_usuario" id="valor_usuario" class="inputUser" value="" required>
            <input type="hidden" name="id" value=<?php echo $id ?>>
            <input style="color:white;" class="btn btn-primary btn-sm" type="submit" name="update" id="submit"> 
        </form> 
        <button class="btn btn-primary btn-lg" onclick="Soma()">Calcular</button>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    function Soma(){

var s1 = document.getElementById("total0").value;
var s2 = document.getElementById("total1").value;
var s1f =  parseInt(s1);
var s2f =  parseInt(s2);
var s3 = ((s2f*s1f)/100);
const s4 = (s1f+s3);

$('#valor_usuario').val((s4).toFixed(3));

    }
</script>
</body>
</html>