<?php 
            $sql = "SELECT * FROM usuario 
                    ORDER BY nome ASC";
            $res = $conexao->query($sql);
            $qtd = $res->num_rows;


            if ($qtd > 0) {

                while ($row = $res->fetch_object()){

                    $sql_cat = "SELECT categoria.categoria FROM categoria INNER JOIN usuario
                            ON categoria.id_categoria = usuario.categoria
                            WHERE id_usuario=" . $row->id_usuario;
                    $res_cat = $conexao->query($sql_cat);   
                    $categoria = $res_cat->fetch_object();

                    echo "<div>";

                        echo $row->nome . "<br>";
                        echo $row->cpf . "<br>";
                        echo $row->email . "<br>";
                        echo $categoria->categoria . "<br>";
                        echo "<button onclick=\"location.href='?page=editar&id=" . $row->id_usuario . "';\">Editar</button>";
                        echo "<button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=".$row->id_usuario."';}else{false;}\"'>Excluir</button>";
        
                    echo "</div>";
                }
            }
            else{
                echo "Não há usuários registrados no sistema";
            }
        ?>