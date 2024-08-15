<?php 
    session_start();
    if (empty($_SESSION)) {
        header('Location: ./index.php');
        exit();
    }

    if($_SESSION["categoria"]==1){
        switch (@$_REQUEST["page"]){
            case 'usuario':
                header('Location: ./gerenciar_usuario/index.php');
                exit();
                break;

            default:
                break;
        }

    }
    switch (@$_REQUEST["page"]){
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
    <link rel="stylesheet" href="./assets/css.css">
</head>
<body> 
    <div class="fundo">
        <div class="retangulo_branco_cima">
            <div>
                <div class="titulo_nexum">
                    <h1><a href="?page=principal">Nexum</a></h1>
                </div>
                <div class="botao_vermelho">
                    <?php 
                        echo "<a href=\"?page=logout\">Sair</a>";
                    ?>
                </div>
            </div>    
        </div>

        <div class="titulo_gerenciar"> 
            <h1> Gerenciar </h1> <br> <br>
        </div>

        <div class="retangulo_branco_itens">

            <div class="botao_cinza">
                <?php 
                    if($_SESSION["categoria"]==1){
                        echo "<a href=\"?page=usuario\">Gerenciar Usuarios</a>";
                    }
                    echo "<br>";
                    echo "<a href=\"?page=curso_turma\">Cursos e Turmas</a>"
                ?>
            </div>
            
        </div>    
    </div>
</body>
</html>
