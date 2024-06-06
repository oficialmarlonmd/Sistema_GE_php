<?php
//iniciar sessão
session_start();

//incluir o controle
include_once("controle.php");

//testar sesão
if ($_SESSION['logado'] == false) {
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <title>Sistema GE</title>
</head>

<body>
    <!-- Login do sistema-->
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="#">SGE</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="principal.php"><i class="bi bi-house-fill"></i> <span class="sr-only">(atual)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-person-fill"></i> Aluno</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="consultarAluno.php"><i class="bi bi-search"></i>
                                Consultar</a>
                            <a class="dropdown-item" href="inserirAluno.php"><i class="bi bi-file-plus-fill"></i>
                                Inserir</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="bi bi-person-workspace"></i>
                            Professor</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="consultarProfessor.php"><i class="bi bi-search"></i>
                                Consultar</a>
                            <a class="dropdown-item" href="inserirProfessor.php"><i class="bi bi-file-plus-fill"></i>
                                </i> Inserir</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="bi bi-table"></i>
                            Turma</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="consultarTurma.php"><i class="bi bi-search"></i>
                                Consultar</a>
                            <a class="dropdown-item" href="inserirTurma.php"><i class="bi bi-file-plus-fill"></i>
                                </i> Inserir</a>
                        </div>
                    </li>
                </ul>

                <form class="form-inline my-2 my-lg-0" action="controle.php" method="post">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="sair"><i class="bi bi-box-arrow-right"></i></button>
                </form>
            </div>
        </nav>
    </div>
    <br>
    <div class="container-fluid">
        <div class="jumbotron">
            <h3>Consultar Turma</h3>
            <form action="" method="post">
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" name="turma" class="form-control" id="inputEmail4" placeholder="Digite a Turma">
                </div>
                <button type="submit" name="consultarturma" value="consultarturma" class="btn btn-primary">Consultar</button>
            </form>
        </div>

        <table class="table table-bordered" id="example">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Turma</th>
                    <th scope="col">Turno</th>
                    <th scope="col">Professor</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($turmas as $value) { ?>

                    <tr>
                        <th scope="row">
                            <?php print $value['id_turma']; ?>
                        </th>
                        <td>
                            <?php print $value['turma']; ?>
                        </td>
                        <td>
                            <?php print $value['turno']; ?>
                        </td>
                        <td>
                            <?php print $value['professor']; ?>
                        </td>

                        <td>
                            <!-- Modal para delete -->
                            <!-- Botão para acionar modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#id<?php print $value['id_turma']; ?>">
                                <i class="bi bi-trash"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="id<?php print $value['id_turma']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Deseja realmente excluir essa turma?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <?php print $value['id_turma']; ?>
                                            <br>
                                            <?php print $value['turma']; ?>

                                        </div>
                                        <div class="modal-footer">
                                            <form action="" method="post">
                                                <input type="hidden" name="id_turma" value="<?php print $value['id_turma']; ?>">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                <button type="submit" name="deletarturma" value="deletarturma" class="btn btn-danger">Excluir</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fim Modal para Alterar -->
                            <!-- Modal para delete -->
                            <!-- Botão para acionar modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#id_alterar<?php print $value['id_turma']; ?>">
                                <i class="bi bi-pencil-square"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="id_alterar<?php print $value['id_turma']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="" method="post">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Alaterar Turma?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group col-md-6">
                                                    <label>Turma</label>
                                                    <input type="text" name="turma" value="<?php print $value['turma']; ?>" class="form-control" id="inputPassword4" placeholder="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Professor</label>
                                                    <input type="text" name="professor" value="<?php print $value['professor']; ?>" class="form-control" id="inputAddress2" placeholder="">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="id_turma" value="<?php print $value['id_turma']; ?>">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                <button type="submit" name="alterarturma" value="alterarturma" class="btn btn-primary">Alterar</button>
                                    </form>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="modalSalvar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Informação!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-success" role="alert">
                                                Salvo com sucesso!
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="modalErro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Alerta!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-danger" role="alert">
                                                Erro!
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
    </div>
    </div>
    <!-- Fim Modal para alterar -->

    </td>

    </td>
    </tr>
<?php } ?>

</tbody>
</table>
</div>

<!-- JavaScript (Opcional) -->
<!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<script>
    new DataTable('#example');
</script>

<?php if ($msg == 'SIM') { ?>
    <script>
        $('#modalSalvar').modal('show')
    </script>
<?php } ?>

<?php if ($msg == 'NAO') { ?>
    <script>
        $('#modalErro').modal('show')
    </script>
<?php } ?>

</body>

</html>