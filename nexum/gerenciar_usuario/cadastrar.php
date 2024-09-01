<?php 
    $sql = "SELECT * FROM categoria
    ORDER BY id_categoria";

    $res= $conexao->query($sql);

    $qtd = $res->num_rows;
?>

<h1>Adicionar Usuários</h1>

<form action="?page=salvar&acao=cadastrar" method="POST">
    <div>
        <label>Nome</label>
        <input type="text" name="nome" required>
    </div>
    <div>
        <label>CPF</label>
        <input type="number" name="cpf" required>
    </div>
    <div>
        <label>E-Mail</label>
        <input type="email" name="email" required>
    </div>
    <div>
        <label>Categoria<br></label>
        <?php 
            if($qtd>0){
                while($row=$res->fetch_object()){
                        echo "<input type=\"radio\" name=\"categoria\" value=\"".$row->id_categoria."\" required>";
                        echo "<label for=\"categoria\">".$row->categoria."</label><br>";
                }
            }
        ?>
    </div>
    <div>
        <label>Senha</label>
        <input type="password" name="senha" required>
    </div>
    <div>
        <button type="submit">Adicionar</button>
        <button type="submit" formnovalidate>Cancelar</button>
    </div>
</form>