<?php
include_once("../persistence/connection.php");
session_start();
$emailLogin = $_SESSION['emailLogin'];
$disciplina = $_GET['nomeDisciplina'];
$_SESSION['disciplinaAtividade'] = $disciplina;
$periodo = $_SESSION['periodoDisciplina'];

$conexao = new connection();
$conexao->connect();

$sqlQuery = "SELECT atividade, tipo, valor, nota FROM atividades WHERE `atividades`.`email_fk` = '". $emailLogin ."' AND `atividades`.`disciplina_fk` = '". $disciplina ."'";
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
    <div style="width: 250px; height: 80px; position: fixed; bottom: 10px !important; right: 5px;">
      <div>
        <?php
          if(isset($_SESSION['atividadeAlterada'])):
        ?>
        <div style="margin-right: 0; position: absolute" class="alert alert-success" role="alert">
          Atividade alterada com sucesso!
        </div>
        <?php
          endif;
          unset($_SESSION['atividadeAlterada']);
        ?>
      </div>
    </div>
    <div style="width: 250px; height: 80px; position: fixed; bottom: 10px !important; right: 5px;">
      <div>
        <?php
          if(isset($_SESSION['atividadeExcluida'])):
        ?>
        <div style="margin-right: 0; position: absolute" class="alert alert-success" role="alert">
          Atividade excluída com sucesso!
        </div>
        <?php
          endif;
          unset($_SESSION['atividadeExcluida']);
        ?>
      </div>
    </div>
    <div style="width: 250px; height: 80px; position: fixed; bottom: 10px !important; right: 5px;">
      <div>
        <?php
          if(isset($_SESSION['atividadeAdicionada'])):
        ?>
        <div style="margin-right: 0; position: absolute" class="alert alert-success" role="alert">
          Atividade adicionada com sucesso!
        </div>
        <?php
          endif;
          unset($_SESSION['atividadeAdicionada']);
        ?>
      </div>
    </div>
    <div style="width: 250px; height: 80px; position: fixed; bottom: 10px !important; right: 5px;">
      <div>
        <?php
          if(isset($_SESSION['aJaAdicionada'])):
        ?>
        <div style="margin-right: 0; position: absolute" class="alert alert-danger" role="alert">
          Atividade já adicionada!
        </div>
        <?php
          endif;
          unset($_SESSION['aJaAdicionada']);
        ?>
      </div>
    </div> 
    <div class="nav">
        <a class="nav-b" href="disciplinaPorPeriodo.php?nomePeriodo=<?php echo $periodo ?>"><img style="width: 20px; height: 20px" src="images/seta.png"></img></a>
        <a class="nav-b" href="adicionarAtividade.php">Adicionar Atividade</a>
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
            <td><?php $nomeAtividade = $atividade ['atividade']; echo $atividade ['atividade']; ?></td>
            <td><?php echo $atividade ['tipo']; ?></td>
            <td><?php echo $atividade ['valor']; ?></td>
            <td><?php echo $atividade ['nota']; ?></td>
            <td style="width: 150px;">
              <a class="buttons" href="editarAtividade.php?nomeAtividade=<?php echo $nomeAtividade ?>">Editar</a>
              <a class="buttons" href="..\controller\C_excluirAtividade.php?nomeAtividade=<?php echo $nomeAtividade ?>">Excluir</a>
            </td>
            </tr>
          <?php } ?>
	      </tbody>
      </table>
    </div>
  </body>
</html>