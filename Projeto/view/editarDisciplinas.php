<?php
  include_once("../persistence/connection.php");
  include_once("../persistence/disciplinaDAO.php");
  session_start();
  $nomeDisciplina = $_GET["nomeDisciplina"];
  $_SESSION['nomeDisciplina'] = $nomeDisciplina;
  $emailLogin = $_SESSION['emailLogin'];
  $periodo = $_SESSION['nomePeriodo'];

  $conexao = new connection();
  $conexao->connect();

  $disciplinadao = new disciplinaDAO();
  $res = $disciplinadao->consultar($nomeDisciplina, $emailLogin, $periodo, $conexao->getConn());
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

    <title>Editar Disciplina</title>
  </head>
  <body>
    <div class="nav">
      <a class="nav-b" href="disciplinaPorPeriodo.php?nomePeriodo=<?php echo $periodo ?>"><img style="width: 20px; height: 20px" src="images/seta.png"></img></a>
      <a class="nav-b" href="index.php">Sair</a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="..\controller\C_editarDisciplina.php" method="POST">
                    <div class="form-group input">
                      <input type="text" class="form-control" value = "<?php echo $dados['disciplina'] ?>" name="disciplina" required>
                    </div>
                    <div class="form-group input">
                      <input type="text" class="form-control" value = "<?php echo $dados['professor'] ?>" name="professor">
                    </div>
                    <div class="form-group input">
                      <input type="text" class="form-control" value = "<?php echo $dados['nota_final'] ?>" name="notaFinal">
                    </div>
                    <div class="form-group">
                      <button style="width: 160px" type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>
            </div>
            <div class="img col">
                <img style="width: 70%; height: 70%" src="images/editarDisciplinas.png"></img>
            </div>
        </div>
    </div>
  </body>
</html>