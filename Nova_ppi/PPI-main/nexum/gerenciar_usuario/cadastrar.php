<h1 class="titulo_pag_editar">Adicionar Usuários</h1>

<form class="quadrado_branco_editar" action="?page=salvar&acao=cadastrar" method="POST">
    <div>
        <label class="parte_letra">Nome</label>
        <input class="formulario" type="text" name="nome" required>
    </div>
    <div>
        <label class="parte_letra">CPF</label>
        <input class="formulario" type="text" name="cpf" required>
    </div>
    <div>
        <label class="parte_letra">E-Mail</label>
        <input class="formulario" type="email" name="email" required>
    </div>
    <div>
        <label class="parte_letra">Categoria</label>
        <input class="formulario" type="number" name="categoria" required>
    </div>
    <div>
        <label class="parte_letra">Senha</label>
        <input class="formulario" type="password" name="senha" required>
    </div>
    <div class="levar_direita">
        <button  class="botao_salvar" type="submit">Adicionar</button>
        <button  class="botao_cancelar" type="submit" formnovalidate>Cancelar</button>
    </div>
</form>