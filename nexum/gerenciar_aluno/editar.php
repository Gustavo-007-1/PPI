<h1>Editar Turma</h1>
<?php 
    #consulta a tabela aluno
    $sql_aluno = "SELECT * FROM aluno WHERE id_aluno=".$_REQUEST["idaluno"];

    $res_aluno = $conexao->query($sql_aluno);
    $row_aluno=$res_aluno->fetch_object();
    $qtd_aluno = $res_aluno->num_rows;

    #consulta a tabela turma
    #consulta a tabela turma
    $sql_turma = "SELECT id_turma, numero FROM turma";

    $res_turma = $conexao->query($sql_turma);
    $qtd_turma = $res_turma->num_rows;

?>

<?php 
        if($qtd_aluno>0){
            echo "<form enctype=\"multipart/form-data\" action=\"?page=salvar_aluno&acao=editar&idturma=". $_REQUEST["idturma"] ."&idaluno=". $row_aluno->id_aluno."&r=".$_REQUEST["r"]."\" method=\"POST\">";

                echo "<label>Foto do Aluno</label><br>";
                if($row_aluno->foto != NULL){
                    echo "<br>Foto atual";
                    echo "<br><img src=\"../gerenciar_aluno/foto_upload/". $row_aluno->foto."\"/><br>";
                    echo "<input type=\"hidden\" value=\"". $row_aluno->foto."\" name=\"foto_antiga_aluno\">";

                    echo "Nova foto <br>";
                    echo "<input type=\"file\" name=\"foto_nova_aluno\"><br><br>";
                }
                else{
                    echo "<input type=\"file\" name=\"foto_aluno\"><br><br>";
                }

                echo "<label>Nome</label><br>";
                echo "<input type=\"text\" name=\"nome\" value=\"" . $row_aluno->nome . "\"><br><br>";

                echo "<label>Data de Nascimento</label><br>";
                echo "<input type=\"date\" name=\"data_nascimento\" value=\"" . $row_aluno->data_nascimento . "\"><br><br>";

                echo "<label>Número da Matrícula</label><br>";
                echo "<input type=\"number\" name=\"numero_matricula\" value=\"" . $row_aluno->numero_matricula . "\"><br><br>";

                echo "<label>E-mail Institucional</label><br>";
                echo "<input type=\"e-mail\" name=\"email\" value=\"" . $row_aluno->email_institucional . "\"><br><br>";
               
                echo "<label>Cidade</label><br>";
                echo "<input type=\"text\" name=\"cidade\" value=\"" . $row_aluno->cidade . "\"><br><br>";

                echo "<label>Unidade Federativa</label><br>";
                echo "<input type=\"text\" name=\"uf\" value=\"" . $row_aluno->unidade_federativa. "\"><br><br>";

                echo "<label>Reprovações</label><br>";
                echo "<input type=\"number\" name=\"quant_repro\" value=\"" . $row_aluno->quant_reprovacao. "\"><br><br>";
                
                echo "<label>Moradia</label><br>";
                echo "<input type=\"text\" name=\"moradia\" value=\"" . $row_aluno->moradia. "\"><br><br>";

                echo "<label>Cota</label><br>";
                echo "<input type=\"number\" name=\"cota\" value=\"" . $row_aluno->cota. "\"><br><br>";

                echo "<label>Gênero</label><br>";
                echo "<input type=\"text\" name=\"genero\" value=\"" . $row_aluno->genero. "\"><br><br>";

                echo "<div>";
                    echo "<label>Turma</label>";
                    echo "<select name=\"turma\">";
                    if($qtd_turma>0){
                        while($row_turma = $res_turma->fetch_object()){
                            if($row_turma->id_turma == $_REQUEST["idturma"] ){
                                echo "<option value=\"". $row_turma->id_turma."\"selected>". $row_turma->numero ."</option>";
                            }
                            else{
                                echo "<option value=\"". $row_turma->id_turma."\">". $row_turma->numero ."</option>";
                            }
                        }
                    }  
                    echo "</select>";
                echo "</div>";

                echo "<label>Acompanhamento AEE</label><br>";
                echo "<input type=\"text\" name=\"acompanhamento_aee\" value=\"" . $row_aluno->acompanhamento_aee. "\"><br><br>";

                echo "<label>Acompanhamento CAI</label><br>";
                echo "<input type=\"text\" name=\"acompanhamento_cai\" value=\"" . $row_aluno->acompanhamento_cai. "\"><br><br>";

                echo "<label>Acompanhamento Saúde</label><br>";
                echo "<input type=\"text\" name=\"acompanhamento_saude\" value=\"" . $row_aluno->acompanhamento_saude. "\"><br><br>";

                echo "<label>Auxílio Permanência</label><br>";
                echo "<input type=\"text\" name=\"auxilio_permanencia\" value=\"" . $row_aluno->auxilio_permanencia. "\"><br><br>";

                echo "<label>Apoio Psicológico</label><br>";
                echo "<input type=\"text\" name=\"apoio_psicologico\" value=\"" . $row_aluno->apoio_psicologico. "\"><br><br>";

                echo "<label>Projeto de Extensão</label><br>";
                echo "<input type=\"text\" name=\"projeto_extensao\" value=\"" . $row_aluno->projeto_extensao. "\"><br><br>";

                echo "<label>Projeto de Pesquisa</label><br>";
                echo "<input type=\"text\" name=\"projeto_pesquisa\" value=\"" . $row_aluno->projeto_pesquisa. "\"><br><br>";

                echo "<label>Projeto de Ensino</label><br>";
                echo "<input type=\"text\" name=\"projeto_ensino\" value=\"" . $row_aluno->projeto_ensino. "\"><br><br>";

                echo "<label>Estágio</label><br>";
                echo "<input type=\"text\" name=\"estagio\" value=\"" . $row_aluno->estagio. "\"><br><br>";

                echo "<label>Equipamentos Emprestados</label><br>";
                echo "<input type=\"text\" name=\"equip_emprest\" value=\"" . $row_aluno->equip_emprest. "\"><br><br>";


                echo "<button type=\"submit\">Salvar</button>
                    <button type=\"submit\" formnovalidate>Cancelar</button>";
            
            echo "</form>";
        }

        else {
            echo "Não é possível fazer a edição do aluno!";
        }

    ?>