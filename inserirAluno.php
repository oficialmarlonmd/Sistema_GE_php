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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
            <h3>Inserir aluno</h3>
        </div>

        <form method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control" id="inputEmail4" placeholder="Seu nome">
                </div>
                <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" id="inputPassword4"
                        placeholder="seu@email.com">
                </div>
            </div>
            <div class="form-group">
                <label>CPF</label>
                <input type="text" name="cpf" class="form-control" id="inputAddress" placeholder="000.000.000-00">
            </div>
            <div class="form-group">
                <label>celular</label>
                <input type="text" name="celular" class="form-control" id="inputAddress2" placeholder="">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Data Nascimento</label>
                    <input type="date" name="data_nascimento" class="form-control" id="">
                </div>
            </div>
            <button type="submit" name="inserir" value="inserir" class="btn btn-primary">Inserir</button>
            <button type="reset" class="btn btn-secondary">Limpar</button>
        </form>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalSalvar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
    <div class="modal fade" id="modalErro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <?php if ($msg == 'SIM') { ?>
        <!-- mostrar modal -->
        <script>
            $('#modalSalvar').modal('show')
        </script>
    <?php } ?>

    <?php if ($msg == 'NAO') { ?>
        <!-- mostrar modal -->
        <script>
            $('#modalErro').modal('show')
        </script>
    <?php } ?>

</body>

</html>