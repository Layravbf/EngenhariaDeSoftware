<?php
  include_once("../persistence/connection.php");
  include_once("../persistence/periodoDAO.php");
  session_start();
  $nomePeriodo = $_GET["nomePeriodo"];
  $_SESSION['nomePeriodo'] = $nomePeriodo;
  $emailLogin = $_SESSION['emailLogin'];

  $conexao = new connection();
  $conexao->connect();

  $periododao = new periodoDAO();
  $res = $periododao->consultar($nomePeriodo, $emailLogin, $conexao->getConn());
  $dados = mysqli_fetch_assoc($res);
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

    <title>Editar Período</title>
  </head>
  <body>
    <div class="nav">
      <a class="nav-b" href="periodos.php"><img style="width: 20px; height: 20px" src="images/seta.png"></img></a>
      <a class="nav-b" href="index.php">Sair</a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="..\controller\C_editarPeriodo.php" method="POST">
                    <div class="form-group input">
                      <input type="text" class="form-control" value = "<?php echo $dados['periodo'] ?>" name="periodo" required>
                    </div>
                    <div class="form-group input">
                      <input type="text" class="form-control" value = "<?php echo $dados['aprovacao'] ?>" name="aprovacao">
                    </div>
                    <div class="form-group">
                      <button style="width: 160px" type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>
            </div>
            <div class="img col">
                <img style="width: 70%; height: 70%" src="images/Periodos.png"></img>
            </div>
        </div>
    </div>
  </body>
</html>