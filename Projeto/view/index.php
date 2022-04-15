<?php
  session_start();
?>

<!doctype html>
<html lang="pt">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/cadastro.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
    <div style = "width: 280px" id="alert">
      <div>
        <?php
          if(isset($_SESSION['cadastrado'])):
        ?>
        <div style="margin-right: 0; position: absolute" class="alert alert-success" role="alert">
          Usuário cadastrado com sucesso!
        </div>
        <?php
          endif;
          unset($_SESSION['cadastrado']);
        ?>
      </div>
    </div>
    <div id="alert">
      <div>
        <?php
          if(isset($_SESSION['excluido'])):
        ?>
        <div style="margin-right: 0; position: absolute" class="alert alert-success" role="alert">
          Dados excluídos com sucesso!
        </div>
        <?php
          endif;
          unset($_SESSION['excluido']);
        ?>
      </div>
    </div>
    <div id="alert-success">
      <div>
        <?php
          if(isset($_SESSION['alterado'])):
        ?>
        <div style="margin-right: 0; position: absolute" class="alert alert-success" role="alert">
          Dados alterados com sucesso! Faça login com os novos dados.
        </div>
        <?php
          endif;
          unset($_SESSION['alterado']);
        ?>
      </div>
    </div>
    <div id="alert">
      <div>
        <?php
          if(isset($_SESSION['nao_autenticado'])):
        ?>
        <div style="margin-right: 0; position: absolute" class="alert alert-danger" role="alert">
          Email ou senha incorretos!
        </div>
        <?php
          endif;
          unset($_SESSION['nao_autenticado']);
        ?>
      </div>
    </div>
    <div class="login container">
        <div class="row">
            <div class="col">
                <h1>IZYNotes</h1>
                <form action="..\controller\C_validarLogin.php" method="POST">
                    <div class="form-group">
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha" name="senha" required>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                    <div class="form-group">
                      <a class="button" href="cadastro.php">Cadastrar-se</a>
                    </div>
                </form>
            </div>
            <div class="img col">
                <img style="width: 70%; height: 70%" src="images/login.png"></img>
            </div>
        </div>
    </div>
  </body>
</html>