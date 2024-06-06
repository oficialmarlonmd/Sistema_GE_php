<?php
//incluir dao
include_once("dao.php");

//acões
$msg = null;
if (isset($_POST['inserir'])) {
    $msg = null;

    $result = inserirAluno($_POST['nome'], $_POST['cpf'], $_POST['email'], $_POST['data_nascimento'], $_POST['celular']);
    if ($result == true) {
        $msg = 'SIM';
    } else {
        $msg = 'NAO';
    }
}

//consultar aluno
$aluno = array();
if (isset($_POST['consultar'])) {


    $alunos = consultarAluno($_POST['nome']);
}

//alterar
$aluno = array();
if (isset($_POST['alterar'])) {
    $msg = null;

    $result = alterarAluno($_POST['id_aluno'], $_POST['celular'], $_POST['email']);
}

//Deletar
$aluno = array();
if (isset($_POST['deletar'])) {
    $msg = null;

    $result = deletarAluno($_POST['id_aluno']);
}
//funções
function nome($parametro)
{
    //código

}

function nome2($parametro)
{
    //código

    //retorno
    return $parametro;
}

//acões professor
$msg = null;
if (isset($_POST['inserirprofessor'])) {
    $msg = null;

    $result = inserirProfessor($_POST['nome'], $_POST['email'], $_POST['celular'], $_POST['diciplina']);
    if ($result == true) {
        $msg = 'SIM';
    } else {
        $msg = 'NAO';
    }
}

//consultar professor
$professores = array();
if (isset($_POST['consultarprofessor'])) {


    $professores = consultarProfessor($_POST['nome']);
}
//alterar professor
$professor = array();
if (isset($_POST['alterarprofessor'])) {
    $msg = null;

    $result = alterarProfessor($_POST['id_professor'], $_POST['celular'], $_POST['email']);
}

//Deletar
$professor = array();
if (isset($_POST['deletarprofessor'])) {
    $msg = null;

    $result = deletarProfessor($_POST['id_professor']);
}

//login
if (isset($_POST['entrar'])) {

    $result = login($_POST['email'], $_POST['senha']);

    //verificar o login
    if (sizeof($result) == 0) {
        $_SESSION['logado'] = false;
        header('Location:index.php');
    } else {
        $_SESSION['logado'] = true;
         header('Location:principal.php');
    }
}

//acões turma
$msg = null;
if (isset($_POST['inserirturma'])) {
    $msg = null;

    $result = inserirTurma($_POST['turma'], $_POST['turno'], $_POST['professor']);
    if ($result == true) {
        $msg = 'SIM';
    } else {
        $msg = 'NAO';
    }
}

//consultar turma
$turmas = array();
if (isset($_POST['consultarturma'])) {


    $turmas = consultarTurma($_POST['turma']);
}
//alterar professor
$turma = array();
if (isset($_POST['alterarturma'])) {
    $msg = null;

    $result = alterarTurma($_POST['id_turma'], $_POST['turma'], $_POST['professor']);
}

//Deletar
$turma = array();
if (isset($_POST['deletarturma'])) {
    $msg = null;

    $result = deletarTurma($_POST['id_turma']);
}

?>