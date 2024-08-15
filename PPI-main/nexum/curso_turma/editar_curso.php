<h1>Cadastrar Curso</h1>
<?php 

    $sql="SELECT * FROM curso
        WHERE id_curso=".$_REQUEST["id"];

    $res = $conexao->query($sql);
    $row = $res->fetch_object();

?>
<form action="?page=salvar_curso&acao=editar" method="POST">
    <input type="hidden" name="id" value="<?php echo $row->id_curso; ?>">
    <div>
        <label>Nome</label>
        <input type="text" name="nome" value="<?php echo $row->nome; ?>">
    </div>
    <div>
        <label>Carga Horária</label>
        <input type="number" name="carga_horaria" value="<?php echo $row->carga_horaria; ?>">
    </div>
    <div>
        <label>Coordenador de Curso</label>
        <input type="text" name="coordenador" value="<?php echo $row->coordenador; ?>">
    </div>
    <div>
        <button type="submit">Salvar</button>
        <button type="submit" formnovalidate>Cancelar</button>
    </div>
</form>