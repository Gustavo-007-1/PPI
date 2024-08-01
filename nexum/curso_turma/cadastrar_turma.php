<h1>Cadastro de Turmas</h1>
<?php 
    $sql = "SELECT id_curso, nome FROM curso";

    $res = $conexao->query($sql);

    $qtd = $res->num_rows;

?>

<?php 
        if($qtd>0){
            echo "<form action=\"?page=salvar_turma&acao=cadastrar\" method=\"POST\">";
                echo "<label>Número da Turma:</label><br>";
                echo "<input type=\"number\" name=\"numero\" required><br><br>";
                echo "<label>Curso:</label><br>";
                while($row=$res->fetch_object()){
                    
                    echo "<input type=\"radio\" name=\"curso\" value=\"" . $row->id_curso . "\" required>";
                    echo "<label for=\"" . $row->nome  . "\">" . $row->nome . "</label><br>";
                    
                }

                echo "<br><label>Ano:</label><br>";
                echo "<input type=\"radio\" name=\"ano\" value=\"1\"required>";
                echo "<label for=\"ano\">1º ano</label><br>";
                echo "<input type=\"radio\" name=\"ano\" value=\"2\"required>";
                echo "<label for=\"ano\">2º ano</label><br>";
                echo "<input type=\"radio\" name=\"ano\" value=\"3\"required>";
                echo "<label for=\"ano\">3º ano</label><br><br>";
                echo "<button type=\"submit\">Cadastrar</button>
                    <button type=\"submit\" formnovalidate>Cancelar</button>";
            
            echo "</form>";
        }

        else {
            echo "Não há cursos cadastrados para realizar o cadastro de turmas!";
        }

    ?>