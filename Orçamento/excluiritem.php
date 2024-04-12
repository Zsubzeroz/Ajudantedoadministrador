<?php
session_start();
$item = $_GET['id'];
echo $item;
unset($_SESSION['cesta'][$item]);
?>
<script>
    location.href = "../Orçamento/index.php";
</script>