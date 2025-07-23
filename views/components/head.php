<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/styles/style.css">
  <title>Home</title>
</head>

<?php
  if(isset($_SESSION['mensagem'])) {
    ?> <div class="alerta"> <?=$_SESSION['mensagem']?> </div> <?php
    unset($_SESSION['mensagem']);
  }
?>