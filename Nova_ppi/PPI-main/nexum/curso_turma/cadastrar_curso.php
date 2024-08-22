<h1>Cadastrar Curso</h1>

<form action="?page=salvar_curso&acao=cadastrar" method="POST">
    <div>
        <label>Nome</label>
        <input type="text" name="nome" required>
    </div>
    <div>
        <label>Carga Horária</label>
        <input type="number" name="carga_horaria" required>
    </div>
    <div>
        <label>Coordenador de Curso</label>
        <input type="text" name="coordenador">
    </div>
    <div>
        <button type="submit">Cadastrar</button>
        <button type="submit" formnovalidate>Cancelar</button>
    </div>
</form>