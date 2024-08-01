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
    <div>
        <?php 
            include "../config.php";
            switch (@$_REQUEST["page"]){
                
                case 'cadastrar':
                    include("./cadastrar.php");
                    break;

                case 'editar':
                    include("./editar.php");
                    break;

                case 'salvar':
                    include("./salvar.php");
                    break;
                
                case 'logout':
                    header('Location: ../logout.php');
                    exit();
                    break;
                
                case 'principal':
                    header('Location: ../pagina_principal.php');
                    exit();
                    break;

                default:
                    echo "<a href=\"?page=cadastrar\">Adicionar Usuário</a>";
                    echo "<h1>Gerenciar Usuários</h1>";
                    include("listar.php");
                    break;
            }
        ?>

    </div>
</body>
</html>
