<h1>Adicionar Usuários</h1>

<form action="?page=salvar&acao=cadastrar" method="POST">
    <div>
        <label>Nome</label>
        <input type="text" name="nome" required>
    </div>
    <div>
        <label>CPF</label>
        <input type="text" name="cpf" required>
    </div>
    <div>
        <label>E-Mail</label>
        <input type="email" name="email" required>
    </div>
    <div>
        <label>Categoria</label>
        <input type="number" name="categoria" required>
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