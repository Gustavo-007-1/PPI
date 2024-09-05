<h1>Cadastrar Aluno</h1>
<?php
    #consulta a tabela turma
    $sql_turma = "SELECT id_turma, numero FROM turma";

    $res_turma = $conexao->query($sql_turma);
    $qtd_turma = $res_turma->num_rows;

?>

<form enctype="multipart/form-data" action="?page=salvar_aluno&acao=cadastrar&idturma=<?php echo $_REQUEST["idturma"]; ?>" method="POST">
    <div>
        <label>Nome</label>
        <input type="text" name="nome" required>
    </div>
    <div>
        <label>Data de Nascimento</label>
        <input type="date" name="data_nascimento" required>
    </div>
    <div>
        <label>Número da Matrícula</label>
        <input type="number" name="numero_matricula" required>
    </div>
    <div>
        <label>E-mail Institucional</label>
        <input type="e-mail" name="email">
    </div>
    <div>
        <label>Cidade</label>
        <input type="text" name="cidade">
    </div>
    <div>
        <label>Unidade Federativa</label>
        <input type="text" name="uf">
    </div>
    <div>
        <label>Reprovações</label>
        <input type="number" name="quant_repro">
    </div>
    <div>
        <label>Moradia</label>
        <input type="text" name="moradia">
    </div>
    <div>
        <label>Turma</label>
        <select name="turma">
            <?php
                    if($qtd_turma>0){
                        while($row_turma = $res_turma->fetch_object()){
                            if($row_turma->id_turma == $_REQUEST["idturma"] ){
                                echo "<option value=\"". $row_turma->id_turma."\"selected>". $row_turma->numero ."</option>";
                            }
                            else{
                                echo "<option value=\"". $row_turma->id_turma."\">". $row_turma->numero ."</option>";
                            }
                        }
                    }  
            ?>
        </select>
    </div>
    <div>
        <label for="foto">Foto do Aluno</label>
        <input type="file" name="foto_aluno">
    </div>
    <div>
        <button type="submit">Cadastrar</button>
        <button type="submit" formnovalidate>Cancelar</button>
    </div>
</form>