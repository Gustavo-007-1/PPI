<h1>Editar Usuários</h1>

<?php 
    $sql = "SELECT * FROM usuario 
            WHERE id_usuario=" . $_REQUEST["id"];

    $res = $conexao->query($sql);
    $row = $res->fetch_object();
?>

<form action="?page=salvar&acao=editar" method="POST">
    <input type="hidden" name="id" value="<?php echo $row->id_usuario; ?>">
    <div>
        <label>Nome</label>
        <input type="text" name="nome" value="<?php echo $row->nome;?>">
    </div>
    <div>
        <label>CPF</label>
        <input type="text" name="cpf" value="<?php echo $row->cpf;?>">
    </div>
    <div>
        <label>E-Mail</label>
        <input type="email" name="email" value="<?php echo $row->email;?>">
    </div>
    <div>
        <label>Categoria</label>
        <input type="number" name="categoria" value="<?php echo $row->categoria;?>">
    </div>
    <div>
        <button type="submit">Salvar</button>
        <button type="submit" formnovalidate>Cancelar</button>
    </div>
</form>