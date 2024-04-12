<script language=javascript>
senha = 'ProSite';
alert('Bem - Vindo!')
senhadig = prompt("Digite a senha fornecida pela empressa para continuar","")
top.location.href='sistema.php'
if (senha != senhadig){
alert('Acesso negado!');
top.location.href='senha.php';

}
</script>