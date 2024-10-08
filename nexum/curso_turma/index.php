<?php 
    session_start();
    if (empty($_SESSION)) {
        header('Location: ../index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexum</title>
</head>
<body>
    <div>
        <?php
            echo "<h1><a href=\"?page=principal\">Nexum</a></h1>";
            echo "<a href=\"?page=logout\">Sair</a>";
        ?>
    </div>
    <?php 
            include "../config.php";
            switch (@$_REQUEST["page"]){
                case 'cadastrar_curso':
                    include("../gerenciar_curso/cadastrar.php");
                    break;
                
                case 'editar_curso':
                    include("../gerenciar_curso/editar.php");
                    break;

                case 'salvar_curso':
                    include("../gerenciar_curso/salvar.php");
                    break;
                
                case 'cadastrar_turma':
                    include("../gerenciar_turma/cadastrar.php");
                    break;
                
                case 'editar_turma':
                    include("../gerenciar_turma/editar.php");
                    break;
                
                case 'salvar_turma':
                    include("../gerenciar_turma/salvar.php");
                    break;
                
                case 'turma':
                    include("../gerenciar_turma/listar.php");
                    break;
                
                case 'cadastrar_aluno':
                    include("../gerenciar_aluno/cadastrar.php");
                    break;
                
                case 'editar_aluno':
                    include("../gerenciar_aluno/editar.php");
                    break;
                
                case 'salvar_aluno':
                    include("../gerenciar_aluno/salvar.php");
                    break;
                
                case 'aluno':
                    include("../gerenciar_aluno/aluno.php");
                    break;

                case 'logout':
                    include("../logout.php");
                    break;

                case 'principal':
                    header('Location: ../pagina_principal.php');
                    exit();
                    break;
                
                default:
                    if($_SESSION["categoria"]==1 || $_SESSION["categoria"]==2){
                        echo "<a href=\"?page=cadastrar_turma\">Adicionar Turma</a> <br><br>";
                        echo "<a href=\"?page=cadastrar_curso\">Adicionar Curso</a> <br><br>";
                    }
                    include("./listar_nome_curso_turma.php");
                    break;
            }
        ?>
</body>
</html>