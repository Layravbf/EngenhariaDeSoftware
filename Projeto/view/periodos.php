<?php
include_once("../persistence/connection.php");
session_start();
$emailLogin = $_SESSION['emailLogin'];
$txtPesquisa = (isset($_GET["pesquisa"])) ? $_GET["pesquisa"] : "" ;

$conexao = new connection();
$conexao->connect();


if($txtPesquisa != ''){
  $sqlQuery = "SELECT periodo, aprovacao FROM periodos WHERE `periodos`.`periodo` LIKE '%{$txtPesquisa}%' AND `periodos`.`email_fk` = '". $emailLogin ."'";
} else{
  $sqlQuery = "SELECT periodo, aprovacao FROM periodos WHERE `periodos`.`email_fk` = '". $emailLogin ."'";
}

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

    <title>Períodos</title>
  </head>
  <body>
    <div style="width: 250px; height: 80px; position: fixed; bottom: 10px !important; right: 5px;">
      <div>
        <?php
          if(isset($_SESSION['periodoAlterado'])):
        ?>
        <div style="margin-right: 0; position: absolute" class="alert alert-success" role="alert">
          Período alterado com sucesso!
        </div>
        <?php
          endif;
          unset($_SESSION['periodoAlterado']);
        ?>
      </div>
    </div>
    <div style="width: 250px; height: 80px; position: fixed; bottom: 10px !important; right: 5px;">
      <div>
        <?php
          if(isset($_SESSION['periodoExcluido'])):
        ?>
        <div style="margin-right: 0; position: absolute" class="alert alert-success" role="alert">
          Período excluído com sucesso!
        </div>
        <?php
          endif;
          unset($_SESSION['periodoExcluido']);
        ?>
      </div>
    </div>
    <div style="width: 250px; height: 80px; position: fixed; bottom: 10px !important; right: 5px;">
      <div>
        <?php
          if(isset($_SESSION['periodoAdicionado'])):
        ?>
        <div style="margin-right: 0; position: absolute" class="alert alert-success" role="alert">
          Período adicionado com sucesso!
        </div>
        <?php
          endif;
          unset($_SESSION['periodoAdicionado']);
        ?>
      </div>
    </div>
    <div style="width: 250px; height: 80px; position: fixed; bottom: 10px !important; right: 5px;">
      <div>
        <?php
          if(isset($_SESSION['pJaAdicionado'])):
        ?>
        <div style="margin-right: 0; position: absolute" class="alert alert-danger" role="alert">
          Período já adicionado!
        </div>
        <?php
          endif;
          unset($_SESSION['pJaAdicionado']);
        ?>
      </div>
    </div>
    <div class="nav">
        <a class="nav-b" href="home.html"><img style="width: 20px; height: 20px" src="images/seta.png"></img></a>
        <a class="nav-b" href="adicionarPeriodo.php">Adicionar Periodo</a>
        <a class="nav-b" href="index.php">Sair</a>
    </div>
    <form action="periodos.php" style="display: flex; justify-content:center; padding-top: 4%" role="search">
      <div class="form-group">
          <input type="text" class="form-control" placeholder="Pesquisar..." name="pesquisa">
      </div>
      <button style="background-color: #638DCC" type="submit" class="btn btn-default">
        <svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>     
      </button>
    </form>
    <div id="pag" class="container">
      <div id="title" class="row">
        <b>Períodos</b>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Período</th>
            <th scope="col">Aprovação</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php while( $periodo = mysqli_fetch_assoc($resultSet)){ ?>
            <td> <a class="nav-b" href="disciplinaPorPeriodo.php?nomePeriodo=<?php echo $periodo ['periodo']; ?>"><?php echo $periodo ['periodo']; ?></a> </td>
            <td><?php echo $periodo ['aprovacao']; ?></td>
            <td style="width: 150px;">
              <a class="buttons" href="editarPeriodo.php?nomePeriodo=<?php echo $periodo ['periodo']; ?>">Editar</a>
              <a class="buttons" href="..\controller\C_excluirPeriodo.php?nomePeriodo=<?php echo $periodo ['periodo']; ?>">Excluir</a>
            </td>
            </tr>
          <?php } ?>
	      </tbody>
      </table>
    </div>
  </body>
</html>