<?php
  $sucesso = $_GET['sucesso'] ?? null;
  $cadastrar = $_GET['cadastro'] ?? null;
  $materia_cadastro = $_GET['materia_cadastro'] ?? null;

  $user_logout = $_GET['user_logout'] ?? null;
  if ($user_logout === 'true') {
    echo "<script>alert('Usuário Deslogado com sucesso!')</script>";
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="../style/login.css">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container" style="display: flex; flex-direction: column;">
      <?php
        if ($cadastrar === 'true') {
          echo "<div class='alert alert-success' role='alert'>
                  Usuário cadastrado com sucesso! Faça login!
                </div>";
        }
        if ($sucesso === 'false') {
          echo "<div class='alert alert-danger' role='alert'>
                  Erro ao realizar Login!
                </div>";
        }

        if ($materia_cadastro === 'true') {
          echo "<div class='alert alert-success' role='alert'>
                  Matéria cadastrada com sucesso!
                </div>";
        }else if($materia_cadastro === 'false'){
          echo "<div class='alert alert-danger' role='alert'>
                  Faça Login para realizar o cadastro de matérias!
                </div>";
        }
      ?>
      <h2>Faça login para organizar suas <span>Tarefas</span></h2>
        <form class="row g-3 needs-validation" method="post" action="../php/login.php">
            <div class="col-md-12">
              <label for="validationCustomUsername" class="form-label">Usuario</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required name="nome_usuario">
                <div class="invalid-feedback">
                  Por favor insira um usuário válido.
                </div>
                <div class="valid-feedback">
                    Muito bom!
                  </div>
              </div>
            </div>
            <div class="col-md-12">
              <label for="validationCustom05" class="form-label">Senha</label>
              <input type="password" class="form-control" id="validationCustom05" required name="senha_usuario">
              <div class="invalid-feedback">
                Por favor insira uma senha válida.
              </div>
              <div class="valid-feedback">
                Muito bom!
              </div>
            </div>
            <div class="submit col-12">
                <a href="./cadastro.php">Cadastre-se agora</a><br>
              <button class="btn btn-primary" type="submit">Login</button>
            </div>
          </form>
    </div>

      <script src="../script/validation-form-login.js" defer></script>
</body>
</html>