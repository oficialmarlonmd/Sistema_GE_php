<?php
//iniciar sessão
session_start();
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

    <title>Sistema GE</title>
</head>

<body>

    <div class="container">
        <div class="jumbotron mt-3">
            <h1>Sistema de Gerenciamento de Escolar</h1>
            <p class="lead">Gerencie sua escola com um clique.
            </p>
        </div>
    </div>

    <!-- Login do sistema-->

    <div class="container">
        <div class="jumbotron mt-3">
            <fieldset>
                <legend>
                    <h1 class="h3 mb-3 font-weight-normal">Acesso ao Sistema</h1>
                </legend>
                <form class="form-signin" action="controle.php" method="post">
                    <div class="form-group">
                        <label for="inputEmail" class="sr-only">Endereço de email</label>
                        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Seu email"
                            required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="sr-only">Senha</label>
                        <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha"
                            required>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" name="entrar"
                        value="entrar">Entrar</button>
                </form>
            </fieldset>
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
</body>

</html>