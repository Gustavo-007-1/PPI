<?php   
        // consulta a tabela da turma
        $sql_turma = "SELECT id_turma, numero, conselheiro, id_curso
                FROM turma
                WHERE id_turma=" . $_REQUEST["idturma"];

        $res_turma = $conexao->query($sql_turma);
        $row_turma = $res_turma->fetch_object();

        // consulta a tabela do curso
        $sql_curso = "SELECT curso.nome, curso.id_curso
                FROM curso, turma
                WHERE turma.id_curso = curso.id_curso 
                AND id_turma=" . $_REQUEST["idturma"];

        $res_curso = $conexao->query($sql_curso);
        $row_curso = $res_curso->fetch_object();

        // consulta a tabela do ano
        $sql_ano = "SELECT ano.ano
                FROM ano, turma
                WHERE turma.ano = ano.ano
                AND id_turma=" . $_REQUEST["idturma"];

        $res_ano = $conexao->query($sql_ano);
        $row_ano = $res_ano->fetch_object();

        // consulta a tabela aluno
        $sql_aluno = "SELECT id_aluno, nome, foto
                FROM aluno
                WHERE aluno.id_turma =" . $_REQUEST["idturma"] . "
                ORDER BY nome ASC";

        $res_aluno = $conexao->query($sql_aluno);
        $qtd_aluno = $res_aluno->num_rows;


        // lista as informacoes da turma
        echo "<div>";
                echo "Turma " . $row_turma->numero ."<br>";
                if($row_turma->conselheiro != NULL){
                        echo "Conselheiro: " . $row_turma->conselheiro;
                }
                echo " Curso: " . $row_curso->nome;
                echo " " . $row_ano->ano . "º ano";
        echo "</div>";

        // exibe as opções do que pode ser feito na turma
          if($_SESSION["categoria"]==1 || $_SESSION["categoria"]==2){
                echo " <button onclick=\"location.href='?page=cadastrar_aluno&idturma=" . $row_turma->id_turma ."';\">Cadastrar Aluno</button>";
                echo "<button onclick=\"location.href='?page=editar_turma&idturma=" . $row_turma->id_turma . "&r=turma';\">Editar Turma</button>";
                
            }
        echo "<button onclick=\"location.href='?page=observacoes&id=" . $row_turma->id_turma . "';\">Observações da Turma</button>";

        // exibe os alunos da respectiva turma
        if($qtd_aluno>0){
                while($row_aluno = $res_aluno->fetch_object()){
                        echo "<br><img src=\"../gerenciar_aluno/foto_upload/". $row_aluno->foto."\"/>";
                        echo "<br><button onclick=\"location.href='?page=aluno&idaluno=" . $row_aluno->id_aluno . "&idturma=". $row_turma->id_turma ."&info=simplificada';\">".$row_aluno->nome."</button>";
                        if($_SESSION["categoria"]==1 || $_SESSION["categoria"]==2){
                                echo "<button onclick=\"location.href='?page=editar_aluno&idaluno=" . $row_aluno->id_aluno . "&idturma=". $row_turma->id_turma ."&r=turma';\">Editar</button>";
                                echo " <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar_aluno&acao=excluir&idaluno=".$row_aluno->id_aluno."&idturma=". $row_turma->id_turma ."&r=turma';}else{false;}\"'>Excluir</button><br>";
                            }
                        else{
                                echo "<br>";
                            }
                   
                }
            }  
        ?>