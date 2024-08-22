<DIV>

<?php 
    
    # consulta ao nome do curso na tabela curso
    $sql_curso = "SELECT id_curso, nome FROM curso
            ORDER BY nome ASC";

    $res_curso = $conexao->query($sql_curso);

    $qtd_curso = $res_curso->num_rows;


    if($qtd_curso>0){
        while($row_curso = $res_curso->fetch_object()){

            
            echo "<div class=\"titulo_curso\">" . $row_curso->nome;
            if($_SESSION["categoria"]==1 || $_SESSION["categoria"]==2){
                echo " <button class=\"botao_editar\" onclick=\"location.href='?page=editar_curso&id=" . $row_curso->id_curso . "';\">Editar</button>";
                echo " <button class=\"botao_excluir\" onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar_curso&acao=excluir&id=".$row_curso->id_curso."';}else{false;}\"'>Excluir</button>";
            }

            echo "</div>";


            #consulta ao numero da turma na tabela turma


            $sql_turma = "SELECT id_turma, numero, id_curso FROM turma
            ORDER BY NUMERO ASC ";

            $res_turma = $conexao->query($sql_turma);

            $qtd_turma = $res_turma->num_rows;

            
           
            if($qtd_turma>0){

                
                
                while($row_turma = $res_turma->fetch_object()){
                    if($row_turma->id_curso == $row_curso->id_curso){
                        echo "<div class=\"titulo_turma\">";
                        echo "Turma " . $row_turma->numero;
                        if($_SESSION["categoria"]==1 || $_SESSION["categoria"]==2){
                            echo "<button class=\"botao_editar\" onclick=\"location.href='?page=editar_turma&id=" . $row_turma->id_turma . "';\">Editar</button>";
                            echo "<button class=\"botao_excluir\" onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar_turma&acao=excluir&id=".$row_turma->id_turma."';}else{false;}\"'>Excluir</button>";
                        }
                        echo "</div>";
                    }
                }
                
            }

        }

    }



?>

</DIV>