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
    <link rel="stylesheet" href="../assets/gerenciar_usuarios/botoes.css">
    <link rel="stylesheet" href="../assets/linha_branca_cima/retangulo_branco_cima.css">
</head>
<body>

    <div class="fundo">

            <div class="retangulo_branco_cima">
                <div>
                    <img src="../assets/imagens/IF.png" class="logo_IF" alt="Imagem logo IF">
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





        <div>
            <?php 
                include "../config.php";
                switch (@$_REQUEST["page"]){

                

                    default:
                        echo "<div class=\"centralizar_h\">";

                        echo "<a href=\"?page=cadastrar\" class=\"botao_adicionar\">Adicionar Usuário</a>";
                        echo "<h1 class=\"titulo_gerenciar_usuario\" >Gerenciar Usuários</h1>";
                        echo "<h1 class=\"botao_adicionar_fantasma\"> </h1>";
                        echo "</div>";

                        echo "<div class=\"retangulo_branco\">";

                            include("listar.php");
                            
                        echo "</div>";

                        break;


                    
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
                    
                    
                }
            ?>

        </div>

    </div>

</body>
</html>
