<h1>Editar Turma</h1>
<?php 
    #consulta a tabela curso
    $sql_curso = "SELECT id_curso, nome FROM curso
                ORDER BY nome ASC";

    $res_curso = $conexao->query($sql_curso);

    $qtd_curso = $res_curso->num_rows;

    #consulta a tabela turma
    $sql_turma = "SELECT id_turma, numero, ano, conselheiro, id_curso FROM turma
                WHERE id_turma=".$_REQUEST["idturma"];

    $res_turma = $conexao->query($sql_turma);

    $qtd_turma = $res_turma->num_rows;

    $row_turma=$res_turma->fetch_object();

    #consulta a tabela ano
    $sql_ano = "SELECT ano FROM ano
                ORDER BY ano";

    $res_ano = $conexao->query($sql_ano);

    $qtd_ano = $res_ano->num_rows;
?>

<?php 
        if(($qtd_curso>0) && ($qtd_turma>0)){
            echo "<form action=\"?page=salvar_turma&acao=editar&idturma=".$_REQUEST["idturma"]."&r=".$_REQUEST["r"]."\" method=\"POST\">";
                echo "<input type=\"hidden\" name=\"id\" value=\"". $row_turma->id_turma . "\">";
                echo "<label>Número da Turma:</label><br>";
                echo "<input type=\"number\" name=\"numero\" value=\"" . $row_turma->numero . "\"><br><br>";

                echo "<label>Conselheiro:</label><br>";
                echo "<input type=\"text\" name=\"conselheiro\" value=\"" . $row_turma->conselheiro . "\"><br><br>";

                echo "<label>Curso:</label><br>";
                while($row_curso=$res_curso->fetch_object()){
                    if($row_turma->id_curso==$row_curso->id_curso){
                        echo "<input type=\"radio\" name=\"curso\" value=\"" . $row_curso->id_curso . "\" checked>";
                        echo "<label for=\"" . $row_curso->nome  . "\">" . $row_curso->nome . "</label><br>";
                    }
                    else{
                        echo "<input type=\"radio\" name=\"curso\" value=\"" . $row_curso->id_curso . "\">";
                        echo "<label for=\"" . $row_curso->nome  . "\">" . $row_curso->nome . "</label><br>";
                    }
                    
                }

                if($qtd_ano>0){
                    echo "<br><label>Ano:</label><br>";
                    while($row_ano=$res_ano->fetch_object()){
                        if($row_ano->ano==$row_turma->ano){
                            echo "<input type=\"radio\" name=\"ano\" value=\"".$row_ano->ano."\"checked>";
                            echo "<label for=\"ano\">".$row_ano->ano."º ano</label><br>";
                        }
                        else{
                            echo "<input type=\"radio\" name=\"ano\" value=\"".$row_ano->ano."\">";
                            echo "<label for=\"ano\">".$row_ano->ano."º ano</label><br>";
                        }
                        
                    
                    }
                }
                echo "<button type=\"submit\">Salvar</button>
                    <button type=\"submit\" formnovalidate>Cancelar</button>";
            
            echo "</form>";
        }

        else {
            echo "Não é possível fazer a edição da turma!";
        }

    ?>