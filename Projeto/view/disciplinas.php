<?php
include_once("../persistence/connection.php");
session_start();
$emailLogin = $_SESSION['emailLogin'];

$conexao = new connection();
$conexao->connect();

$sqlQuery = "SELECT disciplina, professor, nota_final FROM disciplinas WHERE `disciplinas`.`email_fk` = '". $emailLogin ."'";
$resultSet = mysqli_query($conexao->getConn(), $sqlQuery) or die("database error:". mysqli_error($conexao->getConn()));
?>
<!doctype html>
<html lang="pt">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/tabelas.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Disciplinas</title>
  </head>
  <body>
    <div class="nav">
        <a class="nav-b" href="home.html"><img style="width: 20px; height: 20px" src="images/seta.png"></img></a>
        <a class="nav-b" href="index.php">Sair</a>
    </div>
    <div id="pag" class="container">
      <div id="title" class="row">
        <b>Disciplinas</b>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Disciplina</th>
            <th scope="col">Professor</th>
            <th scope="col">Nota Final</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php while( $disciplina = mysqli_fetch_assoc($resultSet)){ ?>
            <td> <a class="nav-b" href="atividadePorDisciplina.php?nomeDisciplina=<?php echo $disciplina ['disciplina']; ?>"><?php echo $disciplina ['disciplina']; ?></a> </td>
            <td><?php echo $disciplina ['professor']; ?></td>
            <td><?php echo $disciplina ['nota_final']; ?></td>
            <td style="width: 150px;">
              <a class="buttons" href="editarDisciplinas.php?nomeDisciplina=<?php echo $disciplina ['disciplina']; ?>">Editar</a>
              <a class="buttons" href="..\controller\C_excluirDisciplina.php?nomeDisciplina=<?php echo $disciplina ['disciplina']; ?>">Excluir</a>
            </td>
            </tr>
          <?php } ?>
	      </tbody>
      </table>
    </div>
  </body>
</html>