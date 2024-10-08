<?php 
    session_start();
    if (empty($_SESSION)) {
        header('Location: ./index.php');
        exit();
    }

    switch (@$_REQUEST["page"]){
        case 'usuario':
            header('Location: ./gerenciar_usuario/index.php');
            exit();
            break;
        
        case 'gerenciar_disciplina':
            header('Location: ./gerenciar_disciplina/listar.php');
            exit();
            break;

        case 'principal':
            header('Location: ./pagina_principal.php');
            exit();
            break;

        case 'curso_turma':
            header('Location: ./curso_turma/index.php');
            exit();
            break;
            
        case 'logout':
            header('Location: ./logout.php');
            exit();
            break;

        default:
            break;
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
        <h1><a href="?page=principal">Nexum</a></h1>
        <?php 
            echo "<a href=\"?page=logout\">Sair</a>";
        ?>
    </div>
    <div>
        <?php 
            if($_SESSION["categoria"]==1){
                echo "<a href=\"?page=usuario\">Gerenciar Usuarios</a>";
            }
            if(($_SESSION["categoria"]==1) || ($_SESSION["categoria"] == 2)){
                echo "<a href=\"?page=gerenciar_disciplina\">Gerenciar Disciplinas</a>";
            }
            echo "<br>";
            echo "<a href=\"?page=curso_turma\">Cursos e Turmas</a>"
        ?>
    </div>
</body>
</html>
