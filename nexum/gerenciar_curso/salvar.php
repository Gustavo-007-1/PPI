<?php
    switch($_REQUEST["acao"]){
        
        case 'cadastrar':
            $nome = $_POST["nome"];
            $carga_horaria = $_POST["carga_horaria"];
            $coordenador = $_POST["coordenador"];


            $sql = "INSERT INTO curso (nome, carga_horaria, coordenador) 
                    VALUES ('{$nome}', '{$carga_horaria}', '{$coordenador}')";
            
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
            $carga_horaria = $_POST["carga_horaria"];
            $coordenador = $_POST["coordenador"];

            $sql = "UPDATE curso
                    SET
                        nome = '{$nome}',
                        carga_horaria = '{$carga_horaria}',
                        coordenador = '{$coordenador}'
                    WHERE id_curso=" . $_REQUEST["id"];

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
                $sql = "DELETE FROM curso
                        WHERE id_curso=" . $_REQUEST["id"];
                
                $res = $conexao->query($sql);

                if($res == true){
                    echo "<script>alert('Excluído com sucesso!');</script>";
                    echo "<script>location.href='?page=';</script>";
                }
    
                else{
                    echo "<script>alert('Não foi possível excluir!');</script>";
                    echo "<script>location.href='?page=';</script>";
                }
                break;
            
    }
?>