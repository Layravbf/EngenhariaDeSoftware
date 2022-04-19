<?php
  session_start();
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

    <title>Adicionar Disciplina</title>
  </head>
  <body>
    <div style="width: 300px; height: 80px; bottom: 10px; right: 5px; position: fixed;" id="alert">
      <div>
        <?php
          if(isset($_SESSION['erroDisciplina'])):
        ?>
        <div style="margin-right: 0; position: absolute;" class="alert alert-danger" role="alert">
          O nome deve possuir no máximo 50 caracteres.
        </div>
        <?php
          unset($_SESSION['erroDisciplina']);
          endif;
          
        ?>
      </div>
    </div>
    <div style="width: 300px; height: 80px; bottom: 10px; right: 5px; position: fixed;" id="alert">
      <div>
        <?php
          if(isset($_SESSION['erroProfessor'])):
        ?>
        <div style="margin-right: 0; position: absolute;" class="alert alert-danger" role="alert">
          O campo professor deve possuir no máximo 50 caracteres.
        </div>
        <?php
          unset($_SESSION['erroProfessor']);
          endif;
          
        ?>
      </div>
    </div>
    <div style="width: 300px; height: 80px; bottom: 10px; right: 5px; position: fixed;" id="alert">
      <div>
        <?php
          if(isset($_SESSION['erroDiscEProf'])):
        ?>
        <div style="margin-right: 0; position: absolute;" class="alert alert-danger" role="alert">
          O nome e o campo professor devem possuir no máximo 50 caracteres.
        </div>
        <?php
          unset($_SESSION['erroDiscEProf']);
          endif;
          
        ?>
      </div>
    </div>
    <div class="nav">
      <a class="nav-b" href="disciplinas.php"><img style="width: 20px; height: 20px" src="images/seta.png"></img></a>
      <a class="nav-b" href="index.php">Sair</a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="..\controller\C_adicionarDisciplina.php" method="POST">
                    <div class="form-group input">
                      <input type="text" class="form-control" placeholder="Disciplina" name="nomeDisciplina" required>
                    </div>
                    <div class="form-group input">
                      <input type="text" class="form-control" placeholder="Professor" name="professor">
                    </div>
                    <div class="form-group input">
                        <input type="text" class="form-control" placeholder="Nota Final" name="notaFinal">
                    </div>
                    <div class="form-group">
                      <button style="width: 160px" type="submit" class="btn btn-primary">Adicionar</button>
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