<?php 

    switch ($_REQUEST["acao"]) {
        case 'cadastrar':
            $numero = $_POST["numero"];
            $ano = $_POST["ano"];
            $curso = $_POST["curso"];

            $sql = "INSERT INTO turma (numero, ano, id_curso)
                    VALUES ('{$numero}', '{$ano}', '{$curso}')";

            $res = $conexao->query($sql);
            
            if($res == true){
                echo "<script>alert('Cadastrado com sucesso!');</script>";
                echo "<script>location.href='?page=';</script>";
            }

            else{
                echo "<script>alert('Não foi possível cadastrar!');</script>";
                echo "<script>location.href='?page=';</script>";
            }
            break;
    }


?>