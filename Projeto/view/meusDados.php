<?php
  include_once("../persistence/connection.php");
  include_once("../persistence/usuarioDAO.php");
  include_once("../Model/Usuario.php");
  session_start();

  $email = $_SESSION['emailLogin'];
  $senha = $_SESSION['senhaLogin'];

  // $email = $_SESSION['email'];
  // $senha = $_SESSION['senha'];

  // $email = $_GET['codigo'];

  // $_SESSION['email'] = $email;

  // $usuario = new Usuario($email, '');

  // $con = new connection();
  // $con->connect();

  // $usuarioDAO = new usuarioDAO();

  // $aux = $usuarioDAO->consultar($usuario, $con->getConn());
  // while($row = mysqli_fetch_row($aux)){
  //   $email = "'".$row[0]."'";
  //   $senha = "'".$row[1]."'";
  // }

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

    <title>Meus Dados</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="..\controller\C_alterarMeusDados.php" method="POST">
                    <div class="form-group">
                      <input type="email" class="form-control" id="exampleInputEmail1" name="email" value = "<?php echo $email ?>" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="exampleInputPassword1" name="senha" value = "<?php echo $senha ?>" required>
                    </div>
                    <div class="form-group">
                      <button style="width: 160px" type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>
            </div>
            <div class="col">
                <img style="width: 80%; height: 80%" src="images/meusDados.png"></img>
            </div>
        </div>
    </div>
  </body>
</html>