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
    <link rel="stylesheet" href="./assets/pag_principal/css.css">
</head>
<body> 
    <div class="fundo">


        <div class="retangulo_branco_cima">
            <div>
                <img src="./assets/imagens/IF.png" class="logo_IF" alt="Imagem logo IF">
                <div class="titulo_nexum">
                    <h1><a href="?page=principal">Nexum</a></h1>
                </div>
                <div class="botao_minha_conta">
                    <?php
                    echo "<a href\"?page=minha_conta\>Minha conta</a>"
                    ?>
                </div>
                <div class="botao_sair">
                    <?php 
                        echo "<a href=\"?page=logout\">Sair</a>";
                    ?>
                </div>
            </div>    
        </div>



        <div class="titulo_gerenciar"> 
            <label>Gerenciar </label>
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
