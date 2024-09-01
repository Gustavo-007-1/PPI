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
        

        case 'editar':
            $numero = $_POST["numero"];
            $conselheiro = $_POST["conselheiro"];
            $curso = $_POST["curso"];
            $ano = $_POST["ano"];

            $sql = "UPDATE turma
                    SET
                        numero = '{$numero}',
                        ano = '{$ano}',
                        conselheiro = '{$conselheiro}',
                        id_curso = '{$curso}'
                    WHERE id_turma=" . $_REQUEST["idturma"];

            $res = $conexao->query($sql);

            if($res == true){
                echo "<script>alert('Editado com sucesso!');</script>";
                if($_REQUEST["r"]=="turma"){
                    echo "<script>location.href='?page=turma&idturma=".$_REQUEST["idturma"]."';</script>";
                }
                else{
                    echo "<script>location.href='?page=';</script>";
                }
            }

            else{
                echo "<script>alert('Não foi possível editar!');</script>";
                if($_REQUEST["r"]=="turma"){
                    echo "<script>location.href='?page=turma&idturma=".$_REQUEST["idturma"]."';</script>";
                }
                else{
                    echo "<script>location.href='?page=';</script>";
                }
            }
            break;

        case 'excluir':
            $sql = "DELETE FROM turma
                        WHERE id_turma=" . $_REQUEST["id"];
                
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