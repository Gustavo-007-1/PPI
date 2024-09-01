<h1>Editar Usuários</h1>

<?php 
    // consulta aos dados do usuário
    $sql_usuario = "SELECT * FROM usuario 
            WHERE id_usuario=" . $_REQUEST["id"];

    $res_usuario = $conexao->query($sql_usuario);
    $row_usuario = $res_usuario->fetch_object();

    // consulta a tabela categoria
    $sql_categoria = "SELECT * FROM categoria
                ORDER BY id_categoria";

    $res_categoria = $conexao->query($sql_categoria);

    $qtd_categoria = $res_categoria->num_rows;
?>

<form action="?page=salvar&acao=editar" method="POST">
    <input type="hidden" name="id" value="<?php echo $row_usuario->id_usuario; ?>">
    <div>
        <label>Nome</label>
        <input type="text" name="nome" value="<?php echo $row_usuario->nome;?>">
    </div>
    <div>
        <label>CPF</label>
        <input type="number" name="cpf" value="<?php echo $row_usuario->cpf;?>">
    </div>
    <div>
        <label>E-Mail</label>
        <input type="email" name="email" value="<?php echo $row_usuario->email;?>">
    </div>
    <div>
        <?php 
            if($qtd_categoria>0){
                echo "<br><label>Categoria:</label><br>";
                while($row_categoria=$res_categoria->fetch_object()){
                    if($row_categoria->id_categoria==$row_usuario->categoria){
                        echo "<input type=\"radio\" name=\"categoria\" value=\"".$row_categoria->id_categoria."\"checked>";
                        echo "<label for=\"categoria\">".$row_categoria->categoria."</label><br>";
                    }
                    else{
                        echo "<input type=\"radio\" name=\"categoria\" value=\"".$row_categoria->id_categoria."\">";
                        echo "<label for=\"categoria\">".$row_categoria->categoria."</label><br>";
                    }
                    
                
                }
            }
        ?>
    </div>
    <div>
        <button type="submit">Salvar</button>
        <button type="submit" formnovalidate>Cancelar</button>
    </div>
</form>