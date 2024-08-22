<h1 class="titulo_pag_editar">Editar Usuários</h1>

<?php 
    $sql = "SELECT * FROM usuario 
            WHERE id_usuario=" . $_REQUEST["id"];

    $res = $conexao->query($sql);
    $row = $res->fetch_object();
?>

<form class="quadrado_branco_editar" action="?page=salvar&acao=editar" method="POST">
    <input type="hidden" name="id" value="<?php echo $row->id_usuario; ?>">
    <div>
        <label class="parte_letra">Nome:</label> <br>
        <input class="formulario" type="text" name="nome" value="<?php echo $row->nome;?>">
    </div>
    <div>
        <label class="parte_letra">CPF</label> <br>
        <input class="formulario" type="text" name="cpf" value="<?php echo $row->cpf;?>">
    </div>
    <div>
        <label class="parte_letra">E-Mail</label> <br>
        <input class="formulario" type="email" name="email" value="<?php echo $row->email;?>">
    </div>
    <div>
        <label class="parte_letra">Categoria</label> <br>
        <input class="formulario" type="number" name="categoria" value="<?php echo $row->categoria;?>">
    </div>
    <div>

    </div>
    <div class="levar_direita">
        <button class="botao_salvar" type="submit">Salvar</button>
        <button class="botao_cancelar" type="submit" formnovalidate>Cancelar</button>
    </div>
</form>