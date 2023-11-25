<?php
  require_once('../../Controllers/usuarioController.php');

  $usuarioController = new UsuarioController();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>

    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="../style/login.css">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
        <form method="post" class="row g-3 needs-validation" novalidate>
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
                <label for="validationCustom02" class="form-label">Email</label>
                <input type="email" class="form-control" id="validationCustom02" placeholder="exemplo@ex.com" required name="email_usuario">
                <div class="valid-feedback">
                  Muito bom!
                </div>
                <div class="invalid-feedback">
                    Por favor insira um email válido.
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
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                  Aceito os termos e condições.
                </label>
                <div class="invalid-feedback">
                    Você deve concordar antes de enviar.
                </div>
              </div>
            </div>
            <div class="submit col-12">
                <a href="./login.php">Já tem conta? Faça login agora</a><br>
              <button class="btn btn-primary" type="submit" onclick="<?= $usuarioController->adicionarUsuario()?>">Cadastrar</button>
            </div>
          </form>
    </div>

      <script src="../script/validation-form-login.js" defer></script>
</body>
</html>