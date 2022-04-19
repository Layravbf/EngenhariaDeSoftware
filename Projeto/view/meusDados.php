<?php
  include_once("../persistence/connection.php");
  include_once("../persistence/usuarioDAO.php");
  include_once("../Model/Usuario.php");
  session_start();

  $email = $_SESSION['emailLogin'];
  $senha = $_SESSION['senhaLogin'];
?>

<!doctype html>
<html lang="pt">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/meusDados.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Meus Dados</title>
  </head>
  <body>
    <div style="width: 300px; height: 80px; bottom: 10px; right: 5px; position: fixed;" id="alert">
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
    <div class="nav">
      <a class="nav-b" href="home.html"><img style="width: 20px; height: 20px" src="images/seta.png"></img></a>
      <form style="height: 0" action="..\controller\C_excluirUsuario.php" method="POST">
        <div style="margin-top: 0 !important;" class="form-group">
          <button style="border: none; background-color: transparent" type="submit" class="nav-b">Excluir meus dados</button>
        </div>
      </form>
      <a class="nav-b" href="index.php">Sair</a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="..\controller\C_alterarMeusDados.php" method="POST">
                    <div class="form-group input">
                      <input type="email" class="form-control" id="exampleInputEmail1" name="email" value = "<?php echo $email ?>" required>
                    </div>
                    <div class="form-group input">
                      <input type="password" class="form-control" id="exampleInputPassword1" name="senha" value = "<?php echo $senha ?>" required>
                    </div>
                    <div class="form-group">
                      <button style="width: 160px" type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>
            </div>
            <div class="img col">
                <img style="width: 70%; height: 70%" src="images/meusDados.png"></img>
            </div>
        </div>
    </div>
  </body>
</html>