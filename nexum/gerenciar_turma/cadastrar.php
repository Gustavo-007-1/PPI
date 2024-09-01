<h1>Cadastro de Turmas</h1>
<?php 
    $sql_curso = "SELECT id_curso, nome FROM curso
                    ORDER BY nome ASC";

    $res_curso = $conexao->query($sql_curso);

    $qtd_curso = $res_curso->num_rows;

    #consulta a tabela ano
    $sql_ano = "SELECT ano FROM ano
                ORDER BY ano";

    $res_ano = $conexao->query($sql_ano);

    $qtd_ano = $res_ano->num_rows;

?>

<?php 
        if($qtd_curso>0){
            echo "<form action=\"?page=salvar_turma&acao=cadastrar\" method=\"POST\">";
                echo "<label>Número da Turma:</label><br>";
                echo "<input type=\"number\" name=\"numero\" required><br><br>";
                echo "<label>Curso:</label><br>";
                while($row_curso=$res_curso->fetch_object()){
                    
                    echo "<input type=\"radio\" name=\"curso\" value=\"" . $row_curso->id_curso . "\" required>";
                    echo "<label for=\"" . $row_curso->nome  . "\">" . $row_curso->nome . "</label><br>";
                    
                }

                if($qtd_ano>0){
                    echo "<br><label>Ano:</label><br>";
                    while($row_ano=$res_ano->fetch_object()){
                            echo "<input type=\"radio\" name=\"ano\" value=\"".$row_ano->ano."\">";
                            echo "<label for=\"ano\">".$row_ano->ano."º ano</label><br>";
                    }
                }


                echo "<button type=\"submit\">Cadastrar</button>
                    <button type=\"submit\" formnovalidate>Cancelar</button>";
            
            echo "</form>";
        }

        else {
            echo "Não há cursos cadastrados para realizar o cadastro de turmas!";
        }

    ?>