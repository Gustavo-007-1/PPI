<?php
    switch($_REQUEST["acao"]){
        
        case 'cadastrar':
            $nome = $_POST["nome"];
            $cpf = $_POST["cpf"];
            $email = $_POST["email"];
            $categoria = $_POST["categoria"];
            $senha = $_POST["senha"];

            $sql = "INSERT INTO usuario (nome, email, senha, cpf, categoria) 
                    VALUES ('{$nome}', '{$email}', '{$senha}', '{$cpf}', '{$categoria}')";
            
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

        case 'editar':
            $nome = $_POST["nome"];
            $cpf = $_POST["cpf"];
            $email = $_POST["email"];
            $categoria = $_POST["categoria"];
            
            $sql = "UPDATE usuario 
                    SET 
                        nome = '{$nome}',
                        email = '{$email}',
                        cpf = '{$cpf}',
                        categoria = '{$categoria}'

                    WHERE id_usuario=" . $_REQUEST["id"];

            $res = $conexao->query($sql);

            if($res == true){
                echo "<script>alert('Editado com sucesso!');</script>";
                echo "<script>location.href='?page=';</script>";
            }

            else{
                echo "<script>alert('Não foi possível editar!');</script>";
                echo "<script>location.href='?page=';</script>";
            }
            

            break;

        case 'excluir':
            
            $sql = "DELETE FROM usuario WHERE id_usuario=".$_REQUEST["id"];
            
            $res = $conexao->query($sql);

            if($res == true){
                echo "<script>alert('Excluido com sucesso!');</script>";
                echo "<script>location.href='?page=';</script>";
            }

            else{
                echo "<script>alert('Não foi possível excluir!');</script>";
                echo "<script>location.href='?page=';</script>";
            }
            break;
    }
?>