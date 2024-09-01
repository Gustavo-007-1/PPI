<?php 
    switch ($_REQUEST["acao"]) {
        case 'cadastrar':
            $nome = $_POST["nome"];
            $data_nascimento = $_POST["data_nascimento"];
            $numero_matricula = $_POST["numero_matricula"];
            $email = $_POST["email"];
            $cidade = $_POST["cidade"];
            $uf = $_POST["uf"];
            $reprovacoes = $_POST["quant_repro"];
            $moradia = $_POST["moradia"];
            $turma = $_POST["turma"];

            $sql = "INSERT INTO aluno (nome, numero_matricula, email_institucional, cidade, data_nascimento, unidade_federativa, moradia, quant_reprovacao, id_turma)
                    VALUES ('{$nome}', '{$numero_matricula}', '{$email}', '{$cidade}', '{$data_nascimento}', '{$uf}', '{$moradia}', '{$reprovacoes}', '{$turma}')";

            $res = $conexao->query($sql);
            
            if($res == true){
                echo "<script>alert('Cadastrado com sucesso!');</script>";
                echo "<script>location.href='?page=turma&id=". $_REQUEST["idturma"] ."';</script>";
            }

            else{
                echo "<script>alert('Não foi possível cadastrar!');</script>";
                echo "<script>location.href='?page=turma&id=". $_REQUEST["idturma"] ."';</script>";
            }
            break;

        case 'editar':
            $nome = $_POST["nome"];
            $data_nascimento = $_POST["data_nascimento"];
            $numero_matricula = $_POST["numero_matricula"];
            $email = $_POST["email"];
            $cidade = $_POST["cidade"];
            $uf = $_POST["uf"];
            $reprovacoes = $_POST["quant_repro"];
            $moradia = $_POST["moradia"];
            $turma = $_POST["turma"];
            $cota = $_POST["cota"];
            $genero = $_POST["genero"];
            $aee = $_POST["acompanahmento_aee"];
            $cai = $_POST["acompanahmento_cai"];
            $saude = $_POST["acompanahmento_saude"];
            $auxilio_permanencia = $_POST["auxilio_permanencia"];
            $apoio_psicologico = $_POST["apoio_psicologico"];
            $extensao = $_POST["projeto_extensao"];
            $pesquisa = $_POST["projeto_pesquisa"];
            $ensino = $_POST["projeto_ensino"];
            $estagio = $_POST["estagio"];
            $equip_emprest = $_POST["equip_emprest"];
            
            $sql = "UPDATE aluno
                    SET
                        nome = '{$nome}',
                        numero_matricula = '{$numero_matricula}',
                        email_institucional = '{$email}',
                        genero = '{$genero}',
                        cidade = '{$cidade}',
                        data_nascimento = '{$data_nascimento}',
                        unidade_federativa = '{$uf}',
                        moradia = '{$moradia}',
                        quant_reprovacao = '{$reprovacoes}',
                        acompanhamento_aee = '{$aee}',
                        acompanhamento_cai = '{$cai}',
                        acompanhamento_saude= '{$saude}',
                        cota = '{$cota}',
                        auxilio_permanencia = '{$auxilio_permanencia}',
                        apoio_psicologico = '{$apoio_psicologico}',
                        projeto_extensao = '{$extensao}',
                        projeto_pesquisa = '{$pesquisa}',
                        projeto_ensino = '{$ensino}',
                        equip_emprest = '{$equip_emprest}',
                        estagio = '{$estagio}',
                        id_turma = '{$turma}'

                    WHERE id_aluno=" . $_REQUEST["idaluno"];

            $res = $conexao->query($sql);


            if($res == true){
                echo "<script>alert('Editado com sucesso!');</script>";
                if($_REQUEST["r"]=="aluno"){
                    echo "<script>location.href='?page=aluno&idaluno=". $_REQUEST["idaluno"] ."&idturma=".$_REQUEST["idturma"]."&info=ver_mais';</script>";
                }
                else{
                    echo "<script>location.href='?page=turma&id=". $_REQUEST["idturma"] ."';</script>";
                }
            }

            else{
                echo "<script>alert('Não foi possível editar!');</script>";
                if($_REQUEST["r"]=="aluno"){
                    echo "<script>location.href='?page=aluno&idaluno=". $_REQUEST["idaluno"] ."&idturma=".$_REQUEST["idturma"]."';</script>";
                }
                else{
                    echo "<script>location.href='?page=turma&id=". $_REQUEST["idturma"] ."';</script>";
                }
            }

            break;
        
        case 'excluir':
            $sql = "DELETE FROM aluno
                        WHERE id_aluno=" . $_REQUEST["idaluno"];
                
                $res = $conexao->query($sql);

                if($res == true){
                    echo "<script>alert('Excluído com sucesso!');</script>";
                    echo "<script>location.href='?page=turma&id=". $_REQUEST["idturma"] ."';</script>";
                }
    
                else{
                    echo "<script>alert('Não foi possível excluir!');</script>";
                    echo "<script>location.href='?page=turma&id=". $_REQUEST["idturma"] ."';</script>";
                }
                break;
            break;

    }
?>