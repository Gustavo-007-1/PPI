<?php 
    session_start();
    if(empty($_POST) or (empty($_POST["cpf"]) or (empty($_POST["senha"])))){
        echo "<script>location.href='index.php';</script>";
    }

    include("config.php");

    $cpf = $_POST["cpf"];
    $senha = $_POST["senha"];

    # faz a consulta e seleção no bd
    $sql = "SELECT * FROM usuario
            WHERE cpf = '{$cpf}'
            AND senha = '{$senha}'";

    $res = $conexao->query($sql) or die($conexao->error);
    $row = $res->fetch_object();
    $quantidade = $res->num_rows;

    if($quantidade>0){

        $_SESSION["cpf"] = $cpf;
        $_SESSION["categoria"] = $row->categoria;

        echo "<script>location.href='pagina_principal.php';</script>";

    }

    else{
        echo "<script>alert('Usuario e/ou senha incorretos(s)');</script>";
        echo "<script>location.href='index.php';</script>";
    }
?>