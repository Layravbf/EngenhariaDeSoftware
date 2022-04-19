<?php
include_once("../persistence/connection.php");
session_start();
$emailLogin = $_SESSION['emailLogin'];

$conexao = new connection();
$conexao->connect();

$sqlQuery = "SELECT atividade, tipo, valor, nota FROM atividades WHERE `atividades`.`email_fk` = '". $emailLogin ."'";
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

    <title>Atividades</title>
  </head>
  <body>
    <div class="nav">
        <a class="nav-b" href="home.html"><img style="width: 20px; height: 20px" src="images/seta.png"></img></a>
        <a class="nav-b" href="index.php">Sair</a>
    </div>
    <div id="pag" class="container">
      <div id="title" class="row">
        <b>Atividades</b>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Atividade</th>
            <th scope="col">Tipo</th>
            <th scope="col">Valor</th>
            <th scope="col">Nota</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php while( $atividade = mysqli_fetch_assoc($resultSet)){ ?>
            <td><?php echo $atividade ['atividade']; ?></td>
            <td><?php echo $atividade ['tipo']; ?></td>
            <td><?php echo $atividade ['valor']; ?></td>
            <td><?php echo $atividade ['nota']; ?></td>
            <td style="width: 150px;">
              <a class="buttons" href="editarAtividades.php?nomeAtividade=<?php echo $atividade ['atividade']; ?>">Editar</a>
              <a class="buttons" href="..\controller\C_excluirAtividade.php?nomeAtividade=<?php echo $atividade ['atividade']; ?>">Excluir</a>
            </td>
            </tr>
          <?php } ?>
	      </tbody>
      </table>
    </div>
  </body>
</html>