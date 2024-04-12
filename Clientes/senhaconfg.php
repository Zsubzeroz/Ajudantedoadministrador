<script language=javascript>
senha = 'ProSite';
alert('Bem - Vindo ao sistema de registro de clientes!')
senhadig = prompt("Digite a senha fornecida pela empressa para continuar","")
window.print('Bem Vindo!')
top.location.href='sistema.php'
if (senha != senhadig){
alert('Acesso negado!');
top.location.href='senha.php';

}
</script>