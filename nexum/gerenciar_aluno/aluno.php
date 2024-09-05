<?php 

    // consulta a tabela aluno
    $sql_aluno = "SELECT *
                FROM aluno
                WHERE id_aluno =" . $_REQUEST["idaluno"];

    $res_aluno = $conexao->query($sql_aluno);
    $row_aluno = $res_aluno->fetch_object();
    $qtd_aluno = $res_aluno->num_rows;

    $sql_nascimento = "SELECT DATE_FORMAT(data_nascimento, '%d/%m/%Y') 
                        AS data_formatada 
                        FROM aluno 
                        WHERE id_aluno=".$_REQUEST["idaluno"];
    $res_nascimento = $conexao->query($sql_nascimento);
    $row_nascimento = $res_nascimento->fetch_object();

    switch ($_REQUEST["info"]) {
        case 'ver_mais':
            echo "<h1>Informações Qualitativas</h1>";
            echo "Cota: " . $row_aluno->cota . "   ";
            echo "Acompanhamento AEE: " . $row_aluno->acompanhamento_aee . "<br>";
            echo "Acompanhamento CAI: " . $row_aluno->acompanhamento_cai . "   ";
            echo "Acompanhamento de Saúde " . $row_aluno->acompanhamento_saude . "<br>";
            echo "Auxílio Permanência: " . $row_aluno->auxilio_permanencia . "   ";
            echo "Apoio Psicológico: " . $row_aluno->apoio_psicologico . "<br>";
            echo "Projeto de Ensino: " . $row_aluno->projeto_ensino . "   ";
            echo "Projeto de Extensão: " . $row_aluno->projeto_extensao . "<br>";
            echo "Projeto de Pesquisa: " . $row_aluno->projeto_pesquisa . "   ";
            echo "Estágio Extracurricular: " . $row_aluno->estagio . "<br>";
            echo "Equipamentos Emprestados: " . $row_aluno->equip_emprest . "<br>";

            if($_SESSION["categoria"]==1 || $_SESSION["categoria"]==2){
                echo "<button onclick=\"location.href='?page=editar_aluno&idaluno=" . $row_aluno->id_aluno . "&idturma=". $row_aluno->id_turma ."&r=aluno';\">Editar</button>";
                echo " <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar_aluno&acao=excluir&idaluno=".$row_aluno->id_aluno."&idturma=". $row_aluno->id_turma ."';}else{false;}\"'>Excluir</button><br>";
            }
            else{
                echo "<br>";
            }
   
            
            break;
        
        case 'simplificada':
            echo "<br><img src=\"../gerenciar_aluno/foto_upload/". $row_aluno->foto."\"/>";
            echo $row_aluno->nome . " ";
            echo $row_aluno->email_institucional . "  ";
            if(($row_aluno->moradia != "Não") || ($row_aluno->moradia != "não")){
                echo $row_aluno->moradia . "<br>";
            }
            else{
                echo "<br>";
            }
            echo "Gênero: ".$row_aluno->genero . " ";
            echo "Data de Nascimento: " . $row_nascimento->data_formatada . "<br>";
            echo "Cidade: " . $row_aluno->cidade . " - " . $row_aluno->unidade_federativa . " ";
            echo "Matrícula: " . $row_aluno->numero_matricula;
            echo "<br><button onclick=\"location.href='?page=aluno&info=ver_mais&idaluno=" . $row_aluno->id_aluno . "&idturma=". $_REQUEST["idturma"] ."';\">Ver mais</button>";
            break;
    }


?>