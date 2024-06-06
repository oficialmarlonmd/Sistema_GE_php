<?php
//iniciar sessão
session_start();

//conectar ao banco de dados
function conectar()
{
    //dados de acesso do mysql
    $host = "localhost";
    $db = 'db_escola';
    $user = 'root';
    $pass = '';

    //conecar no mysql
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $pdo;
    } catch (PDOException $e) {
        print "Não conectado";
        return false;
    }
}

//deletar aluno
function deletarAluno($id_aluno)
{
   //Montar o sql
   $sql = "delete from tb_aluno where id_aluno=$id_aluno";

   // Executar o sql
   try{
   $bd = conectar();
   $query = $bd->prepare($sql);
   $query ->execute();
   return true;
} catch (PDOException $e) {
   return false;
}
}
//Alterar aluno
function alterarAluno($id_aluno, $celular, $email)
{
   //Montar o sql
   $sql = "update tb_aluno set celular='$celular', email='$email' where id_aluno=$id_aluno";

   // Executar o sql
   try{
   $bd = conectar();
   $query = $bd->prepare($sql);
   $query ->execute();
   return true;
} catch (PDOException $e) {
   return false;
}
}

// Inserir aluno
function inserirAluno($nome, $cpf, $email, $data_nascimento, $celular)
{
    //Montar o sql
    $sql = "insert into tb_aluno(nome, cpf, email, data_nascimento, celular)
    values ('$nome', '$cpf', '$email', '$data_nascimento', '$celular')";


    // Executar o sql
    try{
    $bd = conectar();
    $query = $bd->prepare($sql);
    $query ->execute();
    return true;
 } catch (PDOException $e) {
    return false;
 }
}



//consultar aluno
function consultarAluno($aluno)
{
    //montar o sql
    $sql = "select * from tb_aluno where nome like '%$aluno%'";

    #executar o sql
    try {
    $bd = conectar();
    $query = $bd->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
    return false;
    }
}


// Inserir Professor
function inserirProfessor($nome, $email, $celular, $disciplina)
{
    //Montar o sql
    $sql = "insert into tb_professor(nome, email, celular, disciplina)
    values ('$nome', '$email', '$celular', '$disciplina')";


    // Executar o sql
    try{
    $bd = conectar();
    $query = $bd->prepare($sql);
    $query ->execute();
    return true;
 } catch (PDOException $e) {
    return false;
 }
}

//Alterar professor
function alterarProfessor($id_professor, $celular, $email)
{
   //Montar o sql
   $sql = "update tb_professor set celular='$celular', email='$email' where id_professor=$id_professor";

   // Executar o sql
   try{
   $bd = conectar();
   $query = $bd->prepare($sql);
   $query ->execute();
   return true;
} catch (PDOException $e) {
   return false;
}
}
//deletar professor
function deletarProfessor($id_professor)
{
   //Montar o sql
   $sql = "delete from tb_professor where id_professor=$id_professor";

   // Executar o sql
   try{
   $bd = conectar();
   $query = $bd->prepare($sql);
   $query ->execute();
   return true;
} catch (PDOException $e) {
   return false;
}
}

//consultar professor
function consultarProfessor($professor)
{
    //montar o sql
    $sql = "select * from tb_professor where nome like '%$professor%'";

    #executar o sql
    try {
    $bd = conectar();
    $query = $bd->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
    return false;
    }
}


//login
function login($email, $senha)
{
   $sql = "SELECT * FROM tb_usuario where email='$email' and senha=md5('$senha')";

       #executar o sql
       try {
         $bd = conectar();
         $query = $bd->prepare($sql);
         $query->execute();
         return $query->fetchAll(PDO::FETCH_ASSOC);
         } catch (PDOException $e) {
         return false;
         }
   
}

// Inserir turma
function inserirTurma($turma, $turno, $professor)
{
    //Montar o sql
    $sql = "insert into tb_turma(turma, turno, professor)
    values ('$turma', '$turno', '$professor')";


    // Executar o sql
    try{
    $bd = conectar();
    $query = $bd->prepare($sql);
    $query ->execute();
    return true;
 } catch (PDOException $e) {
    return false;
 }
}

//Alterar turma
function alterarTurma($id_turma, $turma, $professor)
{
   //Montar o sql
   $sql = "update tb_turma set turma='$turma', professor='$professor' where id_turma=$id_turma";

   // Executar o sql
   try{
   $bd = conectar();
   $query = $bd->prepare($sql);
   $query ->execute();
   return true;
} catch (PDOException $e) {
   return false;
}
}
//deletar turma
function deletarTurma($id_turma)
{
   //Montar o sql
   $sql = "delete from tb_turma where id_turma=$id_turma";

   // Executar o sql
   try{
   $bd = conectar();
   $query = $bd->prepare($sql);
   $query ->execute();
   return true;
} catch (PDOException $e) {
   return false;
}
}

//consultar turma
function consultarTurma($turma)
{
    //montar o sql
    $sql = "select * from tb_turma where turma like '%$turma%'";

    #executar o sql
    try {
    $bd = conectar();
    $query = $bd->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
    return false;
    }
}


?>