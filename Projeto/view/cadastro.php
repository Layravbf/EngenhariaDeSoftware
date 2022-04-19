<?php
  session_start();
?>

<!doctype html>
<html lang="pt">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../view/css/cadastro.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Cadastro</title>
  </head>
  <body>
    <div style="width: 300px" id="alert">
      <div>
        <?php
          if(isset($_SESSION['erroSenha'])):
        ?>
        <div style="margin-right: 0; position: absolute;" class="alert alert-danger" role="alert">
          A senha deve possuir no mínimo 8 caracteres!
        </div>
        <?php
          unset($_SESSION['erroSenha']);
          endif;
          
        ?>
      </div>
    </div>
    <div style="width: 180px" id="alert">
      <div>
        <?php
          if(isset($_SESSION['cadastrado'])):
        ?>
        <div style="margin-right: 0; position: absolute;" class="alert alert-danger" role="alert">
          Email já cadastrado!
        </div>
        <?php
          unset($_SESSION['cadastrado']);
          endif;
          
        ?>
      </div>
    </div>
    <div class="login container">
        <div class="row">
            <div class="img col">
              <img style="width: 70%; height: 70%" src="images/cadastro.png"></img>
            </div>
            <div class="col">
                <h1>IZYNotes</h1>
                <form action="..\controller\C_cadastrarUsuario.php" method="POST">
                    <div class="form-group">
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha" name="senha" required>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                    <div class="form-group">
                      <a class="button" href="index.php">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </body>
</html>