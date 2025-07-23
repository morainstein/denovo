<?php include_once __DIR__ .'/components/head.php' ?>

<body>


  <h1>Cadastro de usuário</h1>
  <form action="/usuario/create" method="post">
    <input type="text" name="nome">
    <input type="text" name="email">
    <input type="password" name="senha">
    <input type="submit" value="Enviar">
  </form>
  
</body>

<?php include_once __DIR__ .'/components/footer.php' ?>